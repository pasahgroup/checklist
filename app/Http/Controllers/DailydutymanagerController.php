<?php

namespace App\Http\Controllers;

//use App\Http\Requests\StorechecklistRequest;
//use App\Http\Requests\UpdatechecklistRequest;

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
use App\Models\dutymanager;

use App\Models\answer;
use App\Models\answerCheckBox;

use App\Models\userActivity;
use App\Models\activityRole;
use App\Models\userRole;

use App\Models\departmentRole;
use App\Models\department;
use App\Models\user;
use App\Models\qnsview;

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



use App\Models\dailydutymanager;
use App\Http\Requests\StoredailydutymanagerRequest;
use App\Http\Requests\UpdatedailydutymanagerRequest;

class DailydutymanagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
    {

        //dd('print');
      $current_date = date('Y-m-d');
      //Extract date
      $datet=Carbon::now();

    

      $datet=$datet->format('H:i');
      //dd($departments->property_id);

 // dd($datet);

       $metaname_id= metaname::where('metanames.metaname_name',"Managers")->first();     

       // dd($metaname_id->id);
         $metaname_id=$metaname_id->id;

      
        $assetID=request('assetID');
        $assetIDf=request('assetID');
       
      
     
       if($metaname_id==null)
       {
          //dd($metaname_id);
             $metaname_id = metaname::where('metanames.metaname_name',"Managers")->first();
           
       }


       if($assetID==null)
       {
          $assetID=1;
          $assetIDf=1;
          $selectedOption=1;
       }else{
          $selectedOption=$assetID;
          $assetIDf=$assetID;
       }


    //$metaname_id=$this->metaname_model;
    $metanamess = metaname::where('metanames.metaname_name',"Managers")->first();
   $assetss = asset::where('assets.id',$assetID)->first();
   
    $users=user::where('id',auth()->id())->first();
    $propertyID=asset::where('id',$assetID)->first();
  //  $assetss=$propertyID;

//dd($metanamess);
    // $metanames = metaname::join('qns_appliedtos','qns_appliedtos.metaname_id','metanames.id')
    //  ->select('metanames.id','metanames.metaname_name')
    //  ->groupby('metanames.id')
    //  ->get();

    $metanames = metaname::join('qns_appliedtos','qns_appliedtos.metaname_id','metanames.id')
      ->where('qns_appliedtos.department_id',$users->department_id)
    //->where('qns_appliedtos.department_id',14)
     ->select('metanames.id','metanames.metaname_name')
     ->groupby('metanames.id')
     ->get();

//dd($metanames);


     //$metanames = metaname::get();

      //$metadatas = optionalAnswer::get();
          $metadatasCollects = optionalAnswer::get();
          $metadatasCollects = collect($metadatasCollects);
          //$subset = $metadatas->map->only(['id', 'name', 'email']);

      $assets = asset::where('assets.asset_name',"Managers")
      ->where('assets.property_id',auth()->user()->property_id)
      ->select('assets.id','assets.asset_name')
      ->get();

  

    $departApply= department::where('status','Active')->get();
    //dd('axssa');
    if($users->hasRole('SuperAdmin') || $users->hasRole('GeneralAdmin')){
    $qnsapply=array();
    foreach ($departApply as $apply) {
    $qnsapply[]=$apply->id;
    }
    }
    else{
    $qnsapply=array();
    $users=user::where('id',auth()->id())->first();
    $qnsapply[]=$users->department_id;
    }

    $asset_show=asset::where('property_id',$users->property_id)->first();

    if($datet>="23:45")
    {

    $date_time = date('H:i:s',strtotime(date($asset_show->extra_time, mktime()) . " + 1 hours"));
    $date_time_init=date('H:i:s',strtotime(date($asset_show->extra_time, mktime()) . " + 0 hours"));

    if($asset_show->asset_show==1 && $date_time>$datet && $date_time_init!="00:00:00")
    {
    $update = asset::where('property_id',$users->property_id)->update([
      'time_show'=>1,
      'asset_show'=>1,
    ]);
    }
    else
    {
    $update = asset::where('property_id',$users->property_id)->update([
        'time_show'=>0,
        'asset_show'=>0,
            'extra_time'=>'00:00:00',
    ]);
    }
    }
    else{
    $update = asset::where('property_id',$users->property_id)->update([
      'time_show'=>1,
      'asset_show'=>1
    ]);
    }


   $qnsapply=collect($qnsapply);
  // $sections = DB::select("select section from qnsview where department_id in(".trim($qnsapply,'[]').") and duration='weekly' and metaname_id in(".$metaname_id.") group by section");
 $daily_morning="Daily Morning";

     $dailyMorning=DB::select('select * from qnsview where duration="'.$daily_morning.'"');
   //  $dailyMorning=collect($dailyMorning);

// dd($dailyMorning);

   $sections = DB::select("select section,metaname_id from qnsview where department_id in(".$users->department_id.") and metaname_id in(select metaname_id from qnsview where duration='".$daily_morning."') group by section");

    // $sections = DB::select("select * from qnsview where department_id in(".trim($dailyMorning,'[]').") and duration='Weekly' and metaname_id in(".$metaname_id.")");
//dd($sections);
//".trim($qnsapply,'[]')."

    $sectionCollects = collect($sections);
    $checkQnsProp = DB::select('select * from checkqnsprop_view where datex="'.$current_date.'" group by asset_id');
      // $checkQnsProp = DB::select('select * from checkqnsdutymanager_view where datex="'.$current_date.'" group by asset_id');


//dd($checkQnsProp);

  if($datet<="12:01")
    {
     //dd($users->department_id);
       $daily_morningb="Daily Morning";
      // dd(DB::select("select * from qnsview where duration='".$daily_morningb."'"));
       //dd(DB::select("select * from qnsview where department_id in(".$users->department_id.") and  duration='".$daily_morningb."'"));


       $qns = DB::select("select * from qnsview where department_id in(".$users->department_id.") and duration='".$daily_morningb."' and metaname_id in(select metaname_id from qnsview where duration='".$daily_morningb."')");
  
  //dd($qns);
    }else{

 $daily_afternoon="Daily Afternoon";
  $qns = DB::select("select * from qnsview where department_id in(".$users->department_id.") and duration='".$daily_afternoon."' and metaname_id in(select metaname_id from qnsview where duration='".$daily_afternoon."')");  

  /// dd('popo cc');
    }

 // $departNames=collect($users->department_id);
  // $qns = DB::select("select * from qnsview where department_id in(".trim($qnsapply,'[]').") and duration='Weekly' and metaname_id in(".$metaname_id.")");
 

//dd($qns);

    // $checkQns = DB::select('select * from checkqnsdutymanager_view where datex="'.$current_date.'"');
      $checkQns = DB::select('select * from dutymanagers where datex="'.$current_date.'"');
    //$answerPerc=DB::select('select * from answers_view');
     $answerPerc=DB::select('select * from answers_view_summary');

     //dd($checkQns);   
    //sqlite

    $answerPerc = collect($answerPerc);
    $qnsAppliedPerc=DB::select('select * from qns_appliedtos where department_id="'.$users->department_id.'"');
    $qnsAppliedPerc = collect($qnsAppliedPerc);


    if(request('email_send')){
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

    $data["title"] = "WEEKLY General Inspection Hotel Report (DGIR)";
    $data["body"] = "Manyara Best View Hotel: WEEKLY General Inspection Report held on $date";
    $data["date"] = "Date: $date";
    //dd(app_path());

    $files = [
    app_path('reports/pieChart.pdf'),
    // public_path('files/reports.png'),
  ];

    Mail::send('email.email', $data, function($message)use($data, $files) {
    $message->to($data["email"], $data["email"])
        ->subject($data["title"]);
    foreach ($files as $file){
    $message->attach($file);
    }
    });

      dd('Mail sent successfully');
    }
    

    // dd($metaname_id);

             return view("livewire.dailydutymanager",compact(['checkQnsProp','metadatasCollects','selectedOption','assetID','assetIDf','metanames','assets','users','sections','qns','metaname_id','metanamess','assetID','checkQns','propertyID','answerPerc','qnsAppliedPerc']));

           //// return view('livewire.checklistTest',compact('properties'));
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
     * @param  \App\Http\Requests\StoredailydutymanagerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       //$rad=$this->rad;
    //dd('sdsd');

     // $aID = request("aID");
     // $qnAID = request("qnAID");
     // $indexs = request('index');

 //Array Declaration
 $dataQns=[];
 $dataDesc=[];
   //dd($indexs);
 //$sections = $sections->except(['_token','_method','qnID','qnAID','aID','col','prop']);
 //$newSectionArray = array_filter($sections);

   // $sections = request('section_name1_27');
   $property_id = request('propertyID');
   $current_date = date('Y-m-d');

     //dd(request('save'));

   if(request('save')){
   $save = request("save");
      //dd($save); eg 1_
   $save = explode("_", $save);
   $asset_id=request('assetID');
   $section_id=$save[1];
   //Section request
 //dd(request('assetID'));

   $section_name="section_name".$asset_id."_".$section_id."";

   $descKey="desc".$save[0]."";
   $photoKey="attachment".$save[0]."";
   $idxKey="idx".$save[0]."";

 //dd($descKey);
 //$sections = request('section_name1_27');
   $section = request($section_name);
   $keyValue=$save[0].'_'.$save[1];
 //$data = $request->except(['_token','_method','qnID','qnAID','aID','col','prop']);
 //dd($asset_id);
 // $query = $request->query();
 //$input = $request->all();
 $input = $request->except(['_token','_method','qnID','qnAID','aID','col','prop',$section_name]);
 $arrayData = array_filter($input);
//  $arrayDataf= array();
//  $arrayDataf=$arrayData;
//  $arrayPhoto=$arrayData;

//dd($arrayData);

foreach ($arrayData as $key=>$val) {

  $saveff = explode("_", $key);//dd($saveff);

  if(count($saveff)>2){
  if ($val[0] === null || $val[0] ==="no_value"){
    unset($arrayData[$key]);
   }
   }else{
    unset($arrayData[$key]);
     }
}

  //dd($arrayData);
//Insert data
foreach ($arrayData as $key => $value) {

$descStr = Str::startsWith($key,$descKey);
$photoStr = Str::startsWith($key,$photoKey);
$idxStr = Str::startsWith($key,$idxKey);


  $data = explode("_", $key);
  $nameStr=$data[0];
//dd(count($value));

if($nameStr===$idxKey)
 {
  //dd($value[0]);
  if(count($value)>1){

 if($value[1]!=null){
//dd($value[1]);

$insetqnsAns = dutymanager::UpdateOrCreate([
  'property_id'=>$property_id,
  'metaname_id'=>request('metaname_id'),
  'asset_id'=>$asset_id,
  'indicator_id'=>$data[1],

  'section'=>$data[3],
  'datex'=>$current_date,
],[
  'opt_answer_id'=>$value[0],
  'answer_label'=>$value[1],
  'status'=>'Active',
  'action'=>1,
  'user_id'=>auth()->id(),
]);

//dd('Updated');

// $answerTableUpdate1=DB::statement('update dutymanagers a,optional_answers o set a.answer=o.answer,a.answer_label=o.answer_classification where a.opt_answer_id=o.id and a.datex="'.$current_date .'" and a.property_id="'.$property_id.'" and a.asset_id="'.$asset_id.'"');


$answerTableUpdate1=DB::statement('update dutymanagers a,optional_answers o set a.answer=o.answer where a.opt_answer_id=o.id and a.datex="'.$current_date .'" and a.property_id="'.$property_id.'" and a.asset_id="'.$asset_id.'"');

$answerTableUpdate2=DB::statement('update dutymanagers a set a.manager_checklist="Action required" where a.answer !="Yes" and a.datex="'.$current_date .'" and a.property_id="'.$property_id.'" and a.asset_id="'.$asset_id.'"');
//dd('Updated');
 }
  }else{

//dd(request('metaname_id'));

    $insetqnsAns = dutymanager::UpdateOrCreate([
      'property_id'=>$property_id,
      'metaname_id'=>request('metaname_id'),
      'asset_id'=>$asset_id,
      'indicator_id'=>$data[1],

      'section'=>$data[3],
      'datex'=>$current_date,
    ],[
      'opt_answer_id'=>$value[0],
      'answer_label'=>"no_value",
      'status'=>'Active',
      'action'=>1,
      'user_id'=>auth()->id(),
    ]);

    //Update value
   // $answerTableUpdate1=DB::statement('update dutymanagers a,optional_answers o set a.answer=o.answer,a.answer_label=o.answer_classification where a.opt_answer_id=o.id and a.datex="'.$current_date .'" and a.property_id="'.$property_id.'" and a.asset_id="'.$asset_id.'"');
    
    $answerTableUpdate1=DB::statement('update dutymanagers a,optional_answers o set a.answer=o.answer where a.opt_answer_id=o.id and a.datex="'.$current_date .'" and a.property_id="'.$property_id.'" and a.asset_id="'.$asset_id.'"');


$answerTableUpdate2=DB::statement('update dutymanagers a set a.manager_checklist="Action required" where a.answer !="Yes" and a.datex="'.$current_date .'" and a.property_id="'.$property_id.'" and a.asset_id="'.$asset_id.'"');
//dd('Updated');
  }

 }elseif($nameStr ===$descKey)
 {
//desc
$updateqnsF = dutymanager::where('property_id',$property_id)
->where('metaname_id',request('metaname_id'))
 ->where('asset_id',$asset_id)
   ->where('indicator_id',$data[1])
    ->where('section',$data[3])
   ->where('datex',$current_date)
   ->where('indicator_id',$data[1])
->update([
'description'=>$value[0]
]);
 }elseif($nameStr ===$photoKey)
 {
  //photos
  if($value){
    $attach =$value;
    foreach($attach as $attached){

      if($request->hasFile('image')) {
$image       = $request->file('image');
$filename    = $image->getClientOriginalName();
//dd('ddd');
$image_resize = Image::make($image->getRealPath());
$image_resize->resize(300, 100);
$image_resize->save(public_path('img/'.$filename));
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
})->save(storage_path('app/public/img/'.$filename));

//  $image_resize->save(public_path('storage/img/' .$filename));

         $updateqnsF = dutymanager::where('property_id',$property_id)
                      ->where('metaname_id',request('metaname_id'))
                       ->where('asset_id',$asset_id)
                         ->where('indicator_id',$data[1])
                          ->where('section',$data[3])
                         ->where('datex',$current_date)
                         ->where('indicator_id',$data[1])
                      ->update([
                     'photo'=>$filename
                      ]);

}


}
 }

}


 //$answerTableUpdate1=DB::statement('update dutymanagers a,optional_answers o set a.answer=o.answer where a.opt_answer_id=o.id and a.datex="'.$current_date .'" and a.property_id="'.$property_id.'" and a.asset_id="'.$asset_id.'"');
 return redirect()->back()->with('success','Submitted Successfully');
 }

 // dd(request('email_send'));

     if(request('email_send')){
 //dd('ddddx');

 //dd('bvncx');
 $input =app_path().'/reports/pieChart.jrxml';
 //$input='/home3/hakunama/jvm/apache-tomcat-9.0.6/domains/test.hakunamatatas.net/app/reports';
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

   return redirect()->back()->with('success','Submitted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dailydutymanager  $dailydutymanager
     * @return \Illuminate\Http\Response
     */
    public function show(dailydutymanager $dailydutymanager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dailydutymanager  $dailydutymanager
     * @return \Illuminate\Http\Response
     */
    public function edit(dailydutymanager $dailydutymanager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedailydutymanagerRequest  $request
     * @param  \App\Models\dailydutymanager  $dailydutymanager
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedailydutymanagerRequest $request, dailydutymanager $dailydutymanager)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dailydutymanager  $dailydutymanager
     * @return \Illuminate\Http\Response
     */
    public function destroy(dailydutymanager $dailydutymanager)
    {
        //
    }
}
