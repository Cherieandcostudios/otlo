@extends('frontend.layouts.app')

@section('title', 'About Us - Otlo Cafe')

@push('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
    .footer-bottom{
        padding-bottom: 0% !important;
    }
</style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="caffe-hero">
        <div class="caffe-hero-content">
            <h1 class="caffe-hero-title">Experience Our Space</h1>
            <p class="caffe-hero-subtitle">Where coffee meets community in the perfect atmosphere</p>
            <a href="#showcase" class="caffe-hero-btn">Explore Our Caffe</a>
        </div>
        <div class="caffe-hero-overlay"></div>
    </section>

    <!-- Showcase Section -->
    <section class="showcase-section" id="showcase">
        <div class="container">
            <div class="showcase-header">
                <h2 class="section-title">Our Caffe Spaces</h2>
                <p class="section-subtitle">Discover the unique atmosphere of each area in our cafe</p>
            </div>
            <div class="showcase-grid">
                <div class="showcase-item">
                    <div class="showcase-image">
                        <img src="{{ asset('assets/image/section3.jpeg') }}" alt="Main Dining Area">
                        <div class="showcase-overlay">
                            <h3>Main Dining Area</h3>
                            <p>Spacious and comfortable seating for groups and individuals</p>
                        </div>
                    </div>
                </div>
                <div class="showcase-item">
                    <div class="showcase-image">
                        <img src="{{ asset('assets/image/section4.jpeg') }}" alt="Cozy Corner">
                        <div class="showcase-overlay">
                            <h3>Cozy Corner</h3>
                            <p>Perfect spot for reading, working, or quiet conversations</p>
                        </div>
                    </div>
                </div>
                <div class="showcase-item">
                    <div class="showcase-image">
                        <img src="{{ asset('assets/image/section5.jpeg') }}" alt="Outdoor Patio">
                        <div class="showcase-overlay">
                            <h3>Outdoor Patio</h3>
                            <p>Fresh air and natural light for the perfect coffee experience</p>
                        </div>
                    </div>
                </div>
                <div class="showcase-item">
                    <div class="showcase-image">
                        <img src="{{ asset('assets/image/fen1.jpeg') }}" alt="Barista Station">
                        <div class="showcase-overlay">
                            <h3>Barista Station</h3>
                            <p>Watch our skilled baristas craft your perfect cup</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Menu Highlights Section -->
    <section class="menu-highlights">
        <div class="container">
            <div class="menu-header">
                <h2 class="section-title">Menu Highlights</h2>
                <p class="section-subtitle">Our most popular and signature drinks</p>
            </div>
            <div class="menu-grid">
                <div class="menu-card">
                    <div class="menu-image">
                        <img src="{{ asset('assets/image/first_hero.jpeg') }}" alt="Signature Latte">
                    </div>
                    <div class="menu-content">
                        <h3>Signature Latte</h3>
                        <p>Our house blend with perfectly steamed milk and latte art</p>
                        <span class="menu-price">$4.50</span>
                    </div>
                </div>
                <div class="menu-card">
                    <div class="menu-image">
                        <img src="{{ asset('assets/image/second_hero.jpeg') }}" alt="Cold Brew">
                    </div>
                    <div class="menu-content">
                        <h3>Cold Brew</h3>
                        <p>Smooth and refreshing, brewed for 12 hours</p>
                        <span class="menu-price">$3.75</span>
                    </div>
                </div>
                <div class="menu-card">
                    <div class="menu-image">
                        <img src="{{ asset('assets/image/__section4.jpeg') }}" alt="Cappuccino">
                    </div>
                    <div class="menu-content">
                        <h3>Cappuccino</h3>
                        <p>Classic Italian style with rich foam and bold flavor</p>
                        <span class="menu-price">$4.25</span>
                    </div>
                </div>
                <div class="menu-card">
                    <div class="menu-image">
                        <img src="{{ asset('assets/image/section3.jpeg') }}" alt="Mocha">
                    </div>
                    <div class="menu-content">
                        <h3>Mocha</h3>
                        <p>Chocolate and coffee perfectly blended with whipped cream</p>
                        <span class="menu-price">$5.00</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="container">
            <div class="testimonials-header">
                <h2 class="section-title">What Our Customers Say</h2>
                <p class="section-subtitle">Real experiences from our coffee community</p>
            </div>
            <div class="testimonials-slider">
                <div class="testimonial-card active">
                    <div class="testimonial-content">
                        <div class="testimonial-quote">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z"/>
                            </svg>
                        </div>
                        <p class="testimonial-text">
                            "The atmosphere here is incredible! Perfect for both work and relaxation. The coffee is consistently excellent, and the staff is always friendly and welcoming."
                        </p>
                        <div class="testimonial-author">
                            <div class="author-info">
                                <h4>Sarah Johnson</h4>
                                <span>Regular Customer</span>
                            </div>
                            <div class="testimonial-rating">
                                ⭐⭐⭐⭐⭐
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="testimonial-quote">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z"/>
                            </svg>
                        </div>
                        <p class="testimonial-text">
                            "I've been coming here for years. The quality never disappoints, and I love the variety of seating options. It's become my second home!"
                        </p>
                        <div class="testimonial-author">
                            <div class="author-info">
                                <h4>Michael Chen</h4>
                                <span>Local Artist</span>
                            </div>
                            <div class="testimonial-rating">
                                ⭐⭐⭐⭐⭐
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="testimonial-quote">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z"/>
                            </svg>
                        </div>
                        <p class="testimonial-text">
                            "The best coffee in town! The baristas are true artists, and the space is beautifully designed. I always bring my laptop here to work."
                        </p>
                        <div class="testimonial-author">
                            <div class="author-info">
                                <h4>Emma Rodriguez</h4>
                                <span>Freelance Writer</span>
                            </div>
                            <div class="testimonial-rating">
                                ⭐⭐⭐⭐⭐
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-controls">
                <button class="testimonial-prev">←</button>
                <div class="testimonial-dots">
                    <span class="dot active"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
                <button class="testimonial-next">→</button>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="caffe-features">
        <div class="container">
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                            <polyline points="9,22 9,12 15,12 15,22"/>
                        </svg>
                    </div>
                    <h3>Free WiFi</h3>
                    <p>High-speed internet for work, study, or browsing</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>
                    <h3>Premium Quality</h3>
                    <p>Carefully sourced beans and expert preparation</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                    </div>
                    <h3>Community Space</h3>
                    <p>Regular events and a welcoming atmosphere</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                        </svg>
                    </div>
                    <h3>Flexible Payment</h3>
                    <p>Multiple payment options including mobile payments</p>
                </div>
            </div>
        </div>
    </section>
@endsection   