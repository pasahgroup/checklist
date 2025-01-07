<?php

namespace App\Http\Controllers;

use App\Models\dbconnect;
use App\Http\Requests\StoredbconnectRequest;
use App\Http\Requests\UpdatedbconnectRequest;

class DbconnectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredbconnectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredbconnectRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dbconnect  $dbconnect
     * @return \Illuminate\Http\Response
     */
    public function show(dbconnect $dbconnect)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dbconnect  $dbconnect
     * @return \Illuminate\Http\Response
     */
    public function edit(dbconnect $dbconnect)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedbconnectRequest  $request
     * @param  \App\Models\dbconnect  $dbconnect
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedbconnectRequest $request, dbconnect $dbconnect)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dbconnect  $dbconnect
     * @return \Illuminate\Http\Response
     */
    public function destroy(dbconnect $dbconnect)
    {
        //
    }
}
