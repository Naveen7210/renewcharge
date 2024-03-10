<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class api extends Model
{
    use HasFactory;

    protected $fillable = [
        'api_id',
        'user_id',
        'api_type',
        'api_name',
        'api_username',
        'api_password',
        'api_key',
        'api_domain',
        'api_balance',
        'security_key',
        'corporate_id',
        'md_key',
        'is_active',

    ];
}
