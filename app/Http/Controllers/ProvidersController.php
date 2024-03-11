<?php

namespace App\Http\Controllers;

use App\Models\providers;
use Illuminate\Http\Request;

class ProvidersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $providers = providers::get();
        return view('providers.providers')->with('providers', $providers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('providers.addproviders');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'service' => ['required', 'string', 'max:255'],
            'provider' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'logo' => ['required'],
        ]);

        $userid = providers::orderBy('id','DESC')->pluck('id')->first();
        $uservalue = 1;
        if($request->api_name == "MROBOTICS"){
            $defaultnovalue = 13;
        }
        if($request->api_name == "Cyrus"){
            $defaultnovalue = 5;
        }
        if($request->api_name == "Kwikapi"){
            $defaultnovalue = 6;
        }

        providers::create([
            'provider_id' => $uservalue,
            'service_id' => 1,
            'service' => $request->service,
            'provider' => $request->api_name,
            'state' => $request->state,
            'logo' => $request->logo,
            'api_id' => $defaultnovalue,
            'api_name' => $request->api_name,
            'commission_amount' => 0,
            'commission_percentage' => 0,
            'is_active' => 1,
        ]);

        return redirect('/providers');
    }

    /**
     * Display the specified resource.
     */
    public function show(providers $providers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(providers $providers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, providers $providers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(providers $providers)
    {
        //
    }
}
