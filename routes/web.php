<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MenuCategoryController;
use App\Http\Controllers\Admin\MenuSubCategoryController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', function () { return view('frontend.index'); })->name('home');
Route::get('/about', function () { return view('frontend.about'); })->name('frontend.about');
Route::get('/menu', function () { return view('frontend.menu'); })->name('frontend.menu');
Route::get('/contact', function () { return view('frontend.contact'); })->name('frontend.contact');
Route::get('/join', function () { return view('frontend.join'); })->name('frontend.join');

Route::get('/library', function () { return view('frontend.library'); })->name('frontend.library');
Route::get('/private-events', function () { return view('frontend.private-events'); })->name('frontend.private-events');
Route::get('/feature', function () { return view('frontend.feature'); })->name('frontend.feature');
Route::get('/blog', function () { return view('frontend.blog'); })->name('frontend.blog');
Route::get('/culture-value', function () { return view('frontend.culture-value'); })->name('frontend.culture-value');
Route::get('/checkout', [\App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::post('/test-order', function() { return response()->json(['test' => 'working']); })->name('test.order');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
Route::get('/franchise', function () { return view('frontend.franchise'); })->name('frontend.franchise');
Route::get('/signin', function () { return view('frontend.signin'); })->name('frontend.signin');
Route::get('/rewards', function () { return view('frontend.rewards'); })->name('frontend.rewards');
Route::get('/otlo-podcast', function () { return view('frontend.otlo-podcast'); })->name('frontend.otlo-podcast');
Route::get('/otlo-trust', function () { return view('frontend.otlo-trust'); })->name('frontend.otlo-trust');
Route::get('/otlo-poetry', function () { return view('frontend.otlo-poetry'); })->name('frontend.otlo-poetry');
Route::get('/otlo-show', function () { return view('frontend.otlo-show'); })->name('frontend.otlo-show');
Route::get('/calture-value', function () { return view('frontend.culture-value'); })->name('frontend.calture-value');
Route::get('/forgot-password', function () { return view('frontend.forgot-password'); })->name('frontend.forgot-password');
Route::get('/otp-verify', function() { return view('frontend.otp-verify'); })->name('otp.verify');

// OTP Authentication routes
Route::prefix('auth')->name('auth.')->group(function () {
    // Route::post('/send-login-otp', function(\Illuminate\Http\Request $request) {
    //     try {
    //         $mobile = $request->input('mobile');
    //         $otp = rand(100000, 999999);
            
    //         // Store in session
    //         session([
    //             'otp_mobile' => $mobile,
    //             'otp_code' => $otp,
    //             'otp_expires' => now()->addMinutes(5)
    //         ]);
            
    //         // Send OTP via Twilio
    //         $twilioService = app(\App\Services\TwilioService::class);
    //         $sent = $twilioService->sendOTP($mobile, $otp);
            
    //         if ($sent) {
    //             return response()->json([
    //                 'success' => true,
    //                 'message' => 'OTP sent to your mobile number',
    //                 'redirect' => route('otp.verify')
    //             ]);
    //         } else {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'Failed to send OTP. Please try again.'
    //             ]);
    //         }
    //     } catch (\Exception $e) {
    //         \Log::error('OTP Error: ' . $e->getMessage());
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Error sending OTP. Please try again.'
    //         ], 500);
    //     }
    // })->name('send-login-otp');
    
    // Route::post('/send-register-otp', function(\Illuminate\Http\Request $request) {
    //     try {
    //         $request->validate([
    //             'name' => 'required|string',
    //             'mobile' => 'required|string|min:10',
    //             'email' => 'nullable|email',
    //             'date_of_birth' => 'required|date'
    //         ]);
            
    //         $otp = rand(100000, 999999);
            
    //         // Store registration data in session
    //         session([
    //             'register_data' => $request->only(['name', 'mobile', 'email', 'date_of_birth']),
    //             'otp_mobile' => $request->mobile,
    //             'otp_code' => $otp,
    //             'otp_expires' => now()->addMinutes(5)
    //         ]);
            
    //         // Send OTP via Twilio
    //         $twilioService = app(\App\Services\TwilioService::class);
    //         $sent = $twilioService->sendOTP($request->mobile, $otp);
            
    //         if ($sent) {
    //             return response()->json([
    //                 'success' => true,
    //                 'message' => 'OTP sent to your mobile number',
    //                 'redirect' => route('otp.verify')
    //             ]);
    //         } else {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'Failed to send OTP. Please try again.'
    //             ]);
    //         }
    //     } catch (\Exception $e) {
    //         \Log::error('Register OTP Error: ' . $e->getMessage());
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Error sending OTP. Please try again.'
    //         ], 500);
    //     }
    // })->name('send-register-otp');
    
    // Route::post('/verify-otp', function(\Illuminate\Http\Request $request) {
    //     try {
    //         $mobile = $request->input('mobile');
    //         $otp = $request->input('otp');
    //         $sessionOtp = session('otp_code');
    //         $expires = session('otp_expires');
            
    //         if (!$sessionOtp || !$expires || now()->gt($expires)) {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'OTP expired or invalid'
    //             ]);
    //         }
            
    //         if ($otp == $sessionOtp) {
    //             session()->forget(['otp_code', 'otp_expires']);
    //             return response()->json([
    //                 'success' => true,
    //                 'message' => 'Login successful',
    //                 'redirect' => '/'
    //             ]);
    //         }
            
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Invalid OTP'
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Error: ' . $e->getMessage()
    //         ], 500);
    //     }
    // })->name('verify-otp');
    Route::post('/send-otp', [\App\Http\Controllers\Auth\OTPController::class, 'sendLoginOTP'])->name('send-login-otp');
    Route::post('/send-register-otp', [\App\Http\Controllers\Auth\OTPController::class,'sendRegisterOTP'])->name('send-register-otp');
    Route::post('/resend-otp', [\App\Http\Controllers\Auth\OTPController::class,'resendOTP'])->name('resend-otp');
    Route::post('/verify-otp', [\App\Http\Controllers\Auth\OTPController::class,'verifyOTP'])->name('verify-otp');
});
Route::prefix('frontend')->name('frontend.')->group(function () {
    // Authentication routes
    Route::post('/register', [\App\Http\Controllers\Auth\FrontendAuthController::class, 'register'])->name('register');
    Route::post('/login', [\App\Http\Controllers\Auth\FrontendAuthController::class, 'login'])->name('login');
    Route::post('/logout', [\App\Http\Controllers\Auth\FrontendAuthController::class, 'logout'])->name('logout');
    
    // Customer profile routes
    Route::middleware('auth:customer')->group(function () {
        Route::get('/profile', [\App\Http\Controllers\Auth\FrontendAuthController::class, 'profile'])->name('profile');
        Route::put('/profile', [\App\Http\Controllers\Auth\FrontendAuthController::class, 'updateProfile'])->name('profile.update');
    });
    Route::get('/about', [FrontendController::class, 'about'])->name('about');
    Route::get('/menu', [FrontendController::class, 'menu'])->name('menu');
    Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
    Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
    Route::get('/calture-value', [FrontendController::class, 'caltureValue'])->name('calture-value');
    Route::get('/cart', [FrontendController::class, 'cart'])->name('cart');
    Route::get('/checkout', [FrontendController::class, 'checkout'])->name('checkout');
    Route::get('/customer-service', [FrontendController::class, 'customerService'])->name('customer-service');
    Route::get('/faq', [FrontendController::class, 'faq'])->name('faq');
    Route::get('/feature', [FrontendController::class, 'feature'])->name('feature');
    Route::get('/feedback', [FrontendController::class, 'feedback'])->name('feedback');
    Route::get('/forgot-password', [FrontendController::class, 'forgotPassword'])->name('forgot-password');
    Route::get('/franchise', [FrontendController::class, 'franchise'])->name('franchise');
    Route::get('/join', [FrontendController::class, 'join'])->name('join');
    Route::get('/library', [FrontendController::class, 'library'])->name('library');
    Route::get('/location', [FrontendController::class, 'location'])->name('location');
    Route::get('/menu-improved', [FrontendController::class, 'menuImproved'])->name('menu-improved');
    Route::get('/menu-item-improved', [FrontendController::class, 'menuItemImproved'])->name('menu-item-improved');
    Route::get('/otlo-podcast', [FrontendController::class, 'otloPodcast'])->name('otlo-podcast');
    Route::get('/otlo-poetry', [FrontendController::class, 'otloPoetry'])->name('otlo-poetry');
    Route::get('/otlo-show', [FrontendController::class, 'otloShow'])->name('otlo-show');
    Route::get('/otlo-trust', [FrontendController::class, 'otloTrust'])->name('otlo-trust');
    Route::get('/our-caffe', [FrontendController::class, 'ourCaffe'])->name('our-caffe');
    Route::get('/payment', [FrontendController::class, 'payment'])->name('payment');
    Route::get('/privacy', [FrontendController::class, 'privacy'])->name('privacy');
    Route::get('/private-events', [FrontendController::class, 'privateEvents'])->name('private-events');
    Route::get('/rewards', [FrontendController::class, 'rewards'])->name('rewards');
    Route::get('/signin', [FrontendController::class, 'signin'])->name('signin');
    Route::get('/accessibility', [FrontendController::class, 'accessibility'])->name('accessibility');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Menu routes
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/{menuItem}', [MenuController::class, 'show'])->name('menu.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->prefix('admin')->as('admin.')->group(function () {
    Route::get('/', function(){ return redirect()->route('admin.dashboard'); })->name('index');
    Route::get('/dashboard', function(){ return view('admin.dashboard'); })->name('dashboard');

    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('menu-categories', MenuCategoryController::class);
    Route::resource('menu-sub-categories', MenuSubCategoryController::class);
    Route::resource('menu-items', MenuItemController::class);

    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/data', [UserController::class, 'data'])->name('users.data');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    
    Route::get('customers', [\App\Http\Controllers\Admin\CustomerController::class, 'index'])->name('customers.index');
    Route::get('customers/data', [\App\Http\Controllers\Admin\CustomerController::class, 'data'])->name('customers.data');
    Route::get('customers/{customer}/edit', [\App\Http\Controllers\Admin\CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('customers/{customer}', [\App\Http\Controllers\Admin\CustomerController::class, 'update'])->name('customers.update');
    Route::delete('customers/{customer}', [\App\Http\Controllers\Admin\CustomerController::class, 'destroy'])->name('customers.destroy');
    
    // Orders Management
    Route::get('orders', [\App\Http\Controllers\Admin\OrderManagementController::class, 'index'])->name('orders.index');
    Route::get('orders/{order}', [\App\Http\Controllers\Admin\OrderManagementController::class, 'show'])->name('orders.show');
    Route::put('orders/{order}/status', [\App\Http\Controllers\Admin\OrderManagementController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::delete('orders/{order}', [\App\Http\Controllers\Admin\OrderManagementController::class, 'destroy'])->name('orders.destroy');
    
    // Settings
    Route::get('settings/email', [\App\Http\Controllers\Admin\EmailSettingController::class, 'index'])->name('settings.email');
    Route::post('settings/email', [\App\Http\Controllers\Admin\EmailSettingController::class, 'store'])->name('settings.email.store');
    Route::get('settings/twilio', [\App\Http\Controllers\Admin\TwilioSettingController::class, 'index'])->name('settings.twilio');
    Route::post('settings/twilio', [\App\Http\Controllers\Admin\TwilioSettingController::class, 'store'])->name('settings.twilio.store');
});

// Cart & Order routes
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/frontend/cart', [CartController::class, 'index'])->name('frontend.cart');
Route::put('/cart/{itemId}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{itemId}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::get('/cart-session', [CartController::class, 'getSessionCart'])->name('cart.session');
Route::post('/store-redirect-url', function(\Illuminate\Http\Request $request) {
    session(['redirect_after_signin' => $request->redirect_url]);
    return response()->json(['success' => true]);
});

// Orders without auth middleware for guest dining
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

Route::middleware('auth:customer')->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}/payment', [OrderController::class, 'payment'])->name('orders.payment');
    Route::post('/orders/{order}/payment', [OrderController::class, 'processPayment'])->name('orders.process-payment');
});
