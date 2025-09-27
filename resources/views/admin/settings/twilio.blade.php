@extends('layouts.admin')
@section('title','Twilio Settings')
@section('content')

<div style="padding: 20px;">
  <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
    <h2 style="font-size: 24px; font-weight: bold;">Twilio SMS Settings</h2>
  </div>

  @if(session('status'))
    <div style="background: #d4edda; color: #155724; padding: 12px; border-radius: 6px; margin-bottom: 20px;">
      {{ session('status') }}
    </div>
  @endif

  <div style="background: white; border: 1px solid #e5e7eb; border-radius: 8px; padding: 30px;">
    <form method="POST" action="{{ route('admin.settings.twilio.store') }}">
      @csrf
      
      <div style="margin-bottom: 20px;">
        <label style="display: block; margin-bottom: 5px; font-weight: 600;">Account SID</label>
        <input 
          type="text" 
          name="account_sid" 
          value="{{ old('account_sid', $setting->account_sid ?? '') }}"
          placeholder="Enter Twilio Account SID"
          style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;"
          required
        >
        @error('account_sid')
          <div style="color: #dc3545; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
        @enderror
      </div>

      <div style="margin-bottom: 20px;">
        <label style="display: block; margin-bottom: 5px; font-weight: 600;">Auth Token</label>
        <input 
          type="password" 
          name="auth_token" 
          value="{{ old('auth_token', $setting->auth_token ?? '') }}"
          placeholder="Enter Twilio Auth Token"
          style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;"
          required
        >
        @error('auth_token')
          <div style="color: #dc3545; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
        @enderror
      </div>

      <div style="margin-bottom: 20px;">
        <label style="display: block; margin-bottom: 5px; font-weight: 600;">Phone Number</label>
        <input 
          type="text" 
          name="phone_number" 
          value="{{ old('phone_number', $setting->phone_number ?? '') }}"
          placeholder="Enter Twilio Phone Number (e.g., +1234567890)"
          style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;"
          required
        >
        @error('phone_number')
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
          <span style="font-weight: 600;">Enable Twilio SMS</span>
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
        <li>Create a Twilio account at <a href="https://www.twilio.com" target="_blank" style="color: #b40c25;">twilio.com</a></li>
        <li>Get your Account SID and Auth Token from the Twilio Console</li>
        <li>Purchase a phone number from Twilio</li>
        <li>Enter the credentials above and save</li>
        <li>Test OTP functionality on the frontend</li>
      </ol>
    </div>

    @if($setting)
    <div style="margin-top: 20px; padding: 15px; background: #e8f5e8; border-radius: 6px;">
      <div style="display: flex; align-items: center;">
        <span style="color: #28a745; margin-right: 8px;">✓</span>
        <span style="font-weight: 600; color: #155724;">
          Twilio is {{ $setting->is_active ? 'Active' : 'Inactive' }}
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