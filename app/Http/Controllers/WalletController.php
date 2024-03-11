<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class walletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wallets = Wallet::get();
        return view('wallet.wallet')->with('wallets', $wallets);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wallet.addwallet');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'api_name' => ['required', 'string', 'max:255'],
            'user_name' => ['required', 'string', 'max:255'],
            'transaction_type' => ['required', 'string', 'max:255'],
            'circle_name' => ['required', 'string','max:255'],
            'mobile_number' => ['required', 'unique:'.Wallet::class],
        ]);

        $userid = Wallet::orderBy('id','DESC')->pluck('id')->first();
        $username = 2400 . $userid + 1;
        $uservalue = $userid + 1;
        $defaultnovalue = 0;
        $defaultnul = NULL;
        if($request->api_name == "Cyrus"){
            $defaultvalue = 5;
        }
        if($request->api_name == "Kwikapi"){
            $defaultvalue = 6;
        }
        if($request->api_name == "MROBOTICS"){
            $defaultvalue = 13;
        }

        Wallet::create([
            'wallet_id' => $uservalue,
            'parent_id' => rand(1, 20),
            'parent_user_id' => 1,
            'white_label_user_id' => $defaultnovalue,
            'api_id' => $defaultvalue,
            'api_name' => $request->api_name,
            'user_id' => 2,
            'user_name' => $request->user_name,
            'user_1_id' => 0,
            'user_1_name' => $defaultnul,
            'transaction_type' => $request->transaction_type,
            'wallet_type' => $request->wallet_type,
            'cash_credit' => $request->cash_credit,
            'api_old_balance' => $defaultnovalue,
            'api_amount' => $defaultnovalue,
            'api_new_balance' => $defaultnovalue,
            'user_old_balance' => $defaultnovalue,
            'amount_balance' => $defaultnovalue,
            'total_amount' => $defaultnovalue,
            'transaction_details' => 'MESSAGE',
            'transaction_date' => date('Y-m-d'),
            'month_year' => date('m-y'),
            'provider_id' => 1,
            'provider_name' => 'Airtel',
            'provider_type' => 'Prepaid',
            'circle_id' => 20,
            'circle_name' => $request->circle_name,
            'mobile_number' => $request->mobile_number,
            'status' => 'Success',
            'disputed' => 'No',
            'ref_number' => 1234567890,
            'api_number' => 'CY68BDC540C4',
            'opid' => '375239996',
            'comment' => 'Credit Update',
            'api_response' => '{"ApiTransID":"CYD128027080","Status":"Pending","ErrorMessage":"recharge request was accepted.","OperatorRef":"","TransactionDate":"3/3/2024 5:36:38 PM"}',
            'commission_rt' => 0.1,
            'total_commission' => 1.55,
            'commission_earned' => 1.8258,
            'gst' => $defaultnovalue,
            'tds' => $defaultnovalue,
            'recharge_path' => 'Web',
            'recharge_url' => 'https://cyrusrecharge.in/api/recharge.aspx?memberid=AP194175&pin=A744224FB9&number=9944468488&operator=AT&circle=20&amount=10&usertx=11228741980&format=json',
            'ip_address' => $_SERVER['REMOTE_ADDR'],
            'response_url' => $defaultnul,
            'call_back_status' => $defaultnovalue,
            'api_call_back_response' => $defaultnul,
            'send_type' => $defaultnul,
            'is_active' => 1,
        ]);

        return redirect('/wallet');
    }

    /**
     * Display the specified resource.
     */
    public function show(wallet $wallet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(wallet $wallet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, wallet $wallet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(wallet $wallet)
    {
        //
    }
}
