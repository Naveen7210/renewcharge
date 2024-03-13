<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class circle_codes extends Model
{
    use HasFactory;

    protected $fillable = [
        'circlecode_id',
        'api_id',
        'service_id',
        'provider_id',
        'sp_code_id',
        'circle_code',
        'circle_code_id',
        'is_active',

    ];
}
