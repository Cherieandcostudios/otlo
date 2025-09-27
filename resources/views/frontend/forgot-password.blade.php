@extends('frontend.layouts.app')

@section('title', 'Forgot Password - Otlo Cafe')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
@endpush

@section('content')
    <div class="auth-container">
        <!-- Image Side -->
        <div class="auth-image-side">
            <div class="floating-shapes">
                <div class="floating-shape"></div>
                <div class="floating-shape"></div>
                <div class="floating-shape"></div>
                <div class="floating-shape"></div>
            </div>
            <div class="auth-image-content slide-in-left">
                <div class="auth-logo">
                    <a href="{{ route('home') }}">
                        <div class="logo-circle">
                            <img src="{{ asset('assets/image/logo.jpg') }}" alt="Otlo Cafe Logo">
                        </div>
                    </a>
                    <h2 class="logo-text">Otlo Cafe</h2>
                </div>
                <h1 class="auth-image-title">Reset Password</h1>
                <p class="auth-image-subtitle">
                    Don't worry, it happens to the best of us. Enter your email address and we'll send you 
                    a secure link to reset your password and get back to enjoying your coffee.
                </p>
            </div>
        </div>

        <!-- Form Side -->
        <div class="auth-form-side">
            <div class="auth-form-container slide-in-right">
                <div class="auth-form-header">
                    <a href="{{ route('frontend.signin') }}" class="auth-back-link">Back to Sign In</a>
                    <h2 class="auth-form-title">Forgot Password?</h2>
                    <p class="auth-form-subtitle">Enter your email to receive reset instructions</p>
                </div>

                <form class="auth-form" id="forgotPasswordForm">
                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            class="form-input" 
                            placeholder="Enter your email address"
                            required
                        >
                    </div>

                    <button type="submit" class="auth-submit-btn" id="resetBtn">
                        Reset Password
                    </button>

                    <div class="auth-divider">
                        <span>or</span>
                    </div>

                    <div class="auth-form-links">
                        <p>Remember your password? <a href="{{ route('frontend.signin') }}" class="auth-link">Sign In</a></p>
                        <p>Don't have an account? <a href="{{ route('frontend.join') }}" class="auth-link">Join Now</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{ asset('assets/js/auth.js') }}"></script>
@endpush