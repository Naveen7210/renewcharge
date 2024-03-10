<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class api_circlecode extends Model
{
    use HasFactory;

    protected $fillable = [
        'api_circle_code_id',
        'api_id',
        'api_name',
        'service_circle_id',
        'circle_name',
        'circle_code',
        'is_active',

    ];
}
