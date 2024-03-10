<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('members.users')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.addmember');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_type' => ['required', 'string', 'max:255'],
            'plan_id' => ['required', 'integer', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $userid = User::orderBy('id','DESC')->pluck('id')->first();
        $username = 2400 . $userid + 1;
        $uservalue = $userid + 1;
        $defaultnovalue = 0;
        $defaultnul = NULL;

        User::create([
            'user_id' => $uservalue,
            'parent_id' => 1,
            'white_label_id' => $defaultnovalue,
            'user_type' => $request->user_type,
            'plan_id' => $request->plan_id,
            'user_name' => $username,
            'name' => $request->name,
            'dob' => date('Y-m-d'),
            'mobile' => $request->mobile,
            'mobile_1' => $defaultnul,
            'otp' => rand(1000, 10000),
            'mobile_otp' => rand(1000, 10000),
            'email_otp' => rand(1000, 10000),
            'login_ip' => $_SERVER['REMOTE_ADDR'],
            'last_login' => date('Y-m-d'),
            'pincode' => $request->pincode,
            'district' => $request->district,
            'state' => $request->state,
            'user_address' => $request->user_address,
            'amount_balance' => $defaultnovalue,
            'commission_amount' => $defaultnovalue,
            'credit_amount' => $defaultnovalue,
            'credit_limit' => $defaultnovalue,
            'profile_pic' => $request->profile_pic,
            'kyc_id' => rand(1000, 10000),
            'gst_no' => $request->gst_no,
            'pancard' => $request->pancard,
            'adhaar_card' => $request->adhaar_card,
            'company_name' => $request->company_name,
            'route' => $defaultnovalue,
            'commission' => $defaultnovalue,
            'force_logout' => $defaultnovalue,
            'uuid' => $defaultnovalue,
            'kyc_date' => date('Y-m-d'),
            'kyc_modal' => $defaultnul,
            'multi_api' => 'No',
            'is_active' => 1,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/members');
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
