<?php

namespace App\Http\Controllers;

use App\Models\circle_codes;
use App\Models\service_providers;
use App\Models\providers;
use App\Models\service_types;
use App\Models\api;
use Illuminate\Http\Request;

class CircleCodesController extends Controller
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
        $codes = circle_codes::get();
        return view('circlecodes.circlecode')->with('apis', $apis)->with('providers', $providers)->with('servicetype', $servicetype)->with('serviceprovider', $serviceprovider)->with('codes', $codes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $apis = api::get();
        $providers = providers::get();
        $providerid = service_providers::get();
        $servicetype = service_types::get();
        return view('circlecodes.addcirclecode')->with('apis', $apis)->with('providers', $providers)->with('servicetype', $servicetype)->with('providerid', $providerid);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'circle_code' => ['required', 'string', 'max:255'],
            'service_id' => ['required', 'string', 'max:255'],
            'provider_id' => ['required', 'string', 'max:255'],
            'circle_code_id' => ['required'],
        ]);

        $userid = circle_codes::orderBy('id','DESC')->pluck('id')->first();
        $uservalue = $userid + 1;

        circle_codes::create([
            'circlecode_id' => $uservalue,
            'api_id' => $request->api_id,
            'service_id' => $request->service_id,
            'provider_id' => $request->provider_id,
            'sp_code_id' => $uservalue,
            'circle_code_id' => $request->circle_code_id,
            'circle_code' => $request->circle_code,
            'is_active' => 1,
        ]);

        return redirect('/circlecodes');
    }

    /**
     * Display the specified resource.
     */
    public function show(circle_codes $circle_codes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(circle_codes $circle_codes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, circle_codes $circle_codes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(circle_codes $circle_codes)
    {
        //
    }
}
