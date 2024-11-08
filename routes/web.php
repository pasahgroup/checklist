<?php

use App\Http\Controllers\accountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\companyValueController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\customRegisterController;
use App\Http\Controllers\expensesController;
use App\Http\Controllers\mailController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\posController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\purchaseController;
use App\Http\Controllers\rentalController;
use App\Http\Controllers\reportController;
use App\Http\Controllers\reportFinanceController;
use App\Http\Controllers\reportStockController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\salesController;
use App\Http\Controllers\stockController;
use App\Http\Controllers\stockingController;
use App\Http\Controllers\storeController;
use App\Http\Controllers\supplierController;
use App\Http\Controllers\tenantController;
use App\Http\Controllers\testerController;
use App\Http\Controllers\usersPermissionController;
use App\Http\Controllers\warehouseController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\DailydutymanagerController;


use App\Http\Controllers\ManageController;

use App\Http\Livewire\Show;
use App\Http\Livewire\Department;
use App\Http\Livewire\Property;
use App\Http\Livewire\AssetLivewire;
use App\Http\Livewire\IndicatorLivewire;
use App\Http\Livewire\AssignLivewire;
use App\Http\Controllers\AssetController;

use App\Http\Livewire\AssignRolesLivewire;
use App\Http\Livewire\AssignRolesUserLivewire;
use Illuminate\Support\Facades\Redirect;

use App\Http\Livewire\ActivityRolesLivewire;
use App\Http\Livewire\Checklist;
// use App\Http\Livewire\Manager;
use App\Http\Livewire\Managerlist;

use App\Http\Livewire\DashChecklist;
use App\Http\Livewire\UserActivityLivewire;

use App\Http\Livewire\Showfinal;
use App\Http\Livewire\Wawacombo;
use \Spatie\Multitenancy\Http\Middleware\NeedsTenant;
use App\http\Mail\reportMail;
use App\Mail\OrderEmails;
use App\Http\Controllers\ImportExportController;

//TS wawa
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SessionmController;
use App\Http\Controllers\rolesController;
use App\Http\Controllers\PropertyxController;
use App\Http\Controllers\reportTestController;
use App\Http\Controllers\ChecklistStatusController;
use App\Http\Controllers\DailyController;

use App\Http\Controllers\MetadataController;
use App\Http\Controllers\MetanameController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserRegisterController;
//password Reset
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\NexmoSMSController;
use App\Http\Controllers\WebcamController;
use App\Http\Controllers\PdfController;

use App\Http\Controllers\InsController;
use App\Http\Controllers\EmailSendController;

use App\Http\Controllers\ImageController;
 //use JasperPHP\JasperPHP as JasperPHP;
 use PHPJasper\PHPJasper;
use JasperPHP\JasperPHP as JasperPHP;
// require __DIR__ . '/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('image', 'App\Http\Controllers\ImageController@index');
// Route::post('image', 'App\Http\Controllers\ImageController@store');

 // Route::get('image', [ImageController::class, 'index']);
 // Route::post('image', [ImageController::class, 'store']);


Route::get('pdf', [EmailSendController::class, 'generatePDF']);
Route::get('company-profile-web', [profileController::class, 'companyWeb'])->name('company-profile-web');
// Route::resource('company-profile-create', [profileController::class, 'create']);
Route::resource('company-profile-create', profileController::class);

Route::get('send-mail', [pdfController::class, 'sendMail']);
//Send MessageFormatter
Route::get('sendSMS', [NexmoSMSController::class, 'index']);
//dd(auth()->id());
//clear MEMCACHED_HOST
Route::get('/pg', function () {
return view('pagenation');
});

// Route::get('/ins', function () {
// return view('ins');
// });
Route::get('/wawal',Wawacombo::class);

Route::get('/stl', function () {
  \Artisan::call('config:clear');
  \Artisan::call('cache:clear');
  \Artisan::call('route:clear');
  //\Artisan::call('route:cache');
  \Artisan::call('route:clear');
  \Artisan::call('storage:link');
    // \Artisan::call('key:generate');
   dd('cache clear successfully');
});

     Route::get('/javax', function () {
            $jasper = new JasperPHP;

            // Compile a JRXML to Jasper
          $t=  $jasper->compile(app_path(). '/reports/report1.jrxml')->execute();
          var_dump($t);

            // Process a Jasper file to PDF and RTF (you can use directly the .jrxml)
            $jasper->process(app_path().
                '/reports/report1.jrxml',
                false,
                array("pdf", "rtf"),
                array("php_version" => "8.0.3")
            )->execute();

            // List the parameters from a Jasper file.
            $array = $jasper->list_parameters(app_path().
                '/reports/report1.jrxml'
            )->execute();
            var_dump($array);
            return view('welcome');
        });


Route::get('user-roles', function() {
    dd(config('global.roles')); // Return all roles
});

Route::get('user-roles/super-admin', function() {
    dd(config('global.roles.super_admin')); // Specific role
});

Route::get('emails/dev', function() {
    dd(config('global.emails.dev')); // Specific dev email
});

Route::resource('yyy', ReportTestController::class);

Route::middleware(['auth'])->group(function () {
  Route::group(['middleware' => ['auth','Admin']], function() {
//Report Testing
Route::get('reportx/{x}/d/{y}',[ReportTestController::class,'viewreport'])->name('reportx');
Route::get('jrf',[ReportTestController::class,'jrf'])->name('jrf');
  // Route::get('report/{report}', 'ReportTestController@viewreport')->name('report.show');
});

//END OF GROUP FUNCTIONS
Route::get('/javaf', function () {
$input ='../vendor/geekcom/phpjasper/examples/hello_world.jasper';

$jasper = new PHPJasper;
//dd('PHPJasper\Exception');

$jasper->compile($input)->execute();

 });

 Route::resource('ins', InsController::class)->middleware(['role:SuperAdmin|GeneralAdmin|Admin|Account']);

//AJAX IN CHECKLIST MASTER
 //Route::resource('checklistx', ChecklistStatusController::class)->middleware(['role:SuperAdmin|GeneralAdmin|Admin|Account']);
// Route::get('checklist-status/{id}', [App\Http\Controllers\ChecklistStatusController::class, 'updateGraderStatus']);
 Route::get('checklist-status/{c}',[ChecklistStatusController::class,'updateGraderStatus'])->name('checklist-status');

Route::get('/java', function () {
            $jasper = new JasperPHP;
       //dd('print');
            // Compile a JRXML to Jasper
        $t=  $jasper->compile(app_path().'/reports/pieChart.jrxml')->output();
           //$jasper->compile(__DIR__ . '/../../vendor/geekcom/jasperphp/examples/hello_world.jrxml')->execute();
          //dd('ncn');

            // Process a Jasper file to PDF and RTF (you can use directly the .jrxml)
            $jasper->process(app_path().'/reports/pieChart.jrxml',
                true,
                array("pdf", "rtf"),
                array("php_version" => "7.2")
            )->output('I');

            // // List the parameters from a Jasper file.
            // $array = $jasper->list_parameters(
            //     '/home/midhun/hi/hello.jrxml'
            // )->execute();
            // var_dump($array);
            //return view('welcome');
        });

// Route::resource('render',Department::class)->name('render');
// Route::post('livewirex/{post}',Department::class)->name('livewirex');
Route::get('possale/{post}',Show::class)->name('possale');
Route::get('posfinal/{post}',Showfinal::class)->name('posfinal');
// Authenticated area
Route::get('create-company',[tenantController::class,'index'])->name('create-company');
Route::get('/license', [adminController::class,'license']);

Route::get('webcam', [WebcamController::class, 'index']);
Route::post('webcam', [WebcamController::class, 'store'])->name('webcam.capture');
// Route::middleware(['tenant','auth'])->group(function() {
    // routes
  Route::resource('propertyTest', AssetLivewire::class)->middleware(['role:SuperAdmin|GeneralAdmin|Admin|Account']);
  Route::resource('setIndicator', IndicatorLivewire::class)->middleware(['role:SuperAdmin|GeneralAdmin|Admin|Account']);

 Route::get('livewirex/{id}',Department::class)->name('livewirex');
 Route::get('asset/{id}',AssetLivewire::class)->name('asset');
 Route::get('indicator/{id}',IndicatorLivewire::class)->name('indicator');

Route::get('assign-indicator/{id}',AssignLivewire::class)->name('assign-indicator');
Route::resource('assign-indicator',AssignLivewire::class)->middleware(['role:SuperAdmin|GeneralAdmin|Admin|GeneralManager']);

Route::get('assign-roles/{id}',AssignRolesLivewire::class)->name('assign-roles');
Route::resource('assign-roles',AssignRolesLivewire::class)->middleware(['role:SuperAdmin|GeneralAdmin|Admin|Account']);

Route::get('assign-roles-user/{id}',AssignRolesUserLivewire::class)->name('assign-roles-user');
Route::resource('assign-roles-user',AssignRolesUserLivewire::class)->middleware(['role:Admin|SuperAdmin']);

Route::get('activity-roles/{id}',ActivityRolesLivewire::class)->name('activity-roles');
Route::resource('activity-roles',ActivityRolesLivewire::class)->middleware(['role:Admin|SuperAdmin']);
//
Route::get('user-activity/{id}',UserActivityLivewire::class)->name('user-activity');
Route::resource('user-activity',UserActivityLivewire::class)->middleware(['role:Admin|SuperAdmin']);
 //Checklist
  //Route::get('checklist/{id}',Checklist::class)->name('checklist');
  Route::resource('checklist', Checklist::class)->middleware(['role:Admin|HouseKeeper|GeneralManager|Manager|GeneralAdmin|SuperAdmin']);

  Route::resource('managers-inspection', ManageController::class)->middleware(['role:Admin|GeneralManager|Manager|SuperAdmin|GeneralAdmin|Maintenancier']);
  
  Route::get('managers-inspection/{id}',[ManageController::class,'index'])->middleware(['role:Admin|GeneralManager|Manager|SuperAdmin|GeneralAdmin|Maintenancier']);

  //Route::get('managers-inspection/{id}',Managerlist::class)->name('managers-inspection');
  //Route::resource('managers-inspection', Managerlist::class)->middleware(['role:Admin|GeneralManager|Manager|SuperAdmin|GeneralAdmin']);

  //Route::get('/license', [adminController::class,'license']);


  //Route::get('managerx/{id}',Managerlist::class)->name('managerx');
  //Route::resource('managers-inspection', Managerlist::class)->middleware(['role:Admin|GeneralManager|Manager|SuperAdmin|GeneralAdmin']);

//Route::resource('checklist/{id}', ChecklistController::class)->middleware(['role:Admin|HouseKeeper|GeneralManager|Manager|GeneralAdmin|SuperAdmin']);
Route::resource('weekly', ChecklistController::class)->middleware(['role:Admin|HouseKeeper|GeneralManager|Manager|GeneralAdmin|SuperAdmin|Maintenancier']);


 Route::resource('daily', DailyController::class)->middleware(['role:Admin|HouseKeeper|GeneralManager|Manager|GeneralAdmin|SuperAdmin|Maintenancier|MaintenanceReport']);

//Manager Daily Inspection
Route::resource('daily-duty-manager', DailydutymanagerController::class)->middleware(['role:Admin|HouseKeeper|GeneralManager|Manager|GeneralAdmin|SuperAdmin|Maintenancier|MaintenanceReport']);


 //Route::get('dailyx',[ChecklistController::class,'daily'])->name('daily');
// Route::resource('checklistx', ChecklistController::class)->middleware(['role:Admin|HouseKeeper|GeneralManager|Manager|GeneralAdmin|SuperAdmin']);


//Route::get('/getA/{p}', 'ChecklistController@getA');
Route::get('/getA/{p}', [ChecklistController::class,'getA']);
Route::get('/getDDM/{p}', [ChecklistController::class,'getDDM']);


  // Route::post('emailSend',Checklisst::class,'emailSend')->name('emailSend');
  // Route::resource('emailSendx', [EmailSendController::class]);
Route::resource('emailSend', EmailSendController::class)->middleware(['role:Admin|GeneralManager|GeneralAdmin|Manager|SuperAdmin']);
  // Route::get('email-send/{id}',EmailSendController::class,'emailSendF')->name('email-send');
Route::get('email-send/{id}',[EmailSendController::class,'emailSendF'])->name('email-send');


  Route::get('dashboard-checklist/{id}',DashChecklist::class)->name('dashboard-checklist');
  Route::resource('dashboard-checklist', DashChecklist::class)->middleware(['role:SuperAdmin|GeneralAdmin|Admin|Account|GeneralManager']);

  //End of Checklist
  Route::resource('not-answered', DashChecklist::class)->middleware(['role:SuperAdmin|GeneralAdmin|Admin|Account|GeneralManager']);
  Route::get('not-answered/{id}',DashChecklist::class)->name('not-answered');

    Route::get('/', function () {
        return redirect()->route('admin.index');
        //return redirect()->route('register');
    });
//TS wawa
   // Route::resource('user-register', UserRegisterController::class);
   Route::resource('user-register',UserRegisterController::class)->middleware(['role:Admin|SuperAdmin|GeneralAdmin']);
   Route::get('delete-user/{id}',[UserRegisterController::class,'edit'])->name('delete-user');

  Route::get('update-user/{id}',[UserRegisterController::class,'recoveryUpdate'])->name('update-user');
  Route::get('recovery-user',[UserRegisterController::class,'recovery'])->name('recovery-user');

    //properties
   Route::resource('metaname',MetanameController::class)->middleware(['role:Admin|SuperAdmin']);
   Route::get('delete-metaname/{id}',[MetanameController::class,'edit'])->name('delete-metaname');
   Route::get('edit-metaname/{id}',[MetanameController::class,'show'])->name('edit-metaname');
  Route::get('update-metaname/{id}',[MetanameController::class,'recoveryUpdate'])->name('update-metaname');
  Route::get('recovery-metaname',[MetanameController::class,'recovery'])->name('recovery-metaname');
//Metadata
Route::resource('metadata',MetadataController::class)->middleware(['role:Admin|SuperAdmin']);
Route::get('riq-Datatype',[MetadataController::class,'riqDatatype'])->name('riq-Datatype');
Route::put('riq-update/{id}',[MetadataController::class,'updateDatatype'])->name('riq-update');

  Route::get('delete-metadata/{id}',[MetadataController::class,'edit'])->name('delete-metadata');
  Route::get('update-metadata/{id}',[MetadataController::class,'recoveryUpdate'])->name('update-metadata');
  Route::get('recovery-metadata',[MetadataController::class,'recovery'])->name('recovery-metadata');

  // Route::resource('render', Department::class,'render')->middleware(['role:Admin|Store']);
  Route::resource('department', DepartmentController::class)->middleware(['role:Admin|SuperAdmin']);

  Route::get('delete-department/{id}',[DepartmentController::class,'edit'])->name('delete-department');
  Route::get('update-department/{id}',[DepartmentController::class,'recoveryUpdate'])->name('update-department');
  Route::get('recovery-department',[DepartmentController::class,'recovery'])->name('recovery-department');


  Route::get('/qnsapplied',[DepartmentController::class,'qnsapplied'])->name('qnsapplied');
  Route::get('qnsapplied/{id}',[DepartmentController::class,'qnsUpdate'])->name('qnsapplied-update');
// Roles ontroller
  Route::resource('sessionm', SessionmController::class)->middleware(['role:SuperAdmin|GeneralAdmin|Admin|Account']);
    Route::get('delete-sessionm/{id}',[SessionmController::class,'destroy'])->name('delete-sessionm');
    
route::resource('/roles',roleController::class)->middleware(['role:SuperAdmin|GeneralAdmin|Admin|Account']);
  Route::resource('role-register', rolesController::class)->middleware(['role:SuperAdmin|GeneralAdmin|Admin|Account']);
  Route::get('delete-role/{id}',[rolesController::class,'edit'])->name('delete-role');
  Route::get('update-role/{id}',[rolesController::class,'recoveryUpdate'])->name('update-role');
  Route::get('recovery-role',[rolesController::class,'recovery'])->name('recovery-role');

// Property controller
      Route::resource('properties',PropertyController::class)->middleware(['role:SuperAdmin|GeneralAdmin|Admin|Account']);
      Route::get('delete-property/{id}',[PropertyController::class,'edit'])->name('delete-property');
      Route::get('recovery-property',[PropertyController::class,'recovery'])->name('recovery-property');
      Route::get('update-property/{id}',[PropertyController::class,'recoveryUpdate'])->name('update-property');
      Route::post('update-time-show/{id}',[PropertyController::class,'updateTimeShow'])->name('update-time-show');

      Route::resource('assets_',AssetController::class)->middleware(['role:SuperAdmin|GeneralAdmin|Admin|Account']);
      Route::get('delete-asset/{id}',[AssetController::class,'edit'])->name('delete-asset');

      // Route::get('delete-asset/{id}',[AssetController::class,'destroy'])->name('delete-asset');
      Route::get('recovery-asset',[AssetController::class,'recovery'])->name('recovery-asset');
      Route::post('update-asset/{id}',[AssetController::class,'update'])->name('update-asset');
      Route::get('recovery-assets/{id}',[AssetController::class,'recoveryUpdate'])->name('recovery-assets');
     // Route::post('update-time-show/{id}',[AssetController::class,'updateTimeShow'])->name('update-time-show');
    //Route::resource('accommodations',siteController::class);
       //Dashboard properties

          Route::get('dash-property/{id}',[PropertyController::class,'dashProperty'])->name('dash-property');

          Route::get('report-property/{id}',[PropertyController::class,'reportProperty'])->name('report-property');
          Route::get('report-property/{id}/dashboard',[PropertyController::class,'reportProperty'])->name('report-propertyDarsh');//changed

          //General reportTest
  Route::get('report-general/{id}/dashboard',[PropertyController::class,'reportGeneral'])->name('report-general');
  
  Route::get('report-action/{id}/dashboard',[PropertyController::class,'reportAction'])->name('report-action');
  Route::get('report-view/{sn}/{id}',[PropertyController::class,'reportView'])->name('report-view','report-view');
  // Route::post('report-view/{sn}/{id}',[PropertyController::class,'reportView'])->name('report-view','report-view');
  Route::post('report-view-post/{sn}/{id}',[PropertyController::class,'reportViewPost'])->name('report-view-post','report-view-post');
  Route::post('report-view-print/{sn}/{id}',[PropertyController::class,'reportViewPrint'])->name('report-view-print','report-view-print');

  Route::post('report-viewupdate/{sn}',[PropertyController::class,'reportViewUpdate'])->name('report-viewupdate','report-viewupdate');
   // End of TS Wawa
Route::resource('companyvalue',companyValueController::class);
Route::resource('admin', adminController::class);
Route::resource('warehouse', warehouseController::class)->middleware(['role:Admin']);
Route::resource('users', usersPermissionController::class)->middleware(['role:SuperAdmin|GeneralAdmin']);

Route::get('update-user-department/{id}',[usersPermissionController::class,'recoveryUpdate'])->name('update-user-department');

Route::resource('suppliers', supplierController::class)->middleware(['role:Admin']);
Route::resource('stocks', stockController::class)->middleware(['role:Admin|Store']);

Route::resource('pos', posController::class)->middleware(['role:Sales']);
Route::get('pos-final', [posController::class,'posFinal'])->middleware(['role:Sales']);

Route::resource('customers', customerController::class);
Route::resource('stocking', stockingController::class);
Route::get('issued-stock', [stockingController::class,'pendingIndex'])->name('pending-stock');

Route::get('returned-stock', [stockingController::class,'returnedIndex'])->name('returned-stock');

Route::post('pending', [stockingController::class,'pendingStock'])->name('pending');
Route::get('pending/destroy/{x}', [stockingController::class,'destroy'])->name('pending.destroy');

Route::get('my-stock', [stockingController::class,'my_stock'])->middleware(['role:Sales']);

Route::resource('sales', salesController::class);
Route::get('outstandings', [salesController::class,'outstanding']);
Route::resource('payment', paymentController::class);
Route::get('invoices/{id}', [paymentController::class,'viewInvoice'])->name('invoices');
// Route::get('order', [salesController::class,'order'])->name('order','order');
Route::get('/daily-report/id}', [reportController::class,'dailyReport'])->name('daily-report','daily-report');

Route::get('/daily-report/property/{id}/{x}', [reportController::class,'dailyReport'])->name('daily-reportx','daily-reportx');

Route::get('/weekly-report/property/{id}/{x}', [reportController::class,'weeklyReport'])->name('weekly-reportx','weekly-reportx');

Route::get('/monthly-report/property/{id}/{x}', [reportController::class,'monthlyReport'])->name('monthly-reportx','monthly-reportx');

Route::get('/weekly-report/{id}', [reportController::class,'weeklyReport'])->name('weekly-report','weekly-report');
Route::get('/monthly-report/{id}', [reportController::class,'monthlyReport'])->name('monthly-report','monthly-report');

//summary report
Route::get('/summary-report/{id}', [reportController::class,'summaryReport'])->name('summary-report','summary-report');


Route::post('orders',[posController::class,'orders'])->name('orders','orders');


route::resource('/expenses',expensesController::class)->middleware(['role:Admin|Account']);
route::resource('/stores',storeController::class)->middleware(['role:Admin|Store']);
route::resource('/account',accountController::class)->middleware(['role:Admin|Account']);
route::resource('/stock-purchase',purchaseController::class)->middleware(['role:Admin|Store|Account']);
Route::get('customers-list', [customerController::class,'customer_list']);

// Sales Report Controllers
Route::get('report-sales',[reportController::class,'index'])->name('report-sales');
Route::get('expenses-report',[reportController::class,'expensesReport'])->name('expenses-report');
Route::get('expenses-filter',[reportController::class,'expensesFilter'])->name('expenses_filter');

Route::get('report-purchase',[reportController::class,'purchaseReport'])->name('report-purchase');
Route::get('report-item',[reportController::class,'itemSold'])->name('report-item');
Route::get('filter-item',[reportController::class,'soldFilter'])->name('filter-item');
Route::get('show-order/{id}',[reportController::class,'showOrder'])->name('show-order');
Route::get('show-purchase/{id}',[reportController::class,'showPurchase'])->name('show-purchase');
Route::get('filter-sales',[reportController::class,'filtersales'])->name('filter-sales');

Route::get('purchases',[reportController::class,'filterPurchase'])->name('purchases');
Route::get('customersales/{id}',[reportController::class,'customersale'])->name('customersales');

Route::get('transaction-report',[reportController::class,'transaction_report'])->name('transaction-report');
Route::get('transactions/{id}',[reportController::class,'transactions'])->name('transactions');
Route::get('transaction-filter',[reportController::class,'transaction_filter'])->name('transaction-filter');

Route::resource('report-action', reportController::class);
Route::resource('print', reportTestController::class);
//Route::get('report/{id}', 'ReportTestController@viewreport')->name('report.show');
// Route::get('print/{id}',[reportTestController::class, 'show'])->name('print.show');//changed

// Stock Report Controllers
Route::resource('stock-reports', reportStockController::class);
Route::get('stock-alert',[reportStockController::class,'stock_alert'])->name('stock-reports');
Route::resource('finance', reportFinanceController::class);
Route::get('filter-finance', [reportFinanceController::class,'filterfinance'])->name('filter-finance');
Route::get('customershow/{id}',[customerController::class,'customershow'])->name('customershow');
Route::get('/substore/{id}/{item}',[storeController::class, 'show'])->name('substore')->middleware(['role:Admin|Store']);
Route::get('/purchase-report',[reportFinanceController::class, 'purchaseReport'])->name('purchase-report');
Route::get('/filter-purchase',[reportFinanceController::class, 'purchaseFilter'])->name('filter-purchase');

Route::get('sold/{id}',[reportFinanceController::class, 'sold'])->name('sold');
Route::get('instock/{id}',[reportFinanceController::class, 'instock'])->name('instock');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect()->route('admin.index');
})->name('dashboard');

// Rental

Route::resource('stock-rent', rentalController::class);
Route::get('rent-items', [rentalController::class,'rental_items']);
Route::post('addrentItem', [rentalController::class,'addRentItem'])->name('addrentItem');
Route::post('createOrder', [rentalController::class,'createOrder'])->name('createOrder');
Route::get('shops',[warehouseController::class,'shops']);

 Route::resource('company-profile',profileController::class);//changed

Route::resource('custom-users', customRegisterController::class);


// test
Route::get('tester',[testerController::class,'test']);
// Route::get('possale/{post}',Show::class)->name('possale');
// Route::get('posfinal/{post}',Showfinal::class)->name('posfinal');

Route::get('export-sales', [ImportExportController::class,'order_export'])->name('export-sales');
Route::get('export-outstanding', [ImportExportController::class,'outstandings_export'])->name('export-outstanding');

});



Route::get('ordermail',function(){
    return new App\Mail\OrderEmails;
});
Route::resource('mail_now',mailController::class);

//Password Reset
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
