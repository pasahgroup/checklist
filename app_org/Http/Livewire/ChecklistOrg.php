<?php

namespace App\Http\Livewire;
 use App\Models\orderItem;
 use App\Models\asset;

use App\Models\metadata;
use App\Models\metanameDatatype;
use App\Models\Property;
use App\Models\metaname;
use App\Models\datatype;
use Carbon\Carbon;
use App\Models\setIndicator;
use App\Models\qnsAppliedto;

use App\Models\answer;
use App\Models\answerCheckBox;

use App\Models\userActivity;
use App\Models\activityRole;
use App\Models\userRole;

use App\Models\departmentRole;
use App\Models\user;

use App\Models\answerUpdatePhoto;
use App\Models\answerDescPhoto;

use App\Models\dynamicIndUpdate;
use App\Models\optionalAnswer;
use Livewire\Component;
use DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashChecklist extends Component
{
      public $departments = "";
      public $post;
      public $message = "";
      public $act = [];
      public $indicator_id;

  public $metaname_id;
  public $site_id;
  public $names=[];
  public $ids=[];
  public $desc=[];
  public $prop=[];
  public $attachment=[];

 public $properties;
 public $rad=[];
 public $qnID;
 public $metavv;
public $metaValue;

  public $qnType;
  public $times;
  public $qnNo;
  public $qn_no;
  public $tstatus;
  public $propArray=[];

public function store(Request $request)
    {
 $rad=$this->rad;

    $aID = request("aID");
    $qnAID = request("qnAID");
    $indexs = request('index');
  $sections = request('section_name');

//dd($sections);

     $idsf='ids'.$aID;
     $ids = $idsf;
     $ids = request($ids);
//dd($idsf);

$data = $request->except(['_token','_method','qnID','qnAID','aID','col','prop']);
$idxf='idx'.$aID;
//dd($data);
// dd($idxf);
foreach ($data as $key => $value) {
   //dd($value);
if (str_contains($key,$idxf)) {
   if( !empty($ids))
 {
  array_push($ids,$value);
 }
else{
$ids[] = $value;
}

}
}
//dd($ids);

if(is_null($ids))
{
    dd('No any data was filled back and Check the field the data!');
}
 //Create
$prop = request('prop');
$ind = request("ind");
$col = request("col");

 $current_date = date('Y-m-d');
 $descf='desc'.$aID;
 $desc = $descf;
 $desc = request($desc);

//GET PROPERTY VALUE FROM PROPERTY TABLE
 $propValue = asset::where('id', $aID)->first();
 //dd($aID);
$answerTableUpdatex=DB::statement('update dynamic_ind_updates set status="Inactive" where datex="'.$current_date .'" and property_id="'.$propValue->property_id.'" and asset_id="'.$aID.'" and metaname_id="'.$propValue->metaname_id.'"');
$answerTableUpdate1=DB::statement('update answers set status="Inactive" where datex="'.$current_date .'" and property_id="'.$propValue->property_id.'" and asset_id="'.$aID.'"');

       if($ids !=null)
     {
  foreach ($ids as $idx=>$key) {
  $optionalData = optionalAnswer::where('id', $key)->first();
        $insetqnsAns = answer::UpdateOrCreate([
        'property_id'=>$propValue->property_id,
        'metaname_id'=>$propValue->metaname_id,
        'asset_id'=>$aID,
        'indicator_id'=>$optionalData->indicator_id,
        'opt_answer_id'=>$optionalData->id,
        'datex'=>$current_date
      ],[

        'answer'=>$optionalData->answer,
        'status'=>'Active',
        'action'=>1,
        'user_id'=>auth()->id(),
      ]);
$aid=$insetqnsAns->id;
$av=$insetqnsAns->answer;
//dd($current_date);
  //Insert into answerDescTable table
$insetDesc = answerDescPhoto::UpdateOrCreate([
          'property_id'=>$propValue->property_id,
          'asset_id'=>$aID,
          'metaname_id'=>$propValue->metaname_id,
          'indicator_id'=>$optionalData->indicator_id,
          'datex'=>$current_date,
        ],
        [
         'answer_id'=>$aid,
         'section'=>$sections,
          'action'=>1,
          'user_id'=>auth()->id(),
          //'description'=>$desc[$idy],
          'status'=>'Active',
        ]);
//End of answerDescTable table

foreach($desc as $idy=>$value) {
  if($desc[$idy] ==null)
  {
$desc[$idy]='Nill';
  }

  if(isset($desc[$idy]) !=null)
        {
    $item = answerUpdatePhoto::where('answer_id',$aid)
    ->first();
//dd($item);
if($item == null)
{
 $insetqns = answerUpdatePhoto::UpdateOrCreate([
         'metaname_id'=>$propValue->metaname_id,
          'asset_id'=>$aID,
          'indicator_id'=>$optionalData->indicator_id,
        ],
        [
          'index_id'=>$idy+ $idx,
          'property_id'=>$propValue->property_id,
          'answer_id'=>$aid,
          'user_id'=>auth()->id(),
          'description'=>$desc[$idy],
          'status'=>'Active',
        ]);
  //------------------------------------
$insetqnsx = dynamicIndUpdate::UpdateOrCreate([

'property_id'=>$propValue->property_id,
'asset_id'=>$aID,
'metaname_id'=>$propValue->metaname_id,
'indicator_id'=>$optionalData->indicator_id,
'answer_id'=>$aid,
'opt_answer_id'=>$optionalData->id,
'datex'=>$current_date,
],
[
       'index_id'=>$idy+ $idx,
        'answer_value'=>$av,
          'value'=>1,
          'user_id'=>auth()->id(),
          'status'=>'Active',
        ]);
   }

  }
}

// Clear answerupdatephoto db2_tables(connection)
// $attachmentf='attachment148';

$idconn=$aID.$optionalData->indicator_id;

$attachmentf='attachment'.$idconn;
$attach = request($attachmentf);
 // $attachment = request('attachment');
//dd($attach);
//    if($attach){
//
//               foreach($attach as $key=>$attached){
//               if(isset($attach[$key + $idx]) !=null)
//         {
//
//
// }
//     }
//      }

      }
     }
//end of ids loop


$descDatas = answerUpdatePhoto::get();
//dd($descDatas);
foreach ($descDatas as $key) {
  //dd($key);
foreach ($desc as $idy=>$value) {

  if($key->index_id ==$idy)
  {
    $value = trim(preg_replace('/\s\s+/', ' ', $value));
    $insetqnsy = answerUpdatePhoto::where('index_id',$key->index_id)
    ->where('asset_id',$aID)
    ->where('metaname_id',$propValue->metaname_id)
    ->where('indicator_id',$optionalData->indicator_id)
      ->where('status','Active')
             ->update([
           'description'=>$value,
         ]);
      }
  }

// Update the Image table
$attachmentf='attachment'.$idconn;
//dd($key);
$attach = request($attachmentf);
   if($attach){
//dd($attach);
// foreach ($descDatas as $key) {
   foreach($attach as $imgkey=>$attached){
  if($key->index_id ==$imgkey)
  {
  // Get filename with extension
                     $fileNameWithExt =$attach[$imgkey]->getClientOriginalName();

                     // Just Filename
                     $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                     // Get just Extension
                     $extension = $attach[$imgkey]->getClientOriginalExtension();
                     //Filename to store
                     $imageToStore = $filename.'_'.time().'.'.$extension;
                     //upload the image
                     $path =$attach[$imgkey]->storeAs('public/img/', $imageToStore);


  $insetqnsy = answerUpdatePhoto::where('asset_id',$aID)
  ->where('metaname_id',$propValue->metaname_id)
  ->where('indicator_id',$optionalData->indicator_id)
    ->where('status','Active')
             ->update([
           'image'=>$imageToStore,
         ]);
         }

  }
 }
}


//Update answer table
$answerTableUpdate=DB::statement('update answer_desc_photos a,answer_update_photos ap set a.description=ap.description,a.image=ap.image where a.answer_id=ap.answer_id and a.action=1');
//Update dynamic_ind_updates
$answerTableUpdatey=DB::statement('update dynamic_ind_updates d,answer_update_photos ap set d.description=ap.description,d.image=ap.image where d.property_id=ap.property_id and d.asset_id=ap.asset_id and d.indicator_id=ap.indicator_id');
$answerTableUpdatex=DB::statement('update dynamic_ind_updates d,answers a set d.status=a.status where d.property_id=a.property_id and d.asset_id=a.asset_id and d.indicator_id=a.indicator_id and d.opt_answer_id=a.opt_answer_id and a.datex="'.$current_date.'"');
 //dd($optionalData->indicator_id);
//update section column in answers table
// $answerTableUpdate1=DB::statement('update answers set status="Inactive" where datex="'.$current_date .'" and property_id="'.$propValue->property_id.'" and asset_id="'.$aID.'"');
//$answerTableUpdatey=DB::statement('update answers a set a.section="'.$sections.'" where a.datex="'.$current_date.'" and a.property_id="'.$propValue->property_id.'" and a.metaname_id="'.$propValue->metaname_id.'" and a.section=null and a.asset_id="'.$aID.'"');

$answerTableUpdatez=DB::statement('update answer_desc_photos a,answers an set an.section=a.section where an.property_id=a.property_id and an.metaname_id=a.metaname_id and an.asset_id=a.asset_id and an.indicator_id=a.indicator_id and a.action=1 and an.section is null and a.datex="'.$current_date.'"');
//update section column in answers table

$qnsTableUpdate=DB::statement('update qns_appliedtos q,answer_update_photos ap set q.'.$col.'=1 where q.metaname_id=ap.metaname_id and q.indicator_id=ap.indicator_id');

 $deleteAnswerTable = answerUpdatePhoto::where('user_id',auth()->id())->first();
        if($deleteAnswerTable){
//  $deletev = answerUpdatePhoto::where('user_id',auth()->id())->delete();
//   $isDataAvailable = answerUpdatePhoto::get();
//   if($isDataAvailable->isEmpty())
//   {
// $flashanswerTable=DB::statement('truncate table answer_update_photos');
//   }

    }
        else{
            return redirect()->back()->with('error','Something went wrong with this Truncatating answerUpdatePhoto');
    }


    $answerAllInclusiveData=DB::table('optional_answers')
                ->where('optional_answers.indicator_id',$optionalData->indicator_id)
                  ->where('optional_answers.datatype','checkbox')
                    ->get();

    $answerInclusiveData = DB::table('answers')
                ->join('optional_answers', 'answers.indicator_id', '=', 'optional_answers.indicator_id')
                ->where('answers.datex',$current_date)
                ->where('answers.status','Active')
                 ->whereColumn('answers.opt_answer_id','optional_answers.id')
                ->get();

               $optional_answersCollections = collect($answerAllInclusiveData);
               $answerCollections = collect($answerInclusiveData);


    foreach ($optional_answersCollections as $oKey => $firstOptinValue) {
      foreach ($answerCollections as $aKey => $secondAnswerValue) {
      if($firstOptinValue->id==$secondAnswerValue->opt_answer_id)
      {
           unset($optional_answersCollections[$oKey]);
      }
      }
    }

    //NOW INSERT INTO answers_check_boxes
    foreach ($optional_answersCollections as $keyV => $valueV) {
    $insertAnsCheckBoxes = answerCheckBox::UpdateOrCreate([
    'property_id'=>$propValue->property_id,
    'metaname_id'=>$propValue->metaname_id,
    'asset_id'=>$aID,
    'indicator_id'=>$optionalData->indicator_id,
    'opt_answer_id'=>$valueV->id,
    'datex'=>$current_date
    ],[

    'answer'=>$optionalData->answer,
    'status'=>'Active',
    'action'=>1,
    'user_id'=>auth()->id(),
  ]);
}
//Update answer_check_boxes
$answerTableUpdatey=DB::statement('update answer_check_boxes d,answers a set d.status=a.status,d.answer=a.answer where d.property_id=a.property_id and d.asset_id=a.asset_id and d.indicator_id=a.indicator_id and d.opt_answer_id=a.opt_answer_id and d.datex="'.$current_date.'"');

$updateqnsF = answerDescPhoto::where('action',1)
             ->where('description','Nill')
             ->update([
            'description'=>""
          ]);

$updateqnsF = answerDescPhoto::where('action',1)
             ->update([
            'action'=>0
          ]);

// update description and photo on answers mysql_list_tables
$answerTablePhotoUpdate=DB::statement('update answers a,answer_update_photos u set a.photo=u.image,a.description=u.description where a.id=u.answer_id and datex="'.$current_date .'"');
   return redirect()->back()->with('success','Submitted Successfully');
}


public function storeIteM(Request $request)
{
  dd('dddd');
    $this->metavv=$id;
      $this->metaValue=$name;
}

//RENDER METHOD

    public function render(Request $request)
    {
$qnID='idx'.$this->qnID;
//$qnID=$this->qnID;
 //dd($qnID);
//dd($this->metavv);
$meta=$this->metavv;
$metaAll=$this->metaValue;
if($metaAll==null)
{
  $metaAll="All";
}


    $current_date = date('Y-m-d');
     $pos_id=$this->metaname_id;
     $qnType=$this->qnType;
     $times=$this->qnNo;
    $qn_no=$this->qn_no;

    // $indicators = setIndicator::get();
      $metanames = metaname::get();
      $metadatas = optionalAnswer::get();
//Assign Activities to userActivities
$departments=user::where('id',auth()->id())->first();

$userMetanames = userActivity::join('metanames','metanames.id','user_activities.activity_id')
->where('user_activities.sys_user_id',auth()->id())
->where('user_activities.status','Active')
->select('metanames.id','metanames.metaname_name')
->get();

if($meta!=null && $meta!="All")
{
  $userActitivities = userActivity::join('metanames','metanames.id','user_activities.activity_id')
  ->where('user_activities.sys_user_id',auth()->id())
  ->where('user_activities.status','Active')
    ->where('user_activities.activity_id',$meta)
  ->select('metanames.id','metanames.metaname_name')
  ->get();

  $firstData = collect($userActitivities);
  $acts = $firstData;
}
else {
  $userActitivities = userActivity::join('metanames','metanames.id','user_activities.activity_id')
  ->where('user_activities.sys_user_id',auth()->id())
  ->where('user_activities.status','Active')
  //->join('users','sales.user_id','users.id')
  ->select('metanames.id','metanames.metaname_name')
  ->get();

  $userActitivitiesf = userRole::join('activity_roles','activity_roles.role_id','user_roles.role_id')
  ->join('metanames','metanames.id','activity_roles.activity_id')
  ->where('user_roles.sys_user_id',auth()->id())
 ->where('activity_roles.status','Active')
  //->join('users','sales.user_id','users.id')
 ->select('metanames.id','metanames.metaname_name')
  ->get();

  $userActitivitiesff = departmentRole::join('activity_roles','activity_roles.role_id','department_roles.role_id')
  ->join('metanames','metanames.id','activity_roles.activity_id')
  ->where('department_roles.department_id',$departments->department_id)
 ->where('activity_roles.status','Active')
 ->select('metanames.id','metanames.metaname_name')
  ->get();

//Qns applied
  // $userActitivitiesfff=qnsAppliedto::get();
  $userActitivitiesfff = qnsAppliedto::join('metanames','metanames.id','qns_appliedtos.metaname_id')
  ->where('qns_appliedtos.status','Active')
  ->select('metanames.id','metanames.metaname_name','qns_appliedtos.indicator_id')
   ->get();

  $first = collect($userActitivities);
  $second = collect($userActitivitiesf);
  $third = collect($userActitivitiesff);
  $fouth = collect($userActitivitiesfff);

$acts = $first->merge($second);
$acts = $acts->merge($third);
$acts = $acts->merge($fouth);
$acts = $acts->unique('metaname_name');

   //dd($userActitivitiesfff);
}
$a=array();
  foreach ($acts as $act) {
    $a[]=$act->id;
  }

//Extract date
$datet=Carbon::now();
$datet=$datet->format('H:i:s');
//dd($departments->property_id);

//Get asset_show from assets table
$asset_show=asset::where('property_id',$departments->property_id)->first();
//dd($asset_show->time_show);
//dd($datet);
if($datet>="24:45")
{
  //dd('ddd');
  //Set time_show to be zero
   //$date_time=date('H:i:s',strtotime("1 hours"));

$date_time = date('H:i:s',strtotime(date($asset_show->extra_time, mktime()) . " + 1 hours"));
$date_time_init=date('H:i:s',strtotime(date($asset_show->extra_time, mktime()) . " + 0 hours"));
//$date_timex=date('H:i:s',strtotime("1 hours"));

// dd($date_time);
//if($asset_show->asset_show==1 && $date_time<$datet)
if($asset_show->asset_show==1 && $date_time>$datet && $date_time_init!="00:00:00")
{

  $update = asset::where('property_id',$departments->property_id)->update([
      'time_show'=>1,
      'asset_show'=>1,
  ]);
}
  else
  {
    $update = asset::where('property_id',$departments->property_id)->update([
        'time_show'=>0,
        'asset_show'=>0,
            'extra_time'=>'00:00:00',
    ]);
  }
}
else{
    $update = asset::where('property_id',$departments->property_id)->update([
      'time_show'=>1,
      'asset_show'=>1
  ]);
}

 $pp = asset::where('assets.status','Active')
 ->where('assets.time_show',1)
   ->where('assets.asset_name','!=',"")
   ->where('assets.property_id',$departments->property_id)
   ->whereIn('assets.metaname_id',$a)
   ->select('assets.id','assets.property_id','assets.metaname_id','assets.asset_name')
     ->orderBy('assets.id')->get();

     $metas = asset::join('metanames','assets.metaname_id','metanames.id')
     ->where('assets.status','Active')
       ->where('assets.time_show',$asset_show->time_show)
       ->where('assets.asset_name','!=',"")
       ->where('assets.property_id',$departments->property_id)
       ->whereIn('assets.metaname_id',$a)
       ->groupby('assets.metaname_id')
       ->select('metanames.id','metanames.metaname_name')
         ->orderBy('metanames.id')->get();

// dd($metas);

  // $pp = asset::where('assets.status','Active')
  //   ->where('assets.time_show',1)
  //   ->where('assets.asset_name','!=',"")
  //   ->where('assets.property_id',$departments->property_id)
  //   ->whereIn('assets.metaname_id',$a)
  //   ->select('assets.id','assets.property_id','assets.metaname_id','assets.asset_name')
  //     ->orderBy('assets.id')->get();
  //
  //     $metas = asset::join('metanames','assets.metaname_id','metanames.id')
  //     ->where('assets.status','Active')
  //       // ->where('assets.time_show',1)
  //       ->where('assets.asset_name','!=',"")
  //       ->where('assets.property_id',$departments->property_id)
  //       ->whereIn('assets.metaname_id',$a)
  //       ->groupby('assets.metaname_id')
  //       ->select('metanames.id','metanames.metaname_name')
  //         ->orderBy('metanames.id')->get();

//Query Indicators
  $qnsf = setIndicator::where('qns','!=',"")
  ->orderBy('id')->get();

$col='col'.auth()->id();
$column=Schema::hasColumn('qns_appliedtos',$col);

 if ($column) {
        //dd('exists');
    }
    else
    {
Schema::table('qns_appliedtos', function($table) use ($col)
{
    $table->boolean($col)->after('user_id')->default(0);
 });
}
//End of column
   $qns = qnsAppliedto::join('set_indicators','qns_appliedtos.indicator_id','set_indicators.id')
   ->where('set_indicators.status','Active')
   ->where('set_indicators.qns','!=',"")
   ->whereIn('qns_appliedtos.metaname_id',$a)
   ->select('qns_appliedtos.metaname_id','qns_appliedtos.section','qns_appliedtos.'.$col.'','set_indicators.id','set_indicators.qns')
   // ->orderBy('set_indicators.id')->get();
    ->orderBy('qns_appliedtos.section')->get();

    $sections=qnsAppliedto::where('qns_appliedtos.status','Active')
    ->groupby('qns_appliedtos.metaname_id')
    ->groupby('qns_appliedtos.section')
    ->get();
  //dd($sections);

   $datatypes = datatype::get();
   $checkQnsProp = DB::select('select d.property_id,d.metaname_id,d.asset_id,d.value from dynamic_ind_updates d,assets p where d.property_id=p.property_id and d.metaname_id=p.metaname_id and d.asset_id=p.id and d.datex="'.$current_date.'" and d.status="Active" group by d.asset_id');
//dd($checkQnsProp);

  $checkQns = DB::select('select d.opt_answer_id,d.property_id,d.metaname_id,d.asset_id,d.indicator_id,d.answer_value,d.description,d.image,d.value from dynamic_ind_updates d,assets p where d.property_id=p.property_id and d.metaname_id=p.metaname_id and d.asset_id=p.id and d.datex="'.$current_date.'" and d.status="Active"');
//dd($checkQns);
//percent calculation
$assetPerc = DB::select('select * from assets');
$assetPerc = collect($assetPerc);

$answerPerc=DB::select('select * from answers where DAY(datex)=DAY(NOW()) and status="Active" group by property_id,metaname_id,indicator_id,asset_id order by metaname_id ASC');
$answerPerc = collect($answerPerc);

$answerCount=DB::select('select a.*,m.metaname_name from answers a,metanames m where a.metaname_id=m.id and DAY(a.datex)=DAY(NOW()) and a.status="Active" group by a.property_id,a.metaname_id,a.indicator_id,a.asset_id order by a.metaname_id ASC');
$answerCount = collect($answerCount);
$totalqns=DB::select('select a.metaname_id,metaname_name from assets a, qns_appliedtos q,metanames m where a.metaname_id=q.metaname_id and a.metaname_id=m.id and a.status="Active" and q.status="Active"');
$totalqns = collect($totalqns);

$qnsAppliedPerc=DB::select('select * from qns_appliedtos');
$qnsAppliedPerc = collect($qnsAppliedPerc);
  //$xx = $qnsAppliedPerc->count();
//dd($answerPerc);
//dd($qnsAppliedPerc);
//dd($qnsAppliedPerc->where('metaname_id',1)->where('section','Room')->count());
//dd($answerPerc->where('metaname_id',1)->where('asset_id',6)->where('section','Room')->count());


$metanameCollects=collect($metanames);
//$c = $metanameCollects->unique('metaname_name');
  $metax=($metanameCollects->where('id',2)->first())->metaname_name;
//dd($metanameCollects::select('id')->where('id',2));
//$metanameCollects = $metanameCollects::select('metaname_name');
//dd($metax);

      return view('livewire.checklist',compact('metadatas','datatypes','metanames','metanameCollects','metaAll','pp','metas','qns','sections','userActitivities','userMetanames','acts','col','checkQnsProp','checkQns','assetPerc','answerPerc','answerCount','totalqns','qnsAppliedPerc'))
      ->layout('layouts.app');
  }
}
