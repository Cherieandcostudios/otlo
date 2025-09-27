@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">My Orders</h1>

    @if(session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">{{ session('status') }}</div>
    @endif

    @if($orders->isEmpty())
        <div class="text-center py-8">
            <p class="text-gray-500 text-lg">No orders found</p>
            <a href="{{ route('dashboard') }}" class="mt-4 inline-block bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">Start Shopping</a>
        </div>
    @else
        <div class="space-y-4">
            @foreach($orders as $order)
            <div class="bg-white shadow rounded-lg p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="font-bold text-lg">{{ $order->order_number }}</h3>
                        <p class="text-sm text-gray-600">{{ $order->created_at->format('M d, Y h:i A') }}</p>
                    </div>
                    <div class="text-right">
                        <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold
                            @if($order->status === 'paid') bg-green-100 text-green-800
                            @elseif($order->status === 'pending') bg-yellow-100 text-yellow-800
                            @else bg-red-100 text-red-800 @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                        <p class="text-lg font-bold mt-1">₹{{ $order->total_amount }}</p>
                    </div>
                </div>
                
                <div class="border-t pt-4">
                    <h4 class="font-semibold mb-2">Items:</h4>
                    @foreach($order->orderItems as $item)
                    <div class="flex justify-between items-center py-1">
                        <span>{{ $item->menuItem->name }} × {{ $item->quantity }}</span>
                        <span>₹{{ $item->total_price }}</span>
                    </div>
                    @endforeach
                </div>
                
                <div class="border-t pt-4 mt-4">
                    <p class="text-sm text-gray-600">
                        <span class="font-semibold">Payment Method:</span> 
                        {{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="mt-6">{{ $orders->links() }}</div>
    @endif
</div>
@endsection