<?php

namespace App\Http\Controllers;

use App\Models\reportTest;
use App\Http\Requests\StorereportTestRequest;
use App\Http\Requests\UpdatereportTestRequest;

use JasperPHP\JasperPHP as JasperPHP;
use Illuminate\Http\Request;
use PHPJasper\PHPJasper;
require base_path().'/vendor/autoload.php';

// use Response;
include_once(app_path().'/jrf/PHPJasperXML.inc.php');
// include_once(app_path().'/jrf/sample/setting.php');
// include_once ('setting.php');
 include_once(app_path().'/jrf/sample/setting.php');
use PHPJasperXML;

class reportTestController extends Controller
{
     public function index() {
      // dd('dsd');
        //JasperPHP::compile(base_path('/vendor/cossou/jasperphp/examples/hello_world.jrxml'))->execute();
        $jasper = new JasperPHP;
        $filename = 'department';
        $output = app_path('/reports/' . $filename);
        $jasper->process(
                app_path('/reports/department.jasper'),
                $output,
                array("pdf"),
                array("id" =>2),
                array(
                        'driver' => 'mysql',
                        'username' => 'hakunama_tatas_user',
                        'password' => 'checklistmaster',
                        'host' => 'mysql3000.mochahost.com',
                        'database' => 'hakunama_checklistmasterdb',
                        'port' => '3306',
                      )
        )->execute();
    }


 public function viewreport($x,$y)
    {
//dd('ddd');
      // $PHPJasperXML = new PHPJasperXML();
      // // $PHPJasperXML->load_xml_file(app_path()."/includes/reports/".$reporte.".jrxml");
      //  $PHPJasperXML->load_xml_file(app_path()."/reports/location.jrxml");
      //  //dd('ddd');
      // $PHPJasperXML->transferDBtoArray();
      // //Clean the end of the buffer before outputting the PDF
      // ob_end_clean();
      // //page output method I:standard output  D:Download file
      // return Response::make($PHPJasperXML->outpage("I"));

$server="localhost";
$db="demodb";
$user="root";
$pass="";
$version="1.1";

$pgport=3306; //only for postgresql

$PHPJasperXML = new PHPJasperXML();
// $PHPJasperXML->load_xml_file("report2.jrxml");
$PHPJasperXML->load_xml_file(app_path()."/reports/location.jrxml");
$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
// ob_end_clean();
//$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file
return Response::make($PHPJasperXML->outpage("I"));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function jrf()
    {
      dd('Romari');
        /*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
// include_once("../PHPJasperXMLSubReport.inc.php");
// include_once("../PHPJasperXML.inc.php");
        // include_once(app_path().'/jrf/PHPJasperXML.inc.php');
// include_once("../PHPJasperXML.inc.php");
include_once(app_path().'/jrf/sample/setting.php');

$PHPJasperXML = new PHPJasperXML();
// $PHPJasperXML->load_xml_file("report2.jrxml");
$PHPJasperXML->load_xml_file(app_path().'/jrf/sample/location.jrxml');
$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file
    }

      public function indexx()
    {
        //dd('ddd');
         $jasper = new JasperPHP;
        $filename = 'department';
        // $output = base_path('../reports/' . $filename);
        $output=app_path()."/reports";
        //dd('ds');
        $jasper->process(app_path().'/reports/department.jrxml',
                $output,
                array("pdf"),
                array("test" => "Tax Invoice"),
                array(
                        'driver' => "mysql",
                        'username' => "root",
                        'password' => "",
                        'host' => "localhost",
                        'database' => "horesydb",
                        'port' => "3306",
                      )
        )->execute();
    }
public function indexxx()
{
 //dd(__DIR__);
$input =app_path().'/reports/report.jrxml';
$output=app_path().'/reports';
$jdbc_dir =base_path().'/vendor/geekcom/phpjasper/bin/jaspertarter/jdbc';
$options = [
    'format' => ['pdf'],
    'locale' => 'en',
    // 'params' => [],
    // 'db_connection' => [
    //     'driver' => 'mysql',
    //     'host' => '127.0.0.1',
    //     'port' => '3306',
    //     'database' => 'horesydb',
    //     'username' => 'root',
    //     'password' => '',
        // 'jdbc_driver' => 'com.microsoft.sqlserver.jdbc.SQLServerDriver',
        // 'jdbc_url' => 'jdbc:sqlserver://127.0.0.1:1433;databaseName=Teste',
        // 'jdbc_dir' => $jdbc_dir
    //]
];

$jasper = new PHPJasper;
$jasper->process(
        $input,
        $output,
        $options
    )->execute();

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
     * @param  \App\Http\Requests\StorereportTestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorereportTestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\reportTest  $reportTest
     * @return \Illuminate\Http\Response
     */
    public function show(request $request)
    {
      //dd('dsd');
// $server="localhost";
// $db="horesydb";
// $user="root";
// $pass="";
// $version="1.1";

// $pgport=3306; //only for postgresql


 /* To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
// include_once("../PHPJasperXMLSubReport.inc.php");
// include_once("../PHPJasperXML.inc.php");
        // include_once(app_path().'/jrf/PHPJasperXML.inc.php');
// include_once("../PHPJasperXML.inc.php");

include_once(app_path().'/jrf/sample/setting.php');

$PHPJasperXML = new PHPJasperXML();
// $PHPJasperXML->load_xml_file("report2.jrxml");

if(request('userid'))
{
 $v=request('userid');
 //$x=2;
 //dd($v);
 $PHPJasperXML->arrayParameter=array("id"=>$v);
 $PHPJasperXML->load_xml_file(app_path().'/reports/usersp.jrxml');

}
else
{
  $PHPJasperXML->load_xml_file(app_path().'/reports/users.jrxml');
}
//dd($pass);

$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
//$PHPJasperXML->outpage("D");
$PHPJasperXML->outpage("I");   //page output method I:standard output  D:Download file S: Save
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reportTest  $reportTest
     * @return \Illuminate\Http\Response
     */
    public function edit(reportTest $reportTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatereportTestRequest  $request
     * @param  \App\Models\reportTest  $reportTest
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatereportTestRequest $request, reportTest $reportTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reportTest  $reportTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(reportTest $reportTest)
    {
        //
    }
}
