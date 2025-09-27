@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Shopping Cart</h1>

    @if(session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">{{ session('status') }}</div>
    @endif

    @if($cartItems->isEmpty())
        <div class="text-center py-8">
            <p class="text-gray-500 text-lg">Your cart is empty</p>
            @guest
                <p class="text-gray-600 mt-2">Sign in to save items to your cart</p>
                <a href="{{ route('login') }}" class="mt-4 inline-block bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">Sign In</a>
            @else
                <a href="{{ route('dashboard') }}" class="mt-4 inline-block bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">Continue Shopping</a>
            @endguest
        </div>
    @else
        <div class="bg-white shadow rounded-lg overflow-hidden">
            @foreach($cartItems as $item)
            <div class="p-4 border-b border-gray-200 flex items-center justify-between">
                <div class="flex-1">
                    <h3 class="font-semibold">{{ $item->menuItem->name }}</h3>
                    <p class="text-sm text-gray-600">{{ $item->menuItem->subCategory->category->name }} - {{ $item->menuItem->subCategory->name }}</p>
                    <p class="text-sm text-gray-600">₹{{ $item->menuItem->price }} each</p>
                </div>
                
                <div class="flex items-center space-x-4">
                    <form method="POST" action="{{ route('cart.update', $item) }}" class="flex items-center">
                        @csrf @method('PUT')
                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" 
                               class="w-16 px-2 py-1 border border-gray-300 rounded text-center">
                        <button type="submit" class="ml-2 text-blue-600 hover:text-blue-800">Update</button>
                    </form>
                    
                    <div class="text-right">
                        <p class="font-semibold">₹{{ $item->total_price }}</p>
                    </div>
                    
                    <form method="POST" action="{{ route('cart.destroy', $item) }}">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800">Remove</button>
                    </form>
                </div>
            </div>
            @endforeach
            
            <div class="p-4 bg-gray-50">
                <div class="flex justify-between items-center">
                    <span class="text-lg font-semibold">Total: ₹{{ $total }}</span>
                    <a href="{{ route('checkout') }}" class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection