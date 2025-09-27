@extends('frontend.layouts.app')

@section('title', 'Coffee Poetry - Brew Your Soul')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/poetry.css') }}">
@endpush

@section('content')
    <main class="poetry-hero">
        <div class="poetry-container">
            <div class="poetry-text">
                <h1>Welcome to Otlo poetry</h1>
                <p>
                    Explore a curated collection of books and journals while enjoying the finest coffee. Our poetry is a cozy corner for readers, thinkers, and dreamers.
                </p>
                <a href="#" class="btn btn-primary">Explore Collection</a>
            </div>
            <div class="poetry-image">
                <img src="{{ asset('assets/image/section4.jpeg') }}" alt="Otlo Cafe poetry">
            </div>
        </div>
    </main>
    <main class="main">
        <section class="hero fade-in" id="home">
            <h2>Brewing Verses, One Cup at a Time</h2>
            <p>Welcome to our cozy corner where the aroma of fresh coffee mingles with the beauty of poetry. Each verse is carefully crafted like the perfect brew.</p>
        </section>

        <section class="poetry-grid fade-in" id="poems">
            <div class="poetry-card">
                <h3 class="poem-title">Morning Ritual</h3>
                <div class="poem-text">
                    Steam rises like morning prayers,<br> Black gold in porcelain chalice,<br> First sip awakens dreams,<br> Coffee kisses consciousness alive.
                </div>
                <div class="poem-author">— Sarah Mills</div>
            </div>

            <div class="poetry-card">
                <h3 class="poem-title">Café Solitude</h3>
                <div class="poem-text">
                    Corner table, book in hand,<br> Espresso's bitter sweet embrace,<br> Time dissolves in coffee rings,<br> Peace found in crowded space.
                </div>
                <div class="poem-author">— James Parker</div>
            </div>

            <div class="poetry-card">
                <h3 class="poem-title">The Barista's Art</h3>
                <div class="poem-text">
                    Skilled hands craft liquid poetry,<br> Milk swirls in perfect harmony,<br> Each cup a canvas painted brown,<br> Love poured in every drop.
                </div>
                <div class="poem-author">— Maria Santos</div>
            </div>

            <div class="poetry-card">
                <h3 class="poem-title">Midnight Brew</h3>
                <div class="poem-text">
                    When the world sleeps deep,<br> Coffee keeps me company,<br> Words flow like midnight streams,<br> Creativity's faithful friend.
                </div>
                <div class="poem-author">— David Chen</div>
            </div>

            <div class="poetry-card">
                <h3 class="poem-title">Coffee Shop Romance</h3>
                <div class="poem-text">
                    Two strangers, one shared table,<br> Conversation brewed over lattes,<br> Hearts warming like fresh milk,<br> Love at first sip.
                </div>
                <div class="poem-author">— Emma Rodriguez</div>
            </div>

            <div class="poetry-card">
                <h3 class="poem-title">Autumn Mornings</h3>
                <div class="poem-text">
                    Golden leaves dance outside,<br> Steam mingles with crisp air,<br> Coffee cup warms cold hands,<br> Season's perfect greeting.
                </div>
                <div class="poem-author">— Michael Thompson</div>
            </div>
        </section>

        <section class="featured fade-in" id="featured">
            <div class="featured-content">
                <h3>Featured Poem of the Week</h3>
                <div class="featured-poem">
                    In the quiet hours before dawn breaks,<br> When the world holds its breath in slumber,<br> I find solace in my ceramic companion,<br> Where stories steep and memories simmer.<br><br> Each grain tells tales of distant mountains,<br>                    Sun-kissed slopes and gentle rain,<br> Harvested by weathered hands<br> That know the value of patient pain.<br><br> So here I sit in morning's embrace,<br> With coffee's warmth against my soul,<br> Finding poetry in simple moments,<br>                    Making broken spirits whole.
                </div>
                <div class="poem-author" style="text-align: center; margin-top: 2rem; color: rgba(255,255,255,0.8);">
                    — Featured: "Morning's Embrace" by Alexandra White
                </div>
            </div>
        </section>

        <section class="facts fade-in">
            <h3>Coffee Culture & Poetry</h3>
            <div class="facts-grid">
                <div class="fact-card">
                    <div class="fact-icon">📚</div>
                    <div class="fact-text">Coffee houses were once called "Schools of the Wise" where poets and writers gathered to share their work and find inspiration.</div>
                </div>
                <div class="fact-card">
                    <div class="fact-icon">☕</div>
                    <div class="fact-text">The word "coffee" comes from the Arabic "qahwa," which was originally a term for wine and later poetry itself.</div>
                </div>
                <div class="fact-card">
                    <div class="fact-icon">🌍</div>
                    <div class="fact-text">Over 2.25 billion cups of coffee are consumed daily worldwide, each one potentially inspiring a new verse.</div>
                </div>
                <div class="fact-card">
                    <div class="fact-icon">✍️</div>
                    <div class="fact-text">Famous writers like Voltaire, Balzac, and Kierkegaard were known to consume enormous amounts of coffee while writing.</div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
<script>
    // Add smooth scrolling for navigation links
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
        });
    });

    // Add fade-in animation on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe all fade-in elements
    document.querySelectorAll('.fade-in').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });
</script>
@endpush