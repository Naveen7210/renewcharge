<?php

namespace App\Http\Controllers;

use App\Models\service_types;
use Illuminate\Http\Request;

class ServiceTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicetypes = service_types::get();
        return view('servicetype.servicetype')->with('servicetypes', $servicetypes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servicetype.addservicetype');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'servicetype' => ['required', 'string', 'max:255'],
            'apiname' => ['required', 'string', 'max:255'],
        ]);

        $userid = service_types::orderBy('id','DESC')->pluck('id')->first();
        $uservalue = $userid + 1;

        $servicetypeidvalue = service_types::orderBy('servicetype_id','DESC')->pluck('id')->first();
        $servicetypeid = $servicetypeidvalue + 1;

        $servicenameidvalue = service_types::orderBy('apiname_id','DESC')->pluck('id')->first();
        $servicenameid =  $servicenameidvalue +  1;

        service_types::create([
            'service_type_id' => $uservalue,
            'servicetype_id' => $servicetypeid,
            'servicetype' => $request->servicetype,
            'apiname' => $request->apiname,
            'apiname_id' => $servicenameid,
            'is_active' => 1,
        ]);

        return redirect('/servicetype');
    }

    /**
     * Display the specified resource.
     */
    public function show(service_types $service_types)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(service_types $service_types)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, service_types $service_types)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(service_types $service_types)
    {
        //
    }
}
