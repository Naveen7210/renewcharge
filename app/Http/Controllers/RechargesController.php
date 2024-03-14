<?php

namespace App\Http\Controllers;

use App\Models\recharges;
use App\Models\providercode;
use App\Models\providers;
use App\Models\circle_codes;
use App\Models\service_types;
use GuzzleHttp\Psr7\Response;
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
        $api = providers::where('service','=',1)->get();
        $circle = circle_codes::where('api_id','=',1)->where('service_id','=',1)->get();
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
        return response()->json($request);
        if($request->service == "Prepaid"){
            $servicenovalue = 1;
        }
        if($request->service == "Postpaid"){
            $servicenovalue = 2;
        }
        if($request->service == "DTH"){
            $servicenovalue = 3;
        }

        $plantype = "Recharge";
        $authorid = auth()->user()->user_id;

        $findapiid = providers::where('provider_id','=',$request->service_provider)->where('service_id','=',$servicenovalue)->pluck('api_id')->first();

        $findapiname = providers::where('provider_id','=',$request->service_provider)->where('service_id','=',$servicenovalue)->pluck('api_name')->first();

        $findapiuser = 'username';

        $findapipass = 'pass';

        $findapikey = 'key';

        $authorip = $_SERVER['REMOTE_ADDR'];


        return $authorip;




        $userid = recharges::orderBy('id','DESC')->pluck('id')->first();
        $uservalue = 1;
        if($request->api_name == "MROBOTICS"){
            $defaultnovalue = 13;
        }
        if($request->api_name == "Kwikapi"){
            $defaultnovalue = 6;
        }


        recharges::create([
            'recharge_id' => $uservalue,
            'date' => date("d-m-y h:i:s"),
            'service_id' => $servicenovalue,
            'service' => $request->service,
            'mobileno' => $request->mobileno,
            'service_provider_id' => $request->service_provider,
            'service_provider' => $request->service_provider,
            'circlecode_id' => $request->circlecode,
            'circlecode' => $request->circlecode,
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
