<?php

namespace App\Http\Controllers;

use App\Models\recharges;
use App\Models\providercode;
use App\Models\service_circles;
use Illuminate\Http\Request;

class RechargesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recharges = recharges::get();
        return view('recharges.recharges')->with('recharges', $recharges);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $api = providercode::where('api_name','=','Cyrus')->get();
        $circle = service_circles::get();
        return view('recharges.addrecharge')->with('api',$api)->with('circle',$circle);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mobileno' => ['required', 'string', 'max:255'],
            'service_provider' => ['required', 'string', 'max:255'],
            'circlecode' => ['required', 'string', 'max:255'],
            'service' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'string', 'max:255'],
        ]);

        $userid = recharges::orderBy('id','DESC')->pluck('id')->first();
        $uservalue = 1;
        if($request->api_name == "MROBOTICS"){
            $defaultnovalue = 13;
        }
        if($request->api_name == "Kwikapi"){
            $defaultnovalue = 6;
        }

        $servicename = providercode::where('provider_id','=',$request->service_provider)->pluck('provider')->first(); 
        
        $circlename = service_circles::where('service_circle_id','=',$request->circlecode)->pluck('circle_name')->first(); 

        recharges::create([
            'recharge_id' => $uservalue,
            'date' => date("d-m-y h:i:s"),
            'service_id' => 1,
            'service' => $request->service,
            'mobileno' => $request->mobileno,
            'service_provider_id' => $request->service_provider,
            'service_provider' => $servicename,
            'circlecode_id' => $request->circlecode,
            'circlecode' => $circlename,
            'amount' => $request->amount,
            'is_active' => 1,
        ]);

        return redirect('/recharges');
    }

    /**
     * Display the specified resource.
     */
    public function show(recharges $recharges)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(recharges $recharges)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, recharges $recharges)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(recharges $recharges)
    {
        //
    }
}
