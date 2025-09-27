@extends('frontend.layouts.app')

@section('title', 'My Profile - Otlo Cafe')

@push('styles')
<style>
.profile-container {
    max-width: 800px;
    margin: 100px auto;
    padding: 0 20px;
}

.profile-header {
    text-align: center;
    margin-bottom: 40px;
}

.profile-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 10px;
}

.profile-subtitle {
    color: #666;
    font-size: 1.1rem;
}

.profile-card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    padding: 40px;
    margin-bottom: 30px;
}

.form-group {
    margin-bottom: 24px;
}

.form-label {
    display: block;
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
    font-size: 0.95rem;
}

.form-input {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid #e5e5e5;
    border-radius: 8px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: #fff;
}

.form-input:focus {
    outline: none;
    border-color: #b40c25;
    box-shadow: 0 0 0 3px rgba(180, 12, 37, 0.1);
}

.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
}

.btn-update {
    background: #b40c25;
    color: #fff;
    padding: 14px 32px;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    width: 100%;
}

.btn-update:hover {
    background: #9a0a20;
    transform: translateY(-2px);
}

.success-message {
    background: #d4edda;
    color: #155724;
    padding: 12px 16px;
    border-radius: 8px;
    margin-bottom: 24px;
    border: 1px solid #c3e6cb;
}

.error-message {
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 4px;
}

@media (max-width: 768px) {
    .profile-container {
        margin: 100px auto;
        padding: 0 15px;
    }
    
    .profile-card {
        padding: 24px;
    }
    
    .form-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }
    
    .profile-title {
        font-size: 2rem;
    }
}
</style>
@endpush

@section('content')
<div class="profile-container">
    <div class="profile-header">
        <h1 class="profile-title">My Profile</h1>
        <p class="profile-subtitle">Update your personal information</p>
    </div>

    <div class="profile-card">
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('frontend.profile.update') }}">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name" class="form-label">Full Name</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    class="form-input" 
                    value="{{ old('name', auth('customer')->user()->name) }}"
                    required
                >
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label for="mobile" class="form-label">Mobile Number</label>
                    <input 
                        type="tel" 
                        id="mobile" 
                        name="mobile" 
                        class="form-input" 
                        value="{{ old('mobile', auth('customer')->user()->mobile) }}"
                        required
                    >
                    @error('mobile')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email Address (Optional)</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="form-input" 
                        value="{{ old('email', auth('customer')->user()->email) }}"
                    >
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="date_of_birth" class="form-label">Date of Birth</label>
                <input 
                    type="date" 
                    id="date_of_birth" 
                    name="date_of_birth" 
                    class="form-input" 
                    value="{{ old('date_of_birth', auth('customer')->user()->date_of_birth?->format('Y-m-d')) }}"
                    required
                >
                @error('date_of_birth')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-update">
                Update Profile
            </button>
        </form>
    </div>
</div>
@endsection