<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\sessionm;
use App\Models\metaname;

use App\Models\qnsAppliedto;
use App\Models\setIndicator;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $departments = department::where('status','Active')->get();
        return view('admin.settings.departments.department',compact('departments'));
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
           $stock = department::create(
            [
                'department_name'=>request('department_name'),
                'unit_name'=>request('unit_name'),
                 'status'=>'Active',
                'user_id'=>auth()->id()
            ]
            );
            return redirect()->back()->with('success','stock created successfly');
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
    public function edit(department $department,$id)
    {
          $departments = department::where('id',$id)
               ->update([
                'status'=>"Inactive",
                 'user_id'=>auth()->id()

              ]);
       return redirect()->back()->with('success','Department deleted successfly');
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
       // dd('dddd');
            $department = department::where('id',$id)->first();
        if($department){
           $department->update([
            'department_name'=>request('department_name'),
             'unit_name'=>request('unit_name'),
             'user_id'=>auth()->id()
           ]);
           return redirect()->back()->with('success','Department updated successfully');
        }
        else{
            return redirect()->back()->with('error','Something went wrong with this Department');
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
        $department = department::where('id',$id)->first();
        if($department){
            $department->delete();
            return redirect()->back()->with('success','Department permanent deleted successfully');
        }
        else{
            return redirect()->back()->with('error','Something went wrong with this Department');
        }
    }

  public function recoveryUpdate(department $department,$id)
    {
          $departments = department::where('id',$id)
               ->update([
                'status'=>"Active",
                 'user_id'=>auth()->id()

              ]);
       return redirect()->back()->with('success','Department recoveried successfly');
    }


   public function recovery()
    {
       $departments = department::where('status','Inactive')->get();
        return view('admin.settings.recovery.recoveryDepartment',compact('departments'));
    }
//update qns applied //
public function qnsapplied()
{
   $qnsapplied = qnsAppliedto::join('metanames','metanames.id','qns_appliedtos.metaname_id')
   ->join('set_indicators','set_indicators.id','qns_appliedtos.indicator_id')
   // ->leftjoin
   // ->join('departments','departments.id','qns_appliedtos.department_id')
 //->join('departments','departments.id','qns_appliedtos.department_id')
   ->where('qns_appliedtos.section','!=','Active')
   //->where('qns_appliedtos.status','Active')
   ->orderBy('metanames.metaname_name')
   ->select('qns_appliedtos.id','metanames.metaname_name','set_indicators.qns','qns_appliedtos.section','qns_appliedtos.department_id','qns_appliedtos.unit_name','set_indicators.duration','qns_appliedtos.status')
   ->get();

    $departments = department::where('status','Active')->get();
    $metanames = metaname::where('status','Active')->get();  
    $sessionms = sessionm::where('status','Active')->get();     
   //dd($sectionms);
    return view('admin.settings.qnsapplied.qnsapplied',compact('qnsapplied','departments','metanames','sessionms'));
}

 public function qnsUpdate(department $department,$id)
  {
    //dd('update');
 $department = department::where('id',request('department_name'))->first();
// dd(request('department_name'));
    $qnsApplied = qnsAppliedto::where('id',$id)
         ->update([
          'department_id'=>request('department_name'),
          'unit_name'=>$department->unit_name, 
           'status'=>request('status'),         
           'user_id'=>auth()->id()
        ]);


 $qnss = qnsAppliedto::where('id',$id)->first();
 //dd($id);
            $setIndicatord = setIndicator::where('id',$qnss->indicator_id)
         ->update([
          'qns'=>request('qns'),
          'duration'=>request('duration')          
        ]);

     return redirect()->back()->with('success','Question applied successfly');
  }

}
