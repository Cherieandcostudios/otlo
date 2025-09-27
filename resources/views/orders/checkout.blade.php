@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-6 max-w-2xl">
    <h1 class="text-2xl font-bold mb-6">Checkout</h1>

    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <h2 class="text-lg font-semibold mb-4">Order Summary</h2>
        
        @foreach($cartItems as $item)
        <div class="flex justify-between items-center py-2 border-b border-gray-200">
            <div>
                <p class="font-medium">{{ $item->menuItem->name }}</p>
                <p class="text-sm text-gray-600">Qty: {{ $item->quantity }} × ₹{{ $item->menuItem->price }}</p>
            </div>
            <p class="font-semibold">₹{{ $item->total_price }}</p>
        </div>
        @endforeach
        
        <div class="flex justify-between items-center pt-4 text-lg font-bold">
            <span>Total Amount:</span>
            <span>₹{{ $total }}</span>
        </div>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-lg font-semibold mb-4">Payment Method</h2>
        
        <form method="POST" action="{{ route('orders.store') }}">
            @csrf
            <div class="space-y-3 mb-6">
                <label class="flex items-center">
                    <input type="radio" name="payment_method" value="cash" class="mr-3" required>
                    <span>Cash on Delivery</span>
                </label>
                <label class="flex items-center">
                    <input type="radio" name="payment_method" value="card" class="mr-3" required>
                    <span>Credit/Debit Card</span>
                </label>
                <label class="flex items-center">
                    <input type="radio" name="payment_method" value="upi" class="mr-3" required>
                    <span>UPI Payment</span>
                </label>
                <label class="flex items-center">
                    <input type="radio" name="payment_method" value="wallet" class="mr-3" required>
                    <span>Digital Wallet</span>
                </label>
            </div>
            
            @error('payment_method')
                <p class="text-red-500 text-sm mb-4">{{ $message }}</p>
            @enderror

            <div class="flex justify-between">
                <a href="{{ route('cart.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600">Back to Cart</a>
                <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600">Place Order</button>
            </div>
        </form>
    </div>
</div>
@endsection