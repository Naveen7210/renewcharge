<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apiwallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'api_id',
        'api_name',
        'user_name',
        'wallet_type',
        'cash_credit',
        'api_old_balance',
        'api_amount',
        'api_new_balance',
        'total_amount',
        'amount',
        'transaction_details',
        'transaction_date',
        'mobile_number',
        'status',
        'disputed',
        'ref_number',
        'api_number',
        'comment',
        'api_response',
        'commission_rt',
        'total_commission',
        'commission_earned',
        'gst',
        'tds',
        'ip_address',
        'is_active',
        'response_url',
        'call_back_status',
        'api_call_back_response',
        'send_type',								
    ];
}
