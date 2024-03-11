<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apiroutes extends Model
{
    use HasFactory;

    protected $fillable = [
        'route_type',
        'route_for',
        'api_1',
        'api_1_name',
        'api_2',
        'api_2_name',
        'api_3',
        'api_3_name',
        'priority',
        'is_active',

    ];
}
