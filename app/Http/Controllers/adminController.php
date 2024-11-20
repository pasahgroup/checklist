<?php

namespace App\Http\Controllers;

use App\Models\account;
use App\Models\cashIn;
use App\Models\customer;
use App\Models\customerAccountSummary;
use App\Models\customerWallet;
use App\Models\customerWalletSummury;
use App\Models\myCompany;
use App\Models\myPayment;
use App\Models\order;
use App\Models\orderItem;
use App\Models\package;
use App\Models\payment;
use App\Models\purchaseOrder;
use App\Models\sale;
use App\Models\stock;
use App\Models\tenant;
use App\Models\User;
use App\Models\property;
use Illuminate\Support\Facades\Config;

use App\Models\answer;

use App\Models\session;
use App\Models\warehouse;
use App\Models\accounting;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use App\Http\Traits\GlobalTrait;
// use App\Http\Controllers\Helpers;

class adminController extends Controller
{
    use GlobalTrait;
    public $settings;

    public function __construct()
    {
        $this->settings = $this->getAllSettings();
    }


 public function index()
    {
//dd(request()->getHost());
      //dd(request('code'));
       
//dd(auth()->id());
// DB::purge($dd);

       if(auth())
       {


        $now = Carbon::now();
        $weekStartDate = $now->startOfWeek()->format('Y-m-d H:i');
        $weekEndDate = $now->endOfWeek()->format('Y-m-d H:i');
        $user = User::where('id',auth()->id())->first();
        $users= User::get();
        $user->hasRole('Admin');
       //$int = (int)$user->property_id;
//dd($users);
        //dd($user->hasRole('Housekeeper'));
      $property_name = property::where('id',$user->property_id)->first();
     //dd($property_name);

if($property_name ==null)
{
  $property_name=1;
    //return redirect()->route('admin.index')->with('info','There is no any property ID set');
}else {
 $property_name=$property_name->property_name;
}


//ADD ROLE FOR THE FIRST TIME
        if($users->count()<=1 && $user->hasRole('Admin') == 0){
            // Create and assign user to be admin
                if(Role::where('name',request('name'))->exists()){
                    return redirect()->back()->with('error','This role already created');
                }
                else{
            $role = Role::create(['name' => 'SuperAdmin']);//Can add,remove,assign all activities within the system
            $role = Role::create(['name' => 'GeneralAdmin']);//Can view all activities within the all hotels
            $role = Role::create(['name' => 'Admin']);//Can view all activities within the some of the hotels
            $role = Role::create(['name' => 'GeneralManager']);//Can view all activities within the hotel
            $role = Role::create(['name' => 'Manager']);//Can view some activities within the hotel
            $role = Role::create(['name' => 'Account']);//Can view all activities related to store within the hotel
            $role = Role::create(['name' => 'Store']);
            $role = Role::create(['name' => 'User']);
            $role = Role::create(['name' => 'HouseKeeper']);
             $role = Role::create(['name' => 'Maintenancier']);
                $role = Role::create(['name' => 'MaintenanceReport']);
            //assign admin role
            $user->assignRole('Admin');
                }
            //create master accounts
            $super_admin = User::create([
                'name' =>'SuperAdmin',
                'email' =>'superadmin@pasah.net',
                'password' => Hash::make('pasah12345!')
            ]);
            // Assign role to super admin
            $super_admin->assignRole('SuperAdmin');


            // Create main account
            // $account  = account::create([
            //     'account_name'=>'Main Account',
            //     'descriptions'=>'Main cash account',
            //     'main_account'=>1,
            //     'user_id'=>auth()->id()
            // ]);
            // // Create main warehouse
            // $store = warehouse::create(
            //     [
            // 'warehouse'=>'Main warehouse',
            // 'location'=>'HQ',
            // 'main_warehouse'=>1,
            // 'descriptions'=>'All items from supplier is stored here before issuing to the shop',
            // 'user_id'=>auth()->id() ]);
        };


//IF THE USER HAS ADMIN PRIVILEDGES
     if($user->hasRole('GeneralAdmin|SuperAdmin|Admin')){


        // $collection_daily = $thedailypaid->paid_cash - $thedaily->daily_cash;
        // $collection_weekly = $theweeklypaid->paid_cash - $theweekly->weekly_cash;
        // $collection_monthly =  $themonthlypaid->paid_cash - $themonthly->monthly_cash ;

        $sessions = session::join('users','users.id','sessions.user_id')
        ->groupby('sessions.user_id')
        ->get();

 $current_date = date('Y-m-d');

//$properties=property::leftjoin('answers','properties.id','answers.property_id')->get();
//$properties=DB::select("select p.id,p.property_name,a.metaname_id,a.datex from properties p left join answers a on p.id=a.property_id  and a.datex='".$current_date."' group by p.property_name,a.metaname_id");

$properties=property::get();
 $reportDailyData=DB::select('select a.property_id,a.metaname_id,m.metaname_name,a.indicator_id,a.asset_id, a.opt_answer_id,a.answer,o.answer_classification from answers a,optional_answers o,metanames m where a.indicator_id=o.indicator_id and a.metaname_id=m.id and a.opt_answer_id=o.id and a.datex="'.$current_date.'"');
  $dataDaily = collect($reportDailyData);

  // dd('dds');
//$dailyMetaCollects=$dataDaily->groupBy('metaname_name');
//Report weekly dataDaily

 $reportWeeklyData=DB::select('select a.property_id,a.metaname_id,m.metaname_name,a.indicator_id,a.asset_id, a.opt_answer_id,a.answer,o.answer_classification from answers a,optional_answers o,metanames m where a.indicator_id=o.indicator_id and a.metaname_id=m.id and a.opt_answer_id=o.id and WEEK(a.datex)=WEEK(NOW())');
 $dataWeekly = collect($reportWeeklyData);
//$weeklyMetaCollects=$dataWeekly->groupBy('metaname_name');
// dd('dds');

//Report monthly dataDaily
 $reportMonthlyData=DB::select('select a.property_id,a.metaname_id,m.metaname_name,a.indicator_id,a.asset_id, a.opt_answer_id,a.answer,o.answer_classification from answers a,optional_answers o,metanames m where a.indicator_id=o.indicator_id and a.metaname_id=m.id and a.opt_answer_id=o.id and month(a.datex)=month(NOW())');
 $dataMonthly = collect($reportMonthlyData);

    return redirect('dash-property/{id}');
  }


       // sales users
        if($user->hasRole('GeneralManager|HouseKeeper|Maintenancier|MaintenanceReport')){
          $current_date = date('Y-m-d');

          $properties=property::get();
          $reportDailyData=DB::select('select a.property_id,a.metaname_id,m.metaname_name,a.indicator_id,a.asset_id, a.opt_answer_id,a.answer,o.answer_classification from answers a,optional_answers o,metanames m where a.indicator_id=o.indicator_id and a.metaname_id=m.id and a.opt_answer_id=o.id and a.datex="'.$current_date.'"');
           $dataDaily = collect($reportDailyData);
         //$dailyMetaCollects=$dataDaily->groupBy('metaname_name');
         //Report weekly dataDaily

          $reportWeeklyData=DB::select('select a.property_id,a.metaname_id,m.metaname_name,a.indicator_id,a.asset_id, a.opt_answer_id,a.answer,o.answer_classification from answers a,optional_answers o,metanames m where a.indicator_id=o.indicator_id and a.metaname_id=m.id and a.opt_answer_id=o.id and WEEK(a.datex)=WEEK(NOW())');
          $dataWeekly = collect($reportWeeklyData);
         //$weeklyMetaCollects=$dataWeekly->groupBy('metaname_name');
//dd('sds');
         //Report monthly dataDaily
          $reportMonthlyData=DB::select('select a.property_id,a.metaname_id,m.metaname_name,a.indicator_id,a.asset_id, a.opt_answer_id,a.answer,o.answer_classification from answers a,optional_answers o,metanames m where a.indicator_id=o.indicator_id and a.metaname_id=m.id and a.opt_answer_id=o.id and month(a.datex)=month(NOW())');
          $dataMonthly = collect($reportMonthlyData);

            return redirect('daily');
}



if($user->hasRole('Manager')){
  $current_date = date('Y-m-d');

  $properties=property::get();
  $reportDailyData=DB::select('select a.property_id,a.metaname_id,m.metaname_name,a.indicator_id,a.asset_id, a.opt_answer_id,a.answer,o.answer_classification from answers a,optional_answers o,metanames m where a.indicator_id=o.indicator_id and a.metaname_id=m.id and a.opt_answer_id=o.id and a.datex="'.$current_date.'"');
   $dataDaily = collect($reportDailyData);
 //$dailyMetaCollects=$dataDaily->groupBy('metaname_name');
 //Report weekly dataDaily

  $reportWeeklyData=DB::select('select a.property_id,a.metaname_id,m.metaname_name,a.indicator_id,a.asset_id, a.opt_answer_id,a.answer,o.answer_classification from answers a,optional_answers o,metanames m where a.indicator_id=o.indicator_id and a.metaname_id=m.id and a.opt_answer_id=o.id and WEEK(a.datex)=WEEK(NOW())');
  $dataWeekly = collect($reportWeeklyData);
 //$weeklyMetaCollects=$dataWeekly->groupBy('metaname_name');

 //Report monthly dataDaily
  $reportMonthlyData=DB::select('select a.property_id,a.metaname_id,m.metaname_name,a.indicator_id,a.asset_id, a.opt_answer_id,a.answer,o.answer_classification from answers a,optional_answers o,metanames m where a.indicator_id=o.indicator_id and a.metaname_id=m.id and a.opt_answer_id=o.id and month(a.datex)=month(NOW())');
  $dataMonthly = collect($reportMonthlyData);
//dd('ddd');
 return redirect('managers-inspection');
}


if($user->hasRole('Store')){
    return redirect()->route('stocking.index');
}
elseif($user->hasRole('')){
    return "Sorry you are not permitted to access this system";
}

       }
       else
       {
         Auth::logout();
       }

    }


    //license
    public function license(){
        return view('admin.license');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $sale = sale::where('id',request('sale_id'))->first();
        $payment = payment::where('sale_id',$sale->order_id)->get();

        if($sale){
        if(request('pay_wallet')){
            $wallet = request('amount');
            $paid = request('amount');
            $without_wallet=0;
        }
        else{
            $wallet = request('wallet');
            $paid =  $wallet + request('amount');
            $without_wallet =  request('amount');
        }

        // Installment payment
        $sales = sale::where('id',request('sale_id'))->first();
        if($sales->balance > 0){
            // Deduct from customer account
            $customer_account = customer::where('id', request('customer_id'))->first();
            $from = $customer_account->to;
            $new_balance = $from + $paid;
            if($new_balance > 0){
                return redirect()->back()->with('error','The amount paid is greater than actual credit');
            }
                else{
            $update = customer::where('id', request('customer_id'))->update([
                'from'=>$from,
                'to'=>$from + $paid
            ]);
            $customersummary = customerAccountSummary::updateOrcreate(
                [
                    'customer_id'=>request('customer_id'),
                    'from'=>$from,
                    'sale_id'=>request('sale_id'),
                    'to'=>$from + $paid,
                    'status'=>'Installment',
                    'user_id'=>auth()->id()
                ]);
                if(request('wallet') > 0 ){
                         // Deduct amount from e-wallet
            $e_wallet  = customerWallet::where('customer_id',$sales->customer_id)->first();
            $customer_wallet = customerWallet::where('customer_id',$sales->customer_id)->update([
                'amount'=>- $wallet,
                'balance'=>$e_wallet->balance - $wallet,
                ]);
                // Create records for e-wallet transactions
                $wallet_report = customerWalletSummury::create([
                    'customer_id'=>$sales->customer_id,
                    'wallet_id'=> $e_wallet->id,
                    'order_id'=> $sales->order_id,
                    'wallet_amount'=>- $wallet,
                    'wallet_balance'=>$e_wallet->balance - $wallet,
                    'status'=>'Pay via E-Wallet',
                    'user_id'=>auth()->id()
                ]);
                }

            }
            // Add payment records
            $acc_id = account::where('id',request('deposit_account'))->first();;
            $payment = payment::create(
                [   'sale_id'=>$sales->id,
                    'account_id'=> $acc_id->id,
                    'amount'=>$sales->balance,
                    'paid'=> $paid,
                    'wallet'=>$wallet,
                    'balance'=>$sales->balance - $paid,
                    'receipt'=>'Direct',
                    'status'=>'Installment',
                    'user_id'=>auth()->id()
                ]);
                if(request('pay_wallet')){
                // Deduct amount from e-wallet
            $e_wallet  = customerWallet::where('customer_id',$sales->customer_id)->first();
            $customer_wallet = customerWallet::where('customer_id',$sales->customer_id)->update([
                'amount'=>- $wallet,
                'balance'=>$e_wallet->balance - $wallet,
                ]);
               // Create records for e-wallet transactions
               $wallet_report = customerWalletSummury::create([
                'customer_id'=>$sales->customer_id,
                'wallet_id'=> $e_wallet->id,
                'order_id'=> $sales->order_id,
                'wallet_amount'=>- $wallet,
                'wallet_balance'=>$e_wallet->balance - $wallet,
                'status'=>'Pay via E-Wallet',
                'user_id'=>auth()->id()
            ]);
        }
                // Add amount to cash in account
                $cashin = cashIn::create(
                    [
                        'account_id'=>$acc_id->id,
                        'amount_received'=>$paid,
                        'amount_to'=> $acc_id->total + $without_wallet,
                        'cash_category'=>'Sale',
                        'cash_descriptions'=>'Installment and Wallet payment',
                        'user_id'=>auth()->id(),
                    ]
                    );

                    // update sale status
                $balancing = $sales->balance -  $paid;
                if($balancing == 0){
                    $status = "Cash";
                }
                else{
                    $status = "Installment";
                }
            $sale = sale::where('id',request('sale_id'))->update(
                [
                    'paid'=>$sales->paid + request('amount'),
                    'balance'=>$sales->balance - $paid,
                    'status'=> $status
                ]);

            // Add payment to account
            $account = account::where('id',request('deposit_account'))->first();
            $accounts = $account->update([
                'total'=>$account->total + $without_wallet
            ]);
//Double entry customer cash receipt

     $max=accounting::max('id');
     $max_id=$max+1;
     $max_id="trans".$max_id;
     $saleRecord = sale::where('id',request('sale_id'))->first();
     $customerRecord = customer::where('id', request('customer_id'))->first();
     $walletRecord  = customerWallet::where('customer_id',$sales->customer_id)->first();
    //  $supplierRecord = supplier::where('id',request('supplier_id'))->first();
     $deductionRecord = account::where('id',request('deposit_account'))->first();

    //dd($walletRecord);

  // to receiver account

  $receiver = accounting::create([
    'trans_id'=>$max_id,
    'trans_no'=>$payment->id,
    'invoice'=>request('sale_id'),
    'account_id'=>$saleRecord->id,
    'account_name'=>'Sales Invoice',
    'debit'=>$paid,
    'credit'=>0.00,
    'balance'=>0.00,
    'ledger_balance'=>$sales->balance - $paid,
    'payment_via'=>'Cash',
    'account_type'=>"Customer Invoice",
    'status'=>$status,
    'descriptions'=>request('description'),
    'user_id'=>auth()->id()
]);
  // from sender account
     $sender = accounting::create([
         'trans_id'=>$max_id,
         'trans_no'=>$payment->id,
         'invoice'=>request('sale_id'),
         'account_id'=>$customerRecord->id,
         'account_name'=>$customerRecord->customer_name,
         'debit'=>0.00,
         'credit'=>$without_wallet,
         'balance'=>request('amount'),
         'ledger_balance'=>$customerRecord->to,
         'payment_via'=>'Cash',
         'account_type'=>"Customer",
         'status'=>'Cash receive',
         'descriptions'=>request('description'),
         'user_id'=>auth()->id()
     ]);


   //CREDIT MAIN ACCOUNT
   $sender = accounting::create([
    'trans_id'=>$max_id,
    'trans_no'=>$payment->id,
    'invoice'=>request('sale_id'),
    'account_id'=>$deductionRecord->id,
    'account_name'=> $deductionRecord->account_name,
    'debit'=>0.00,
    'credit'=>$without_wallet,
    'balance'=>0.00,
    'ledger_balance'=>$deductionRecord->total,
    'payment_via'=>'Cash',
    'account_type'=>"Payable Account",
    'status'=>'Cash receive',
    'descriptions'=>request('description'),
    'user_id'=>auth()->id()
  ]);
        //END OF DOUBLE ENTRY PURCHASE INVOICE PAYMENTs

         return redirect()->back()->with('success','Payment done successfully');
        }
        else{
        return redirect()->back()->with('error','This payment has a zero balance you cant pay');
        }
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
