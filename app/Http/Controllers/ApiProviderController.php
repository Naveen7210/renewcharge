<?php

namespace App\Http\Controllers;

use App\Models\api_provider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ApiProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apiproviders = api_provider::get();
        return view('apiprovider.apiprovider')->with('apiproviders', $apiproviders);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('apiprovider.addapiprovider');
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

        $userid = api_provider::orderBy('id','DESC')->pluck('id')->first();
        $uservalue = 1;
        if($request->api_name == "MROBOTICS"){
            $defaultnovalue = 13;
        }
        if($request->api_name == "Kwikapi"){
            $defaultnovalue = 6;
        }

        api_provider::create([
            'api_provider_id' => $uservalue,
            'api_id' => $defaultnovalue,
            'api_name' => $request->api_name,
            'provider_id' => 10,
            'provider' => $request->provider,
            'commission_amount' => 0,
            'commission_percentage' => 2,
            'is_active' => 1,
        ]);

        return redirect('/apiprovider');
    }

    /**
     * Display the specified resource.
     */
    public function show(api_provider $api_provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(api_provider $api_provider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, api_provider $api_provider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(api_provider $api_provider)
    {
        //
    }
}
