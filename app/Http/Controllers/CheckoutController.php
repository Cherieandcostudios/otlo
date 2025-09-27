<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = collect();
        $total = 0;
        $itemCount = 0;

        if (auth('customer')->check()) {
            $cartItems = Cart::with('menuItem')->where('user_id', auth('customer')->id())->get();
            $total = $cartItems->sum('total_price');
            $itemCount = $cartItems->sum('quantity');
        }

        return view('frontend.checkout', compact('cartItems', 'total', 'itemCount'));
    }
}