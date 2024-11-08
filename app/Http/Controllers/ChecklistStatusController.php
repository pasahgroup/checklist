<?php

namespace App\Http\Controllers;

use App\Models\checklistStatus;
use App\Http\Requests\StorechecklistStatusRequest;
use App\Http\Requests\UpdatechecklistStatusRequest;

class ChecklistStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // dd('passed');
         $grader = checklistStatus::find(20);
       //$grader->grade = $request->ids;
       $grader->grade =78;
       $grader->save();
    }


public function updateGraderStatus(Request $request)
{

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
     * @param  \App\Http\Requests\StorechecklistStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorechecklistStatusRequest $request)
    {
        dd('passed');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\checklistStatus  $checklistStatus
     * @return \Illuminate\Http\Response
     */
    public function show(checklistStatus $checklistStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\checklistStatus  $checklistStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(checklistStatus $checklistStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatechecklistStatusRequest  $request
     * @param  \App\Models\checklistStatus  $checklistStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatechecklistStatusRequest $request, checklistStatus $checklistStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\checklistStatus  $checklistStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(checklistStatus $checklistStatus)
    {
        //
    }
}
