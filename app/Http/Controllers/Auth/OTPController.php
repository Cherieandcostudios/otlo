<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Cart;
use App\Models\MenuItem;
use App\Services\EmailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OTPController extends Controller
{
    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function sendLoginOTP(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email'
            ]);

            $customer = Customer::where('email', $request->email)->first();
            
            if (!$customer) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email not registered. Please join first.',
                    'redirect' => route('frontend.join')
                ]);
            }

            $otp = rand(100000, 999999);
            $customer->update([
                'otp' => $otp,
                'otp_expires_at' => Carbon::now()->addMinute()
            ]);

            $sent = $this->emailService->sendOtp($request->email, $otp);

            if ($sent) {
                session(['otp_email' => $request->email]);
                return response()->json([
                    'success' => true,
                    'message' => 'OTP sent to your email',
                    'redirect' => route('otp.verify')
                ]);
            }
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to send OTP'
            ]);
        } catch (\Exception $e) {
            \Log::error('OTP Send Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error sending OTP: ' . $e->getMessage()
            ], 500);
        }
    }

    public function sendRegisterOTP(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                'date_of_birth' => 'nullable|date'
            ]);

            $existingCustomer = Customer::where('email', $request->email)->first();
            
            if ($existingCustomer) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email already registered. Please sign in.',
                    'redirect' => route('frontend.signin')
                ]);
            }

            $otp = rand(100000, 999999);
            
            $customer = Customer::create([
                'name' => $request->name,
                'email' => $request->email,
                'date_of_birth' => $request->date_of_birth,
                'otp' => $otp,
                'otp_expires_at' => Carbon::now()->addMinute(),
                'is_verified' => false
            ]);

            $sent = $this->emailService->sendOtp($request->email, $otp);

            if ($sent) {
                session(['otp_email' => $request->email]);
                return response()->json([
                    'success' => true,
                    'message' => 'OTP sent to your email',
                    'redirect' => route('otp.verify')
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Failed to send OTP'
            ]);
        } catch (\Exception $e) {
            \Log::error('Register OTP Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function resendOTP(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email'
            ]);

            $customer = Customer::where('email', $request->email)->first();
            
            if (!$customer) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email not found'
                ]);
            }

            $otp = rand(100000, 999999);
            $customer->update([
                'otp' => $otp,
                'otp_expires_at' => Carbon::now()->addMinute()
            ]);

            $sent = $this->emailService->sendOtp($request->email, $otp);

            return response()->json([
                'success' => $sent,
                'message' => $sent ? 'OTP resent successfully' : 'Failed to resend OTP'
            ]);
        } catch (\Exception $e) {
            \Log::error('Resend OTP Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error resending OTP'
            ], 500);
        }
    }

    public function verifyOTP(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'otp' => 'required|string|size:6'
            ]);

            $customer = Customer::where('email', $request->email)->first();
            
            if (!$customer) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email not found'
                ]);
            }

            if (!$customer->otp) {
                return response()->json([
                    'success' => false,
                    'message' => 'No OTP found. Please request a new OTP'
                ]);
            }

            if ($customer->otp_expires_at && Carbon::now()->gt($customer->otp_expires_at)) {
                return response()->json([
                    'success' => false,
                    'message' => 'OTP has expired. Please request a new OTP'
                ]);
            }

            if ($customer->otp !== $request->otp) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid OTP. Please check and try again'
                ]);
            }

            $customer->update([
                'otp' => null,
                'otp_expires_at' => null,
                'is_verified' => true
            ]);

            Auth::guard('customer')->login($customer);
            
            // Transfer guest cart to user cart
            $this->transferGuestCart();

            // Check for stored redirect URL
            $redirectUrl = session()->get('redirect_after_signin', route('home'));
            session()->forget('redirect_after_signin');
            
            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'redirect' => $redirectUrl
            ]);
        } catch (\Exception $e) {
            \Log::error('Verify OTP Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error verifying OTP. Please try again'
            ], 500);
        }
    }
    
    private function transferGuestCart()
    {
        $guestCart = session()->get('guest_cart', []);
        
        if (!empty($guestCart)) {
            foreach ($guestCart as $item) {
                $menuItem = MenuItem::find($item['menu_item_id']);
                if ($menuItem) {
                    $existingCart = Cart::where('customer_id', auth('customer')->id())
                        ->where('menu_item_id', $item['menu_item_id'])
                        ->first();
                    
                    if ($existingCart) {
                        $existingCart->update([
                            'quantity' => $existingCart->quantity + $item['quantity'],
                            'total_price' => $existingCart->total_price + ($menuItem->price * $item['quantity'])
                        ]);
                    } else {
                        Cart::create([
                            'customer_id' => auth('customer')->id(),
                            'menu_item_id' => $item['menu_item_id'],
                            'quantity' => $item['quantity'],
                            'total_price' => $menuItem->price * $item['quantity']
                        ]);
                    }
                }
            }
            session()->forget('guest_cart');
        }
    }
}