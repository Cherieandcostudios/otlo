<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }} - Admin</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
        <style>
            :root { --theme-color: #b40c25; }
            .bg-theme { background-color: var(--theme-color); }
            .text-theme { color: var(--theme-color); }
            .border-theme { border-color: var(--theme-color); }
            .btn-theme { background-color: var(--theme-color); color: #fff; }
            .btn-theme:hover { opacity: .9; }
            .sidebar { width: 260px; transition: transform .2s ease; }
            .sidebar.hidden { transform: translateX(-100%); }
            @media (max-width: 1023px) { 
                .sidebar { position: fixed; z-index: 50; height: 100vh; }
                .main-content { margin-left: 0 !important; }
            }
            @media (min-width: 1024px) {
                .sidebar { position: relative; }
                .sidebar.hidden { transform: translateX(0); }
            }
            .hamburger { display: flex; flex-direction: column; cursor: pointer; }
            .hamburger span { width: 20px; height: 2px; background: currentColor; margin: 2px 0; transition: 0.3s; }
            .table-responsive { overflow-x: auto; -webkit-overflow-scrolling: touch; }
            .table-responsive table { min-width: 600px; }
            @media (max-width: 768px) {
                .container { padding: 0.5rem; }
                .table-responsive table { font-size: 0.875rem; }
                .table-responsive td, .table-responsive th { padding: 0.5rem; }
            }
        </style>
    </head>
    <body class="min-h-screen bg-gray-100">
        <div class="min-h-screen flex">
            <aside id="sidebar" class="sidebar bg-white border-r">
                <div class="p-4 font-bold text-theme flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-theme rounded flex items-center justify-center text-white text-sm font-bold">
                            {{ substr(config('app.name', 'L'), 0, 1) }}
                        </div>
                        <span class="hidden sm:block">{{ config('app.name', 'Laravel') }}</span>
                    </div>
                    <button id="sidebarClose" class="xl:hidden text-gray-500 hover:text-gray-700" aria-label="Close">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <nav class="px-2 space-y-1">
                    <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded hover:bg-gray-100">Dashboard</a>
                    
                    <!-- Menu Management Dropdown -->
                    <div class="menu-dropdown">
                        <button class="w-full flex items-center justify-between px-3 py-2 rounded hover:bg-gray-100 text-left" onclick="toggleDropdown('menu')">
                            <span>Menu Management</span>
                            <svg class="w-4 h-4 transition-transform" id="menu-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="ml-4 space-y-1 hidden" id="menu-items">
                            <a href="{{ route('admin.menu-categories.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100 text-sm">Categories</a>
                            <a href="{{ route('admin.menu-sub-categories.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100 text-sm">Sub Categories</a>
                            <a href="{{ route('admin.menu-items.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100 text-sm">Menu Items</a>
                        </div>
                    </div>
                    
                    <a href="{{ route('admin.customers.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100">Customers</a>
                    <a href="{{ route('admin.orders.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100">Orders</a>
                    
                    <!-- User Management Dropdown -->
                    <div class="user-dropdown">
                        <button class="w-full flex items-center justify-between px-3 py-2 rounded hover:bg-gray-100 text-left" onclick="toggleDropdown('user')">
                            <span>User Management</span>
                            <svg class="w-4 h-4 transition-transform" id="user-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="ml-4 space-y-1 hidden" id="user-items">
                            <a href="{{ route('admin.users.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100 text-sm">Users</a>
                            <a href="{{ route('admin.roles.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100 text-sm">Roles</a>
                            <a href="{{ route('admin.permissions.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100 text-sm">Permissions</a>
                        </div>
                    </div>
                    
                    <!-- Settings Dropdown -->
                    <div class="settings-dropdown">
                        <button class="w-full flex items-center justify-between px-3 py-2 rounded hover:bg-gray-100 text-left" onclick="toggleDropdown('settings')">
                            <span>Settings</span>
                            <svg class="w-4 h-4 transition-transform" id="settings-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="ml-4 space-y-1 hidden" id="settings-items">
                            <a href="{{ route('admin.settings.email') }}" class="block px-3 py-2 rounded hover:bg-gray-100 text-sm">Email Settings</a>
                            <a href="{{ route('admin.settings.twilio') }}" class="block px-3 py-2 rounded hover:bg-gray-100 text-sm">Twilio SMS</a>
                        </div>
                    </div>
                </nav>
            </aside>
            <div class="flex-1 flex flex-col main-content lg:ml-0">
                <header class="bg-white border-b sticky top-0 z-40">
                    <div class="px-4 py-3 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <button id="sidebarToggle" class="xl:hidden p-2 rounded hover:bg-gray-100" aria-label="Menu">
                                <div class="hamburger">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </button>
                            <div class="xl:hidden flex items-center space-x-2">
                                <div class="w-6 h-6 bg-theme rounded flex items-center justify-center text-white text-xs font-bold">
                                    {{ substr(config('app.name', 'L'), 0, 1) }}
                                </div>
                                <span class="text-theme font-semibold">Admin</span>
                            </div>
                            <h1 class="text-lg font-semibold hidden xl:block">@yield('title','Admin')</h1>
                        </div>
                        <div class="flex items-center gap-2 sm:gap-3">
                            <span class="hidden sm:block text-sm">{{ auth()->user()->name ?? '' }}</span>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn-theme px-2 py-1 sm:px-3 sm:py-1 rounded text-sm">Logout</button>
                            </form>
                        </div>
                    </div>
                </header>
                <main class="flex-1">
                    <div class="container mx-auto p-2 sm:p-4">
                        @if (session('status'))
                            <div class="mb-4 p-3 border-l-4 border-theme bg-white text-sm">{{ session('status') }}</div>
                        @endif
                        @yield('content')
                    </div>
                </main>
                <footer class="bg-white border-t">
                    <div class="max-w-7xl mx-auto px-4 py-3 text-sm text-gray-500">&copy; {{ date('Y') }} {{ config('app.name') }}</div>
                </footer>
            </div>
        </div>
        <script>
        (function(){
          const sidebar = document.getElementById('sidebar');
          const openBtn = document.getElementById('sidebarToggle');
          const closeBtn = document.getElementById('sidebarClose');
          function open(){ sidebar.classList.remove('hidden'); }
          function close(){ sidebar.classList.add('hidden'); }
          if (openBtn) openBtn.addEventListener('click', open);
          if (closeBtn) closeBtn.addEventListener('click', close);
          // default hidden on screens smaller than 1024px
          if (window.matchMedia('(max-width: 1023px)').matches) { close(); }
          // ensure sidebar is visible on larger screens
          if (window.matchMedia('(min-width: 1024px)').matches) { open(); }
        })();
        
        function toggleDropdown(type) {
          const items = document.getElementById(type + '-items');
          const arrow = document.getElementById(type + '-arrow');
          
          if (items.classList.contains('hidden')) {
            items.classList.remove('hidden');
            arrow.style.transform = 'rotate(180deg)';
          } else {
            items.classList.add('hidden');
            arrow.style.transform = 'rotate(0deg)';
          }
        }
        
        // Keep dropdown open if current page is in that section
        document.addEventListener('DOMContentLoaded', function() {
          const currentPath = window.location.pathname;
          
          // Check if current page is in menu management section
          if (currentPath.includes('/admin/menu-')) {
            const menuItems = document.getElementById('menu-items');
            const menuArrow = document.getElementById('menu-arrow');
            menuItems.classList.remove('hidden');
            menuArrow.style.transform = 'rotate(180deg)';
          }
          
          // Check if current page is in user management section
          if (currentPath.includes('/admin/users') || currentPath.includes('/admin/roles') || currentPath.includes('/admin/permissions')) {
            const userItems = document.getElementById('user-items');
            const userArrow = document.getElementById('user-arrow');
            userItems.classList.remove('hidden');
            userArrow.style.transform = 'rotate(180deg)';
          }
          
          // Check if current page is in settings section
          if (currentPath.includes('/admin/settings')) {
            const settingsItems = document.getElementById('settings-items');
            const settingsArrow = document.getElementById('settings-arrow');
            settingsItems.classList.remove('hidden');
            settingsArrow.style.transform = 'rotate(180deg)';
          }
        });
        </script>
        @stack('scripts')
    </body>
    </html>


