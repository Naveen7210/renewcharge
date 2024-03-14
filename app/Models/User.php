<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'parent_id',
        'white_label_id',
        'user_type',
        'plan_id',
        'user_name',
        'name',
        'gender',
        'dob',
        'email',
        'mobile',
        'mobile_1',
        'otp',
        'mobile_otp',
        'email_otp',
        'password',
        'login_ip',
        'last_login',
        'pincode',
        'district',
        'state',
        'user_address',
        'amount_balance',
        'commission_amount',
        'credit_amount',
        'credit_limit',
        'profile_pic',
        'kyc_id',
        'gst_no',
        'pancard',
        'adhaar_card',
        'company_name',
        'company_type',
        'approved_by',
        'mobile_verified',
        'email_verified',
        'route',
        'commission',
        'force_logout',
        'uuid',
        'kyc_date',
        'kyc_modal',
        'multi_api',
        'tds',
        'gst',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
