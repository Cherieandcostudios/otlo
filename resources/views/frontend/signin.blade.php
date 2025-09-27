@extends('frontend.layouts.app')

@section('title', 'Sign In - Otlo Cafe')

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
                <h1 class="auth-image-title">Welcome Back</h1>
                <p class="auth-image-subtitle">
                    Sign in to your account and continue your coffee journey with us. 
                    Access your rewards, order history, and personalized recommendations.
                </p>
            </div>
        </div>

        <!-- Form Side -->
        <div class="auth-form-side">
            <div class="auth-form-container slide-in-right">
                <div class="auth-form-header">
                    <h2 class="auth-form-title">Sign In</h2>
                    <p class="auth-form-subtitle">Enter your credentials to access your account</p>
                </div>

                <form class="auth-form" id="signinForm">
                    @csrf
                    <div class="form-group" id="emailGroup">
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

                    <div class="form-group" id="otpGroup" style="display:none;">
                        <label for="otp" class="form-label">Enter OTP</label>
                        <input 
                            type="text" 
                            id="otp" 
                            name="otp" 
                            class="form-input" 
                            placeholder="6-digit OTP"
                            maxlength="6"
                        >
                    </div>

                    <button type="button" class="auth-submit-btn" id="sendOtpBtn">
                        Send OTP
                    </button>
                    
                    <button type="button" class="auth-submit-btn" id="verifyOtpBtn" style="display:none;">
                        Verify OTP
                    </button>
                    
                    <button type="button" class="auth-link" id="resendOtpBtn" style="display:none;">
                        Resend OTP
                    </button>

                    <div class="auth-divider">
                        <span>or</span>
                    </div>

                    <div class="auth-cta">
                        <h3 class="auth-cta-title">Join now for rewards</h3>
                        <p class="auth-cta-subtitle">Get exclusive offers and earn points with every purchase</p>
                        <a href="{{ route('frontend.join') }}" class="auth-cta-btn">Join Now</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Store redirect URL from sessionStorage to server session
    var redirectUrl = sessionStorage.getItem('redirect_after_signin');
    if (redirectUrl) {
        $.ajax({
            url: '/store-redirect-url',
            method: 'POST',
            data: {
                redirect_url: redirectUrl,
                _token: $('meta[name="csrf-token"]').attr('content')
            }
        });
        sessionStorage.removeItem('redirect_after_signin');
    }
    $('#sendOtpBtn').click(function() {
        var email = $('#email').val();
        if (!email) {
            alert('Please enter email address');
            return;
        }

        $.ajax({
            url: '{{ route("auth.send-login-otp") }}',
            method: 'POST',
            data: {
                email: email,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.success) {
                    alert(data.message);
                    window.location.href = data.redirect;
                } else {
                    alert(data.message || 'Error sending OTP');
                    if (data.redirect) {
                        window.location.href = data.redirect;
                    }
                }
            },
            error: function() {
                alert('Error sending OTP');
            }
        });
    });

    $('#verifyOtpBtn').click(function() {
        var email = $('#email').val();
        var otp = $('#otp').val();
        
        if (!otp) {
            alert('Please enter OTP');
            return;
        }

        $.ajax({
            url: '{{ route("auth.verify-otp") }}',
            method: 'POST',
            data: {
                email: email,
                otp: otp,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.success) {
                    alert('Login successful!');
                    window.location.href = data.redirect;
                } else {
                    alert(data.message);
                }
            },
            error: function() {
                alert('Error verifying OTP');
            }
        });
    });

    $('#resendOtpBtn').click(function() {
        $('#sendOtpBtn').click();
    });
});
</script>
@endpush