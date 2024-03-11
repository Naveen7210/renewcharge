<?php

namespace App\Http\Controllers;

use App\Models\apiroutes;
use Illuminate\Http\Request;

class ApiroutesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apiroutes = apiroutes::get();
        return view('apiroutes.apiroutes')->with('apiroutes', $apiroutes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('apiroutes.addapiroutes');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'route_type' => ['required', 'string', 'max:255'],
            'api_1_name' => ['required', 'string', 'max:255'],
            'api_2_name' => ['required', 'string', 'max:255'],
            'api_3_name' => ['required', 'string', 'max:255'],
        ]);

        $userid = apiroutes::orderBy('id','DESC')->pluck('id')->first();
        $uservalue = 1;
        if($request->api_name == "MROBOTICS"){
            $defaultnovalue = 13;
        }
        if($request->api_name == "Kwikapi"){
            $defaultnovalue = 6;
        }

        apiroutes::create([
            'route_id' => $uservalue,
            'route_type' => $request->api_name,
            'api_1_name' => $request->api_1_name,
            'api_2_name' => $request->api_2_name,
            'api_3_name' => $request->api_3_name,
            'priority' => rand(1, 10),
            'is_active' => 1,
        ]);

        return redirect('/apiroutes');
    }

    /**
     * Display the specified resource.
     */
    public function show(apiroutes $apiroutes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(apiroutes $apiroutes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, apiroutes $apiroutes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(apiroutes $apiroutes)
    {
        //
    }
}
