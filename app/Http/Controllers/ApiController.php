<?php

namespace App\Http\Controllers;

use App\Models\api;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apiwallets = Api::get();
        return view('apiwallet.apiwallet')->with('apiwallets', $apiwallets);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('apiwallet.addapiwallet');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'api_type' => ['required', 'string', 'max:255'],
            'api_name' => ['required', 'string', 'max:255'],
            'api_username' => ['required', 'string', 'max:255'],
            'api_password' => ['required', 'string'],
        ]);

        $userid = Api::orderBy('id','DESC')->pluck('id')->first();
        $uservalue = $userid + 1;
        $defaultnovalue = 0;

        Api::create([
            'api_id' => $uservalue,
            'user_id' => 0,
            'api_type' => $request->api_type,
            'api_name' => $request->api_name,
            'api_username' => $request->api_username,
            'api_password' => $request->api_password,
            'api_key' => rand(1000, 10000),
            'api_domain' => $_SERVER['REMOTE_ADDR'],
            'api_balance' => $defaultnovalue,
            'security_key' => $defaultnovalue,
            'corporate_id' => $defaultnovalue,
            'md_key' => $defaultnovalue,
            'is_active' => 1,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/apiwallet');
    }

    /**
     * Display the specified resource.
     */
    public function show(api $api)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(api $api)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, api $api)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(api $api)
    {
        //
    }
}
