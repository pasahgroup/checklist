<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use App\Models\metanameDatatype;
use App\Models\datatype;
use App\Models\setIndicator;
use App\Models\optionalAnswer;
use Illuminate\Http\Request;
use DB;

class MetadataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $metadatas = metadata::where('status','Active')
          ->orWhere('status','Stop')
          ->get();
          $datatypes = datatype::get();
    //dd($metadatas);
        return view('admin.settings.metadata.metadata',compact('metadatas','datatypes'));
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

 public function riqDatatype()
    {
          $riqs = optionalAnswer::join('set_indicators','set_indicators.id','optional_answers.indicator_id')
          // ->where('set_indicators.status','InActive')
          ->groupby('optional_answers.indicator_id')
          ->select('set_indicators.id','set_indicators.qns','optional_answers.datatype','optional_answers.indicator_id','optional_answers.status')
          ->get();
          //->unique('optional_answers.indicator_id');;
          $datatypes = datatype::get();
    //dd($riqs);
        return view('admin.settings.riq.riq-datatype',compact('riqs','datatypes'));
    }

 public function updateDatatype(Request $request,$id)
    {
         $setIndicator = setIndicator::where('id',$id)
               ->update([
                'qns'=>request('qn_name'),
                'status'=>request('riq_status'),
                 'user_id'=>auth()->id()
              ]);

            $setIndicator=optionalAnswer::where('indicator_id',$id)
               ->update([
                'datatype'=>request('datatype'),
                'status'=>request('riq_status'),
                 'user_id'=>auth()->id()
              ]);
       return redirect()->back()->with('success','Updated successfly');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
              $stock = metadata::UpdateOrCreate(
            [
                'metadata_name'=>request('metadata_name'),
                'datatype'=>request('datatype'),
            ],[
                'status'=>'Active',
                'user_id'=>auth()->id()
            ]
            );
            return redirect()->back()->with('success','Metadata created successfly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\metadata  $metadata
     * @return \Illuminate\Http\Response
     */
    public function show(metadata $metadata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\metadata  $metadata
     * @return \Illuminate\Http\Response
     */
    public function edit(metadata $metadata,$id)
    {
         $metadatas = metadata::where('id',$id)
               ->update([
                'status'=>"Inactive",
                 'user_id'=>auth()->id()
              ]);
       return redirect()->back()->with('success','Metadata deleted successfly');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\metadata  $metadata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
    $metadata = metadata::where('id',$id)->first();
    //$metadataType=request('metadata_name');
$metaName=$metadata->metadata_name;

        if($metadata){
           $metadata->update([
            'metadata_name'=>request('metadata_name'),
             'datatype'=>request('datatype'),
             'user_id'=>auth()->id()
           ]);
           //update metadata datatypes
           //dd('dfdf');
           //$metanameDatatypeTableUpdate=DB::statement("update metaname_datatypes set metadata_name='.$metadataType.' where metadata_name='$metadata->metadata_name'");
           //
//dd($metaName);
           $metanameDatatypeTableUpdate =metanameDatatype::where('metadata_name',$metaName)
                ->update([
                 'metadata_name'=>request('metadata_name'),
                  'user_id'=>auth()->id()
               ]);

           return redirect()->back()->with('success','Metadata updated successfully');
        }
        else{
            return redirect()->back()->with('error','Something went wrong with this Metadata');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\metadata  $metadata
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $metadata = metadata::where('id',$id)->first();
        if($metadata){
            $metadata->delete();
            return redirect()->back()->with('success','Metadata permanent deleted successfully');
        }
        else{
            return redirect()->back()->with('error','Something went wrong with this Metadata');
        }
    }

  public function recoveryUpdate(metadata $department,$id)
    {
          $departments = metadata::where('id',$id)
               ->update([
                'status'=>"Active",
                 'user_id'=>auth()->id()

              ]);
       return redirect()->back()->with('success','Metadata recoveried successfly');
    }


   public function recovery()
    {
       $metadatas = metadata::where('status','Inactive')->get();
          $datatypes = datatype::get();
        return view('admin.settings.recovery.recoveryMetadata',compact('metadatas','datatypes'));
    }
}
