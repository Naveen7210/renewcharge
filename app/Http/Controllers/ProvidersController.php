<?php

namespace App\Http\Controllers;

use App\Models\providers;
use Illuminate\Http\Request;
use App\Models\service_types;

class ProvidersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $providers = providers::get();
        $servicetype = service_types::get();
        return view('providers.providers')->with('providers', $providers)->with('servicetype', $servicetype);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $servicesid = service_types::get();
        return view('providers.addproviders')->with('servicesid',$servicesid);
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

        $filename = $request->file('logo')->getClientOriginalName();
        $path = $request->file('logo')->storeAs('images',$filename,'public');
        $requestData["logo"] = '/storage/'.$path;

        providers::create([
            'provider_id' => $uservalue,
            'service_id' => $uservalue,
            'service' => $request->service,
            'provider' => $request->provider,
            'state' => $request->state,
            'logo' => $requestData["logo"],
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
