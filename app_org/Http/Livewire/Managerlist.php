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
 use App\Models\manager;
use App\Models\answerCheckBox;

use App\Models\userActivity;
use App\Models\activityRole;
use App\Models\userRole;

use App\Models\departmentRole;
use App\Models\department;
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
//use App\Http\Livewire\Input;
require base_path().'/vendor/autoload.php';
//require base_path().'/vendor/autoload.php';
include_once(app_path().'/jrf/PHPJasperXML.inc.php');
include_once(app_path().'/jrf/tcpdf/tcpdf.php');
 //include_once(app_path().'/fpdf184/mysql_table.php');
 //include_once(app_path().'/fpdf184/pdfg.php');
use PHPJasperXML;

class Managerlist extends Component
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
// public $rad=[];
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


public function store(Request $request)
    {

 //$rad=$this->rad;

    //$aID = request("aID");
   // $qnAID = request("qnAID");
   // $indexs = request('index');

//Array Declaration
//$dataDesc=[];

//$sections = $sections->except(['_token','_method','qnID','qnAID','aID','col','prop']);
//$newSectionArray = array_filter($sections);

   // $sections = request('section_name1_27');
  $property_id = request('property_id');
  $current_date = date('Y-m-d');


//$property_id = request('property_id');
//dd($property_id);

//dd(request('save'));


  if(request('save')){
  $save = request("save");
  $savef=$save;

  $save = explode("_", $save);
  $asset_id=$save[0];
  $section_id=$save[1];
  //$sec=$save[5];
  //dd($save);
  //Section request


  $section_name="section_name".$asset_id."_".$section_id."";
  $descKey="desc".$save[0]."";
  $photoKey="attachment".$save[0]."";
  $idxKey="idx".$save[0]."";
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
// $arrayDataf= array();
// $arrayDataf=$arrayData;
// $arrayPhoto=$arrayData;

// $linksArray = array_filter($arrayData);
//$linksArray=array_keys($arrayData,NULL);
//dd($arrayData);

foreach ($arrayData as $key=>$val) {

  $saveff = explode("_", $key);

  if(count($saveff)>6){
  if ($save[0]!=$saveff[5] || $val[0] === null){
    unset($arrayData[$key]);
    //End of looping
   }
  }
}


//Takes array value ends with
foreach ($arrayData as $key => $value) {

$descStr = Str::startsWith($key,$descKey);
$photoStr = Str::startsWith($key,$photoKey);
$idxStr = Str::startsWith($key,$idxKey);
//dd($photoStr);


//$result = Str::endsWith($key,$keyValue);
//dd($key);
$data = explode("_", $key);
$nameStr=$data[0];

//dd($result);
//Unset the idx
if($nameStr===$idxKey)
 {
  $insetqnsAns = manager::UpdateOrCreate([
    'property_id'=>$property_id,
    'metaname_id'=>$data[2],
     'asset_id'=>$asset_id,
     'answer_id'=>$data[1],
     'indicator_id'=>$data[4],
     'section'=>$section,
     'cleared_date'=>$current_date,
    'datex'=>$current_date,

  ],[
    'opt_answer_id'=>$data[3],
    'manager_checklist'=>$value[0],
    'status'=>'Active',
    'action'=>1,
    'user_id'=>auth()->id(),
  ]);

  //update answer table
  $updateqnsAnswerF = answer::where('id',$data[1])
                //->where('property_id',$property_id)
               //  ->where('metaname_id',$data[2])
              //   ->where('asset_id',$asset_id)
              //     ->where('indicator_id',$data[4])
              //      ->where('section',$section)
              //     ->where('opt_answer_id',$data[3])

               ->update([
              'manager_checklist'=>$value[0],
              'cleared_date'=>$current_date
               ]);

               $answerTableUpdate1=DB::statement('update managers a,optional_answers o set a.answer=o.answer where a.opt_answer_id=o.id and a.datex="'.$current_date .'" and a.property_id="'.$property_id.'" and a.answer_id="'.$data[1].'" and a.asset_id="'.$asset_id.'"');

 }elseif($nameStr ===$descKey)
 {
  $updateqnsF = manager::where('answer_id',$data[1])
  ->where('property_id',$property_id)
  ->where('metaname_id',$data[2])
   ->where('asset_id',$asset_id)
     ->where('indicator_id',$data[4])
      ->where('section',$section)
     ->where('datex',$current_date)
     ->where('opt_answer_id',$data[3])
  ->update([
 'description'=>$value[0],
 'cleared_date'=>$current_date
  ]);
  $answerTableUpdate1=DB::statement('update managers a,optional_answers o set a.answer=o.answer where a.opt_answer_id=o.id and a.datex="'.$current_date .'" and a.property_id="'.$property_id.'" and a.answer_id="'.$data[1].'" and a.asset_id="'.$asset_id.'"');

 }elseif($nameStr ===$photoKey)
 {
  if($value){
    $attach =$value;
 //   dd($attach);
    foreach($attach as $attached){
         // Get filename with extension
         $fileNameWithExt = $attached->getClientOriginalName();
         // Just Filename
         $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
         // Get just Extension
         $extension = $attached->getClientOriginalExtension();
         //Filename to store
         $imageToStore = $filename.'_'.time().'.'.$extension;
       //  $imageToStore = $imageToStore->resize(300, 200);

         //dd($imageToStore);
         //upload the image
         $path = $attached->storeAs('public/manager/', $imageToStore);

         $updateqnsF = manager::where('answer_id',$data[1])
                     ->where('property_id',$property_id)
                      ->where('metaname_id',$data[2])
                       ->where('asset_id',$asset_id)
                         ->where('indicator_id',$data[4])
                          ->where('section',$section)
                         ->where('datex',$current_date)
                         ->where('opt_answer_id',$data[3])
                      ->update([
                     'photo'=>$imageToStore,
                     'cleared_date'=>$current_date
                      ]);

 }
 }
 $answerTableUpdate1=DB::statement('update managers a,optional_answers o set a.answer=o.answer where a.opt_answer_id=o.id and a.datex="'.$current_date .'" and a.property_id="'.$property_id.'" and a.answer_id="'.$data[1].'" and a.asset_id="'.$asset_id.'"');

 }
}

 dd('Submitted Successfully');
//return redirect()->back()->with('success','Submitted Successfully');
}

 //return redirect()->back()->with('success','Submitted Successfully');

  	// if(request('email_send')){
    //   //dd('fff');
    //   include_once(app_path().'/jrf/sample/setting.php');
    //   $PHPJasperXML = new PHPJasperXML();
    //   $v[]=1;


    //   // $metanameAll=array();
    //   // $indicatorAll=array();
    //     //$param[]="active";
    //     //$param[]="inactive";
    //     // $metanameAll=collect($metaArray);
    //     // $metaString=str_replace('[','',$metanameAll);
    //     // $metaString=str_replace(']','',$metaString);
    //     //
    //     // $indicatorAll=collect($keyArray);
    //     // $indicatorString=str_replace('[','',$indicatorAll);
    //     // $indicatorString=str_replace(']','',$indicatorString);

    //   $PHPJasperXML->arrayParameter =array("property_id"=>1);
    //   //$PHPJasperXML->arrayParameter =array("date_from"=> '"'.$date_start.'"',"date_to"=> '"'.$date_end.'"');
    //   //dd($PHPJasperXML->arrayParameter);
    //   //$PHPJasperXML->arrayParameter =array();
    //   //$PHPJasperXML->arrayParameter = array("param" => array('1' =>1, '3' =>3));

    //           $PHPJasperXML->load_xml_file(app_path().'/reports/pieChart.jrxml');
    //            //$PHPJasperXML->load_xml_file(app_path().'/reports/propertyReportf.jrxml');

    //       $PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
    //       //$PHPJasperXML->outpage("D");
    //       ob_end_clean();
    //       //dd($PHPJasperXML);
    //       $PHPJasperXML->outpage("I");

    // }
dd('Not updated');
return redirect()->route('/managers-inspection/{id}');
  //return redirect()->back()->with('success','Submitted Successfully');
  dd('ffg');
}




// public function storeIteM(Request $request)
// {
//     $this->metavv=$id;
//       $this->metaValue=$name;
// }

//RENDER METHOD
//public function render(Request $request)

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
      // $metadatas = optionalAnswer::get();
//Assign Activities to userActivities
$departments=user::where('id',auth()->id())->first();
//Get Department name
  $departGetName= department::where('status','Active')
  ->where('id',$departments->department_id)->first();


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
}
$a=array();
  foreach ($acts as $act) {
    $a[]=$act->id;
  }

  $a=collect($a);
//Extract date
$datet=Carbon::now();
$datet=$datet->format('H:i:s');
//dd($departments->property_id);

//Get asset_show from assets table
$asset_show=asset::where('property_id',$departments->property_id)->first();
//dd($asset_show->time_show);
//dd($datet);
if($datet>="23:45")
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

    //  //$ppp = DB::select("select id,property_id,metaname_id,asset_name from assets where status='Active' and time_show=1 and asset_name!='' and property_id='.$departments->property_id.' and metaname_id in(".trim($a,'[]').") order_by id");
    //  $ppp = DB::select("select id,property_id,metaname_id,asset_name from assets where status='Active' and time_show=1 and asset_name!='' and property_id='.$departments->property_id.' and metaname_id in(".trim($a,'[]').")");
    // // $ppp = DB::select('select id,property_id,metaname_id,asset_name from assets where status="Active" and time_show=1 and asset_name!=""');
    //  dd($ppp);

     $metas = asset::join('metanames','assets.metaname_id','metanames.id')
     ->where('assets.status','Active')
       ->where('assets.time_show',$asset_show->time_show)
       ->where('assets.asset_name','!=',"")
       ->where('assets.property_id',$departments->property_id)
       ->whereIn('assets.metaname_id',$a)
       ->groupby('assets.metaname_id')
       ->select('metanames.id','metanames.metaname_name')
         ->orderBy('metanames.id')->get();


    $qns = DB::select("select * from qnsview_answer where property_id in(".$departments->property_id.")");
    $qns=collect($qns);

       //dd($qns);
    $sections=qnsAppliedto::where('qns_appliedtos.status','Active')
    ->groupby('qns_appliedtos.metaname_id')
    ->groupby('qns_appliedtos.section')
    ->get();
  // dd($sections);

   $datatypes = datatype::get();
  // $checkQnsProp = DB::select('select d.property_id,d.metaname_id,d.asset_id,d.value from dynamic_ind_updates d,assets p where d.property_id=p.property_id and d.metaname_id=p.metaname_id and d.asset_id=p.id and d.datex="'.$current_date.'" and d.status="Active" group by d.asset_id');
   $checkQnsProp = DB::select('select * from checkqnsprop_view where datex="'.$current_date.'" group by asset_id');
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

$property_id=$departments->property_id;
$metanameCollects=collect($metanames);
//Count Questions
$qnsCount=answer::where('answer','!=','Yes')
->where('manager_checklist','!=','Cleared')
->where('property_id',$departments->property_id)
 ->where('status','Active')
->get();

$qnsCount = collect($qnsCount);

      return view("livewire.managerlist",compact("departGetName","qnsCount","datatypes","metanames","metanameCollects","metaAll","pp","metas","qns","sections","userActitivities","userMetanames","acts","checkQnsProp","checkQns","assetPerc","answerPerc","answerCount","totalqns","qnsAppliedPerc","property_id"))
      ->layout("layouts.app");

  }
}
