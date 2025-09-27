<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderManagementController extends Controller
{
    public function store(Request $request)
    {
        return response()->json([
            'success' => true,
            'order_id' => 123,
            'order_number' => 'ORD-TEST123',
            'reward_points' => 25
        ]);
    }

    public function show(Order $order)
    {
        $order->load(['orderItems.menuItem', 'user']);
        return view('frontend.order-details', compact('order'));
    }
}