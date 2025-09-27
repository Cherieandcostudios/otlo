@extends('frontend.layouts.app')

@section('title', 'Otlo Trust — Our Commitment to a Better World')

@push('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/otlo-trust.css') }}">
@endpush

@section('content')
    <main>
        <!-- Trust Hero Section -->
        <section class="trust-hero">
            <div class="trust-hero-content">
                <h1>More Than a Cup</h1>
                <p>Our commitment to the planet and its people.</p>
            </div>
        </section>

        <!-- Intro Section -->
        <section class="trust-intro">
            <h2>The Otlo Trust</h2>
            <p>We believe that a coffee company can and should have a positive impact on the communities it serves. The Otlo Trust was founded on this principle. It's our commitment to ethical sourcing, environmental stewardship, and community investment.
                It's how we ensure that every cup of Otlo coffee you enjoy is contributing to a better world.</p>
        </section>

        <!-- Our Pillars Section -->
        <section class="pillars-section">
            <h2>Our Pillars of Action</h2>
            <div class="pillars-grid">
                <div class="pillar-card">
                    <div class="icon">🌱</div>
                    <h3>Ethical Sourcing</h3>
                    <p>Ensuring fair wages and responsible farming practices for a sustainable future from farm to cup.</p>
                </div>
                <div class="pillar-card">
                    <div class="icon">🌍</div>
                    <h3>Environmental Stewardship</h3>
                    <p>Investing in 100% recyclable packaging, water conservation, and renewable energy in our cafes.</p>
                </div>
                <div class="pillar-card">
                    <div class="icon">🤝</div>
                    <h3>Community Investment</h3>
                    <p>Empowering local communities through grants, education, and volunteer programs.</p>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section">
            <h2>Join Us in Making a Difference</h2>
            <p>Discover more about our projects, read our annual impact report, and see how you can get involved.</p>
            <a href="#" class="btn btn-primary">Learn More</a>
        </section>
    </main>
@endsection

@push('scripts')
<script>
    // Simple script to prevent FOUC (Flash of Unstyled Content)
    document.documentElement.classList.remove('wf-loading');
</script>
@endpush