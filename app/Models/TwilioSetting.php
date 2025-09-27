<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TwilioSetting extends Model
{
    protected $fillable = [
        'account_sid',
        'auth_token', 
        'phone_number',
        'is_active'
    ];

    public static function getActive()
    {
        return self::where('is_active', true)->first();
    }
}