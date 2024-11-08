<?php

namespace App\Http\Controllers;

use App\Models\myCompany;
use App\Models\myPayment;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\role;
use App\Models\dbconnect;

use Dotenv\Validator;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\department;
use App\Models\userProperty;
use App\Models\userRole;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = myCompany::first();
         $pin=rand(111111, 999999);
        return view('admin.profile.profile',compact('profile','pin'));
    }

 public function companyWeb()
    {
        //dd('here');
      //  $profile = myCompany::first();
         $pin=rand(111111, 999999);
         //dd($pin);
        return view('admin.profile.profile_web',compact('pin'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       //register company from web
        dd('print');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

$department = department::where('department_name','Manager')->first();
$role_name = role::where('name','Manager')->first();

//Company view
  $comp = myCompany::where('company_name',request('business_name'))
  ->where('status','Active')->first();
  if()


  
  if(request('attachment')){
            $attach = request('attachment');
            foreach($attach as $attached){

  // Get filename with extension
                     $fileNameWithExt =$attached->getClientOriginalName();
                     // Just Filename
                     $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                     // Get just Extension
                     $extension = $attached->getClientOriginalExtension();
                     //Filename to store
                     $imageToStore = $filename.'_'.time().'.'.$extension;
                     //upload the image
                     $path =$attached->storeAs('public/logo/', $imageToStore);

                    $comp = myCompany::where('company_name',request('business_name'))->first();
                     // dd($comp);
                    
                    if($comp == null)
                      {
//dd('prints');

 $insetqnsy = myCompany::Create([
          'company_name'=>request('business_name'),
           'logo'=>$imageToStore,
          'tin'=>request('tin'),
          'vrn'=>request('vrn'),
          'phone_number'=>request('phone_number'),
          'email'=>request('email'),
          'address'=>request('address'),
          'first_name'=>request('first_name'),
          'last_name'=>request('last_name'),
          'code'=>request('code'),
          'status'=>'Active',
          'user_id'=>0
             ]);
//Insert to user
  $userReg = user::UpdateOrCreate([
        'name'=>request('first_name').' '.request('last_name'),
        'department_id'=>$department->id,
        'property_id'=>$insetqnsy->id,
         'email'=>request('email'),
         'password'=>Hash::make(request('password')),
         'status'=>'Active',
          'user_id'=>0
        ]);

        $userSiteReg = userProperty::UpdateOrCreate([
        'sys_user_id'=>$userReg->id,
        'property_id'=>$insetqnsy->id,
        'status'=>'Active',
        'user_id'=>0
        ]);

$appliedto =userRole::Create([
        'sys_user_id'=>$userReg->id,
        'role_id'=>$role_name->id,        
        'status'=>'Active',
        'user_id'=>0      
        ]);
//Insert data to
$dbconnect =dbconnect::Create([
        'company_id'=>$insetqnsy->id,       
        'status'=>'Active'     
        ]);

                 }
                      else
                      {
$insetqnsy = myCompany::where('company_name',request('business_name'))
             ->update([
 'company_name'=>request('business_name'),
           'logo'=>$imageToStore,
          'tin'=>request('tin'),
          'vrn'=>request('vrn'),
          'phone_number'=>request('phone_number'),
          'email'=>request('email'),
          'address'=>request('address'),
          'first_name'=>request('first_name'),
          'last_name'=>request('last_name'),
           'code'=>request('code'),
          'status'=>'Active',
          'user_id'=>0
            ]);
  
            }

         }
}
else
{

    //dd(request('business_name'));
         $comp = myCompany::where('company_name',request('business_name'))->first();
                     //dd($comp);
                    if($comp == null)
                      {
    //dd('print1x');
 $insetqnsy = myCompany::Create([
          'company_name'=>request('business_name'),
           'logo'=>'',
          'tin'=>request('tin'),
          'vrn'=>request('vrn'),
          'phone_number'=>request('phone_number'),
          'email'=>request('email'),
          'address'=>request('address'),
          'first_name'=>request('first_name'),
          'last_name'=>request('last_name'),
           'code'=>request('code'),
          'status'=>'Active',
          'user_id'=>0
        ]);               

        //Insert to user
  $userReg = user::UpdateOrCreate([
        'name'=>request('first_name').' '.request('last_name'),
        'department_id'=>$department->id,
        'property_id'=>$insetqnsy->id,
         'email'=>request('email'),
         'password'=>Hash::make(request('password')),
         'status'=>'Active',
          'user_id'=>0
        ]);

        $userSiteReg = userProperty::UpdateOrCreate([
        'sys_user_id'=>$userReg->id,
        'property_id'=>$insetqnsy->id,
        'status'=>'Active',
        'user_id'=>0
        ]);        

$appliedto =userRole::Create([
        'sys_user_id'=>$userReg->id,
         'role_id'=>$role_name->id,         
        'status'=>'Active',
        'user_id'=>0   
        ]);
  //Insert data to

$dbconnect =dbconnect::Create([
        'company_id'=>$insetqnsy->id,       
        'status'=>'Active'     
        ]);

                }
                      else
                      {
                        //dd('print2');

$insetqnsy = myCompany::where('company_name',request('business_name'))
             ->update([
 'company_name'=>request('business_name'),
          // 'logo'=>'',
          'tin'=>request('tin'),
          'vrn'=>request('vrn'),
          'phone_number'=>request('phone_number'),
          'email'=>request('email'),
          'address'=>request('address'),
          'first_name'=>request('first_name'),
          'last_name'=>request('last_name'),
           'code'=>request('code'),
          'status'=>'Active',
          'user_id'=>0
        ]);
              }
     }

       $code=request('code');
     if(request('profile_web'))
     {
        return redirect()->route('login',compact('code'))->with('success','Registered successfully, Now Login');     
     }else{
        return redirect()->route('company-profile.index')->with('success','Updated successfully');
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
