<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class providers extends Model
{
    use HasFactory;

    protected $fillable = [
        'api_id',
        'api_name',
        'provider_id',
        'service_id',
        'service',
        'providerid',
        'provider',
        'logo',
        'state',
        'commission_amount',
        'commission_percentage',
        'is_active',

    ];
}
