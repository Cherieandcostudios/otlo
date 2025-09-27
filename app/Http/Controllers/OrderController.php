<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Customer;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('orderItems.menuItem')
            ->where('customer_id', auth('customer')->id())
            ->latest()
            ->paginate(10);
        
        return view('orders.index', compact('orders'));
    }
    
    public function show(Order $order)
    {
        if ($order->customer_id !== auth('customer')->id()) {
            abort(403);
        }
        
        $order->load(['orderItems.menuItem']);
        return view('orders.show', compact('order'));
    }

    public function store(Request $request)
    {
        try {
            // Handle guest orders for dining
            if (!auth('customer')->check() && $request->order_type === 'dining') {
                return $this->createGuestOrder($request);
            }
            
            $validated = $request->validate([
                'order_type' => 'required|in:pickup,delivery,dining',
                'payment_method' => 'required|in:cash,online',
            ]);

            if (!auth('customer')->check()) {
                return response()->json(['success' => false, 'message' => 'Please login first']);
            }

            $cartItems = Cart::with('menuItem')->where('customer_id', auth('customer')->id())->get();
            
            if ($cartItems->isEmpty()) {
                $guestCart = session()->get('guest_cart', []);
                if (empty($guestCart)) {
                    return response()->json(['success' => false, 'message' => 'Cart is empty']);
                }
                return $this->createOrderFromSession($validated, $guestCart);
            }

            $total = $cartItems->sum('total_price');
            $rewardPoints = floor($total);

            $order = Order::create([
                'customer_id' => auth('customer')->id(),
                'order_number' => 'ORD-' . strtoupper(Str::random(8)),
                'order_type' => $validated['order_type'],
                'status' => 'pending',
                'payment_method' => $validated['payment_method'],
                'total_amount' => $total
            ]);

            foreach ($cartItems as $cartItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'menu_item_id' => $cartItem->menu_item_id,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->menuItem->price,
                    'total_price' => $cartItem->total_price
                ]);
            }

            $customer = auth('customer')->user();
            $customer->increment('reward_points', $rewardPoints);

            Cart::where('customer_id', auth('customer')->id())->delete();
            session()->forget('guest_cart');

            return response()->json([
                'success' => true,
                'message' => 'Order placed successfully',
                'order_id' => $order->id,
                'order_number' => $order->order_number,
                'reward_points' => $rewardPoints
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
    
    private function createGuestOrder(Request $request)
    {
        $guestCart = session()->get('guest_cart', []);
        
        if (empty($guestCart)) {
            return response()->json(['success' => false, 'message' => 'Cart is empty']);
        }
        
        $total = 0;
        foreach ($guestCart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        
        $order = Order::create([
            'customer_id' => null,
            'guest_name' => $request->customer_name ?? 'Guest',
            'guest_mobile' => $request->customer_mobile ?? '0000000000',
            'order_number' => 'ORD-' . strtoupper(Str::random(8)),
            'order_type' => 'dining',
            'status' => 'pending',
            'payment_method' => $request->payment_method ?? 'cash',
            'total_amount' => $total
        ]);
        
        foreach ($guestCart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'menu_item_id' => $item['menu_item_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'total_price' => $item['price'] * $item['quantity']
            ]);
        }
        
        session()->forget('guest_cart');
        
        return response()->json([
            'success' => true,
            'message' => 'Order placed successfully',
            'order_id' => $order->id,
            'order_number' => $order->order_number
        ]);
    }
    
    private function createOrderFromSession(array $validated, array $guestCart)
    {
        $total = 0;
        foreach ($guestCart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        
        $rewardPoints = floor($total);
        
        $order = Order::create([
            'customer_id' => auth('customer')->id(),
            'order_number' => 'ORD-' . strtoupper(Str::random(8)),
            'order_type' => $validated['order_type'],
            'status' => 'pending',
            'payment_method' => $validated['payment_method'],
            'total_amount' => $total
        ]);
        
        foreach ($guestCart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'menu_item_id' => $item['menu_item_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'total_price' => $item['price'] * $item['quantity']
            ]);
        }
        
        $customer = auth('customer')->user();
        $customer->increment('reward_points', $rewardPoints);
        
        session()->forget('guest_cart');
        
        return response()->json([
            'success' => true,
            'message' => 'Order placed successfully',
            'order_id' => $order->id,
            'order_number' => $order->order_number,
            'reward_points' => $rewardPoints
        ]);
    }
}