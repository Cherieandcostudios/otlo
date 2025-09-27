<?php

namespace App\Services;

use App\Models\EmailSetting;
use Illuminate\Support\Facades\Mail;

class EmailService
{
    public function sendOtp($email, $otp)
    {
        try {
            $setting = EmailSetting::where('is_active', true)->first();
            
            if (!$setting) {
                \Log::info("OTP for {$email}: {$otp}");
                return true;
            }

            config([
                'mail.mailers.smtp.host' => $setting->mail_host,
                'mail.mailers.smtp.port' => $setting->mail_port,
                'mail.mailers.smtp.username' => $setting->mail_username,
                'mail.mailers.smtp.password' => $setting->mail_password,
                'mail.from.address' => $setting->mail_from_address,
                'mail.from.name' => $setting->mail_from_name,
            ]);

            $emailContent = "
            <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;'>
                <div style='text-align: center; margin-bottom: 30px;'>
                    <h1 style='color: #b40c25; margin: 0;'>Otlo Cafe</h1>
                </div>
                <div style='background: #f8f9fa; padding: 30px; border-radius: 10px; text-align: center;'>
                    <h2 style='color: #333; margin-bottom: 20px;'>Your Verification Code</h2>
                    <div style='background: white; padding: 20px; border-radius: 8px; margin: 20px 0;'>
                        <div style='font-size: 32px; font-weight: bold; color: #b40c25; letter-spacing: 5px;'>{$otp}</div>
                    </div>
                    <p style='color: #666; margin: 20px 0;'>This code will expire in 1 minute.</p>
                    <p style='color: #666; font-size: 14px;'>If you didn't request this code, please ignore this email.</p>
                </div>
            </div>
            ";
            
            Mail::html($emailContent, function ($message) use ($email, $setting) {
                $message->to($email)
                        ->from($setting->mail_from_address, $setting->mail_from_name)
                        ->subject('Your OTP Code - Otlo Cafe');
            });

            return true;
        } catch (\Exception $e) {
            \Log::error('Email Error: ' . $e->getMessage());
            \Log::info("OTP for {$email}: {$otp}");
            return true;
        }
    }
}