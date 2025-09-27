<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        if (!auth('customer')->check()) {
            $guestCart = session()->get('guest_cart', []);
            $cartItems = collect();
            $total = 0;
            
            foreach ($guestCart as $item) {
                $menuItem = MenuItem::find($item['menu_item_id']);
                if ($menuItem) {
                    $cartItem = (object) [
                        'id' => $item['menu_item_id'],
                        'quantity' => $item['quantity'],
                        'total_price' => $menuItem->price * $item['quantity'],
                        'menuItem' => $menuItem
                    ];
                    $cartItems->push($cartItem);
                    $total += $cartItem->total_price;
                }
            }
            
            return view('frontend.cart', compact('cartItems', 'total'));
        }
        $cartItems = Cart::with('menuItem')
            ->where('customer_id', auth('customer')->id())
            ->get();
        
        $total = $cartItems->sum('total_price');
        
        return view('frontend.cart', compact('cartItems', 'total'));
    }

    public function store(Request $request)
    {
        if (!auth('customer')->check()) {
            // Store in session for guest users
            $validated = $request->validate([
                'menu_item_id' => 'required|exists:menu_items,id',
                'quantity' => 'required|integer|min:1'
            ]);
            
            $cart = session()->get('guest_cart', []);
            $itemId = $validated['menu_item_id'];
            
            if (isset($cart[$itemId])) {
                $cart[$itemId]['quantity'] += $validated['quantity'];
            } else {
                $menuItem = \App\Models\MenuItem::findOrFail($itemId);
                $cart[$itemId] = [
                    'menu_item_id' => $itemId,
                    'name' => $menuItem->name,
                    'price' => $menuItem->price,
                    'quantity' => $validated['quantity']
                ];
            }
            
            session()->put('guest_cart', $cart);
            return response()->json(['success' => true, 'message' => 'Item added to cart']);
        }

        $validated = $request->validate([
            'menu_item_id' => 'required|exists:menu_items,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $menuItem = MenuItem::findOrFail($validated['menu_item_id']);
        $totalPrice = $menuItem->price * $validated['quantity'];

        $existingCart = Cart::where('customer_id', auth('customer')->id())
            ->where('menu_item_id', $validated['menu_item_id'])
            ->first();

        if ($existingCart) {
            $existingCart->update([
                'quantity' => $existingCart->quantity + $validated['quantity'],
                'total_price' => $existingCart->total_price + $totalPrice
            ]);
        } else {
            Cart::create([
                'customer_id' => auth('customer')->id(),
                'menu_item_id' => $validated['menu_item_id'],
                'quantity' => $validated['quantity'],
                'total_price' => $totalPrice
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Item added to cart']);
    }

    public function update(Request $request, $itemId)
    {
        $validated = $request->validate(['quantity' => 'required|integer|min:1']);
        
        if (!auth('customer')->check()) {
            $guestCart = session()->get('guest_cart', []);
            if (isset($guestCart[$itemId])) {
                $guestCart[$itemId]['quantity'] = $validated['quantity'];
                session()->put('guest_cart', $guestCart);
                return response()->json(['success' => true, 'message' => 'Cart updated']);
            }
            return response()->json(['success' => false, 'message' => 'Item not found']);
        }
        
        $cart = Cart::where('customer_id', auth('customer')->id())
                   ->where('id', $itemId)
                   ->first();
        
        if (!$cart) {
            return response()->json(['success' => false, 'message' => 'Item not found']);
        }
        
        $cart->update([
            'quantity' => $validated['quantity'],
            'total_price' => $cart->menuItem->price * $validated['quantity']
        ]);

        return response()->json(['success' => true, 'message' => 'Cart updated']);
    }

    public function destroy($itemId)
    {
        if (!auth('customer')->check()) {
            $guestCart = session()->get('guest_cart', []);
            if (isset($guestCart[$itemId])) {
                unset($guestCart[$itemId]);
                session()->put('guest_cart', $guestCart);
                return response()->json(['success' => true, 'message' => 'Item removed from cart']);
            }
            return response()->json(['success' => false, 'message' => 'Item not found']);
        }
        
        $cart = Cart::where('customer_id', auth('customer')->id())
                   ->where('id', $itemId)
                   ->first();
        
        if (!$cart) {
            return response()->json(['success' => false, 'message' => 'Item not found']);
        }
        
        $cart->delete();
        return response()->json(['success' => true, 'message' => 'Item removed from cart']);
    }
    
    public function getSessionCart()
    {
        $guestCart = session()->get('guest_cart', []);
        $items = [];
        $total = 0;
        
        foreach ($guestCart as $item) {
            $items[] = [
                'name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity']
            ];
            $total += $item['price'] * $item['quantity'];
        }
        
        return response()->json([
            'items' => $items,
            'total' => $total
        ]);
    }
}