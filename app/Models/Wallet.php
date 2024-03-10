<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'wallet_id',
        'parent_id',
        'parent_user_id',
        'white_label_user_id',
        'api_id',
        'api_name',
        'user_id',
        'user_name',
        'user_1_id',
        'user_1_name',
        'transaction_type',
        'wallet_type',
        'cash_credit',
        'api_old_balance',
        'api_amount',
        'api_new_balance',
        'user_old_balance',
        'total_amount',
        'amount',
        'user_new_balance',
        'transaction_details',
        'transaction_date',
        'month_year',
        'provider_id',
        'provider_name',
        'provider_type',
        'circle_id',
        'circle_name',
        'mobile_number',
        'status',
        'disputed',
        'ref_number',
        'api_number',
        'opid',
        'comment',
        'api_response',
        'commission_rt',
        'total_commission',
        'commission_earned',
        'gst',
        'tds',
        'recharge_path',
        'recharge_url',
        'ip_address',
        'is_active',
        'response_url',
        'call_back_status',
        'api_call_back_response',
        'send_type',								
    ];
}
