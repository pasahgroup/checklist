<?php

namespace App\Http\Controllers;

use App\Models\emailSend;
use App\Http\Requests\StoreemailSendRequest;
use App\Http\Requests\UpdateemailSendRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use DB;
use PDF;
use Mail;
use Dompdf\Dompdf;



use JasperPHP\JasperPHP as JasperPHP;
use PHPJasper\PHPJasper;

 require base_path().'/vendor/autoload.php';
 //require base_path().'/vendor/autoload.php';
include_once(app_path().'/jrf/PHPJasperXML.inc.php');
 include_once(app_path().'/jrf/tcpdf/tcpdf.php');
  //include_once(app_path().'/fpdf184/mysql_table.php');
  //include_once(app_path().'/fpdf184/pdfg.php');
 use PHPJasperXML;

class EmailSendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function generatePDF()
   {
      //  $data = [
      //      'title' => 'Welcome to my PDF'
      //  ];
      //      // dd('ddxx');
      //  $pdf = PDF::loadView('dashboard', $data);
      // // dd('vbv');
      //  return $pdf->stream('documentx.pdf');
      //     dd('sdd');

   //    $html = '<h1>Welcome to my PDF</h1>';
   // $pdf = PDF::loadHTML($html);
   // return $pdf->stream('document.pdf');

   $data = [
      'title' => 'Welcome to my PDF',
         'date' => date('m/d/Y')
  ];
  // $pdf = PDF::loadView('image', $data);
  // return $pdf->download('document.pdf',$pdf);
  $html = view('image', $data)->render();


$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->render();
$pdf = $dompdf->output();


  $folderPath = 'reports';
  if (!Storage::exists($folderPath)) {
      Storage::makeDirectory($folderPath);
  }

$filesx = Storage::allFiles($folderPath);
foreach ($filesx as $file) {
    Storage::delete('app/reports/department');
}

  $fileName = 'Daily_hotel_report_'.time().'.pdf';
  Storage::put("$folderPath/$fileName",$pdf);

$files = [
storage_path('app/reports/department.pdf'),
];

$date=date('d-M-Y');
$data["email"] = "buruwawa@gmail.com";

$data["title"] = "Daily General Inspection Hotel Report (DGIR)";
$data["body"] = "Manyara Best View Hotel: Daily General Inspection Report held on $date";
$data["date"] = "Date: $date";

Mail::send('email.email', $data, function($message)use($data, $files) {
$message->to($data["email"], $data["email"])
        ->subject($data["title"]);
foreach ($files as $file){
    $message->attach($file);
}
});
    return response()->json(['message' => 'HTML printed and stored successfully']);
   }



  public function emailSendFf()
    {
      $data = [
         'title' => 'Welcome to my PDF',
            'date' => date('m/d/Y')
     ];
     // $pdf = PDF::loadView('image', $data);
     // return $pdf->download('document.pdf',$pdf);
   $html = view('image', $data)->render();


   $dompdf = new Dompdf();
   $dompdf->loadHtml($html);
   $dompdf->render();
   $pdf = $dompdf->output();


     $folderPath = 'reportsx';
     if (!Storage::exists($folderPath)) {
         Storage::makeDirectory($folderPath);
     }

   $filesx = Storage::allFiles($folderPath);
   foreach ($filesx as $file) {
       Storage::delete('app/reports/department');
   }

     $fileName = 'Daily_hotel_report_'.time().'.pdf';
     Storage::put("$folderPath/$fileName",$pdf);

   $files = [
   storage_path('app/reports/department.pdf'),
   ];

   $date=date('d-M-Y');
   $data["email"] = "buruwawa@gmail.com";

   $data["title"] = "Daily General Inspection Hotel Report (DGIR)";
   $data["body"] = "Manyara Best View Hotel: Daily General Inspection Report held on $date";
   $data["date"] = "Date: $date";

   Mail::send('email.email', $data, function($message)use($data, $files) {
   $message->to($data["email"], $data["email"])
           ->subject($data["title"]);
   foreach ($files as $file){
       $message->attach($file);
   }
   });
       return response()->json(['message' => 'HTML printed and stored successfully']);
}





public function emailSendF()
{
       include_once(app_path().'/jrf/sample/setting.php');
       $jasper = new PHPJasperXML();
           // $jasper = new PHPJasper;

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
// $jasper = new PHPJasper;
//dd($jasper);

// $jasper->process(
//         $input,
//         $output,
//         $options
// )->execute();

//dd('zzkx back');
//Send report



$date=date('d-M-Y');
$data["email"] = "buruwawa@gmail.com";

$data["title"] = "Daily General Inspection Hotel Report (DGIR)";
$data["body"] = "Manyara Best View Hotel: Daily General Inspection Report held on $date";
$data["date"] = "Date: $date";
//dd(app_path());

$files = [
app_path('reports/pieChart.pdf'),
// app_path().'/reports/itinerayReportf.pdf',
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








    public function emailSendFx()
    {
      //dd('ddsd');
      $input='/home3/hakunama/jvm/apache-tomcat-9.0.6/domains/test.hakunamatatas.net/app/reports';
       // $input =app_path().'/reports/pieChart.jrxml';
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

        $data["title"] = "Daily General Inspection Hotel Report (DGIR)";
        $data["body"] = "Manyara Best View Hotel: Daily General Inspection Report held on $date";
        $data["date"] = "Date: $date";
        //dd(app_path());

        $files = [
        app_path('reports/pieChart.pdf'),
        ];

        Mail::send('email.email', $data, function($message)use($data, $files) {
        $message->to($data["email"], $data["email"])
                ->subject($data["title"]);
        foreach ($files as $file){
            $message->attach($file);
        }
      });

      dd('Report sent');
    }



    public function index()
    {

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
     * @param  \App\Http\Requests\StoreemailSendRequest  $request
     * @return \Illuminate\Http\Response
     */


    public function store(StoreemailSendRequest $request)
    {

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\emailSend  $emailSend
     * @return \Illuminate\Http\Response
     */


    public function show(emailSend $emailSend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\emailSend  $emailSend
     * @return \Illuminate\Http\Response
     */
    public function edit(emailSend $emailSend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateemailSendRequest  $request
     * @param  \App\Models\emailSend  $emailSend
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateemailSendRequest $request, emailSend $emailSend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\emailSend  $emailSend
     * @return \Illuminate\Http\Response
     */
    public function destroy(emailSend $emailSend)
    {
        //
    }
}
