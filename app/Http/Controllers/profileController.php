<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\myCompany;
use App\Models\myPayment;
use Illuminate\Http\Request;
use App\Models\user;

use App\Models\dbconnect;
use App\Models\property;

use Dotenv\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\dbsetting;
use App\Models\asset;

use DB;
use App\Models\department;
use App\Models\userProperty;
use App\Models\userRole;
use Spatie\Permission\Traits\HasRoles;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $auth=auth::user();
     $aData['dataC'] = dbsetting::getConnect($auth->id);
     
     if(!is_null($auth->company_id))
     {
        $profile = myCompany::on('clientdb')->where('id',$auth->company_id)->first();         
         }
         else{
             return redirect()->back()->with('info','Company ID is null');
         }
         //dd($profile);
        return view('admin.profile.profile',compact('profile'));
    }

 public function companyWeb()
    {
           $auth=auth()->user();

      //  $profile = myCompany::first();
         $pin=rand(111111, 999999);
         //dd($pin);
//          $properties=property::where('company_id',$auth->company_id)
// ->where('status','Active')
// ->get();
            $properties=property::where('status','Active')
            ->get();
             $roles = role::where('status','Active')->get();
            $departments=department::get();


        return view('admin.profile.profile_web',compact('pin','properties','departments','roles'));    
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

  // validator([
  //           'name' => ['required', 'string', 'max:255'],
  //           'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
  //           'password' =>['required', 'string', 'max:64'],
  //           //'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
  //       ])->validate();


$department = department::where('department_name','Manager')->first();
$role_name = role::where('name','Manager')->first();

//Company view
  $compEmail = myCompany::where('email',request('email'))
  ->where('status','Active')->first();
  
  if(!is_null($compEmail))
  {
  
   return redirect()->back()->with('info','Email alredy exist');
  }


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

                
    //Insert to user
//Insert to user
       $userReg = user::Create([
        'name'=>request('first_name').' '.request('last_name'),
        'department_id'=>$department->id,
        // 'property_id'=>$insetqnsy->id,
         'email'=>request('email'),
         'password'=>Hash::make(request('password')),
         'status'=>'Active',
          'user_id'=>0
        ]);

//dd('prints');
 $insetqnsy = myCompany::Create([
          'company_name'=>request('business_name'),
           'logo'=>$imageToStore,
          'tin'=>request('tin'),
          'vrn'=>request('vrn'),
          'phone_number'=>request('phone_number'),
          'email'=>request('email'),
          'address'=>request('address'),

           'district'=>request('district'),
            'region'=>request('region'),

          'first_name'=>request('first_name'),
          'last_name'=>request('last_name'),
          'code'=>request('code'),
          'status'=>'Active',
          'user_id'=>$userReg->id
             ]);

        $userSiteReg = userProperty::Create([
        'sys_user_id'=>$userReg->id,
        'property_id'=>$insetqnsy->id,
        'status'=>'Active',
        'user_id'=>$userReg->id
        ]);

//Assign to Role
$userReg->assignRole($role_name->id);
$appliedto =userRole::Create([
        'sys_user_id'=>$userReg->id,
        'role_id'=>$role_name->id,        
        'status'=>'Active',
        'user_id'=>$userReg->id     
        ]);

//Insert into property table
 $insert_property = property::UpdateOrCreate([       
        'company_id'=>$insetqnsy->id,
          'level'=>'Main',
      ],[
          'company_code'=>request('code'),
         'property_name'=>request('business_name'),
        'property_category'=>request('property_category'),
         'property_rank'=>2,
         'property_rank'=>1,
         'location_name'=>request('district').'('.request('region').')',
         'room_no'=>1,
         'phone'=>request('phone_number'),

         'email'=>request('email'),
         //'password'=>Hash::make(request('password')),
         'password'=>Hash::make(request('password')),
          'property_description'=>'First company registration',        
           'photo'=>$imageToStore,
         'status'=>'Active',
          'user_id'=>$userReg->id
        ]);

//Update user property ID
$updateUserPID = user::where('id',$userReg->id)
             ->update([
'property_id'=>$insert_property->id,
 'company_id'=>$insetqnsy->id,
  'company_code'=>request('code')
        ]);

//Insert data to dbconnects table
$dbconnect =dbconnect::Create([
     'user_id'=>$userReg->id, 
        'company_id'=>$insetqnsy->id,       
        'status'=>'Active'     
        ]);

//Insert one value in asset table             
$assetData =asset::Create([
     'property_id'=>$insert_property->id, 
     'metaname_id'=>1, 
     'asset_name'=>"Room 1",
     'asset_type'=>"Room",
     'time_show'=>1,
     'asset_show'=>1,

        'asset_description'=>"Room 1", 
        'status'=>'Active',           
'user_id'=>$userReg->id, 
        ]);


    }

}
else
{

// //Insert to user
       $userReg = user::Create([
        'name'=>request('first_name').' '.request('last_name'),
        'department_id'=>$department->id,
        // 'property_id'=>$insetqnsy->id,
         'email'=>request('email'),
         'password'=>Hash::make(request('password')),
         'status'=>'Active',
          'user_id'=>0
        ]);

    //dd('print1x');
 $insetqnsy = myCompany::Create([
          'company_name'=>request('business_name'),
           'logo'=>'',
          'tin'=>request('tin'),
          'vrn'=>request('vrn'),
          'phone_number'=>request('phone_number'),
          'email'=>request('email'),          
          'address'=>request('address'),

             'district'=>request('district'),
             'region'=>request('region'),
          
          'first_name'=>request('first_name'),
          'last_name'=>request('last_name'),
           'code'=>request('code'),
          'status'=>'Active',
          'user_id'=>$userReg->id
        ]);

      
        $userSiteReg = userProperty::Create([
        'sys_user_id'=>$userReg->id,
        'property_id'=>$insetqnsy->id,
        'status'=>'Active',
        'user_id'=>$userReg->id
        ]);

//User role
 $userReg->assignRole($role_name->id);

$appliedto =userRole::Create([
        'sys_user_id'=>$userReg->id,
         'role_id'=>$role_name->id,         
        'status'=>'Active',
        'user_id'=>$userReg->id   
        ]);

//Insert data into properties table
 $insert_property = property::UpdateOrCreate([       
        'company_id'=>$insetqnsy->id,
         'level'=>'Main',
    ],[
        'company_code'=>request('code'),
         'property_name'=>request('business_name'),
        'property_category'=>request('property_category'),
         'property_rank'=>2,
         'property_rank'=>1,
         'location_name'=>request('district').'('.request('region').')',
         'room_no'=>1,
         'phone'=>request('phone_number'),

         'email'=>request('email'),
         'password'=>Hash::make(request('password')),
          'property_description'=>'First company registration',         
         'status'=>'Active',
          'user_id'=>$userReg->id
        ]);

//Update user property ID
$updateUserPID = user::where('id',$userReg->id)
             ->update([
'property_id'=>$insert_property->id,
 'company_id'=>$insetqnsy->id,
  'company_code'=>request('code')
        ]);

  //Insert data to
$dbconnect =dbconnect::Create([
         'user_id'=>$userReg->id,
        'company_id'=>$insetqnsy->id,       
        'status'=>'Active'     
        ]);
     
//Insert one value in asset table             
$assetData =asset::Create([
     'property_id'=>$insert_property->id,
     'metaname_id'=>1, 
     'asset_name'=>"Room 1",
     'asset_type'=>"Room",
     'time_show'=>1,
     'asset_show'=>1,

        'asset_description'=>"Room 1", 
        'status'=>'Active',          
'user_id'=>$userReg->id, 
        ]);

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
        dd('updd');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd('upd');
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
    //dd(request('phone_number'));
        $auth=auth::user();
      $myCompanyID = myCompany::where('id',$auth->company_id)
             ->update([
'company_name'=>request('business_name'),
          'tin'=>request('tin'),
          'vrn'=>request('vrn'),
          'phone_number'=>request('phone_number'),
          'email'=>request('email'),          
          'address'=>request('address'),

             'district'=>request('district'),
             'region'=>request('region'),
          
          'first_name'=>request('first_name'),
          'last_name'=>request('last_name'),
           'code'=>request('code'),
          'status'=>'Active'
        ]);
    

      $myCompanyID = property::where('id',$auth->property_id)
             ->update([         
         'property_name'=>request('business_name'),               
        ]);

//Update Photos
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
                 
   
      $myCompanyID = myCompany::where('id',$auth->company_id)
             ->update([
'logo'=>$imageToStore,         
        ]);


                 }
             }

return redirect()->back()->with('success','Updated successfully');
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
