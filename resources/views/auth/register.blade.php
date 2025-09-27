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
      <h1>Create account</h1>
      <p class="lead">Join us and unlock rewards</p>

      <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
          <label for="name" class="label">First and last name</label>
          <input id="name" class="input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
          <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="form-group">
          <label for="email" class="label">Email</label>
          <input id="email" class="input" type="email" name="email" :value="old('email')" required autocomplete="username" />
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="form-group">
          <label for="password" class="label">Password</label>
          <input id="password" class="input" type="password" name="password" required autocomplete="new-password" />
          <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="form-group">
          <label for="password_confirmation" class="label">Confirm password</label>
          <input id="password_confirmation" class="input" type="password" name="password_confirmation" required autocomplete="new-password" />
          <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div style="margin-top:14px">
          <button class="btn" type="submit">Create Account</button>
        </div>

        <div class="helper">Already have an account? <a href="{{ route('login') }}">Sign In</a></div>
      </form>
    </div>
  </div>
</div>
@endsection
