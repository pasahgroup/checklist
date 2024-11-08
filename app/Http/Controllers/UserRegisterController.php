<?php

namespace App\Http\Controllers;

use App\Models\user;
//use App\Actions\Fortify\PasswordValidationRules;
use Dotenv\Validator;
use App\Models\department;
use App\Models\metadata;
use App\Models\datatype;
use App\Models\property;
use App\Models\userProperty;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metadatas = metadata::where('status','Active')
          ->orWhere('status','Stop')
          ->get();
          $datatypes = datatype::get();

  $users = user::where('status','Active')
  ->where('name','!=',"")
  ->get();
 //dd($users);

$departments=department::get();
$properties=property::get();
//dd($metadatas);
 return view('auth.register',compact('departments','users','datatypes','properties'));
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

  validator([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' =>['required', 'string', 'max:64'],
            //'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();
//dd(request('email'));
// $email_data = user::findOrFail(request('email'));
  $email_data = user::where('email',request('email'))->first();
//dd($email_data->email);


    if(!is_null($email_data))
        {
           return redirect()->back()->with('info',"Email exists");
        }

        if(request('password') != request('password_confirmation'))
        {
            //dd('Not equal');
           return redirect()->back()->with('error',"Password doesn't match");
        }

else
{
       $userReg = user::UpdateOrCreate([
        'name'=>request('name'),
        'department_id'=>request('department'),
        'property_id'=>request('property'),
         'email'=>request('email'),
         'password'=>Hash::make(request('password')),
         'status'=>'Active',
          'user_id'=>auth()->id()
        ]);

        $userSiteReg = userProperty::UpdateOrCreate([
        'sys_user_id'=>$userReg->id,
        'property_id'=>request('property'),
        'status'=>'Active',
        'user_id'=>auth()->id()
        ]);
}
      return redirect()->back()->with('success','User Registered successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\userRegister  $userRegister
     * @return \Illuminate\Http\Response
     */
    public function show(userRegister $userRegister)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\userRegister  $userRegister
     * @return \Illuminate\Http\Response
     */
    public function edit(request $request,$id)
    {
        $user = user::where('id',$id)
               ->update([
                'status'=>"Inactive",
                 'user_id'=>auth()->id()

              ]);
       return redirect()->back()->with('success','User deleted successfly');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\userRegister  $userRegister
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //dd(request('property'));
       $user = user::where('id',$id)->first();
        if($user){
           $user->update([
            'name'=>request('full_name'),
             'department_id'=>request('department'),
             'property_id'=>request('property'),
              'email'=>request('email'),
             'user_id'=>auth()->id()
           ]);
           return redirect()->back()->with('success','User updated successfully');
        }
        else{
            return redirect()->back()->with('error','Something went wrong with this User');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\userRegister  $userRegister
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user,$id)
    {
        $user = user::where('id',$id)->first();
        if($user){
            $user->delete();
            return redirect()->back()->with('success','User permanent deleted successfully');
        }
        else{
            return redirect()->back()->with('error','Something went wrong with this User');
        }
    }


    public function recoveryUpdate(user $user,$id)
    {
          $user = user::where('id',$id)
               ->update([
                'status'=>"Active",
                 'user_id'=>auth()->id()

              ]);
       return redirect()->back()->with('success','User recovered successfly');
    }


   public function recovery()
    {
       //$user = user::where('status','Inactive')->get();
         // $datatypes = datatype::get();
         $users = DB::select('select u.id,u.name,u.department_id,d.department_name,u.email,u.status from users u,departments d where u.department_id=d.id and u.status="Inactive"');

$departments=department::get();
        return view('admin.settings.recovery.recoveryUser',compact('users','departments'));
    }
}
