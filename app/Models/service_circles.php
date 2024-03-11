<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service_circles extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_circle_id',
        'circle_name',
        'tiptopmoney_code',
        'is_active',

    ];
}
