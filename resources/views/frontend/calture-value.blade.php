@extends('frontend.layouts.app')

@section('title', 'Culture & Values - Otlo Cafe')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/culture.css') }}">
@endpush

@section('content')
    <!-- Main Culture Content -->
    <main class="culture-main">
        <!-- Background decorations -->
        <div class="bg-decoration"></div>
        <div class="bg-decoration"></div>
        <div class="bg-decoration"></div>

        <div class="container">
            <!-- Hero Section -->
            <section class="culture-hero">
                <div class="hero-badge">Our Foundation</div>
                <h1>Culture & Values</h1>
                <p>At Otlo Cafe, we believe that great coffee and exceptional audio experiences are built on a foundation of strong values, meaningful connections, and a culture that celebrates both creativity and quality.</p>
            </section>

            <!-- Mission Statement -->
            <section class="mission-section">
                <div class="mission-icon">🌟</div>
                <h2 class="mission-title">Our Mission</h2>
                <p class="mission-quote">To create spaces where coffee culture meets creative expression, fostering communities through exceptional experiences and authentic connections.</p>
            </section>

            <!-- Core Values -->
            <section class="values-section">
                <div class="section-header">
                    <h2 class="section-title">Our Core Values</h2>
                    <p class="section-subtitle">These fundamental principles guide everything we do, from brewing the perfect cup to creating memorable experiences for our community.</p>
                </div>

                <div class="values-grid">
                    <div class="value-card">
                        <span class="value-icon">🎯</span>
                        <h3 class="value-title">Excellence</h3>
                        <p class="value-description">We pursue excellence in every cup of coffee we serve and every audio experience we create. Quality is never an accident - it's the result of careful attention to detail and continuous improvement.</p>
                    </div>

                    <div class="value-card">
                        <span class="value-icon">🤝</span>
                        <h3 class="value-title">Community</h3>
                        <p class="value-description">We believe in building genuine connections within our community. Every interaction is an opportunity to create meaningful relationships and support local creators and artists.</p>
                    </div>

                    <div class="value-card">
                        <span class="value-icon">🎨</span>
                        <h3 class="value-title">Creativity</h3>
                        <p class="value-description">Innovation drives us forward. We embrace creative thinking, encourage artistic expression, and provide platforms for creators to share their talents with the world.</p>
                    </div>

                    <div class="value-card">
                        <span class="value-icon">🌱</span>
                        <h3 class="value-title">Sustainability</h3>
                        <p class="value-description">We're committed to ethical sourcing, environmental responsibility, and sustainable practices that benefit our planet and future generations.</p>
                    </div>

                    <div class="value-card">
                        <span class="value-icon">💫</span>
                        <h3 class="value-title">Authenticity</h3>
                        <p class="value-description">We stay true to our roots and values. Authenticity in our products, services, and relationships is what makes the Otlo experience genuinely special.</p>
                    </div>

                    <div class="value-card">
                        <span class="value-icon">🚀</span>
                        <h3 class="value-title">Growth</h3>
                        <p class="value-description">We believe in continuous learning and development. We support personal and professional growth for our team members and encourage lifelong learning in our community.</p>
                    </div>
                </div>
            </section>

            <!-- Culture Pillars -->
            <section class="pillars-section">
                <div class="pillars-content">
                    <h2 class="pillars-title">Our Culture Pillars</h2>
                    <p class="pillars-subtitle">Four fundamental pillars that shape our workplace culture and define how we work together to achieve our shared vision.</p>

                    <div class="pillars-grid">
                        <div class="pillar-item">
                            <div class="pillar-number">01</div>
                            <h3 class="pillar-title">Collaboration</h3>
                            <p class="pillar-description">We work together as one team, sharing knowledge, supporting each other, and celebrating collective achievements.</p>
                        </div>

                        <div class="pillar-item">
                            <div class="pillar-number">02</div>
                            <h3 class="pillar-title">Innovation</h3>
                            <p class="pillar-description">We embrace new ideas, experiment with creative solutions, and continuously evolve our offerings and approaches.</p>
                        </div>

                        <div class="pillar-item">
                            <div class="pillar-number">03</div>
                            <h3 class="pillar-title">Passion</h3>
                            <p class="pillar-description">We love what we do and bring enthusiasm to every project, every cup, and every customer interaction.</p>
                        </div>

                        <div class="pillar-item">
                            <div class="pillar-number">04</div>
                            <h3 class="pillar-title">Impact</h3>
                            <p class="pillar-description">We strive to make a positive difference in our community and create lasting value for everyone we serve.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Team Culture -->
            <section class="team-section">
                <div class="team-grid">
                    <div class="team-content">
                        <h2>Life at Otlo Cafe</h2>
                        <p>Our team is the heart of everything we do. We've built a culture where creativity thrives, diverse perspectives are celebrated, and everyone has the opportunity to grow both personally and professionally.</p>

                        <p>From baristas to audio engineers, from managers to creators, every team member plays a vital role in delivering the exceptional Otlo experience that our community loves.</p>

                        <ul class="team-features">
                            <li>Flexible work arrangements and work-life balance</li>
                            <li>Professional development and skill-building opportunities</li>
                            <li>Health and wellness benefits for all team members</li>
                            <li>Creative freedom and innovation time</li>
                            <li>Team events and community building activities</li>
                            <li>Recognition and reward programs</li>
                        </ul>
                    </div>

                    <div class="team-visual">
                        <div class="team-card">
                            <span class="team-emoji">☕</span>
                            <div class="team-role">Baristas</div>
                        </div>
                        <div class="team-card">
                            <span class="team-emoji">🎧</span>
                            <div class="team-role">Audio Engineers</div>
                        </div>
                        <div class="team-card">
                            <span class="team-emoji">🎨</span>
                            <div class="team-role">Designers</div>
                        </div>
                        <div class="team-card">
                            <span class="team-emoji">📈</span>
                            <div class="team-role">Managers</div>
                        </div>
                        <div class="team-card">
                            <span class="team-emoji">🛠️</span>
                            <div class="team-role">Tech Support</div>
                        </div>
                        <div class="team-card">
                            <span class="team-emoji">🌟</span>
                            <div class="team-role">Community</div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Join Us CTA -->
            <section class="join-cta">
                <h2 class="join-title">Join Our Journey</h2>
                <p class="join-description">Ready to be part of something special? We're always looking for passionate individuals who share our values and want to help create amazing experiences.</p>

                <div class="join-buttons">
                    <a href="#" class="join-btn join-btn-primary">View Open Positions</a>
                    <a href="{{ route('frontend.about') }}" class="join-btn join-btn-secondary">Learn More About Us</a>
                </div>
            </section>
        </div>
    </main>
@endsection

@push('scripts')
<script>
    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = 'fadeInUp 0.8s ease forwards';
            }
        });
    }, observerOptions);

    // Observe all animatable elements
    document.querySelectorAll('.value-card, .pillar-item, .team-card').forEach(card => {
        observer.observe(card);
    });

    // Parallax effect for background decorations
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const decorations = document.querySelectorAll('.bg-decoration');

        decorations.forEach((decoration, index) => {
            const speed = 0.2 + (index * 0.1);
            decoration.style.transform = `translateY(${scrolled * speed}px)`;
        });
    });
</script>
@endpush