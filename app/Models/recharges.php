<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recharges extends Model
{
    use HasFactory;

    protected $fillable = [
        'recharge_id',
        'date',
        'mobileno',
        'service_provider_id',
        'service_id',
        'service',
        'service_provider',
        'circlecode_id',
        'circlecode',
        'amount',

    ];
}
