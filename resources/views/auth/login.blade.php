@extends('layouts.guest')

@section('content')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
<script src="{{ asset('js/auth.js') }}" defer></script>

<div class="auth-page">
  <div class="auth-left">
    <div class="auth-hero"></div>
    <div class="auth-brand">
      <div class="logo">
        <img src="{{ asset('images/logo.jpg') }}" alt="Logo" >
      </div>
      <div class="name">{{ config('app.name', 'Otlo') }}</div>
    </div>
  </div>
  <div class="auth-right">
    <div class="auth-card">
      <h1>Welcome back</h1>
      <p class="lead">Sign in to your account</p>

      <x-auth-session-status class="mb-4" :status="session('status')" />

      <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
          <label for="email" class="label">Email</label>
          <input id="email" class="input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="form-group">
          <label for="password" class="label">Password</label>
          <input id="password" class="input" type="password" name="password" required autocomplete="current-password" />
          <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="actions">
          @if (Route::has('password.request'))
            <a class="link" href="{{ route('password.request') }}">Forgot Password?</a>
          @endif
        </div>

        <div style="margin-top:14px">
          <button class="btn" type="submit">Sign In</button>
        </div>

        <div class="helper">New here? <a href="{{ route('register') }}">Register </a></div>
      </form>
    </div>
  </div>
</div>
@endsection