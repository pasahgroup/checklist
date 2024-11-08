<?php

namespace App\Http\Controllers;

use App\Models\property;
use App\Models\keyIndicator;
use App\Models\answer;
use App\Models\user;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
  //require base_path().'/vendor/autoload.php';
 // use PHPJasperXM;
//use PDF;
class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $assets = asset::join('properties','properties.id','assets.property_id')
      ->join('metanames','assets.metaname_id','metanames.id')
      ->where('properties.status','Active')
      ->where('assets.status','Active')
      ->select('assets.id','metanames.metaname_name','assets.asset_name','properties.property_name','assets.asset_type','assets.asset_brand','assets.asset_location','assets.asset_version','assets.asset_serial_no','assets.asset_barcode','assets.asset_tag_no','assets.asset_description','assets.photo','assets.status','assets.created_at')
      ->orderBy('assets.id')
      ->get();
      //  $properties = property::where('status','Active')->get();
       //dd($assets);

    return view('admin.settings.assets.assets',compact('assets'));
    }


 public function dashProperty($id)
    {
      $properties = property::where('status','Active')->get();
      //$propertyName = Property::where('id',1)->first();
    //dd($properties);
    return view('admin.settings.properties.dash.dash-property',compact('properties'));
    }



 public function reportGeneral(Request $request,$id)
    {
$prnt="";
$userID=user::where('id',auth()->id())->first();
$property=property::where('id',$userID->property_id)->first();

        $segments = request()->segments();
        $last  = end($segments);
$first = reset($segments);
$url="http://localhost:8000/report-general/1/dashboard";
 $segmentsExploide = explode('/', $url);
//END OF RESERVED CODE FOR URL

       $uri =request()->path();

      $keyIndicators = keyIndicator::get();
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
//dd($totalqns);
       return view('admin.settings.properties.dash.report-general',compact('properties','property','propertiesNames','metanames','keyIndicators','reportDailyReader','dailyMetaCollects','weeklyMetaCollects','monthlyMetaCollects','badDaily','badWeekly','badMonthly','criticalDaily','criticalWeekly','criticalMonthly','id','uri','answerCount','totalqns','prnt'));
    }


    public function reportAction(Request $request,$id)
       {
         $prnt="";
   $userID=user::where('id',auth()->id())->first();
   $property=property::where('id',$userID->property_id)->first();

           $segments = request()->segments();
           $last  = end($segments);
   $first = reset($segments);
   $url="http://localhost:8000/report-general/1/dashboard";
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
                // {{ url()->previous() }}
// return redirect()->back();
//return back();
// return redirect()->url()->previous();
//return Redirect::to(url()->previous());
$uri=user::where('id',auth()->id())->first();
//$uri =request()->input('uri');
// dd($_SERVER['REQUEST_URI']);
//dd($uri->url);
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
         $url="http://localhost:8000/report-general/1/dashboard";
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


          public function reportViewPrint(Request $request,$sn,$id)
             {
         $prnt="";
         $userID=user::where('id',auth()->id())->first();
         $property=property::where('id',$userID->property_id)->first();

                 $segments = request()->segments();
                 $last  = end($segments);
         $first = reset($segments);
         $url="http://localhost:8000/report-general/1/dashboard";
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
      $url="http://localhost:8000/report-general/1/dashboard";
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
           $segments = request()->segments();
           $last  = end($segments);
    $first = reset($segments);
    $url="http://localhost:8000/report-property/1/dashboard";
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
       $reportDailyData=DB::select('select a.property_id,a.metaname_id,m.metaname_name,a.indicator_id,a.asset_id, a.opt_answer_id,a.answer,o.answer_classification from answers a,optional_answers o,metanames m where a.indicator_id=o.indicator_id and a.metaname_id=m.id and a.property_id="'.$id.'" and a.opt_answer_id=o.id and a.datex="'.$current_date.'" order by m.metaname_name ASC');
       //$reportDailyData2=DB::select('select a.property_id,a.metaname_id,m.metaname_name,a.indicator_id,a.asset_id, a.opt_answer_id,a.answer,o.answer_classification from answers a,optional_answers o,metanames m where a.indicator_id=o.indicator_id and a.metaname_id=m.id and a.property_id="'.$id.'" and a.opt_answer_id=o.id and a.datex="'.$current_date.'"');

       $reportDailyReader=DB::select('select a.id,a.property_id,p.property_name,a.metaname_id,m.metaname_name,a.answer,a.indicator_id,s.qns,a.asset_id,t.asset_name,u.name, a.opt_answer_id,o.answer_classification,a.photo,a.description,a.datex from answers a,properties p,set_indicators s,users u,assets t,optional_answers o,metanames m where a.indicator_id=o.indicator_id and a.metaname_id=m.id and a.user_id=u.id and a.asset_id=t.id and a.indicator_id=s.id and a.opt_answer_id=o.id and p.id=a.property_id and a.datex="'.$current_date.'" and a.property_id="'.$id.'"');
    //dd($reportDailyData2);

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
//dd('dd');
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
    //dd($reportDailyReader);

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
    public function edit(Request $site,$id)
    {
      //dd($id);
          $assets = asset::where('id',$id)
               ->update([
                'status'=>"Inactive",
                 'user_id'=>auth()->id()

              ]);
       return redirect()->back()->with('success','Asset deleted successfly');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

      //dd($id);
      $asset = asset::where('id',$id)
           ->update([
               'asset_name'=>request('asset_name'),
              'asset_type'=>request('asset_type'),
                'asset_brand'=>request('asset_brand'),
                'asset_version'=>request('asset_version'),
                  'asset_serial_no'=>request('asset_serial_no'),
                    'asset_barcode'=>request('asset_barcode'),
                    'asset_tag_no'=>request('asset_tag_no'),
                    'asset_description'=>request('asset_description'),
                    // 'asset_barcode'=>request('asset_barcode'),
              'status'=>request('status'),
             'user_id'=>auth()->id()
          ]);




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

             //$id = property::where('id', $idf)->first();

             $assetPhotos = asset::where('id',$id)
            ->update([
           'photo'=>$imageToStore
]);

          //      if($id !=null)
          //      {
          //       $assetPhotos = asset::where('id',$id)
          //      ->update([
          //     'photo'=>$imageToStore
          // ]);
          //    }else
          //    {
          //  // property::UpdateOrCreate(
          //  //        [
          //  //        'photo'=>$imageToStore
          //  //        ]
          //  //        );
          //     }
              }
          }






   return redirect()->back()->with('success','Asset updated successfly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //dd($id);
         $asset = asset::where('id',$id)->first();
        if($asset){
            $asset->delete();
             return redirect()->back()->with('success','Asset permanent deleted successfully');
        }
        else{
            return redirect()->back()->with('error','Something went wrong with this Property');
        }
    }

    public function updateTimeShow(Request $request,$property_id)
  {
     // dd($request->indicator_setting);
    if($request->indicator_setting ==null)
    {
          return redirect()->back()->with('error','No value set');
    }
    else {
        $property = asset::where('property_id',$property_id)
             ->update([
              'time_show'=>$request->indicator_setting,
               'user_id'=>auth()->id()
            ]);
     return redirect()->back()->with('success','Updated successfly');
   }
  }


      public function recoveryUpdate(asset $site,$id)
    {
          $asset = asset::where('id',$id)
               ->update([
                'status'=>"Active",
                 'user_id'=>auth()->id()

              ]);

//Update the photos

       return redirect()->back()->with('success','Asset recovered successfly');
    }


   public function recovery()
    {
       //$assets = asset::where('status','Inactive')->get();

       $assets = asset::join('properties','properties.id','assets.property_id')
    //   ->join('metanames','assets.metaname_id','metanames.id')
       // ->where('properties.status','Active')
       ->where('assets.status','Inactive')
       ->select('assets.id','assets.asset_name','properties.property_name','assets.asset_type','assets.asset_brand','assets.asset_location','assets.asset_version','assets.asset_serial_no','assets.asset_barcode','assets.asset_tag_no','assets.asset_description','assets.photo','assets.status','assets.created_at')
       ->orderBy('assets.id')
       ->get();
        return view('admin.settings.recovery.recoveryAsset',compact('assets'));
    }


    public function print()
     {
        $properties = asset::where('status','Inactive')->get();
         return view('admin.settings.recovery.recoveryAsset',compact('properties'));
     }
}
