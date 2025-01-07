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
use App\Models\department;
use App\Models\user;

use App\Models\answerUpdatePhoto;
use App\Models\answerDescPhoto;
// use Intervention\Image\Facades\Image as Image;

use App\Models\dynamicIndUpdate;
use App\Models\optionalAnswer;
use Livewire\Component;
use DB;
use PDF;
use Mail;
use App\Jobs\SendMailJobf;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Benchmark;
// use Illuminate\Http\UploadedFile;
//use App\Http\Livewire\Input;
use Intervention\Image\Facades\Image;

use PHPJasper\PHPJasper;
require base_path().'/vendor/autoload.php';
// require base_path().'/vendor/autoload.php';

//include_once(app_path().'/jrf/PHPJasperXML.inc.php');
 //include_once(app_path().'/fpdf184/mysql_table.php');
 //include_once(app_path().'/fpdf184/pdfg.php');
// use PHPJasperXML;

class DashChecklist extends Component
{
      public $departments = "";
      public $post;
      public $message = "";
      public $act = [];
      public $indicator_id;

  public $assetID;
  public $propertyID;
    public $metanameID;
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
public $index=[];

public $asset_model;
public $section_model;
public $metaname_model;
public $selectedOption;
// public $idx;
 // public $selectedState = NULL;

public function store(Request $request)
    {
 $rad=$this->rad;
    $aID = request("aID");
    $qnAID = request("qnAID");
    $indexs = request('index');

//Array Declaration
$dataQns=[];
$dataDesc=[];
  //dd($indexs);
//$sections = $sections->except(['_token','_method','qnID','qnAID','aID','col','prop']);
//$newSectionArray = array_filter($sections);

  // $sections = request('section_name1_27');
  $property_id = request('propertyID');
  $current_date = date('Y-m-d');

//dd($property_id);

  if(request('save')){
  $save = request("save");
  $save = explode("_", $save);
  $asset_id=$save[0];
  $section_id=$save[1];
  //Section request
//dd($save[0]);echo "nder";

  $section_name="section_name".$asset_id."_".$section_id."";
  $descKey="desc".$save[0]."";
  $photoKey="attachment".$save[0]."";
//dd($descKey);
//$sections = request('section_name1_27');
  $section = request($section_name);
  $keyValue=$save[0].'_'.$save[1];
//$data = $request->except(['_token','_method','qnID','qnAID','aID','col','prop']);
//dd($keyValue);
// $query = $request->query();
//$input = $request->all();
$input = $request->except(['_token','_method','qnID','qnAID','aID','col','prop',$section_name]);
$arrayData = array_filter($input);
$arrayDataf= array();
$arrayDataf=$arrayData;
$arrayPhoto=$arrayData;

//dd($arrayData);
//Takes array value ends with
foreach ($arrayData as $key => $value) {
 //dd($value);
//String End withi
//dd($photoKey);
$descStr = Str::startsWith($key,$descKey);
$photoStr = Str::startsWith($key,$photoKey);
//dd($photoStr);

$result = Str::endsWith($key,$keyValue);
//dd($key);
$desc = explode("_", $key);
$nameStr=$desc[0];
//dd($nameStr);

 if($result==True && $value[0] !=null && str_contains($key,$nameStr))
 {
   //dd($key);
    $dataQns=array_push($value);
     }else
// else($result!=True)
{
  //unset($data[$key]);
  //dd($key);
  //  $dataQns=array_push($key,$value);
}

//Unset the idx
if($result !=True || str_contains($key,$descKey) || str_contains($key,$photoKey))
 {
   unset($arrayData[$key]);
 }

//Unset description
 if($descStr !=True || $result !=True || $value[0]==null)
  {
    unset($arrayDataf[$key]);
  }


  //Unset photo
   if($photoStr !=True || $result !=True || $value[0]==null)
    {
      unset($arrayPhoto[$key]);
    }
}

//
$section=$save[1];
$asset_id=request('assetID');
//$property_id=$save[0];

foreach ($arrayData as $key => $value) {
  //dd($value);
    $indicMeta = explode("_", $key);
  //dd($value[0]);
  //$value = (int)$value;
  //dd($indicMeta);

  $insetqnsAns = answer::UpdateOrCreate([
  'property_id'=>$property_id,
  'metaname_id'=>request('metaname_id'),
  'asset_id'=>$asset_id,
  'indicator_id'=>$indicMeta[1],

  'section'=>$section,
  'datex'=>$current_date,
],[
  'opt_answer_id'=>$value[0],
  //'answer'=>$optionalData->answer,
  'status'=>'Active',
  'action'=>1,
  'user_id'=>auth()->id(),
    ]);
  }
$answerTableUpdate1=DB::statement('update answers a,optional_answers o set a.answer=o.answer where a.opt_answer_id=o.id and a.datex="'.$current_date .'" and a.property_id="'.$property_id.'" and a.asset_id="'.$asset_id.'"');
$answerTableUpdate2=DB::statement('update answers a set a.manager_checklist="Action required" where a.answer !="Yes" and a.datex="'.$current_date .'" and a.property_id="'.$property_id.'" and a.asset_id="'.$asset_id.'"');

//return redirect()->back()->with('success','Submitted Successfully');
//dd($arrayDataf);
//Update description mysql_list_tables
foreach ($arrayDataf as $key => $value) {
      $descMeta = explode("_", $key);
  //dd($descMeta);
  $updateqnsF = answer::where('property_id',$property_id)
               ->where('metaname_id',request('metaname_id'))
                ->where('asset_id',$asset_id)
                  ->where('indicator_id',$descMeta[1])
                   ->where('section',$section)
                  ->where('datex',$current_date)
                  //->where('opt_answer_id',$descMeta[0])
               ->update([
              'description'=>$value[0]
            ]);

}
////End of Update description mysql_list_tables
// dd('dd');
//Update description mysql_list_tables
foreach ($arrayPhoto as $keyPhoto => $valuePhoto) {
  // dd($key);
    $photoMeta = explode("_", $keyPhoto);

    if($valuePhoto){
             $attach =$valuePhoto;
          //   dd($attach);
             foreach($attach as $attached){

               if($request->hasFile('image')) {
    $image       = $request->file('image');
    $filename    = $image->getClientOriginalName();

    $image_resize = Image::make($image->getRealPath());
    $image_resize->resize(300, 100);
    $image_resize->save(public_path('img/' .$filename));
}

//Image can't save
$image       =$attached;
$filename    = $image->getClientOriginalName();
$fileNameWithExt = $attached->getClientOriginalName();
// Just Filename
$filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
// Get just Extension
//dd($filename);
$extension = $image->getClientOriginalExtension();
//Filename to store
$filename = $filename.'_'.time().'.'.$extension;
//dd($filename);

$image_resize = Image::make($image->getRealPath());
 // $image_resize->resize(450, 300);

//dd(storage_path());

$image_resize->resize(280,200, function ($constraint)
{
    $constraint->aspectRatio();
})->save(public_path('storage/img/' .$filename));
//  $image_resize->save(public_path('storage/img/' .$filename));

                  $updateqnsF = answer::where('property_id',$property_id)
                               ->where('metaname_id',request('metaname_id'))
                                ->where('asset_id',$asset_id)
                                  ->where('indicator_id',$photoMeta[1])
                                   ->where('section',$section)
                                  ->where('datex',$current_date)
                                  //->where('opt_answer_id',$descMeta[0])
                               ->update([
                              'photo'=>$filename
                            ]);

     }

           //return redirect()->back()->with('success','successfully');
 }
}
////End of Update description mysql_list_tables

//  dd($data);

//$answerTableUpdate1=DB::statement('update answers a,optional_answers o set a.answer=o.answer where a.opt_answer_id=o.id and a.datex="'.$current_date .'" and a.property_id="'.$property_id.'" and a.asset_id="'.$asset_id.'"');
return redirect()->back()->with('success','Submitted Successfully');
}
//dd(request('email_send'));


//
//    	if(request('email_send')){
// //dd('ddddx');
//
// //dd('bvncx');
// $input =app_path().'/reports/pieChart.jrxml';
//  //$input =app_path().'/reports/department.jrxml';
// $output =app_path().'/reports';
//
// $options = [
//     'format' => ['pdf'],
//     'locale' => 'en',
//     'params' => [
//  'property_id'=>1,
//     ],
//     'db_connection' => [
//          'driver' => 'mysql', //mysql, ....
//          'username' => 'root',
//         //'password' => '',
//         'host' => '127.0.0.1',
//         'database' => 'horesydb',
//         'port' => '3306'
//     ]
//
//     // \Config::get('database.connections.mysql')
//
// ];
// // dd('zz');
// //dd('zzkx');
// $jasper = new PHPJasper;
// //dd($jasper);
// $jasper->process(
//         $input,
//         $output,
//         $options
// )->execute();
//
// //dd('zzkx');
// //Send report
// $date=date('d-M-Y');
// $data["email"] = "buruwawa@gmail.com";
//
// $data["title"] = "Daily General Inspection Hotel Report (DGIR)";
// $data["body"] = "Manyara Best View Hotel: Daily General Inspection Report held on $date";
// $data["date"] = "Date: $date";
// //dd(app_path());
//
// $files = [
// app_path('reports/pieChart.pdf'),
// // public_path('files/reports.png'),
// ];
//   //SendMailJobf::dispatch($data);
//
// Mail::send('email.email', $data, function($message)use($data, $files) {
// $message->to($data["email"], $data["email"])
//         ->subject($data["title"]);
// foreach ($files as $file){
//     $message->attach($file);
// }
// });
//
// dd('Mail sent successfully');
//
//      }

  return redirect()->back()->with('success','Submitted Successfully');
}




public function storeIteM(Request $request)
{
    $this->metavv=$id;
      $this->metaValue=$name;
}

// protected $rulesx = [
//     'metaname_model.metaname_name' => 'required',
//     'metaname_model.metaname_name' => 'required',
// ];

protected $rules = [
     'metaname_name' => 'required',
   'id' => 'required'
 ];

public function mount()
   {
    $this->metanames = metaname::join('qns_appliedtos','qns_appliedtos.metaname_id','metanames.id')
     ->select('metanames.id','metanames.metaname_name')
     ->groupby('metanames.id')
     ->get();

   }


  //  public function updatedSelectedState($metaname_model)
  // {
  //   dd($metaname_model);
  //     if (!is_null($metaname_model)) {
  //       $this->asset_name_model = asset::where('assets.metaname_id',1)
  //       ->select('assets.id','assets.asset_name')
  //       ->get();
  //         // $this->asset_name_model = City::where('state_id', $state)->get();
  //     }
  // }



     public function updatedSelectedOption($value)
     {
         // Update the value of another property based on the selected option
         if ($value === 'option1') {
             $this->anotherProperty = 'Option 1 selected';
         } elseif ($value === 'option2') {
             $this->anotherProperty = 'Option 2 selected';
         }
         else {

           }
     }

//RENDER METHOD
public function rendervv()
{
    // return view('livewire.wawacombo');
    return view('livewire.wawacombo', [
        'options' => ['option1', 'option2', 'option3'],
    ]);
}


    public function rendeOrgr(Request $request)
    {
          $current_date = date('Y-m-d');
      //Extract date
      $datet=Carbon::now();
      $datet=$datet->format('H:i:s');
      //dd($departments->property_id);
$metaname_id=$this->metaname_model;
//$metaname_id=$this->metaname_id;

      // $this->assetID=$this->selectedOption;
        $assetID=$this->selectedOption;
      //  $assetID=$assetID;

  $departments=user::where('id',auth()->id())->first();

   $this->propertyID=asset::where('id',$assetID)->first();
   $propertyID=$this->propertyID;

    //    $metaModelid=$this->metaname_model;
        //$assetModel=$this->asset_name_model;
        //dd($metaModel);

      // $metanames = metaname::join('answers','answers.metaname_id','metanames.id')
      // ->select('metanames.id','metanames.metaname_name')
      // ->groupby('metanames.id')
      // ->get();

  //$metadatas = metanameDatatype::where('metaname_id',$this->metaname_id)->get();
  //$id=$this->metanames->id;
  $metadatas = optionalAnswer::get();

      $assets = asset::where('assets.metaname_id',$metaname_id)
      ->select('assets.id','assets.asset_name')
      ->get();

      // $sections = asset::where('assets.metaname_id',$this->metaname_model)
      // ->select('assets.id','assets.asset_name')
      // ->get();

      $sections = qnsAppliedto::where('qns_appliedtos.metaname_id',$metaname_id)
      ->groupby('qns_appliedtos.section')
      ->select('qns_appliedtos.section')
      ->get();
//dd($sections);
// get sections from database
  $sectionCollects = collect($sections);

//  $dd=($sectionCollects->where('section','Bed')->first())->section;
//  dd($dd);

      // $pp = asset::where('assets.status','Active')
      // ->where('assets.time_show',1)
      //   ->where('assets.asset_name','!=',"")
      //   ->where('assets.property_id',$departments->property_id)
      //   ->whereIn('assets.metaname_id',[1])
      //   ->select('assets.id','assets.property_id','assets.metaname_id','assets.asset_name')
      //     ->orderBy('assets.id')->get();

   $checkQnsProp = DB::select('select d.property_id,d.metaname_id,d.asset_id from answers d,assets p where d.property_id=p.property_id and d.metaname_id=p.metaname_id and d.asset_id=p.id and d.datex="'.$current_date.'" and d.status="Active" group by d.asset_id');
//dd($asse
//dd($checkQnsProp);

//Coppy to mount method
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

 $departApply= department::where('status','Active')->get();
if($departments->hasRole('SuperAdmin') || $departments->hasRole('GeneralAdmin')){
$qnsapply=array();
foreach ($departApply as $apply) {
$qnsapply[]=$apply->id;
}
}
else{

$qnsapply=array();
$departments=user::where('id',auth()->id())->first();
$qnsapply[]=$departments->department_id;
}

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

     // $metas = asset::join('metanames','assets.metaname_id','metanames.id')
     // ->where('assets.status','Active')
     //   ->where('assets.time_show',$asset_show->time_show)
     //   ->where('assets.asset_name','!=',"")
     //   ->where('assets.property_id',$departments->property_id)
     //   ->whereIn('assets.metaname_id',[1])
     //   ->groupby('assets.metaname_id')
     //   ->select('metanames.id','metanames.metaname_name')
     //     ->orderBy('metanames.id')->get();


$qns = qnsAppliedto::join('set_indicators','qns_appliedtos.indicator_id','set_indicators.id')
->where('set_indicators.status','Active')
->where('set_indicators.qns','!=',"")
->whereIn('qns_appliedtos.department_id',$qnsapply)
 ->whereIn('qns_appliedtos.metaname_id',[$metaname_id])
->select('qns_appliedtos.metaname_id','qns_appliedtos.section','qns_appliedtos.'.$col.'','set_indicators.id','set_indicators.qns')
// ->orderBy('set_indicators.id')->get();
 ->orderBy('qns_appliedtos.section')->get();
//dd($qns);

  $checkQns = DB::select('select a.opt_answer_id,a.property_id,a.metaname_id,a.asset_id,a.indicator_id,a.photo,a.answer,a.description from answers a,assets p where a.property_id=p.property_id and a.metaname_id=p.metaname_id and a.asset_id=p.id and a.datex="'.$current_date.'" and a.status="Active"');
  $answerPerc=DB::select('select * from answers where DAY(datex)=DAY(NOW()) and status="Active" group by property_id,metaname_id,indicator_id,asset_id order by metaname_id ASC');
  $answerPerc = collect($answerPerc);
  $qnsAppliedPerc=DB::select('select * from qns_appliedtos');
  $qnsAppliedPerc = collect($qnsAppliedPerc);
// return view('livewire.checklist',compact('departGetName','metadatas','datatypes','metanames','metanameCollects','metaAll','pp','metas','qns','sections','userActitivities','acts','col','checkQnsProp','checkQns','assetPerc','answerPerc','answerCount','totalqns','qnsAppliedPerc','property_id'))

// return view('livewire.checklist',
//  [
//     'options' => ['option1', 'option2', 'option3'],
// ]);
//dd($checkQnsProp);



   	if(request('email_send')){
dd('ddddx');

//dd('bvncx');
$input =app_path().'/reports/pieChart.jrxml';
 //$input =app_path().'/reports/department.jrxml';
$output =app_path().'/reports';

$options = [
    'format' => ['pdf'],
    'locale' => 'en',
    'params' => [
 'property_id'=>1,
    ],
    'db_connection' => [
         'driver' => 'mysql', //mysql, ....
         'username' => 'root',
        //'password' => '',
        'host' => '127.0.0.1',
        'database' => 'horesydb',
        'port' => '3306'
    ]

    // \Config::get('database.connections.mysql')

];
// dd('zz');
//dd('zzkx');
$jasper = new PHPJasper;
//dd($jasper);
$jasper->process(
        $input,
        $output,
        $options
)->execute();

//dd('zzkx');
//Send report
$date=date('d-M-Y');
$data["email"] = "buruwawa@gmail.com";

$data["title"] = "Daily General Inspection Hotel Report (DGIR)";
$data["body"] = "Manyara Best View Hotel: Daily General Inspection Report held on $date";
$data["date"] = "Date: $date";
//dd(app_path());

$files = [
app_path('reports/pieChart.pdf'),
// public_path('files/reports.png'),
];
  //SendMailJobf::dispatch($data);

Mail::send('email.email', $data, function($message)use($data, $files) {
$message->to($data["email"], $data["email"])
        ->subject($data["title"]);
foreach ($files as $file){
    $message->attach($file);
}
});

dd('Mail sent successfully');
}

return view('livewire.dash-checklist',compact('assets','departments','sections','qns','col','checkQnsProp','metaname_id','assetID','metadatas','checkQns','propertyID','answerPerc','qnsAppliedPerc'))
->layout('layouts.app');
    }



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
     // $pos_id=$this->metaname_id;
     $qnType=$this->qnType;
     $times=$this->qnNo;
    $qn_no=$this->qn_no;

    // $indicators = setIndicator::get();
      $metanames = metaname::get();
      $metadatas = optionalAnswer::get();
//Assign Activities to userActivities
  $departments=user::where('id',auth()->id())->first();
// Benchmark::measure(fn() => user::where('id',auth()->id())->first();

// $userMetanames = userActivity::join('metanames','metanames.id','user_activities.activity_id')
// ->where('user_activities.sys_user_id',auth()->id())
// ->where('user_activities.status','Active')
// ->select('metanames.id','metanames.metaname_name')
// ->get();

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

//dd($pp);

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

//$departments=user::where('id',auth()->id())->first();
 $departApply= department::where('status','Active')->get();

//Get Department name
  $departGetName= department::where('status','Active')
  ->where('id',$departments->department_id)->first();

//dd($departGetName->unit_name);


    if($departments->hasRole('SuperAdmin') || $departments->hasRole('GeneralAdmin')){
$qnsapply=array();
foreach ($departApply as $apply) {
  $qnsapply[]=$apply->id;
}
    }
    else{
      $qnsapply=array();
  $departments=user::where('id',auth()->id())->first();
  $qnsapply[]=$departments->department_id;
    }


//End of column
   $qns = qnsAppliedto::join('set_indicators','qns_appliedtos.indicator_id','set_indicators.id')
   ->where('set_indicators.status','Active')
   ->where('set_indicators.qns','!=',"")
   ->whereIn('qns_appliedtos.department_id',$qnsapply)
    ->whereIn('qns_appliedtos.metaname_id',$a)
   ->select('qns_appliedtos.metaname_id','qns_appliedtos.section','qns_appliedtos.'.$col.'','set_indicators.id','set_indicators.qns')
   // ->orderBy('set_indicators.id')->get();
    ->orderBy('qns_appliedtos.section')->get();

    $sections=qnsAppliedto::where('qns_appliedtos.status','Active')
    ->groupby('qns_appliedtos.metaname_id')
    ->groupby('qns_appliedtos.section')
    ->get();
  //dd($qns);

   $datatypes = datatype::get();
   $checkQnsProp = DB::select('select d.property_id,d.metaname_id,d.asset_id from answers d,assets p where d.property_id=p.property_id and d.metaname_id=p.metaname_id and d.asset_id=p.id and d.datex="'.$current_date.'" and d.status="Active" group by d.asset_id');
//dd($checkQnsProp);

  $checkQns = DB::select('select a.opt_answer_id,a.property_id,a.metaname_id,a.asset_id,a.indicator_id,a.photo,a.answer,a.description from answers a,assets p where a.property_id=p.property_id and a.metaname_id=p.metaname_id and a.asset_id=p.id and a.datex="'.$current_date.'" and a.status="Active"');
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

$property_id=$departments->property_id;
$metanameCollects=collect($metanames);


      return view('livewire.dash-checklist',compact('departGetName','metadatas','datatypes','metanames','metanameCollects','metaAll','pp','metas','qns','sections','userActitivities','acts','col','checkQnsProp','checkQns','assetPerc','answerPerc','answerCount','totalqns','qnsAppliedPerc','property_id'))
      ->layout('layouts.app');

  }
}
