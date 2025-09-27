<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Otlo Cafe - Premium Coffee Experience')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/customer-dropdown.css') }}">
    <style>
        /* Test CSS to verify loading */
        body { background-color: #f8f9fa !important; }
        .test-css { color: red; font-weight: bold; }
    </style>
    @stack('styles')
</head>

<body class="rewards-page">
    @include('frontend.layouts.header')


    @yield('content')

    @include('frontend.layouts.footer')

    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/customer-dropdown.js') }}"></script>
    @stack('scripts')
</body>

</html>