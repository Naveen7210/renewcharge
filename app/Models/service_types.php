<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service_types extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_type_id',
        'servicetype_id',
        'servicetype',
        'apiname_id',
        'apiname',
        'is_active',

    ];
}
