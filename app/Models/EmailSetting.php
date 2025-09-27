<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailSetting extends Model
{
    protected $fillable = [
        'mail_host',
        'mail_port', 
        'mail_username',
        'mail_password',
        'mail_from_address',
        'mail_from_name',
        'is_active'
    ];
}