@extends('frontend.layouts.app')

@section('title', 'Otlo Podcast - Otlo Cafe')

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
    <section class="podcast-hero">
        <div class="podcast-hero-content">
            <div class="podcast-logo">
                <div class="podcast-icon">🎙️</div>
                <h1 class="podcast-hero-title">Otlo Podcast</h1>
            </div>
            <p class="podcast-hero-subtitle">Stories of success, creativity, and community over coffee</p>
            <div class="podcast-stats">
                <div class="stat">
                    <h3>50+</h3>
                    <p>Episodes</p>
                </div>
                <div class="stat">
                    <h3>10K+</h3>
                    <p>Listeners</p>
                </div>
                <div class="stat">
                    <h3>4.8</h3>
                    <p>Rating</p>
                </div>
            </div>
        </div>
        <div class="podcast-hero-overlay"></div>
    </section>

    <!-- Success Stories Section -->
    <section class="success-stories">
        <div class="container">
            <div class="stories-header">
                <h2 class="section-title">Success Stories</h2>
                <p class="section-subtitle">Real people, real journeys, real inspiration</p>
            </div>
            <div class="stories-grid">
                <div class="story-card">
                    <div class="story-image">
                        <img src="{{ asset('assets/image/section5.jpeg') }}" alt="Entrepreneur Story">
                        <div class="story-overlay">
                            <div class="play-button">
                                <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="story-content">
                        <h3>From Barista to Business Owner</h3>
                        <p>Sarah's journey from working behind the counter to opening her own coffee shop chain.</p>
                        <div class="story-meta">
                            <span class="episode-number">Episode 23</span>
                            <span class="duration">45 min</span>
                        </div>
                    </div>
                </div>
                <div class="story-card">
                    <div class="story-image">
                        <img src="{{ asset('assets/image/fen1.jpeg') }}" alt="Artist Story">
                        <div class="story-overlay">
                            <div class="play-button">
                                <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="story-content">
                        <h3>Creative Breakthroughs</h3>
                        <p>How our cafe became a creative hub for local artists and writers.</p>
                        <div class="story-meta">
                            <span class="episode-number">Episode 31</span>
                            <span class="duration">38 min</span>
                        </div>
                    </div>
                </div>
                <div class="story-card">
                    <div class="story-image">
                        <img src="{{ asset('assets/image/__section4.jpeg') }}" alt="Community Story">
                        <div class="story-overlay">
                            <div class="play-button">
                                <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="story-content">
                        <h3>Building Community</h3>
                        <p>The power of coffee in bringing people together and creating lasting friendships.</p>
                        <div class="story-meta">
                            <span class="episode-number">Episode 28</span>
                            <span class="duration">42 min</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Episodes Section -->
    <section class="latest-episodes">
        <div class="container">
            <div class="episodes-header">
                <h2 class="section-title">Latest Episodes</h2>
                <p class="section-subtitle">Fresh conversations and inspiring stories</p>
            </div>
            <div class="episodes-list">
                <div class="episode-item">
                    <div class="episode-image">
                        <img src="{{ asset('assets/image/section3.jpeg') }}" alt="Episode 35">
                        <div class="episode-play">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="episode-info">
                        <div class="episode-number">Episode 35</div>
                        <h3>The Future of Coffee Culture</h3>
                        <p>Exploring how technology and tradition are shaping the future of coffee culture worldwide.</p>
                        <div class="episode-meta">
                            <span class="episode-date">Dec 15, 2024</span>
                            <span class="episode-duration">52 min</span>
                            <span class="episode-category">Culture</span>
                        </div>
                    </div>
                </div>
                <div class="episode-item">
                    <div class="episode-image">
                        <img src="{{ asset('assets/image/section4.jpeg') }}" alt="Episode 34">
                        <div class="episode-play">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="episode-info">
                        <div class="episode-number">Episode 34</div>
                        <h3>Sustainable Coffee Practices</h3>
                        <p>How we're working with farmers to create a more sustainable coffee industry.</p>
                        <div class="episode-meta">
                            <span class="episode-date">Dec 8, 2024</span>
                            <span class="episode-duration">48 min</span>
                            <span class="episode-category">Sustainability</span>
                        </div>
                    </div>
                </div>
                <div class="episode-item">
                    <div class="episode-image">
                        <img src="{{ asset('assets/image/section5.jpeg') }}" alt="Episode 33">
                        <div class="episode-play">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="episode-info">
                        <div class="episode-number">Episode 33</div>
                        <h3>Morning Routines of Successful People</h3>
                        <p>Discover the morning rituals that set successful entrepreneurs up for the day.</p>
                        <div class="episode-meta">
                            <span class="episode-date">Dec 1, 2024</span>
                            <span class="episode-duration">41 min</span>
                            <span class="episode-category">Lifestyle</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Audio Player Section -->
    <section class="audio-player-section">
        <div class="container">
            <div class="player-container">
                <div class="current-episode">
                    <div class="episode-cover">
                        <img src="{{ asset('assets/image/first_hero..jpeg') }}" alt="Current Episode">
                    </div>
                    <div class="episode-details">
                        <h3>Featured Episode</h3>
                        <h4>The Art of Coffee Making</h4>
                        <p>Join our head barista as he shares the secrets behind perfect coffee preparation.</p>
                    </div>
                </div>
                <div class="audio-controls">
                    <button class="control-btn prev-btn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M6 6h2v12H6zm3.5 6l8.5 6V6z"/>
                        </svg>
                    </button>
                    <button class="control-btn play-btn">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    </button>
                    <button class="control-btn next-btn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M6 18l8.5-6L6 6v12zM16 6v12h2V6h-2z"/>
                        </svg>
                    </button>
                </div>
                <div class="progress-bar">
                    <div class="progress"></div>
                </div>
                <div class="time-display">
                    <span class="current-time">2:34</span>
                    <span class="total-time">45:12</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Subscribe Section -->
    <section class="subscribe-section">
        <div class="container">
            <div class="subscribe-content">
                <h2>Never Miss an Episode</h2>
                <p>Subscribe to our podcast and get notified when new episodes are released.</p>
                <div class="subscribe-buttons">
                    <a href="#" class="subscribe-btn apple-podcasts">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z"/>
                        </svg> Apple Podcasts
                    </a>
                    <a href="#" class="subscribe-btn spotify">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.42 1.56-.299.421-1.02.599-1.559.3z"/>
                        </svg> Spotify
                    </a>
                    <a href="#" class="subscribe-btn google-podcasts">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg> Google Podcasts
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection