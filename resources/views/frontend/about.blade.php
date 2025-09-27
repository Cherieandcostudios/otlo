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
<section class="about-hero">
    <div class="about-hero-content">
        <div class="about-hero-text">
            <h1 class="about-hero-title">Our Story</h1>
            <p class="about-hero-subtitle">From a small coffee shop dream to a community of coffee lovers</p>
        </div>
        <div class="about-hero-image">
            <img src="{{ asset('assets/image/section3.jpeg') }}" alt="Our Coffee Story" class="hero-img">
        </div>
    </div>
</section>

<!-- Company Story Section -->
<section class="company-story">
    <div class="container">
        <div class="story-content">
            <div class="story-text">
                <h2 class="section-title">The Journey Begins</h2>
                <p class="story-description">
                    Founded in 2018, Otlo Cafe started as a small coffee shop with a big dream: to create a space where coffee lovers could gather, share stories, and experience exceptional coffee. What began as a humble venture has grown into a beloved community hub that celebrates the art of coffee making and the connections it fosters.
                </p>
                <p class="story-description">
                    Our founders, passionate about both coffee and community, envisioned a place where every cup tells a story. From carefully sourced beans to expertly crafted beverages, we've maintained our commitment to quality while building lasting relationships with our customers and local community.
                </p>
                <div class="story-stats">
                    <div class="stat-item">
                        <h3>6+</h3>
                        <p>Years of Excellence</p>
                    </div>
                    <div class="stat-item">
                        <h3>50K+</h3>
                        <p>Happy Customers</p>
                    </div>
                    <div class="stat-item">
                        <h3>100+</h3>
                        <p>Coffee Varieties</p>
                    </div>
                </div>
            </div>
            <div class="story-image">
                <img src="{{ asset('assets/image/section4.jpeg') }}" alt="Our Coffee Journey" class="story-img">
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision Section -->
<section class="mission-vision">
    <div class="container">
        <div class="mission-vision-content">
            <div class="mission-card">
                <div class="mission-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                    </svg>
                </div>
                <h3>Our Mission</h3>
                <p>To provide exceptional coffee experiences that bring people together, while supporting sustainable practices and fostering community connections through every cup we serve.</p>
            </div>
            <div class="vision-card">
                <div class="vision-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M12 1v6m0 6v6m11-7h-6m-6 0H1"/>
                    </svg>
                </div>
                <h3>Our Vision</h3>
                <p>To be the leading coffee destination that inspires creativity, builds community, and sets the standard for sustainable coffee culture worldwide.</p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-section">
    <div class="container">
        <div class="team-header">
            <h2 class="section-title">Meet Our Team</h2>
            <p class="section-subtitle">The passionate people behind every perfect cup</p>
        </div>
        <div class="team-grid">
            <div class="team-card">
                <div class="team-image">
                    <img src="{{ asset('assets/image/section5.jpeg') }}" alt="Sarah Johnson">
                    <div class="team-overlay">
                        <div class="social-links">
                            <a href="#" class="social-link">LinkedIn</a>
                            <a href="#" class="social-link">Twitter</a>
                        </div>
                    </div>
                </div>
                <div class="team-info">
                    <h3>Sarah Johnson</h3>
                    <p class="team-role">Founder & CEO</p>
                    <p class="team-bio">Coffee enthusiast with 15+ years in the industry, passionate about sustainable sourcing and community building.</p>
                </div>
            </div>
            <div class="team-card">
                <div class="team-image">
                    <img src="{{ asset('assets/image/fen1.jpeg') }}" alt="Michael Chen">
                    <div class="team-overlay">
                        <div class="social-links">
                            <a href="#" class="social-link">LinkedIn</a>
                            <a href="#" class="social-link">Instagram</a>
                        </div>
                    </div>
                </div>
                <div class="team-info">
                    <h3>Michael Chen</h3>
                    <p class="team-role">Head Barista</p>
                    <p class="team-bio">Award-winning barista with expertise in latte art and coffee brewing techniques from around the world.</p>
                </div>
            </div>
            <div class="team-card">
                <div class="team-image">
                    <img src="{{ asset('assets/image/__section4.jpeg') }}" alt="Emma Rodriguez">
                    <div class="team-overlay">
                        <div class="social-links">
                            <a href="#" class="social-link">LinkedIn</a>
                            <a href="#" class="social-link">Twitter</a>
                        </div>
                    </div>
                </div>
                <div class="team-info">
                    <h3>Emma Rodriguez</h3>
                    <p class="team-role">Operations Manager</p>
                    <p class="team-bio">Ensures smooth operations and exceptional customer experience across all our locations.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="values-section">
    <div class="container">
        <div class="values-header">
            <h2 class="section-title">Our Values</h2>
            <p class="section-subtitle">The principles that guide everything we do</p>
        </div>
        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon">🌱</div>
                <h3>Sustainability</h3>
                <p>Committed to environmentally responsible practices and supporting fair trade coffee farmers.</p>
            </div>
            <div class="value-card">
                <div class="value-icon">🤝</div>
                <h3>Community</h3>
                <p>Building meaningful connections and supporting local communities through our coffee culture.</p>
            </div>
            <div class="value-card">
                <div class="value-icon">⭐</div>
                <h3>Quality</h3>
                <p>Dedicated to sourcing the finest beans and crafting exceptional coffee experiences.</p>
            </div>
            <div class="value-card">
                <div class="value-icon">💡</div>
                <h3>Innovation</h3>
                <p>Continuously exploring new flavors, techniques, and ways to enhance the coffee experience.</p>
            </div>
        </div>
    </div>
</section>
@endsection