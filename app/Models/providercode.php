<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class providercode extends Model
{
    use HasFactory;

    protected $fillable = [
        'api_provider_code_id',
        'api_id',
        'api_name',
        'provider_id',
        'provider',
        'provider_code',
        'is_active',

    ];
}
