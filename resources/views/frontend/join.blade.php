@extends('frontend.layouts.app')

@section('title', 'Join Now - Otlo Cafe')

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
                <h1 class="auth-image-title">Join Our Community</h1>
                <p class="auth-image-subtitle">
                    Create your account and unlock exclusive benefits. Get personalized recommendations, 
                    earn rewards, and be the first to know about new menu items and special offers.
                </p>
            </div>
        </div>

        <!-- Form Side -->
        <div class="auth-form-side">
            <div class="auth-form-container slide-in-right">
                <div class="auth-form-header">
                    <h2 class="auth-form-title">Create Account</h2>
                    <p class="auth-form-subtitle">Fill in your details to get started</p>
                </div>

                <form class="auth-form" id="joinForm" action="{{ route('frontend.register') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label">Full Name</label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            class="form-input" 
                            placeholder="Enter your full name"
                            value="{{ old('name') }}"
                            required
                        >
                        @error('name')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            class="form-input" 
                            placeholder="Enter your email address"
                            value="{{ old('email') }}"
                            required
                        >
                        @error('email')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="date_of_birth" class="form-label">Date of Birth</label>
                        <input 
                            type="date" 
                            id="date_of_birth" 
                            name="date_of_birth" 
                            class="form-input" 
                            value="{{ old('date_of_birth') }}"
                            required
                        >
                        @error('date_of_birth')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="button" class="auth-submit-btn" id="sendRegisterOtpBtn">
                        Send OTP
                    </button>

                    <div class="auth-divider">
                        <span>or</span>
                    </div>

                    <div class="auth-form-links">
                        <p>Already have an account? <a href="{{ route('frontend.signin') }}" class="auth-link">Sign In</a></p>
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
    $('#sendRegisterOtpBtn').click(function() {
        var name = $('#name').val();
        var email = $('#email').val();
        var dob = $('#date_of_birth').val();
        
        if (!name || !email || !dob) {
            alert('Please fill all required fields');
            return;
        }
        
        $(this).prop('disabled', true).text('Sending OTP...');
        
        $.ajax({
            url: '{{ url("/auth/send-register-otp") }}',
            method: 'POST',
            data: {
                name: name,
                email: email,
                date_of_birth: dob,
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
            },
            complete: function() {
                $('#sendRegisterOtpBtn').prop('disabled', false).text('Send OTP');
            }
        });
    });
});
</script>
@endpush