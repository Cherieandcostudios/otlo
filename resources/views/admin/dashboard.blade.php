@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-4 gap-6">
    <div class="p-6 bg-white border rounded-lg shadow">
        <div class="text-sm text-gray-500">Total Categories</div>
        <div class="mt-1 text-3xl font-bold text-green-600">{{ \App\Models\MenuCategory::count() }}</div>
    </div>
    
    <div class="p-6 bg-white border rounded-lg shadow">
        <div class="text-sm text-gray-500">Total Menu Items</div>
        <div class="mt-1 text-3xl font-bold text-blue-600">{{ \App\Models\MenuItem::count() }}</div>
    </div>
    
    <div class="p-6 bg-white border rounded-lg shadow">
        <div class="text-sm text-gray-500">Total Orders</div>
        <div class="mt-1 text-3xl font-bold text-purple-600">{{ \App\Models\Order::count() }}</div>
    </div>
    
    <div class="p-6 bg-white border rounded-lg shadow">
        <div class="text-sm text-gray-500">Total Users</div>
        <div class="mt-1 text-3xl font-bold text-orange-600">{{ \App\Models\User::count() }}</div>
    </div>
</div>

<div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="p-6 bg-white border rounded-lg shadow">
        <h3 class="text-lg font-semibold mb-4">Quick Actions</h3>
        <div class="space-y-2">
            <a href="{{ route('admin.menu-categories.index') }}" class="block p-3 bg-green-50 hover:bg-green-100 rounded border-l-4 border-green-500">
                <div class="font-medium">Manage Categories</div>
                <div class="text-sm text-gray-600">Add, edit, or delete menu categories</div>
            </a>
            <a href="{{ route('admin.menu-items.index') }}" class="block p-3 bg-blue-50 hover:bg-blue-100 rounded border-l-4 border-blue-500">
                <div class="font-medium">Manage Menu Items</div>
                <div class="text-sm text-gray-600">Add, edit, or delete menu items</div>
            </a>
            <a href="{{ route('admin.users.index') }}" class="block p-3 bg-purple-50 hover:bg-purple-100 rounded border-l-4 border-purple-500">
                <div class="font-medium">Manage Users</div>
                <div class="text-sm text-gray-600">View and manage user accounts</div>
            </a>
        </div>
    </div>
    
    <div class="p-6 bg-white border rounded-lg shadow">
        <h3 class="text-lg font-semibold mb-4">Website Links</h3>
        <div class="space-y-2">
            <a href="{{ route('home') }}" target="_blank" class="block p-3 bg-gray-50 hover:bg-gray-100 rounded border-l-4 border-gray-500">
                <div class="font-medium">View Homepage</div>
                <div class="text-sm text-gray-600">See how the website looks to visitors</div>
            </a>
            
        </div>
    </div>
</div>
@endsection