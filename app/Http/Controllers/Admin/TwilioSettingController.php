<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TwilioSetting;
use Illuminate\Http\Request;

class TwilioSettingController extends Controller
{
    public function index()
    {
        $setting = TwilioSetting::first();
        return view('admin.settings.twilio', compact('setting'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'account_sid' => 'required|string',
            'auth_token' => 'required|string',
            'phone_number' => 'required|string',
            'is_active' => 'boolean'
        ]);

        // Deactivate all existing settings
        TwilioSetting::query()->update(['is_active' => false]);

        // Create or update setting
        TwilioSetting::updateOrCreate(
            ['id' => 1],
            array_merge($validated, ['is_active' => true])
        );

        return back()->with('status', 'Twilio settings updated successfully');
    }
}