<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderManagementController extends Controller
{
    public function index(Request $request)
    {
        $orderType = $request->get('type', 'all');
        
        $query = Order::with(['customer', 'orderItems.menuItem']);
        
        if ($orderType !== 'all') {
            $query->where('order_type', $orderType);
        }
        
        $orders = $query->latest()->paginate(20);
        
        return view('admin.orders.index', compact('orders', 'orderType'));
    }
    
    public function show(Order $order)
    {
        $order->load(['customer', 'orderItems.menuItem']);
        return view('admin.orders.show', compact('order'));
    }
    
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,preparing,ready,completed,cancelled'
        ]);
        
        $order->update(['status' => $request->status]);
        
        return response()->json(['success' => true, 'message' => 'Order status updated']);
    }
    
    public function destroy(Order $order)
    {
        $order->orderItems()->delete();
        $order->delete();
        
        return response()->json(['success' => true, 'message' => 'Order deleted successfully']);
    }
}