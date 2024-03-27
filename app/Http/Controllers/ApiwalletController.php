<?php

namespace App\Http\Controllers;

use App\Models\api;
use App\Models\apiwallet;
use App\Models\User;
use App\Models\wallet;
use Illuminate\Http\Request;

class ApiwalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $amounts = apiwallet::get();
        return view('loadapiwallet.loadedapi')->with('amounts',$amounts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userdet = api::get();
        return view('loadapiwallet.loadapi')->with('userdet',$userdet);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userdet = $request->user_name;

        $retailerdet = User::where('user_id','=',$userdet)->get();
        $retailerdets = api::get();
        $apiwal = apiwallet::get();

        if(count($apiwal) == 0){
            $amountall = 0;
        }else{
            $apiwalamount = apiwallet::orderBy('id','DESC')->get();
            $amountall = $apiwalamount[0]->api_new_balance;
        }

        //return $retailerdets;

        $user1id = auth()->user()->user_id;
        $user1name = auth()->user()->user_name;
        $transtype = 'Recieve Money';
        $cashcredit = 'Cash';
        $tot = $request->amount;
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
        $newamount = $amountall + $tot;

        apiwallet::create([
            'api_id' => $request->api_name,
            'api_name' => $retailerdets[0]->api_name,
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
