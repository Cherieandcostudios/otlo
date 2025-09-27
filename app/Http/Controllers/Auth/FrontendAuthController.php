<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontendAuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:15|unique:customers',
            'email' => 'nullable|email|unique:customers',
            'date_of_birth' => 'required|date|before:today',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $customer = Customer::create([
            'name' => $validated['name'],
            'mobile' => $validated['mobile'],
            'email' => $validated['email'],
            'date_of_birth' => $validated['date_of_birth'],
            'password' => Hash::make($validated['password']),
            'email_verified_at' => now(),
        ]);

        Auth::guard('customer')->login($customer);

        return redirect()->route('home')->with('success', 'Account created successfully! Welcome to Otlo Cafe!');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'mobile' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::guard('customer')->attempt(['mobile' => $validated['mobile'], 'password' => $validated['password']])) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'Welcome back!');
        }

        return back()->withErrors([
            'mobile' => 'Invalid mobile number or password.',
        ])->onlyInput('mobile');
    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    public function profile()
    {
        return view('frontend.profile');
    }

    public function updateProfile(Request $request)
    {
        $customer = auth('customer')->user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:15|unique:customers,mobile,'.$customer->id,
            'email' => 'nullable|email|unique:customers,email,'.$customer->id,
            'date_of_birth' => 'required|date|before:today'
        ]);

        $customer->update($validated);
        return back()->with('success', 'Profile updated successfully!');
    }
}