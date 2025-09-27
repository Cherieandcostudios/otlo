<?php

namespace App\Services;


use Twilio\Rest\Client;
use App\Models\TwilioSetting;

class TwilioService
{
    // public function sendOTP($phoneNumber, $otp)
    // {
    //     try {
    //         // Log OTP for demo/testing
    //         \Log::info("OTP for {$phoneNumber}: {$otp}");
            
    //         // Always return true for demo
    //         return true;
    //     } catch (\Exception $e) {
    //         \Log::error('SMS Error: ' . $e->getMessage());
    //         return true;
    //     }
    // }

    public function sendOtp($mobile, $otp) {
        $setting = TwilioSetting::first();
        if (!$setting || !$setting->is_active) {
            throw new \Exception('Twilio settings not active');
        }
        $client = new Client($setting->account_sid, $setting->auth_token);
        return $client->messages->create(
            $mobile,
            [
                'from' => $setting->phone_number,
                'body' => "Your OTP code is: $otp"
            ]
        );
    }
}