@extends('layouts.admin')
@section('title','Email Settings')
@section('content')

<div style="padding: 20px;">
  <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
    <h2 style="font-size: 24px; font-weight: bold;">Email Settings</h2>
  </div>

  @if(session('status'))
    <div style="background: #d4edda; color: #155724; padding: 12px; border-radius: 6px; margin-bottom: 20px;">
      {{ session('status') }}
    </div>
  @endif

  <div style="background: white; border: 1px solid #e5e7eb; border-radius: 8px; padding: 30px;">
    <form method="POST" action="{{ route('admin.settings.email.store') }}">
      @csrf
      
      <div style="margin-bottom: 20px;">
        <label style="display: block; margin-bottom: 5px; font-weight: 600;">Mail Host</label>
        <input 
          type="text" 
          name="mail_host" 
          value="{{ old('mail_host', $setting->mail_host ?? 'smtp.gmail.com') }}"
          placeholder="Enter SMTP Host (e.g., smtp.gmail.com)"
          style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;"
          required
        >
        @error('mail_host')
          <div style="color: #dc3545; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
        @enderror
      </div>

      <div style="margin-bottom: 20px;">
        <label style="display: block; margin-bottom: 5px; font-weight: 600;">Mail Port</label>
        <input 
          type="text" 
          name="mail_port" 
          value="{{ old('mail_port', $setting->mail_port ?? '587') }}"
          placeholder="Enter SMTP Port (e.g., 587)"
          style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;"
          required
        >
        @error('mail_port')
          <div style="color: #dc3545; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
        @enderror
      </div>

      <div style="margin-bottom: 20px;">
        <label style="display: block; margin-bottom: 5px; font-weight: 600;">Username</label>
        <input 
          type="text" 
          name="mail_username" 
          value="{{ old('mail_username', $setting->mail_username ?? '') }}"
          placeholder="Enter email address"
          style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;"
          required
        >
        @error('mail_username')
          <div style="color: #dc3545; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
        @enderror
      </div>

      <div style="margin-bottom: 20px;">
        <label style="display: block; margin-bottom: 5px; font-weight: 600;">Password</label>
        <input 
          type="password" 
          name="mail_password" 
          value="{{ old('mail_password', $setting->mail_password ?? '') }}"
          placeholder="Enter email password or app password"
          style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;"
          required
        >
        @error('mail_password')
          <div style="color: #dc3545; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
        @enderror
      </div>

      <div style="margin-bottom: 20px;">
        <label style="display: block; margin-bottom: 5px; font-weight: 600;">From Address</label>
        <input 
          type="email" 
          name="mail_from_address" 
          value="{{ old('mail_from_address', $setting->mail_from_address ?? '') }}"
          placeholder="Enter sender email address"
          style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;"
          required
        >
        @error('mail_from_address')
          <div style="color: #dc3545; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
        @enderror
      </div>

      <div style="margin-bottom: 20px;">
        <label style="display: block; margin-bottom: 5px; font-weight: 600;">From Name</label>
        <input 
          type="text" 
          name="mail_from_name" 
          value="{{ old('mail_from_name', $setting->mail_from_name ?? config('app.name')) }}"
          placeholder="Enter sender name"
          style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;"
          required
        >
        @error('mail_from_name')
          <div style="color: #dc3545; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
        @enderror
      </div>

      <div style="margin-bottom: 30px;">
        <label style="display: flex; align-items: center; cursor: pointer;">
          <input 
            type="checkbox" 
            name="is_active" 
            value="1"
            {{ old('is_active', $setting->is_active ?? true) ? 'checked' : '' }}
            style="margin-right: 8px;"
          >
          <span style="font-weight: 600;">Enable Email Service</span>
        </label>
      </div>

      <div style="border-top: 1px solid #e5e7eb; padding-top: 20px;">
        <button 
          type="submit" 
          style="background: #b40c25; color: white; border: none; padding: 12px 24px; border-radius: 6px; font-weight: 600; cursor: pointer;"
        >
          Save Settings
        </button>
      </div>
    </form>

    <div style="margin-top: 30px; padding: 20px; background: #f8f9fa; border-radius: 6px;">
      <h4 style="margin-bottom: 15px; font-weight: 600;">Setup Instructions:</h4>
      <ol style="margin: 0; padding-left: 20px; line-height: 1.6;">
        <li>For Gmail: Enable 2-factor authentication and generate an App Password</li>
        <li>Use smtp.gmail.com as host and 587 as port for Gmail</li>
        <li>Enter your email address as username</li>
        <li>Use the App Password (not your regular password) for Gmail</li>
        <li>Set the from address and name for outgoing emails</li>
      </ol>
    </div>

    @if($setting)
    <div style="margin-top: 20px; padding: 15px; background: #e8f5e8; border-radius: 6px;">
      <div style="display: flex; align-items: center;">
        <span style="color: #28a745; margin-right: 8px;">✓</span>
        <span style="font-weight: 600; color: #155724;">
          Email Service is {{ $setting->is_active ? 'Active' : 'Inactive' }}
        </span>
      </div>
      <div style="font-size: 12px; color: #666; margin-top: 5px;">
        Last updated: {{ $setting->updated_at->format('M d, Y H:i') }}
      </div>
    </div>
    @endif
  </div>
</div>

@endsection