<?php

namespace App\Http\Livewire;


 use App\Models\orderItem;
 use App\Models\property;

use App\Models\metadata;
use App\Models\metanameDatatype;
use App\Models\asset;
use App\Models\department;
use App\Models\metaname;

use App\Models\sessionm;

use App\Models\setIndicator;
use App\Models\qnsAppliedto;

use App\Models\optionalAnswer;
use Livewire\Component;
use Illuminate\Http\Request;

class AssignLivewire extends Component
{

  public $departments = "";
  public $post;
  public $message = "";
  public $pos_id = [];
  public $metaname_id;
  public $site_id;
  public $names=[];
  public $properties;

       public $qnType;
        public $times;
        public $qnNo;
           public $qn_no;
           //public $dep;

public function store(Request $request)
    {

 $metaname= request('metaname');
  $depart= request('depart');
 $indicators = request('indicators');

 $unit = department::where('id',$depart)->first();

//dd($unit->unit_name);

 if($indicators ==null)
     {
return redirect()->back()->with('error','Indicators not selected');
     }

   if($metaname !=null)
     {
      // {{$indicators}}
   $section = request('section');
    foreach ($indicators as $indicator) {  
    
    //dd($section);
    $appliedto = qnsAppliedto::UpdateOrCreate([
        'metaname_id'=>$metaname,
        'indicator_id'=>$indicator,   
        'section'=>$section,
    ],
        [            
       'department_id'=>request('depart'),
       'unit_name'=>$unit->unit_name,
        'status'=>'Active',
        'user_id'=>auth()->id()
        ]);

        }
     }
     else
     {
      return redirect()->back()->with('error','Metanames not selected');
     }
//
//   }
   return redirect()->back()->with('success','Indicators Assigned Successfully');
    }



    public function render(Request $request)
    {
     $pos_id=$this->metaname_id;
     $qnType=$this->qnType;
     $times=$this->qnNo;
    $qn_no=$this->qn_no;


                $properties = property::get();
                $metanames = metaname::where('status','Active')->get();
                $deps= department::where('status','Active')->get();

                  $indicators = setIndicator::where('qns','!=',"")
                  ->get();
              //dd($dep);
            $metadatas = metanameDatatype::where('metaname_id',$this->metaname_id)->get();

            //dd($metanames);
             $sessions = sessionm::get();
      return view('livewire.assign-indicator',compact('metadatas','metanames','properties','indicators','deps','sessions'))
      ->layout('layouts.app');
  }
}
