<?php

namespace App\Http\Controllers;

use App\Models\api;
use App\Models\apiwallet;
use App\Models\User;
use App\Models\wallet;
use Illuminate\Http\Request;

class amountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $amounts = wallet::get();
        return view('loadamount.loadedamount')->with('amounts',$amounts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userdet = User::where('parent_id','=',1)->get();
        return view('loadamount.loadamount')->with('userdet',$userdet);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userdet = $request->user_name;

        $retailerdet = User::where('user_id','=',$userdet)->get();
        $retailerdets = api::get();

        $walletid = Wallet::orderBy('id','DESC')->pluck('id')->first();
        $walletidvalue = $walletid + 1;
        $parentid = $retailerdet[0]->parent_id;
        $userid = $retailerdet[0]->user_id;
        $username = $retailerdet[0]->user_name;
        $user1id = auth()->user()->user_id;
        $user1name = auth()->user()->user_name;
        $transtype = 'Recieve Money';
        $cashcredit = 'Credit';
        $tot = $request->user_new_balance;
        $transdetails = 'Rs.' . ' ' . $tot . ' ' .'Money Recieved From' . ' ' . $user1name;
        $datetime = date("d-m-y h:i:s");
        $stat = 'Success';
        $disp = 'No';
        $com = 'Credit Update';
        $comear = $tot;
        $path = 'Web';
        $ip = $_SERVER['REMOTE_ADDR'];
        $act = 1;
        $sentype = 'admin';

        $retaioldamo = wallet::where('user_id','=',$retailerdet[0]->user_id)->orderBy('id','DESC')->pluck('user_new_balance')->first();
        
        $apiwalamount = apiwallet::orderBy('id','DESC')->get();
        if($tot > $apiwalamount[0]->api_new_balance){
            $message = "load api amount";
            return $message;
        }

        $usernewbal = $retaioldamo + $tot;
        $newapiam = $apiwalamount[0]->api_new_balance -  $tot;
        
        //return $usernewbal;
        Wallet::create([
            'wallet_id' => $walletidvalue,
            'parent_id' => $walletidvalue,
            'parent_user_id' => $parentid,
            'white_label_user_id' => 0,
            'api_id' => 0,
            'api_name' => 0,
            'user_id' => $userid,
            'user_name' => $username,
            'user_1_id' => $user1id,
            'user_1_name' => $user1name,
            'transaction_type' => $transtype,
            'wallet_type' => 'Wallet',
            'cash_credit' => $cashcredit,
            'provider_id' => 0,
            'provider_name' => 0,
            'provider_type	' => 0,
            'provider_name' => 0,
            'circle_id' => 0,  
            'amount' => $tot,
            'recharge_path' => $path,
            'ip_address' => $ip,
            'api_old_balance' => $apiwalamount[0]->api_new_balance,
            'api_amount' => $apiwalamount[0]->api_new_balance,
            'api_new_balance' => $newapiam,
            'user_old_balance' =>  $retaioldamo,
            'total_amount' => $usernewbal,
            'user_new_balance' => $usernewbal,
            'transaction_details' => $transdetails,
            'transaction_date' => $datetime,
            'status' => $stat,
            'disputed' => $disp,
            'comment' => $com,
            'commission_earned' => $comear,
            'send_type' => $sentype,
            'is_active' => $act,

        ]);

        $apiwal = apiwallet::get();

        if(count($apiwal) == 0){
            $amountall = 0;
        }else{
            $apiwalamount = apiwallet::orderBy('id','DESC')->get();
            $amountall = $apiwalamount[0]->api_new_balance;
        }

        $transtype = 'Send Money';
        $cashcredit = 'Debit';
        $newamount = $amountall - $tot;
        $com = 'Debit Update';

        //return $newamount;
        apiwallet::create([
            'api_id' => 0,
            'api_name' => 0,
            'user_id' => $user1id,
            'user_name' => $user1name,
            'transaction_type' => $transtype,
            'wallet_type' => 'Wallet',
            'cash_credit' => $cashcredit,
            'amount' => $tot,
            'recharge_path' => $path,
            'api_old_balance' => $amountall,
            'api_amount' => $tot,
            'api_new_balance' => $newamount,
            'total_amount' => $newamount,
            'transaction_details' => $transdetails,
            'transaction_date' => $datetime,
            'status' => $stat,
            'disputed' => $disp,
            'comment' => $com,
            'commission_earned' => $comear,
            'send_type' => $sentype,
            'is_active' => $act,

        ]);

        return redirect('/loadamount');



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
