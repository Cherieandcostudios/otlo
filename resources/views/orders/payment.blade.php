@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-6 max-w-md">
    <div class="bg-white shadow rounded-lg p-6 text-center">
        <h1 class="text-2xl font-bold mb-4">Payment</h1>
        
        <div class="mb-6">
            <p class="text-gray-600 mb-2">Order Number:</p>
            <p class="font-bold text-lg">{{ $order->order_number }}</p>
        </div>
        
        <div class="mb-6">
            <p class="text-gray-600 mb-2">Total Amount:</p>
            <p class="font-bold text-2xl text-green-600">₹{{ $order->total_amount }}</p>
        </div>
        
        <div class="mb-6">
            <p class="text-gray-600 mb-2">Payment Method:</p>
            <p class="font-semibold capitalize">{{ str_replace('_', ' ', $order->payment_method) }}</p>
        </div>

        @if($order->payment_method === 'cash')
            <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-6">
                <p class="font-semibold">Cash on Delivery</p>
                <p class="text-sm">Please keep the exact amount ready for delivery.</p>
            </div>
            
            <form method="POST" action="{{ route('orders.process-payment', $order) }}">
                @csrf
                <button type="submit" class="w-full bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 font-semibold">
                    Confirm Order
                </button>
            </form>
        @else
            <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded mb-6">
                <p class="font-semibold">Online Payment Simulation</p>
                <p class="text-sm">This is a demo payment gateway.</p>
            </div>
            
            <form method="POST" action="{{ route('orders.process-payment', $order) }}">
                @csrf
                <button type="submit" class="w-full bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 font-semibold">
                    Pay Now (Demo)
                </button>
            </form>
        @endif
        
        <div class="mt-4">
            <a href="{{ route('orders.index') }}" class="text-gray-600 hover:text-gray-800">View All Orders</a>
        </div>
    </div>
</div>
@endsection