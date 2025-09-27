<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root { --theme-color: #b40c25; }
        .bg-theme { background-color: var(--theme-color); }
        .text-theme { color: var(--theme-color); }
    </style>
</head>
<body class="min-h-screen bg-gray-100">
    <nav class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-xl font-bold text-theme">{{ config('app.name', 'Laravel') }}</a>
                </div>
                
                <div class="flex items-center space-x-4">
                    @auth
                        <a href="{{ route('menu.index') }}" class="text-gray-700 hover:text-theme">Menu</a>
                        <a href="{{ route('cart.index') }}" class="text-gray-700 hover:text-theme">Cart</a>
                        <a href="{{ route('orders.index') }}" class="text-gray-700 hover:text-theme">Orders</a>
                        
                        @hasrole('Admin')
                            <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-theme">Admin</a>
                        @endhasrole
                        
                        <div class="relative">
                            <span class="text-gray-700">{{ auth()->user()->name }}</span>
                            <form method="POST" action="{{ route('logout') }}" class="inline ml-2">
                                @csrf
                                <button type="submit" class="text-gray-700 hover:text-theme">Logout</button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-theme">Login</a>
                        <a href="{{ route('register') }}" class="text-gray-700 hover:text-theme">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>