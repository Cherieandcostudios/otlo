@extends('frontend.layouts.app')

@section('title', 'Otlo Cafe - Premium Coffee Experience')

@section('content')
    <!-- Order Bar -->
    <a href="{{ route('frontend.menu') }}" class="order-bar">
        <div class="order-content">
            <div class="order-text">
                Start an order
            </div>
            <div class="order-arrow">→</div>
        </div>
    </a>

    <!-- Hero Sections -->
    <div class="hero-container">
        <!-- First Hero Section - Fall Theme -->
        <div class="hero-section">
            <div class="hero-content">
                <div class="hero-image-fall"></div>
                <div class="hero-text">
                    <h1>Fall. Starts. <span class="highlight">Now.</span></h1>
                    <p>Our fall flavors are officially here. Time for all things pumpkin and pecan, including the new Pecan Oatmilk Cortado.</p>
                    <a href="{{ route('frontend.menu') }}" class="hero-btn">View the menu</a>
                </div>
            </div>
        </div>

        <!-- Second Hero Section - Rewards -->
        <div class="hero-promo">
            <div class="hero-content">
                <div class="hero-text">
                    <h2>Love it? Get it free.</h2>
                    <p>Just join Otlo Cafe® Rewards and enjoy a free drink with a qualifying purchase during your first week.*</p>
                    <a href="{{ route('frontend.join') }}" class="hero-btn">Join & order</a>
                </div>
                <div class="hero-image-rewards">
                    <div class="rewards-drink"></div>
                </div>
            </div>
        </div>

        <!-- Third Hero Section - Franchise -->
        <div class="hero-franchise">
            <div class="hero-content">
                <div class="hero-image-franchise"></div>
                <div class="hero-text">
                    <h2>Join the <span class="highlight">Otlo Family</span></h2>
                    <p>Discover franchise opportunities and become part of our growing coffee community. Build your future with Otlo Cafe.</p>
                    <a href="{{ route('frontend.about') }}" class="hero-btn">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Fourth Hero Section - Poetry -->
        <div class="hero-poetry">
            <div class="hero-content">
                <div class="hero-text">
                    <h2>Coffee & <span class="highlight">Poetry</span></h2>
                    <p>Where words meet warmth. Join our weekly poetry nights and share your stories over the perfect cup of coffee.</p>
                    <a href="{{ route('frontend.private-events') }}" class="hero-btn">Join Events</a>
                </div>
                <div class="hero-image-poetry"></div>
            </div>
        </div>

        <!-- Fifth Hero Section - Library -->
        <div class="hero-library">
            <div class="hero-content">
                <div class="hero-image-library"></div>
                <div class="hero-text">
                    <h2>Otlo <span class="highlight">Library</span></h2>
                    <p>A quiet corner for book lovers. Browse our curated collection while enjoying your favorite brew in our reading nooks.</p>
                    <a href="{{ route('frontend.library') }}" class="hero-btn">Explore Books</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="menu-bottom-bar">
        <div style="display: flex; align-items: center; gap: 20px;">
            <div class="availability-notice">For item availability</div>
            <a href="#" class="store-selector">Choose a store</a>
        </div>
        <a href="{{ route('frontend.cart') }}" class="cart-icon">
            🛒
            <div class="cart-count">0</div>
        </a>
    </div>
@endsection