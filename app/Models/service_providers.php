<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service_providers extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_provider_id',
        'api_id',
        'service_id',
        'provider_id',
        'sp_code_id',
        'sp_code',
        'is_active',

    ];
}
