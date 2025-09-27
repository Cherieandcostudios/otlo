@extends('frontend.layouts.app')

@section('title', 'Otlo Cafe - Otle Betha Betha')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/show.css') }}">
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="blog-hero">
        <div class="blog-hero-content">
            <h1>The Otlo Journal</h1>
            <p class="slogan">"Otle Betha Betha"</p>
        </div>
    </section>

    <!-- Microphone Section -->
    <section id="microphones" class="microphone-section">
        <div class="container">
            <h2 class="section-title">Premium Microphones</h2>
            <div class="microphone-grid">
                <div class="microphone-card">
                    <div class="mic-icon">🎤</div>
                    <h3 class="mic-title">Studio Pro MX</h3>
                    <p class="mic-description">Professional studio microphone with crystal clear audio quality. Perfect for recording vocals and instruments.</p>
                </div>

                <div class="microphone-card">
                    <div class="mic-icon">🎙️</div>
                    <h3 class="mic-title">Podcast Master</h3>
                    <p class="mic-description">Dynamic microphone designed specifically for podcasting and broadcasting with noise cancellation.</p>
                </div>

                <div class="microphone-card">
                    <div class="mic-icon">🎵</div>
                    <h3 class="mic-title">Live Stage Pro</h3>
                    <p class="mic-description">Durable handheld microphone built for live performances with exceptional feedback rejection.</p>
                </div>

                <div class="microphone-card">
                    <div class="mic-icon">📻</div>
                    <h3 class="mic-title">USB Connect</h3>
                    <p class="mic-description">Plug-and-play USB microphone perfect for home studios and content creators.</p>
                </div>

                <div class="microphone-card">
                    <div class="mic-icon">🎶</div>
                    <h3 class="mic-title">Wireless Freedom</h3>
                    <p class="mic-description">Professional wireless microphone system with extended range and crystal clear transmission.</p>
                </div>

                <div class="microphone-card">
                    <div class="mic-icon">🔊</div>
                    <h3 class="mic-title">Conference Elite</h3>
                    <p class="mic-description">High-quality conference microphone with 360-degree pickup pattern for meetings and presentations.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <h2>About Otlo Cafe</h2>
                    <p>Welcome to Otlo Cafe, where quality meets passion! Our motto "Otle Betha Betha" represents our commitment to bringing you the finest audio equipment and an exceptional cafe experience.</p>
                    <p>We specialize in premium microphones for professionals, content creators, and audio enthusiasts. Each product in our collection is carefully selected to ensure superior sound quality and reliability.</p>
                    <p>Visit us today and discover the perfect microphone for your needs while enjoying our signature coffee blends!</p>
                </div>
                <div class="about-image">
                    ☕
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Mobile menu toggle
    const menuToggle = document.getElementById('menu-toggle');
    const navMenu = document.getElementById('nav-menu');

    if (menuToggle && navMenu) {
        menuToggle.addEventListener('click', () => {
            navMenu.classList.toggle('active');
        });
    }

    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
            // Close mobile menu after clicking
            if (navMenu) {
                navMenu.classList.remove('active');
            }
        });
    });

    // Add animation to cards on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = 'fadeInUp 0.6s ease forwards';
            }
        });
    }, observerOptions);

    document.querySelectorAll('.microphone-card').forEach(card => {
        observer.observe(card);
    });
</script>
@endpush