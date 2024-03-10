<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class api_provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'api_provider_id',
        'api_id',
        'api_name',
        'provider_id',
        'provider',
        'commission_amount',
        'commission_percentage',
        'is_active',

    ];
}
