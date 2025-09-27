@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold mb-4">Welcome to Our Café!</h1>
        <p class="text-gray-600">Discover our delicious menu and place your order</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-md p-6 text-center">
            <div class="text-4xl mb-4">☕</div>
            <h3 class="text-xl font-semibold mb-2">Browse Menu</h3>
            <p class="text-gray-600 mb-4">Explore our delicious coffee and food items</p>
            <a href="{{ route('menu.index') }}" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">View Menu</a>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 text-center">
            <div class="text-4xl mb-4">🛒</div>
            <h3 class="text-xl font-semibold mb-2">My Cart</h3>
            <p class="text-gray-600 mb-4">Review items in your cart</p>
            <a href="{{ route('cart.index') }}" class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600">View Cart</a>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 text-center">
            <div class="text-4xl mb-4">📋</div>
            <h3 class="text-xl font-semibold mb-2">My Orders</h3>
            <p class="text-gray-600 mb-4">Track your order history</p>
            <a href="{{ route('orders.index') }}" class="bg-purple-500 text-white px-6 py-2 rounded hover:bg-purple-600">View Orders</a>
        </div>
    </div>

    @hasrole('Admin')
    <div class="mt-12 text-center">
        <div class="bg-red-50 border border-red-200 rounded-lg p-6">
            <h3 class="text-xl font-semibold mb-2 text-red-800">Admin Panel</h3>
            <p class="text-red-600 mb-4">Manage menu items, categories, and orders</p>
            <a href="{{ route('admin.dashboard') }}" class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-600">Go to Admin</a>
        </div>
    </div>
    @endhasrole
</div>
@endsection
