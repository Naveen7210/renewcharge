<?php

namespace App\Http\Controllers;

use App\Models\service_providers;
use App\Models\providers;
use App\Models\service_types;
use App\Models\api;
use Illuminate\Http\Request;

class ServiceProvidersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apis = api::get();
        $providers = providers::get();
        $servicetype = service_types::get();
        $serviceprovider = service_providers::get();
        return view('serviceproviders.serviceprovider')->with('apis', $apis)->with('providers', $providers)->with('servicetype', $servicetype)->with('serviceprovider', $serviceprovider);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $apis = api::get();
        $providers = providers::get();
        $servicetype = service_types::get();
        return view('serviceproviders.addserviceprovider')->with('apis', $apis)->with('providers', $providers)->with('servicetype', $servicetype);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'api_id' => ['required', 'string', 'max:255'],
            'service_id' => ['required', 'string', 'max:255'],
            'provider_id' => ['required', 'string', 'max:255'],
            'sp_code' => ['required'],
        ]);

        $userid = service_providers::orderBy('id','DESC')->pluck('id')->first();
        $uservalue = 1;

        service_providers::create([
            'service_provider_id' => $uservalue,
            'api_id' => $request->api_id,
            'service_id' => $request->service_id,
            'provider_id' => $request->provider_id,
            'sp_code_id' => $uservalue,
            'sp_code' => $request->sp_code,
            'is_active' => 1,
        ]);

        return redirect('/serviceproviders');
    }

    /**
     * Display the specified resource.
     */
    public function show(service_providers $service_providers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(service_providers $service_providers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, service_providers $service_providers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(service_providers $service_providers)
    {
        //
    }
}
