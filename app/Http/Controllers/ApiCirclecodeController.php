<?php

namespace App\Http\Controllers;

use App\Models\api_circlecode;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
