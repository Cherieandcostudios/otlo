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
      <div class="name">{{ config('app.name', 'Laravel') }}</div>
    </div>
  </div>
  <div class="auth-right">
    <div class="auth-card">
      <h1>Reset password</h1>
      <p class="lead">We'll email you a reset link</p>

      <x-auth-session-status class="mb-4" :status="session('status')" />

      <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group">
          <label for="email" class="label">Email</label>
          <input id="email" class="input" type="email" name="email" :value="old('email')" required autofocus />
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div style="margin-top:14px">
          <button class="btn" type="submit">Reset Password</button>
        </div>

        <div class="helper"><a href="{{ route('login') }}">Back to Sign In</a></div>
      </form>
    </div>
  </div>
</div>
@endsection
