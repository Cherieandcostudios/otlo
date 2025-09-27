@extends('frontend.layouts.app')

@section('title', 'Blog - Otlo Cafe')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/blog.css') }}">
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="blog-hero">
        <div class="blog-hero-content">
            <h1>The Otlo Journal</h1>
            <p>Stories, updates, and coffee insights from the heart of our cafe.</p>
        </div>
    </section>

    <!-- Blog Grid -->
    <main class="blog-grid" id="latest">
        <article class="blog-card">
            <img src="{{ asset('assets/image/section3.jpeg') }}" alt="A cup of coffee on a wooden table" class="blog-card-image">
            <div class="blog-card-content">
                <h2>Welcome to Our New Blog</h2>
                <p>We are brewing up stories about flavor, craft, and community. Stay tuned for features from our roastery and behind-the-scenes looks at our seasonal menus.</p>
            </div>
            <div class="blog-card-footer">
                <span class="author">By Jane Doe</span>
                <span class="date">Oct 26, 2023</span>
            </div>
        </article>

        <article class="blog-card">
            <img src="{{ asset('assets/image/section4.jpeg') }}" alt="A barista pouring milk into a coffee" class="blog-card-image">
            <div class="blog-card-content">
                <h2>The Art of the Perfect Pour</h2>
                <p>Discover the secrets behind our signature drinks. From selecting the right beans to the final pour, we take you on a journey of coffee perfection.</p>
            </div>
            <div class="blog-card-footer">
                <span class="author">By John Smith</span>
                <span class="date">Oct 22, 2023</span>
            </div>
        </article>

        <article class="blog-card">
            <img src="{{ asset('assets/image/section5.jpeg') }}" alt="People enjoying coffee in a cafe" class="blog-card-image">
            <div class="blog-card-content">
                <h2>Community and Coffee</h2>
                <p>At Otlo, we believe in the power of community. Learn more about our local events, partnerships, and how we're making a difference one cup at a time.</p>
            </div>
            <div class="blog-card-footer">
                <span class="author">By Emily White</span>
                <span class="date">Oct 18, 2023</span>
            </div>
        </article>
    </main>
@endsection