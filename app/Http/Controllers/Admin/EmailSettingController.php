<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailSetting;
use Illuminate\Http\Request;

class EmailSettingController extends Controller
{
    public function index()
    {
        $setting = EmailSetting::first();
        return view('admin.settings.email', compact('setting'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'mail_host' => 'required|string',
            'mail_port' => 'required|string',
            'mail_username' => 'required|string',
            'mail_password' => 'required|string',
            'mail_from_address' => 'required|email',
            'mail_from_name' => 'required|string',
            'is_active' => 'boolean'
        ]);

        EmailSetting::query()->update(['is_active' => false]);

        EmailSetting::updateOrCreate(
            ['id' => 1],
            array_merge($validated, ['is_active' => true])
        );

        return back()->with('status', 'Email settings updated successfully');
    }
}