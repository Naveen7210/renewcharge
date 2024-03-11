<?php

namespace App\Http\Controllers;

use App\Models\providercode;
use Illuminate\Http\Request;

class ProvidercodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $providercodes = providercode::get();
        return view('providercode.providercode')->with('providercodes', $providercodes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('providercode.addprovidercode');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'api_name' => ['required', 'string', 'max:255'],
            'provider' => ['required', 'string', 'max:255'],
        ]);

        $userid = providercode::orderBy('id','DESC')->pluck('id')->first();
        $uservalue = $userid + 1;
        if($request->api_name == "MROBOTICS"){
            $defaultnovalue = 13;
        }
        if($request->api_name == "Cyrus"){
            $defaultnovalue = 5;
        }
        if($request->api_name == "Kwikapi"){
            $defaultnovalue = 6;
        }

        providercode::create([
            'api_provider_code_id' => $uservalue,
            'api_id' => $defaultnovalue,
            'api_name' => $request->api_name,
            'provider_id' => 10,
            'provider' => $request->provider,
            'provider_code' => 2,
            'is_active' => 1,
        ]);

        return redirect('/providercode');
    }

    /**
     * Display the specified resource.
     */
    public function show(providercode $providercode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(providercode $providercode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, providercode $providercode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(providercode $providercode)
    {
        //
    }
}
