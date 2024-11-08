<?php

namespace App\Http\Controllers;

use App\Models\property;
use App\Models\keyIndicator;
use App\Models\answer;
use App\Models\user;
use App\Models\dbconnect;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use App\Http\Helpers\Helper;
  //use Helper;

use Carbon\Carbon;
use App\Models\expenseCategory;
use App\Models\direct_expenses;
use App\Models\metaname;
use App\Models\optionalAnswer;
use App\Models\asset;
use Illuminate\Support\Str;
//use PHPJasper\PHPJasper;
use JasperPHP\JasperPHP as JasperPHP;
use Illuminate\Http\Request;
use PHPJasper\PHPJasper;
use Illuminate\Support\Facades\Redirect;

 require base_path().'/vendor/autoload.php';
 //require base_path().'/vendor/autoload.php';
include_once(app_path().'/jrf/PHPJasperXML.inc.php');
 include_once(app_path().'/jrf/tcpdf/tcpdf.php');
  //include_once(app_path().'/fpdf184/mysql_table.php');
  //include_once(app_path().'/fpdf184/pdfg.php');
 use PHPJasperXML;
 include(app_path().'/db/dbconn.php');

  //include_once(app_path().'/fpdf184/pdfg.php');
  //require base_path().'/vendor/autoload.php';
 // use PHPJasperXM;
//use PDF;
class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $properties = property::where('status','Active')->get();
      //dd($properties);
    return view('admin.settings.properties.property',compact('properties'));
    }

 public function dashProperty($id)
    {       
  $auth=auth::user();

//Helper::some_function();
 // $aData['dataC'] = asset::getAsset(1);
 
  $aData['dataC'] = dbconnect::getConnect(900);

 //dd($aData);
//Helper::shout('courses');
      // dd($id);

 //$dd=Config::get(app_path().'/db/dbconn.php');
//dd($dd);
 // $helperx=new Helper();
 //$helper->shout('this is how to use autoloading correctly!!');
//$caps=helpers::shout('this is how to use autoloading correctly!!');
// dd($helperx);

// $db="checkmasterdb2";
        
//     Config::set('database.connections.clientdb', [   
//     'driver' => 'mysql',  
//         'host' =>'127.0.0.1',  
//         'database' =>$db,  
//         'username' =>'root',  
//         'password' =>'',  
//         'charset' => 'utf8mb4',  
//         'collation' => 'utf8mb4_unicode_ci',  
//         'prefix' => '',  
//         'strict' => true,  
//         'engine' => null,  
//    // all the other params from config
// ]);

         //dd($auth_user);
     // {{session("current-country")}} retrive data onblade

        //DB::purge('mynewconnection');
         // $properties = property::where('status','Active')->get();
      
 // $databaseName = Helper::getDatabaseName();
 //    DB::connection($databaseName)
 //    ->table('your table name')
 //    ->select('*')
 //    ->get();

   //dd(session("auth_user"));

      $properties = property::where('status','Active')->get();
      //$propertyName = Property::where('id',1)->first();
    
     //$usersx=property::on('clientdb')->where('status','Active')->get(); 

     // $users = DB::connection('conn2')->select('Select * from users');
       $users = DB::connection('clientdb')->select('Select * from users');
    //dd($users);

    return view('admin.settings.properties.dash.dash-property',compact('properties'));
    }



 public function reportGeneral(Request $request,$id)
    {
$prnt="";
$userID=user::where('id',auth()->id())->first();
$property=property::where('id',$userID->property_id)->first();
  //$segment = $request->segment(1);
 // $currenturl = Request::url();
 // dd('uuu');
// dd($property->id);


        $segments = request()->segments();
        $last  = end($segments);
        $first = reset($segments);


$url="http://localhost:8000/report-general/{$property->id}/dashboard";
//dd($url);
 $segmentsExploide = explode('/', $url);
//END OF RESERVED CODE FOR URL

//dd('mmm');
$uri =request()->path();
//dd($uri);

      $keyIndicators = keyIndicator::get();
      $metanames = metaname::get();
      $propertiesNames = property::get();
//dd($metanames);
    $current_date = date('Y-m-d');
    $properties = property::where('id',$property->id)
      ->where('status','Active')->first();
//dd($properties);

   
      $reportDailyData=DB::select('select * from reportdailydata_view where property_id="'.$property->id.'" order by metaname_name ASC');
    // dd($reportDailyData);

    // $reportDailyReader=DB::select('select a.id,a.property_id,p.property_name,a.metaname_id,m.metaname_name,a.answer,a.indicator_id,s.qns,a.asset_id,t.asset_name,u.name, a.opt_answer_id,o.answer_classification,a.description,a.photo,a.datex from answers a,properties p,set_indicators s,users u,assets t,optional_answers o,metanames m where a.indicator_id=o.indicator_id and a.metaname_id=m.id and a.user_id=u.id and a.asset_id=t.id and a.indicator_id=s.id and a.opt_answer_id=o.id and p.id=a.property_id and a.datex="'.$current_date.'" and a.property_id="'.$id.'"');

//Delaying on data loading
    // $reportDailyReader=DB::select('select * from reportdailyreader_view where property_id="'.$property->id.'"');

 $reportDailyReader=DB::select('select * from issue_report_view where property_id="'.$property->id.'"');
//dd($reportDailyReader);

$dataDaily = collect($reportDailyData);
$dailyMetaCollects=$dataDaily->groupBy('metaname_name');
//dd($dailyMetaCollects);
$roomDaily = $dataDaily->where('metaname_name','Room')
   ->whereIn('answer_classification',['Bad','Critical']);
   $badDaily=$roomDaily->where('answer_classification','Bad')->count();
   $criticalDaily=$roomDaily->where('answer_classification','Critical')->count();

$xx=$dataDaily->count();
    //Weekly Report
$reportWeeklyData=DB::select('select a.property_id,a.metaname_id,m.metaname_name,a.indicator_id,a.asset_id, a.opt_answer_id,a.answer,o.answer_classification from answers a,optional_answers o,metanames m where a.indicator_id=o.indicator_id and a.metaname_id=m.id and a.property_id="'.$property->id.'" and a.opt_answer_id=o.id and WEEK(a.datex)=WEEK(NOW()) order by m.metaname_name ASC');

$dataWeekly = collect($reportWeeklyData);
$weeklyMetaCollects=$dataWeekly->groupBy('metaname_name');
$roomWeekly = $dataWeekly->where('metaname_name','Room')
   ->whereIn('answer_classification',['Bad','Critical']);
   $badWeekly=$roomWeekly->where('answer_classification','Bad')->count();
   $criticalWeekly=$roomWeekly->where('answer_classification','Critical')->count();

    //Monthly Report
$reportMonthlyData=DB::select('select a.property_id,a.metaname_id,m.metaname_name,a.indicator_id,a.asset_id, a.opt_answer_id,a.answer,o.answer_classification from answers a,optional_answers o,metanames m where a.indicator_id=o.indicator_id and a.metaname_id=m.id and a.property_id="'.$property->id.'" and a.opt_answer_id=o.id and month(a.datex)=month(NOW()) order by m.metaname_name ASC');

 $dataMonthly = collect($reportMonthlyData);
$monthlyMetaCollects=$dataMonthly->groupBy('metaname_name');
$roomMonthly = $dataMonthly->where('metaname_name','Room')
   ->whereIn('answer_classification',['Bad','Critical']);
   $badMonthly=$roomMonthly->where('answer_classification','Bad')->count();
   $criticalMonthly=$roomMonthly->where('answer_classification','Critical')->count();


     if(request('search') || request('print')){
       $property_id=$_GET['property_search'];
//dd($property_id);


    $metaArray=array();
    $keyArray=array();

     $start_d = substr(request('date'),0,10);
        $start_date = Carbon::parse($start_d)->format('Y-m-d').' 00:00:00';
        $end_d = substr(request('date'),-10);
        $end_date = Carbon::parse($end_d)->format('Y-m-d').' 23:59:00';

	 //Metaname Array creation
	 $metaNames=metaname::get();
	 $collectAllMeta = collect($metaNames);

	 //Metaname Array creation
	 $keyNames=keyIndicator::get();
     //dd($keyNames);
	 $collectAllKey = collect($keyNames);

	//The Request is metaArray
	if(request('metaname_search')){
		if(request('metaname_search')=="All")
		{
 foreach ($collectAllMeta as $metas) {
    $metaArray[]=$metas->metaname_name;
   }
		}
		else{
		$metax=$collectAllMeta->where('metaname_name',request('metaname_search'));
		foreach ($metax as $metac) {
    $metaArray[]=$metac->metaname_name;
   }
	 }
}

		//The Request is KeyIndicator
	if(request('indicator_search')){
		if(request('indicator_search')=="All")
		{
 foreach ($collectAllKey as $keys) {
    $keyArray[]=$keys->key_name;
   }
		}elseif(request('indicator_search')=="All-not-Good"){
          foreach ($collectAllKey as $keys) {
    $keyArray[]=$keys->key_name;
   }
    unset($keyArray[0]);
        }

		else{
		$keysx=$collectAllKey->where('key_name',request('indicator_search'));
		foreach ($keysx as $keyc) {
    $keyArray[]=$keyc->key_name;
   }
	 }
}

//dd('ddd');
//dd($keyArray);

//End of Request
	 $reportDailyReader = answer::join('properties','answers.property_id','properties.id')
	 ->join('set_indicators','answers.indicator_id','set_indicators.id')
	  ->join('users','answers.user_id','users.id')
	   ->join('assets','answers.asset_id','assets.id')
	    ->join('optional_answers','answers.opt_answer_id','optional_answers.id')
		->join('metanames','answers.metaname_id','metanames.id')

	->where('answers.property_id',$property_id)
    ->whereColumn('answers.indicator_id',"optional_answers.indicator_id")
    ->whereIn('metanames.metaname_name',$metaArray)
	   ->whereIn('optional_answers.answer_classification',$keyArray)
      //->where('set_indicators.qns','!=',"")
     ->whereBetween('answers.datex',[$start_date, $end_date])
   
   ->select('answers.id','answers.property_id','answers.indicator_id','answers.metaname_id','answers.asset_id','answers.opt_answer_id','answers.answer','answers.photo','answers.description','answers.datex as Date','answers.answer_label','metanames.metaname_name','assets.asset_name','properties.property_name','set_indicators.qns','users.name as PostedBy')
   ->orderBy('set_indicators.id')
	 ->get();
//dd($reportDailyReader);
   }
   else{
	   //dd('Not role');
   }

   
	if(request('print')){
   // $id=$_GET['property_search'];
$prnt=1;
    $datex=$_GET['date'];
    $date_end = substr($datex, strpos($datex, "-") + 2);
   //$date_start = explode("_", $datex)[1];
$date_start = strtok($datex, " ");
$date_start=date_create($date_start);
$date_start=date_format($date_start,"Y-m-d");

$date_end=date_create($date_end);
$date_end=date_format($date_end,"Y-m-d");

// $server="localhost";
// $db="hakunama_checklistmasterdb";
// $user="hakunama_tatas_user";
// $pass="checklistmaster";
// $version="1.1";

// $pgport=3306; //only for postgresql

   include_once(app_path().'/jrf/sample/setting.php');

    $PHPJasperXML = new PHPJasperXML();
    $v[]=1;

//dd('print');
    $metanameAll=array();
    $indicatorAll=array();
      //$param[]="active";
      //$param[]="inactive";
      //dd($indicatorAll);

      $metanameAll=collect($metaArray);
      $metaString=str_replace('[','',$metanameAll);
      $metaString=str_replace(']','',$metaString);

      $indicatorAll=collect($keyArray);
      $indicatorString=str_replace('[','',$indicatorAll);
      $indicatorString=str_replace(']','',$indicatorString);
  //  dd($indicatorString);
//$param=collect($param);


  //dd($indicatorString);

   // dd($indicatorString);

      if(request('indicator_search')=="All-not-Good")
        {           
  //$indicatorString=str_replace('"Good",', '', $indicatorString);
              $indicatorString=str_replace(['"1":', '"2":', '"3":', '"4":','{','}'], '', $indicatorString);
     // dd($indicatorString);
        }


//$datex=DateTime.Now(dd-MM-yyyy);
//$d = new SimpleDateFormat("dd/MM/yyyy").format($P{datex});
  //$enddb = '2022-08-02';
//dd($d);
  //  $PHPJasperXML->arrayParameter=array("property_id"=>$id);
  //  $PHPJasperXML->arrayParameter=array("param"=>1,"param"=>2);
//$date=date("d/m/Y")
//dd($date);
//$PHPJasperXML->sql="select * from answers";
//dd($PHPJasperXML);

// $PHPJasperXML->arrayParameter =array("property_id"=>$property_id,"metanames"=>$metaString,"indicator"=>$indicatorString,"date_from"=> '"'.$date_start.'"',"date_to"=> '"'.$date_end.'"');

//dd('dsds');

$PHPJasperXML->arrayParameter =array("property_id"=>$property_id,"metanames"=>$metaString,"indicator"=>$indicatorString,"date_from"=> '"'.$date_start.'"',"date_to"=> '"'.$date_end.'"');

//dd($PHPJasperXML->arrayParameter);

//$PHPJasperXML->arrayParameter =array("date_from"=> '"'.$date_start.'"',"date_to"=> '"'.$date_end.'"');
//dd($PHPJasperXML->arrayParameter);
//$PHPJasperXML->arrayParameter =array();
//$PHPJasperXML->arrayParameter = array("param" => array('1' =>1, '3' =>3));

     $PHPJasperXML->load_xml_file(app_path().'/reports/propertyReportf.jrxml');
         //$PHPJasperXML->load_xml_file(app_path().'/reports/propertyReportf.jrxml');

//dd($PHPJasperXML);

    $PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
  //  dd($PHPJasperXML);
    //$PHPJasperXML->outpage("D");
    ob_end_clean();
    //dd($PHPJasperXML);
    $PHPJasperXML->outpage("I");
  }

   //dd('Not role');
   //Metaname percent

   $answerCount=DB::select('select a.*,m.metaname_name from answers a,metanames m where a.metaname_id=m.id and DAY(a.datex)=DAY(NOW()) and a.status="Active" group by a.property_id,a.metaname_id,a.indicator_id,a.asset_id order by a.metaname_id ASC');
   $answerCount = collect($answerCount);

   //$totalqns=DB::select('select a.metaname_id,metaname_name,count(a.metaname_id)totalqns from assets a, qns_appliedtos q,metanames m where a.metaname_id=q.metaname_id and a.metaname_id=m.id and a.status="Active" and q.status="Active" group by a.metaname_id');
   $totalqns=DB::select('select a.metaname_id,metaname_name from assets a, qns_appliedtos q,metanames m where a.metaname_id=q.metaname_id and a.metaname_id=m.id and a.status="Active" and q.status="Active"');

   $totalqns = collect($totalqns);

        return view('admin.settings.properties.dash.report-general',compact('properties','property','propertiesNames','metanames','keyIndicators','reportDailyReader','dailyMetaCollects','weeklyMetaCollects','monthlyMetaCollects','badDaily','badWeekly','badMonthly','criticalDaily','criticalWeekly','criticalMonthly','id','uri','answerCount','totalqns','prnt'));
            //return view('admin.settings.properties.dash.report-general',compact('properties','property','propertiesNames','metanames','keyIndicators','dailyMetaCollects','weeklyMetaCollects','monthlyMetaCollects','badDaily','badWeekly','badMonthly','criticalDaily','criticalWeekly','criticalMonthly','id','uri','answerCount','totalqns','prnt'));
    }



    public function reportAction(Request $request,$id)
       {
         $prnt="";
   $userID=user::where('id',auth()->id())->first();
   $property=property::where('id',$userID->property_id)->first();

           $segments = request()->segments();
           $last  = end($segments);
   $first = reset($segments);
   $url="http://localhost:8000/report-general/{$property->id}/dashboard";
    $segmentsExploide = explode('/', $url);
   //END OF RESERVED CODE FOR URL

          $uri =request()->path();
         $keyIndicators = keyIndicator::where('key_name','!=','Good')->get();

         $metanames = metaname::get();
         $propertiesNames = property::get();
   //dd($metanames);
       $current_date = date('Y-m-d');
       $properties = property::where('id',$id)
         ->where('status','Active')->first();

        //Daily Report
       $reportDailyData=DB::select('select a.property_id,a.metaname_id,m.metaname_name,a.indicator_id,a.asset_id, a.opt_answer_id,a.answer,o.answer_classification from answers a,optional_answers o,metanames m where a.indicator_id=o.indicator_id and a.metaname_id=m.id and a.property_id="'.$id.'" and a.opt_answer_id=o.id and a.datex="'.$current_date.'" order by m.metaname_name ASC');
     
       //$reportDailyData2=DB::select('select a.property_id,a.metaname_id,m.metaname_name,a.indicator_id,a.asset_id, a.opt_answer_id,a.answer,o.answer_classification from answers a,optional_answers o,metanames m where a.indicator_id=o.indicator_id and a.metaname_id=m.id and a.property_id="'.$id.'" and a.opt_answer_id=o.id and a.datex="'.$current_date.'"');

       $reportDailyReader=DB::select('select a.id,a.property_id,p.property_name,a.metaname_id,m.metaname_name,a.answer,a.indicator_id,s.qns,a.asset_id,t.asset_name,u.name, a.opt_answer_id,o.answer_classification,a.description,a.photo,a.datex from answers a,properties p,set_indicators s,users u,assets t,optional_answers o,metanames m where a.indicator_id=o.indicator_id and a.metaname_id=m.id and a.user_id=u.id and a.asset_id=t.id and a.indicator_id=s.id and a.opt_answer_id=o.id and p.id=a.property_id and a.datex="'.$current_date.'" and a.property_id="'.$id.'"');
   //dd($reportDailyReader);

   $dataDaily = collect($reportDailyData);
   $dailyMetaCollects=$dataDaily->groupBy('metaname_name');
   //dd($dailyMetaCollects);
   $roomDaily = $dataDaily->where('metaname_name','Room')
      ->whereIn('answer_classification',['Bad','Critical']);
      $badDaily=$roomDaily->where('answer_classification','Bad')->count();
      $criticalDaily=$roomDaily->where('answer_classification','Critical')->count();

   $xx=$dataDaily->count();
       //Weekly Report
   $reportWeeklyData=DB::select('select a.property_id,a.metaname_id,m.metaname_name,a.indicator_id,a.asset_id, a.opt_answer_id,a.answer,o.answer_classification from answers a,optional_answers o,metanames m where a.indicator_id=o.indicator_id and a.metaname_id=m.id and a.property_id="'.$id.'" and a.opt_answer_id=o.id and WEEK(a.datex)=WEEK(NOW()) order by m.metaname_name ASC');

   $dataWeekly = collect($reportWeeklyData);
   $weeklyMetaCollects=$dataWeekly->groupBy('metaname_name');
   $roomWeekly = $dataWeekly->where('metaname_name','Room')
      ->whereIn('answer_classification',['Bad','Critical']);
      $badWeekly=$roomWeekly->where('answer_classification','Bad')->count();
      $criticalWeekly=$roomWeekly->where('answer_classification','Critical')->count();

       //Monthly Report
   $reportMonthlyData=DB::select('select a.property_id,a.metaname_id,m.metaname_name,a.indicator_id,a.asset_id, a.opt_answer_id,a.answer,o.answer_classification from answers a,optional_answers o,metanames m where a.indicator_id=o.indicator_id and a.metaname_id=m.id and a.property_id="'.$id.'" and a.opt_answer_id=o.id and month(a.datex)=month(NOW()) order by m.metaname_name ASC');

   $dataMonthly = collect($reportMonthlyData);
   $monthlyMetaCollects=$dataMonthly->groupBy('metaname_name');
   $roomMonthly = $dataMonthly->where('metaname_name','Room')
      ->whereIn('answer_classification',['Bad','Critical']);
      $badMonthly=$roomMonthly->where('answer_classification','Bad')->count();
      $criticalMonthly=$roomMonthly->where('answer_classification','Critical')->count();

       




        if(request('search') || request('print')){
          $id=$_GET['property_search'];

      $metaArray=array();
   		$keyArray=array();

           $start_d = substr(request('date'),0,10);
           $start_date = Carbon::parse($start_d)->format('Y-m-d').' 00:00:00';
           $end_d = substr(request('date'),-10);
           $end_date = Carbon::parse($end_d)->format('Y-m-d').' 23:59:00';

   	 //Metaname Array creation
   	 $metaNames=metaname::get();
   	 $collectAllMeta = collect($metaNames);

   	 //Metaname Array creation
   	 $keyNames=keyIndicator::get();
   	 $collectAllKey = collect($keyNames);

   	//The Request is metaArray
   	if(request('metaname_search')){
   		if(request('metaname_search')=="All")
   		{
    foreach ($collectAllMeta as $metas) {
       $metaArray[]=$metas->metaname_name;
      }
   		}
   		else{
   		$metax=$collectAllMeta->where('metaname_name',request('metaname_search'));
   		foreach ($metax as $metac) {
       $metaArray[]=$metac->metaname_name;
      }
   	 }
   }

   		//The Request is KeyIndicator
   	if(request('indicator_search')){
   		if(request('indicator_search')=="All")
   		{
    foreach ($collectAllKey as $keys) {
       $keyArray[]=$keys->key_name;
      }
   		}
   		else{
   		$keysx=$collectAllKey->where('key_name',request('indicator_search'));
   		foreach ($keysx as $keyc) {
       $keyArray[]=$keyc->key_name;
      }
   	 }
   }
   //End of Request
   	 $reportDailyReader = answer::join('properties','answers.property_id','properties.id')
   	 ->join('set_indicators','answers.indicator_id','set_indicators.id')
   	 ->join('users','answers.user_id','users.id')
   	 ->join('assets','answers.asset_id','assets.id')
   	 ->join('optional_answers','answers.opt_answer_id','optional_answers.id')
   		->join('metanames','answers.metaname_id','metanames.id')

   		->where('answers.property_id',$id)
       ->whereColumn('answers.indicator_id',"optional_answers.indicator_id")
       ->whereIn('metanames.metaname_name',$metaArray)
   	  ->whereIn('optional_answers.answer_classification',$keyArray)
        //->where('set_indicators.qns','!=',"")
      ->whereBetween('answers.datex',[$start_date, $end_date])
      ->select('answers.id','answers.property_id','answers.indicator_id','answers.metaname_id','answers.asset_id','answers.opt_answer_id','answers.answer','answers.photo','answers.description','answers.datex','optional_answers.answer_classification','metanames.metaname_name','assets.asset_name','properties.property_name','set_indicators.qns','users.name')
      ->orderBy('set_indicators.id')
   	  ->get();
//update user.url column table
    //  dd(auth()->id());
      $updateUser = user::where('id',auth()->id())
           ->update([
            'url'=>$_SERVER['REQUEST_URI']
          ]);
      }
      else{
   	   //dd('Not role');
      }

      //dd($metaArray);
   	if(request('print')){
       $id=$_GET['property_search'];
        $prnt=1;
       $datex=$_GET['date'];
       $date_end = substr($datex, strpos($datex, "-") + 2);
      //$date_start = explode("_", $datex)[1];
   $date_start = strtok($datex, " ");
   $date_start=date_create($date_start);
   $date_start=date_format($date_start,"Y-m-d");

   $date_end=date_create($date_end);
   $date_end=date_format($date_end,"Y-m-d");

       include_once(app_path().'/jrf/sample/setting.php');
       $PHPJasperXML = new PHPJasperXML();
       $v[]=1;
       $metanameAll=array();
       $indicatorAll=array();
         //$param[]="active";
         //$param[]="inactive";
         $metanameAll=collect($metaArray);
         $metaString=str_replace('[','',$metanameAll);
         $metaString=str_replace(']','',$metaString);

         $indicatorAll=collect($keyArray);
         $indicatorString=str_replace('[','',$indicatorAll);
         $indicatorString=str_replace(']','',$indicatorString);

   $PHPJasperXML->arrayParameter =array("property_id"=>$id,"metanames"=>$metaString,"indicator"=>$indicatorString,"date_from"=> '"'.$date_start.'"',"date_to"=> '"'.$date_end.'"');
   //$PHPJasperXML->arrayParameter =array("date_from"=> '"'.$date_start.'"',"date_to"=> '"'.$date_end.'"');
   //dd($PHPJasperXML->arrayParameter);
   //$PHPJasperXML->arrayParameter =array();
   //$PHPJasperXML->arrayParameter = array("param" => array('1' =>1, '3' =>3));

        $PHPJasperXML->load_xml_file(app_path().'/reports/propertyReportf.jrxml');
       //$PHPJasperXML->load_xml_file(app_path().'/reports/propertyReportf.jrxml');

       $PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
       //$PHPJasperXML->outpage("D");
       ob_end_clean();
       //dd($PHPJasperXML);
       $PHPJasperXML->outpage("D");
     }
      //dd('Not role');
      //Metaname percent
      $answerCount=DB::select('select a.*,m.metaname_name from answers a,metanames m where a.metaname_id=m.id and DAY(a.datex)=DAY(NOW()) and a.status="Active" group by a.property_id,a.metaname_id,a.indicator_id,a.asset_id order by a.metaname_id ASC');
      $answerCount = collect($answerCount);
      //$totalqns=DB::select('select a.metaname_id,metaname_name,count(a.metaname_id)totalqns from assets a, qns_appliedtos q,metanames m where a.metaname_id=q.metaname_id and a.metaname_id=m.id and a.status="Active" and q.status="Active" group by a.metaname_id');
      $totalqns=DB::select('select a.metaname_id,metaname_name from assets a, qns_appliedtos q,metanames m where a.metaname_id=q.metaname_id and a.metaname_id=m.id and a.status="Active" and q.status="Active"');
      $totalqns = collect($totalqns);
//dd($prnt);
          return view('admin.settings.action.report-action',compact('properties','property','propertiesNames','metanames','keyIndicators','reportDailyReader','dailyMetaCollects','weeklyMetaCollects','monthlyMetaCollects','badDaily','badWeekly','badMonthly','criticalDaily','criticalWeekly','criticalMonthly','id','uri','answerCount','totalqns','prnt'));
       }


       public function reportViewUpdate(Request $request,$sn)
          {

              $optionalID=optionalAnswer::where('id',request('optional_id'))->first();
              $answerID=answer::where('id',$sn)->first();
         //dd($optionalID->id);

            $updateAnswer = answer::where('id',$sn)
                 ->update([
                  'opt_answer_id'=>request('optional_id'),
                  'answer'=>$optionalID->answer,
                   'user_id'=>auth()->id()
                ]);
              
  $update1=DB::select('UPDATE optional_answers set answer_classification="Good" where answer="Yes"');
 $update2=DB::select('UPDATE optional_answers set answer_classification="Bad" where answer="No"');

// return redirect()->back();
//return back();
// return redirect()->url()->previous();
//return Redirect::to(url()->previous());
$uri=user::where('id',auth()->id())->first();
//$uri =request()->input('uri');
//dd($_SERVER['REQUEST_URI']);
//dd($uri->url);

//printf
if(request('print')){
   //$answer_id=$_GET['answer_id'];
//dd($sn);

//   $date_end = substr($datex, strpos($datex, "-") + 2);
//  //$date_start = explode("_", $datex)[1];
// $date_start = strtok($datex, " ");
// $date_start=date_create($date_start);
// $date_start=date_format($date_start,"Y-m-d");
//
// $date_end=date_create($date_end);
// $date_end=date_format($date_end,"Y-m-d");
//dd(auth()->id());

  include_once(app_path().'/jrf/sample/setting.php');
  $PHPJasperXML = new PHPJasperXML();
  $v[]=1;

$PHPJasperXML->arrayParameter =array("answer_id"=>$sn);
//dd($PHPJasperXML->arrayParameter);
//$PHPJasperXML->arrayParameter =array();
//$PHPJasperXML->arrayParameter = array("param" => array('1' =>1, '3' =>3));

$PHPJasperXML->load_xml_file(app_path().'/reports/detailDailyReport.jrxml');
  //$PHPJasperXML->load_xml_file(app_path().'/reports/propertyReportf.jrxml');

  $PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
  //$PHPJasperXML->outpage("D");
  ob_end_clean();
  //dd($PHPJasperXML);
  $PHPJasperXML->outpage("I");
}
//End of print


          return redirect($uri->url)->with('info','Returned successfly');
          }


          public function reportViewPost(Request $request,$sn,$id)
             {
         $prnt="";
         $userID=user::where('id',auth()->id())->first();
         $property=property::where('id',$userID->property_id)->first();

                 $segments = request()->segments();
                 $last  = end($segments);
         $first = reset($segments);
         $url="http://localhost:8000/report-general/{$property->id}/dashboard";
          $segmentsExploide = explode('/', $url);
         //END OF RESERVED CODE FOR URL

                // $uri =request()->path();
               $keyIndicators = keyIndicator::where('key_name','!=','Good')->get();

               $metanames = metaname::get();
               $propertiesNames = property::get();
         //dd($metanames);

             $current_date = date('Y-m-d');
             $properties = property::where('id',$id)
               ->where('status','Active')->first();

//dd($property->id);

         $reportDailyReader = answer::join('properties','answers.property_id','properties.id')
         ->join('set_indicators','answers.indicator_id','set_indicators.id')
          ->join('users','answers.user_id','users.id')
           ->join('assets','answers.asset_id','assets.id')
            ->join('optional_answers','answers.opt_answer_id','optional_answers.id')
          ->join('metanames','answers.metaname_id','metanames.id')

           ->where('answers.property_id',$property->id)
            ->where('answers.id',$sn)
          ->whereColumn('answers.indicator_id',"optional_answers.indicator_id")

          // ->whereIn('metanames.metaname_name',$metaArray)
          // ->whereIn('optional_answers.answer_classification',$keyArray)
          //  ->where('set_indicators.qns','!=',"")
          // ->whereBetween('answers.datex',[$start_date, $end_date])

         ->select('answers.id','answers.property_id','answers.indicator_id','answers.metaname_id','answers.asset_id','answers.opt_answer_id','answers.answer','answers.photo','answers.description','answers.datex','optional_answers.answer_classification','metanames.metaname_name','assets.asset_name','properties.property_name','set_indicators.qns','users.name')
         //->orderBy('set_indicators.id')
         ->first();

        //dd($reportDailyReader->property_id);
        //get optionals answers

//dd($reportDailyReader);

        $updateUser = user::where('id',auth()->id())
            ->update([
             // 'url'=>$_SERVER['REQUEST_URI']
             'url'=>request('uri')
           ]);
        // $uri = $request->input('uri');
        //dd($_SERVER['REQUEST_URI']);
        //dd(request('uri'));

        $optAnswers = optionalAnswer::where('indicator_id',$reportDailyReader->indicator_id)->get();

        //dd($optAnswers);
                return view('admin.settings.action.report-view',compact('properties','property','propertiesNames','metanames','keyIndicators','reportDailyReader','id','optAnswers'));
    }


          public function reportViewPrint(Request $request,$sn,$id)
             {
         $prnt="";
         $userID=user::where('id',auth()->id())->first();
         $property=property::where('id',$userID->property_id)->first();

                 $segments = request()->segments();
                 $last  = end($segments);
         $first = reset($segments);
         $url="http://localhost:8000/report-general/{$property->id}/dashboard";
          $segmentsExploide = explode('/', $url);
         //END OF RESERVED CODE FOR URL

                // $uri =request()->path();
               $keyIndicators = keyIndicator::where('key_name','!=','Good')->get();

               $metanames = metaname::get();
               $propertiesNames = property::get();
         //dd($metanames);

             $current_date = date('Y-m-d');
             $properties = property::where('id',$id)
               ->where('status','Active')->first();

         $reportDailyReader = answer::join('properties','answers.property_id','properties.id')
         ->join('set_indicators','answers.indicator_id','set_indicators.id')
          ->join('users','answers.user_id','users.id')
           ->join('assets','answers.asset_id','assets.id')
            ->join('optional_answers','answers.opt_answer_id','optional_answers.id')
          ->join('metanames','answers.metaname_id','metanames.id')

          ->where('answers.property_id',$id)
           ->where('answers.id',$sn)
          ->whereColumn('answers.indicator_id',"optional_answers.indicator_id")
          //->whereIn('metanames.metaname_name',$metaArray)
          //->whereIn('optional_answers.answer_classification',$keyArray)
           //->where('set_indicators.qns','!=',"")
          //->whereBetween('answers.datex',[$start_date, $end_date])
         ->select('answers.id','answers.property_id','answers.indicator_id','answers.metaname_id','answers.asset_id','answers.opt_answer_id','answers.answer','answers.photo','answers.description','answers.datex','optional_answers.answer_classification','metanames.metaname_name','assets.asset_name','properties.property_name','set_indicators.qns','users.name')
         //->orderBy('set_indicators.id')
         ->first();

       //dd($reportDailyReader->property_id);
       //get optionals answers

       $updateUser = user::where('id',auth()->id())
            ->update([
             // 'url'=>$_SERVER['REQUEST_URI']
             'url'=>request('uri')
           ]);
       // $uri = $request->input('uri');
       //dd($_SERVER['REQUEST_URI']);
       //dd(request('uri'));

       $optAnswers = optionalAnswer::where('indicator_id',$reportDailyReader->indicator_id)->get();
                return view('admin.settings.action.report-printdwm',compact('properties','property','propertiesNames','metanames','keyIndicators','reportDailyReader','id','optAnswers'));
             }



       public function reportView(Request $request,$sn,$id)
          {
      $prnt="";
      $userID=user::where('id',auth()->id())->first();
      $property=property::where('id',$userID->property_id)->first();

              $segments = request()->segments();
              $last  = end($segments);
      $first = reset($segments);
      $url="http://localhost:8000/report-general/{$property->id}/dashboard";
       $segmentsExploide = explode('/', $url);
      //END OF RESERVED CODE FOR URL

             // $uri =request()->path();
            $keyIndicators = keyIndicator::where('key_name','!=','Good')->get();

            $metanames = metaname::get();
            $propertiesNames = property::get();
      //dd($metanames);

          $current_date = date('Y-m-d');
          $properties = property::where('id',$id)
            ->where('status','Active')->first();

      $reportDailyReader = answer::join('properties','answers.property_id','properties.id')
      ->join('set_indicators','answers.indicator_id','set_indicators.id')
       ->join('users','answers.user_id','users.id')
        ->join('assets','answers.asset_id','assets.id')
         ->join('optional_answers','answers.opt_answer_id','optional_answers.id')
       ->join('metanames','answers.metaname_id','metanames.id')

       ->where('answers.property_id',$id)
        ->where('answers.id',$sn)
       ->whereColumn('answers.indicator_id',"optional_answers.indicator_id")
       //->whereIn('metanames.metaname_name',$metaArray)
       //->whereIn('optional_answers.answer_classification',$keyArray)
        //->where('set_indicators.qns','!=',"")
       //->whereBetween('answers.datex',[$start_date, $end_date])
      ->select('answers.id','answers.property_id','answers.indicator_id','answers.metaname_id','answers.asset_id','answers.opt_answer_id','answers.answer','answers.photo','answers.description','answers.datex','optional_answers.answer_classification','metanames.metaname_name','assets.asset_name','properties.property_name','set_indicators.qns','users.name')
      //->orderBy('set_indicators.id')
      ->first();

  //dd($reportDailyReader->property_id);
//get optionals answers

$updateUser = user::where('id',auth()->id())
         ->update([
          // 'url'=>$_SERVER['REQUEST_URI']
          'url'=>request('uri')
        ]);
  // $uri = $request->input('uri');
 //dd($_SERVER['REQUEST_URI']);
   //dd(request('uri'));

 $optAnswers = optionalAnswer::where('indicator_id',$reportDailyReader->indicator_id)->get();
             return view('admin.settings.action.report-view',compact('properties','property','propertiesNames','metanames','keyIndicators','reportDailyReader','id','optAnswers'));
          }




    public function reportProperty(Request $request,$id)
       {
//dd($id);
           $segments = request()->segments();
           $last  = end($segments);
    $first = reset($segments);
    $url="http://localhost:8000/report-property/{$id}/dashboard";
    $segmentsExploide = explode('/', $url);
    //END OF RESERVED CODE FOR URL

          $uri =request()->path();
         $keyIndicators = keyIndicator::get();
         $metanames = metaname::get();
    //dd($metanames);
       $current_date = date('Y-m-d');
       $properties = property::where('id',$id)
         ->where('status','Active')->first();

        //Daily Report
       $reportDailyData=DB::select('select a.property_id,a.metaname_id,m.metaname_name,a.indicator_id,a.asset_id, a.opt_answer_id,a.answer,a.answer_label,o.answer_classification from answers a,optional_answers o,metanames m where a.indicator_id=o.indicator_id and a.metaname_id=m.id and a.property_id="'.$id.'" and a.opt_answer_id=o.id and a.datex="'.$current_date.'" order by m.metaname_name ASC');
       //$reportDailyData2=DB::select('select a.property_id,a.metaname_id,m.metaname_name,a.indicator_id,a.asset_id, a.opt_answer_id,a.answer,o.answer_classification from answers a,optional_answers o,metanames m where a.indicator_id=o.indicator_id and a.metaname_id=m.id and a.property_id="'.$id.'" and a.opt_answer_id=o.id and a.datex="'.$current_date.'"');

       $reportDailyReader=DB::select('select a.id,a.property_id,p.property_name,a.metaname_id,m.metaname_name,a.answer,a.indicator_id,s.qns,a.asset_id,t.asset_name,u.name, a.opt_answer_id,o.answer_classification,a.photo,a.description,a.datex from answers a,properties p,set_indicators s,users u,assets t,optional_answers o,metanames m where a.indicator_id=o.indicator_id and a.metaname_id=m.id and a.user_id=u.id and a.asset_id=t.id and a.indicator_id=s.id and a.opt_answer_id=o.id and p.id=a.property_id and a.datex="'.$current_date.'" and a.property_id="'.$id.'"');
    
    //dd($reportDailyData);

    $dataDaily = collect($reportDailyData);
    $dailyMetaCollects=$dataDaily->groupBy('metaname_name');
    //dd($dailyMetaCollects);
    $roomDaily = $dataDaily->where('metaname_name','Room')
      ->whereIn('answer_classification',['Bad','Critical']);
      $badDaily=$roomDaily->where('answer_classification','Bad')->count();
      $criticalDaily=$roomDaily->where('answer_classification','Critical')->count();

    $xx=$dataDaily->count();
    //dd($xx);
       //Weekly Report
    $reportWeeklyData=DB::select('select a.property_id,a.metaname_id,m.metaname_name,a.indicator_id,a.asset_id, a.opt_answer_id,a.answer,o.answer_classification from answers a,optional_answers o,metanames m where a.indicator_id=o.indicator_id and a.metaname_id=m.id and a.property_id="'.$id.'" and a.opt_answer_id=o.id and WEEK(a.datex)=WEEK(NOW()) order by m.metaname_name ASC');

    $dataWeekly = collect($reportWeeklyData);
    $weeklyMetaCollects=$dataWeekly->groupBy('metaname_name');
    $roomWeekly = $dataWeekly->where('metaname_name','Room')
      ->whereIn('answer_classification',['Bad','Critical']);
      $badWeekly=$roomWeekly->where('answer_classification','Bad')->count();
      $criticalWeekly=$roomWeekly->where('answer_classification','Critical')->count();

       //Monthly Report
    $reportMonthlyData=DB::select('select a.property_id,a.metaname_id,m.metaname_name,a.indicator_id,a.asset_id, a.opt_answer_id,a.answer,o.answer_classification from answers a,optional_answers o,metanames m where a.indicator_id=o.indicator_id and a.metaname_id=m.id and a.property_id="'.$id.'" and a.opt_answer_id=o.id and month(a.datex)=month(NOW()) order by m.metaname_name ASC');

    $dataMonthly = collect($reportMonthlyData);
    $monthlyMetaCollects=$dataMonthly->groupBy('metaname_name');
    $roomMonthly = $dataMonthly->where('metaname_name','Room')
      ->whereIn('answer_classification',['Bad','Critical']);
      $badMonthly=$roomMonthly->where('answer_classification','Bad')->count();
      $criticalMonthly=$roomMonthly->where('answer_classification','Critical')->count();

        if(request('search') || request('print')){
       $metaArray=array();
        $keyArray=array();


        $start_d = substr(request('date'),0,10);
           $start_date = Carbon::parse($start_d)->format('Y-m-d').' 00:00:00';
           $end_d = substr(request('date'),-10);
           $end_date = Carbon::parse($end_d)->format('Y-m-d').' 23:59:00';

      //Metaname Array creation
      $metaNames=metaname::get();
      $collectAllMeta = collect($metaNames);

      //Metaname Array creation
      $keyNames=keyIndicator::get();
      $collectAllKey = collect($keyNames);

     //The Request is metaArray
     if(request('metaname_search')){
       if(request('metaname_search')=="All")
       {
    foreach ($collectAllMeta as $metas) {
       $metaArray[]=$metas->metaname_name;
      }
       }
       else{
       $metax=$collectAllMeta->where('metaname_name',request('metaname_search'));
       foreach ($metax as $metac) {
       $metaArray[]=$metac->metaname_name;
      }
      }
    }

       //The Request is KeyIndicator
     if(request('indicator_search')){
       if(request('indicator_search')=="All")
       {
    foreach ($collectAllKey as $keys) {
       $keyArray[]=$keys->key_name;
      }
       }
       else{
       $keysx=$collectAllKey->where('key_name',request('indicator_search'));
       foreach ($keysx as $keyc) {
       $keyArray[]=$keyc->key_name;
      }
      }
    }

//dd($keyArray);
    //End of Request
      $reportDailyReader = answer::join('properties','answers.property_id','properties.id')
      ->join('set_indicators','answers.indicator_id','set_indicators.id')
       ->join('users','answers.user_id','users.id')
        ->join('assets','answers.asset_id','assets.id')
         ->join('optional_answers','answers.opt_answer_id','optional_answers.id')
       ->join('metanames','answers.metaname_id','metanames.id')

       ->where('answers.property_id',$id)
       ->whereColumn('answers.indicator_id',"optional_answers.indicator_id")
       ->whereIn('metanames.metaname_name',$metaArray)
       ->whereIn('optional_answers.answer_classification',$keyArray)
        //->where('set_indicators.qns','!=',"")
       ->whereBetween('answers.datex',[$start_date, $end_date])
      ->select('answers.id','answers.property_id','answers.indicator_id','answers.metaname_id','answers.asset_id','answers.opt_answer_id','answers.answer','answers.photo','answers.description','answers.datex','optional_answers.answer_classification','metanames.metaname_name','assets.asset_name','properties.property_name','set_indicators.qns','users.name')
      ->orderBy('set_indicators.id')
      ->get();

      //update the user.url odbc_columns
      }
      else{
        //dd('Not role');
      }

      //dd($metaArray);

     if(request('print')){
       $datex=$_GET['date'];

       $date_end = substr($datex, strpos($datex, "-") + 2);
      //$date_start = explode("_", $datex)[1];
    $date_start = strtok($datex, " ");
    $date_start=date_create($date_start);
    $date_start=date_format($date_start,"Y-m-d");

    $date_end=date_create($date_end);
    $date_end=date_format($date_end,"Y-m-d");

       include_once(app_path().'/jrf/sample/setting.php');
       $PHPJasperXML = new PHPJasperXML();
       $v[]=1;

       $metanameAll=array();
       $indicatorAll=array();
         //$param[]="active";
         //$param[]="inactive";
         $metanameAll=collect($metaArray);
         $metaString=str_replace('[','',$metanameAll);
         $metaString=str_replace(']','',$metaString);

         $indicatorAll=collect($keyArray);
         $indicatorString=str_replace('[','',$indicatorAll);
         $indicatorString=str_replace(']','',$indicatorString);
     //  dd($indicatorString);
    //$param=collect($param);
    //$datex=DateTime.Now(dd-MM-yyyy);
    //$d = new SimpleDateFormat("dd/MM/yyyy").format($P{datex});
     //$enddb = '2022-08-02';
    //dd($d);
     //  $PHPJasperXML->arrayParameter=array("property_id"=>$id);
     //  $PHPJasperXML->arrayParameter=array("param"=>1,"param"=>2);
    //$date=date("d/m/Y")
    //dd($date);
    //$PHPJasperXML->sql="select * from answers";
    //dd($PHPJasperXML);
    $PHPJasperXML->arrayParameter =array("property_id"=>$id,"metanames"=>$metaString,"indicator"=>$indicatorString,"date_from"=> '"'.$date_start.'"',"date_to"=> '"'.$date_end.'"');
    //$PHPJasperXML->arrayParameter =array("date_from"=> '"'.$date_start.'"',"date_to"=> '"'.$date_end.'"');
    //dd($PHPJasperXML->arrayParameter);
    //$PHPJasperXML->arrayParameter =array();
    //$PHPJasperXML->arrayParameter = array("param" => array('1' =>1, '3' =>3));

        $PHPJasperXML->load_xml_file(app_path().'/reports/propertyReportf.jrxml');
       //$PHPJasperXML->load_xml_file(app_path().'/reports/propertyReportf.jrxml');

       $PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
       //$PHPJasperXML->outpage("D");
       ob_end_clean();
       //dd($PHPJasperXML);
       $PHPJasperXML->outpage("I");
     }
      //dd('Not role');
      //Metaname percent
      $answerCount=DB::select('select a.*,m.metaname_name from answers a,metanames m where a.metaname_id=m.id and DAY(a.datex)=DAY(NOW()) and a.status="Active" group by a.property_id,a.metaname_id,a.indicator_id,a.asset_id order by a.metaname_id ASC');
      $answerCount = collect($answerCount);

      //$totalqns=DB::select('select a.metaname_id,metaname_name,count(a.metaname_id)totalqns from assets a, qns_appliedtos q,metanames m where a.metaname_id=q.metaname_id and a.metaname_id=m.id and a.status="Active" and q.status="Active" group by a.metaname_id');
      $totalqns=DB::select('select a.metaname_id,metaname_name from assets a, qns_appliedtos q,metanames m where a.metaname_id=q.metaname_id and a.metaname_id=m.id and a.status="Active" and q.status="Active"');
      $totalqns = collect($totalqns);


$man="Managers";

    //Daily manager Report
   $reportManagerMonthlyData=DB::select('select a.property_id,a.metaname_id,m.metaname_name,a.indicator_id,a.asset_id, a.opt_answer_id,a.answer,o.answer_classification from answers a,optional_answers o,metanames m where a.indicator_id=o.indicator_id and a.metaname_id=m.id and a.property_id="'.$id.'" and a.opt_answer_id=o.id  and m.metaname_name="'.$man.'" and month(a.datex)=month(NOW()) order by m.metaname_name ASC');

   $dataManagerMonthly = collect($reportManagerMonthlyData);
   $monthlyManagerMetaCollects=$dataManagerMonthly->groupBy('metaname_name');
   $roomManagerMonthly = $dataManagerMonthly->where('metaname_name','Room')
      ->whereIn('answer_classification',['Bad','Critical']);
      $badManagerMonthly=$roomManagerMonthly->where('answer_classification','Bad')->count();
      $criticalManagerMonthly=$roomManagerMonthly->where('answer_classification','Critical')->count();
//End of Manager Report

//dd($dataManagerMonthly);

          return view('admin.settings.properties.dash.report-propertyDash',compact('properties','metanames','keyIndicators','reportDailyReader','dailyMetaCollects','weeklyMetaCollects','monthlyMetaCollects','badDaily','badWeekly','badMonthly','criticalDaily','criticalWeekly','criticalMonthly','id','uri','answerCount','totalqns'));
       }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
  $properties = property::get();
        return view('admin.settings.properties.property',compact('properties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //See if the site is Exists
         $site=property::where('property_name',request('property_name'))
        ->where('id',request('id'))->first();

       if($site ==null)
       {
        $sites = property::UpdateOrCreate(
                        [   'property_name'=>request('property_name')],
        [
        // 'site_name'=>request('site_name'),
        'property_category'=>request('property_category'),
        'property_rank'=>request('property_rank'),
        'room_no'=>request('room_no'),
        'location_name'=>request('location_name'),
         'phone'=>request('phone'),
          'email'=>request('email'),
          'property_description'=>request('property_description'),
        'user_id'=>auth()->id()
      ]);
        $idf=$sites->id;
       }
      else
       {
        return redirect()->route('properties.index')->with('info','This Property Exists');
       }
//dd(request('attachment'));

        if(request('attachment')){
            $attach = request('attachment');
            foreach($attach as $attached){

                 // Get filename with extension
                 $fileNameWithExt = $attached->getClientOriginalName();
                 // Just Filename
                 $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                 // Get just Extension
                 $extension = $attached->getClientOriginalExtension();
                 //Filename to store
                 $imageToStore = $filename.'_'.time().'.'.$extension;
                 //upload the image
                 $path = $attached->storeAs('public/properties/', $imageToStore);

           $id = property::where('id', $idf)->first();

             if($id !=null)
             {
             $hotelUdate = property::where('id',$idf)
             ->update([
            'photo'=>$imageToStore
        ]);
           }else
           {
         property::UpdateOrCreate(
                [
                'photo'=>$imageToStore
                ]
                );
            }
            }
        }
        return redirect()->route('properties.index')->with('success','Property created successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(property $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(property $site,$id)
    {
          $properties = property::where('id',$id)
               ->update([
                'status'=>"Inactive",
                 'user_id'=>auth()->id()

              ]);
       return redirect()->back()->with('success','Property deleted successfly');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, site $site)
    {
        //Update the time_show odbc_columns
        //dd('update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $property = property::where('id',$id)->first();
        if($property){
            $property->delete();
             return redirect()->back()->with('success','Property permanent deleted successfully');
        }
        else{
            return redirect()->back()->with('error','Something went wrong with this Property');
        }
    }

    public function updateTimeShow(Request $request,$property_id)
  {
     // dd($request->indicator_setting);
     $date_time=date('H:i:s');
       //dd($request->indicator_setting);

    if($request->indicator_setting ==null)
    {
          return redirect()->back()->with('error','No value set');
    }
    elseif ($request->indicator_setting==0) {
      $property = asset::where('property_id',$property_id)
           ->update([
            'time_show'=>$request->indicator_setting,
            'asset_show'=>0,
            'extra_time'=>'00:00:00',
             'user_id'=>auth()->id()
          ]);
   return redirect()->back()->with('success','Updated successfly');
    }
    else {
        $property = asset::where('property_id',$property_id)
             ->update([
              'time_show'=>$request->indicator_setting,
              'asset_show'=>1,
              'extra_time'=>$date_time,
               'user_id'=>auth()->id()
            ]);
     return redirect()->back()->with('success','Updated successfly');
   }
  }


      public function recoveryUpdate(property $site,$id)
    {
          $property = property::where('id',$id)
               ->update([
                'status'=>"Active",
                 'user_id'=>auth()->id()

              ]);
       return redirect()->back()->with('success','Site recoveried successfly');
    }


   public function recovery()
    {
       $properties = property::where('status','Inactive')->get();
        return view('admin.settings.recovery.recoveryProperty',compact('properties'));
    }


    public function print()
     {
        $properties = property::where('status','Inactive')->get();
         return view('admin.settings.recovery.recoveryProperty',compact('properties'));
     }
}
