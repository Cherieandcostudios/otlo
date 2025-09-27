@extends('frontend.layouts.app')

@section('title', 'Library - Otlo Cafe')

@push('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@300;400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/library.css') }}">
@endpush

@section('content')
    <!-- Hero Section: Library -->
    <main class="library-hero">
        <div class="library-container">
            <div class="library-text">
                <h1>Welcome to Otlo Library</h1>
                <p>
                    Explore a curated collection of books and journals while enjoying the finest coffee. Our library is a cozy corner for readers, thinkers, and dreamers.
                </p>
                <a href="#" class="btn btn-primary">Explore Collection</a>
            </div>
            <div class="library-image">
                <img src="{{ asset('assets/image/book1.jpg') }}" alt="Otlo Cafe Library">
            </div>
        </div>
    </main>

    <!-- Featured Books -->
    <section class="library-featured">
        <div class="section-heading">
            <h2>Featured Books</h2>
            <p>Dive into our most loved collection handpicked for coffee lovers.</p>
        </div>
        <div class="book-grid">
            <div class="book-card">
                <img src="{{ asset('assets/image/book1.jpg') }}" alt="Book Title">
                <h3>Coffee & Philosophy</h3>
                <p>A warm read for thoughtful evenings.</p>
            </div>
            <div class="book-card">
                <img src="{{ asset('assets/image/book4.jpg') }}" alt="Book Title">
                <h3>The Roasted Tales</h3>
                <p>Stories brewed with imagination.</p>
            </div>
            <div class="book-card">
                <img src="{{ asset('assets/image/book3.jpg') }}" alt="Book Title">
                <h3>Beans of Wisdom</h3>
                <p>Discover life lessons over a cup.</p>
            </div>
        </div>
    </section>

    <!-- Reading Lounge -->
    <section class="library-lounge">
        <div class="lounge-container">
            <div class="lounge-image">
                <img src="{{ asset('assets/image/book1.jpg') }}" alt="Otlo Library Lounge">
            </div>
            <div class="lounge-text">
                <h2>Our Cozy Reading Lounge</h2>
                <p>
                    Step into a space where books meet coffee. Relax, read, and sip your favorite brew while enjoying the cozy ambiance.
                </p>
                <a href="#" class="btn btn-primary">Visit Us</a>
            </div>
        </div>
    </section>
@endsection