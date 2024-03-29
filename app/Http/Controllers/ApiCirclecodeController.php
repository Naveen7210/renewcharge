<?php

namespace App\Http\Controllers;

use App\Models\api_circlecode;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ApiCirclecodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apicircles = api_circlecode::get();
        return view('apicircle.apicircle')->with('apicircles', $apicircles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('apicircle.addapicircle');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'api_name' => ['required', 'string', 'max:255'],
            'circle_name' => ['required', 'string', 'max:255'],
        ]);

        $userid = api_circlecode::orderBy('id','DESC')->pluck('id')->first();
        $uservalue = $userid + 1;
        if($request->api_name == "Cyrus"){
            $defaultnovalue = 5;
        }
        if($request->api_name == "Kwikapi"){
            $defaultnovalue = 6;    
        }

        api_circlecode::create([
            'api_circle_code_id' => $uservalue,
            'api_id' => $defaultnovalue,
            'api_name' => $request->api_name,
            'service_circle_id' => 2,
            'circle_name' => $request->circle_name,
            'circle_code' => 30,
            'is_active' => 1,
        ]);

        return redirect('/apicircle');
    }

    /**
     * Display the specified resource.
     */
    public function show(api_circlecode $api_circlecode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(api_circlecode $api_circlecode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, api_circlecode $api_circlecode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(api_circlecode $api_circlecode)
    {
        //
    }
}
