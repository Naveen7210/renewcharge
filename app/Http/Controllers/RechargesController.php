<?php

namespace App\Http\Controllers;

use App\Models\apiwallet;
use App\Models\recharges;
use App\Models\providercode;
use App\Models\providers;
use App\Models\circle_codes;
use App\Models\Wallet;
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
        $api = providers::where('service', '=', 1)->get();
        $circle = circle_codes::where('api_id', '=', 1)->where('service_id', '=', 1)->get();
        $api = providers::where('service', '=', 1)->get();
        $circle = circle_codes::where('api_id', '=', 1)->where('service_id', '=', 1)->get();
        return view('recharges.addrecharge')->with('api', $api)->with('circle', $circle);
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
        //return response()->json($request);
        if ($request->service == "Prepaid") {
            $servicenovalue = 1;
        }
        if ($request->service == "Postpaid") {
            $servicenovalue = 2;
        }
        if ($request->service == "DTH") {
            $servicenovalue = 3;
        }


        $plantype = "Recharge";
        $authorid = auth()->user()->user_id;

        $findapiid = providers::where('providerid', '=', $request->service_provider)->where('service', '=', $servicenovalue)->pluck('api_id')->first();

        $findapiname = providers::where('providerid', '=', $request->service_provider)->where('service', '=', $servicenovalue)->pluck('api_name')->first();

        $findapiuser = 'username';

        $findapipass = 'pass';

        $findapikey = 'key';

        $authorip = $_SERVER['REMOTE_ADDR'];

        $all =  "type: " . $plantype . " " . "author: " . $authorid . " " . "apiid: " . $findapiid . " "  . "apiname: " . $findapiname . " "  . "apiuser: " . $findapiuser . " " . "apipassword: " . $findapipass . " "  . "apikey: " . $findapikey . " " . "ip: " . $authorip;


        if (!(empty($plantype) || empty($authorid) || empty($findapiid) || empty($findapiname) || empty($findapiuser) || empty($findapipass) || empty($findapikey) || empty($authorip))) {

            $walletid = Wallet::orderBy('id', 'DESC')->pluck('id')->first();
            $walletidvalue = $walletid + 1;
            if (!(empty($walletid))) {
                $parentvalue = $walletid;
            } else {
                $parentvalue = 1;
            }
            $parentuservalue = auth()->user()->parent_id;
            $whitevalue = 0;
            $useridvalue = auth()->user()->user_id;
            $usernamevalue = auth()->user()->user_name;
            $namevalue = auth()->user()->name;
            $wallettype = 'Wallet';
            $cahtype = 'Cash';
            $providerids = providers::where('providerid', '=', $request->service_provider)->pluck('providerid')->first();
            $provideridvalue = providers::where('providerid', '=', $request->service_provider)->pluck('provider')->first();
            $circleids = $request->circlecode;
            $circlevallue = circle_codes::where('circle_code_id', '=', $circleids)->pluck('circle_code')->first();
            $mobilevalue = $request->mobileno;
            $apppath = 'Web';
            $transdetails = 'Rs.' . ' ' . $request->amount . ' ' . 'Recharge For' . ' ' . $request->mobileno;
            $datetime = date("d-m-y h:i:s");
            $stat = 'Success';
            $disp = 'No';
            $com = 'Credit Update';
            $comear = $request->amount;
            $retaioldamo = wallet::where('user_id', '=', auth()->user()->user_id)->orderBy('id', 'DESC')->pluck('user_new_balance')->first();

            $apiwalamount = apiwallet::orderBy('id', 'DESC')->pluck('api_new_balance')->first();
            if ($request->amount > $retaioldamo) {
                $message = "load amount";
                return $message;
            }

            $usernewbal = $retaioldamo + $request->amount;
            $newapiam = $retaioldamo -  $request->amount;

            Wallet::create([
                'wallet_id' => $walletidvalue,
                'parent_id' => $parentvalue,
                'parent_user_id' => $parentuservalue,
                'white_label_user_id' => $whitevalue,
                'api_id' => $findapiid,
                'api_name' => $findapiname,
                'user_id' => $useridvalue,
                'user_name' => $usernamevalue,
                'user_1_name' => $namevalue,
                'transaction_type' => $plantype,
                'wallet_type' => $wallettype,
                'cash_credit' => $cahtype,
                'provider_id' => $providerids,
                'provider_name' => $provideridvalue,
                'provider_type	' => $request->service,
                'provider_name' => $provideridvalue,
                'circle_id' => $circleids,
                'amount' => $request->amount,
                'circle_name' => $circlevallue,
                'mobile_number' => $mobilevalue,
                'recharge_path' => $apppath,
                'ip_address' => $authorip,
                'api_old_balance' => $apiwalamount,
                'api_amount' => $apiwalamount,
                'api_new_balance' => $apiwalamount,
                'user_old_balance' =>  $retaioldamo,
                'total_amount' => $newapiam,
                'user_new_balance' => $newapiam,
                'transaction_details' => $transdetails,
                'transaction_date' => $datetime,
                'status' => $stat,
                'disputed' => $disp,
                'comment' => $circlevallue,
                'commission_earned' => $comear,
            ]);
            return redirect('/recharges');
        } else {
            $message = "Failed";
            return $message;
        }

        //return $all . response()->json($request);

        $userid = recharges::orderBy('id', 'DESC')->pluck('id')->first();
        $uservalue = 1;
        if ($request->api_name == "MROBOTICS") {
            $defaultnovalue = 13;
        }
        if ($request->api_name == "Kwikapi") {
            $defaultnovalue = 6;
        }


        recharges::create([
            'recharge_id' => $uservalue,
            'date' => date("d-m-y h:i:s"),
            'service_id' => $servicenovalue,
            'service_id' => $servicenovalue,
            'service' => $request->service,
            'mobileno' => $request->mobileno,
            'service_provider_id' => $request->service_provider,
            'service_provider' => $request->service_provider,
            'service_provider' => $request->service_provider,
            'circlecode_id' => $request->circlecode,
            'circlecode' => $request->circlecode,
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
