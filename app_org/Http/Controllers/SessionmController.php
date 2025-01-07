<?php

namespace App\Http\Controllers;

use App\Models\sessionm;
use App\Http\Controllers\Controller;
// use App\Http\Requests\Request;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatesessionmRequest;

class SessionmController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessionms = sessionm::get();
        //dd($sessionms);
        return view('admin.settings.sessions.sessionm',compact('sessionms'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      // $stringx=str_replace(' ', '-',request('session'));
       $stringx = preg_replace('/\s+/', '-', request('session'));
       // dd($stringx);
           $stock = sessionm::create(
            [
                'session_name'=>$stringx,
                'status'=>'Active',
                'user_id'=>auth()->id()
            ]);          
            return redirect()->back()->with('success','Session Registered successfly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(sessionm $role,$id)
    {
          $stringx = preg_replace('/\s+/', '-', request('session'));
          $roles = sessionm::where('id',$id)
               ->update([
                'session_name'=>$stringx,
                'status'=>"Inactive",
                 'user_id'=>auth()->id()

              ]);
       return redirect()->back()->with('success','Role deleted successfly');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        //dd('ss');
        $stringx = preg_replace('/\s+/', '-', request('session'));
            $sessionm = sessionm::where('id',$id)->first();
        if($sessionm){
           $sessionm->update([
           'session_name'=>$stringx,
            'status'=>request('status')
           ]);
           return redirect()->back()->with('success','Session updated successfully');
        }
        else{
            return redirect()->back()->with('error','Something went wrong with this Role');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */



    public function destroy($id)
    {
     //
       // dd('dssd');
        $section = sessionm::where('id',$id)->first();
        if($section){
            $section->delete();
            return redirect()->back()->with('success','Session permanent deleted successfully');
        }
        else{
            return redirect()->back()->with('error','Something went wrong with this Role');
        }
    }

  public function recoveryUpdate(role $role,$id)
    {
          $roles = role::where('id',$id)
               ->update([
                'status'=>"Active",
                 'user_id'=>auth()->id()

              ]);
       return redirect()->back()->with('success','Role recoveried successfly');
    }


   // public function recovery()
   //  {
   //     $roles = role::where('status','Inactive')->get();
   //      return view('admin.settings.recovery.recoveryRole',compact('roles'));
   //  }
}
