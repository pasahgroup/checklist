<?php

namespace App\Http\Controllers;

use App\Models\myCompany;
use App\Models\myPayment;
use App\Models\department;
use App\Models\userRole;
use App\Models\userProperty;
use App\Models\property;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class usersPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users= User::get();
         $departments= department::get();

        $userRoles = User::join('user_roles','users.id','user_roles.sys_user_id')
        ->join('roles','user_roles.role_id','roles.id')
        ->where('user_roles.status','Active')
        ->select('roles.name as role_name','user_roles.sys_user_id as sys_user_id','user_roles.id as arole_id','users.*')
        ->get();


  // $permissions = userProperty::join('properties','user_properties.property_id','properties.id')
  //      ->where('user_properties.status','Active')
  //       ->select('properties.id as id','user_properties.sys_user_id as model_id','properties.property_name as permission_name')
  //       ->get();

 $permissions = User::join('properties','users.property_id','properties.id')
       ->where('users.status','Active')
        ->select('properties.id as id','users.id as model_id','properties.property_name as permission_name')
        ->get();

        $permit = property::get();
        $roles = Role::get();
        //$limitation = myPayment::latest()->first();

        return view('admin.settings.users.users',compact('users','userRoles','permissions','permit','roles','departments'));
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
        $user_id = User::where('id',request('users_id'))->first();
        $user_id->assignRole(request('roles'));
        return redirect()->back()->with('success','Role added successfly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = User::where('id',$id)->first();
        $roles= Role::get();
        // $myroles = $datas->getRoleNames();
        return view('admin.settings.users.edit',compact('datas','id','roles'));
    }
/**
 * Remove roles to the user
 */

        public function roleremove($id,$role)
        {
            $user = User::where('id',$id)->first();
            $user->removeRole($role);
            return redirect()->back()->with('success','Role removed successfly');
        }


          public function recoveryUpdate(user $department,$id)
    {
          $user = user::where('id',$id)
               ->update([
                'department_id'=>"",
                 'user_id'=>auth()->id()

              ]);
       return redirect()->back()->with('success','Department recovered successfly');
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
        if(request('role')){

            $userRole = userRole::where('id',$id)
               ->update([
                'status'=>"Inactive",
                 'user_id'=>auth()->id()
              ]);

  // $userRoleID=$userRole->id;
  $userRole_id = userRole::where('id',$id)->first();
  //dd($userRole_id->role_id);
$userModel=request('user_id');
  //dd($userRole_id->sys_user_id);

$answerTableUpdate1=DB::statement('delete from model_has_roles where model_id="'.$userRole_id->sys_user_id .'" and role_id="'.$userRole_id->role_id.'"');

      return redirect()->back()->with('success','role has been revoked successefuly');
        }

        if(request('department')){
    //    dd('dddd');
            $user = User::where('id',$id)
               ->update([
                'department_id'=>0,
                 'user_id'=>auth()->id()
               ]);
      return redirect()->back()->with('success','role has been revoked successefuly');
        }

         if(request('permission')){
           // dd(request('siteid'));
            $userSite = userProperty::where('sys_user_id',$id)
            ->where('property_id',request('siteid'))
            ->first();

        if($userSite){
                 $userSite->update([
            'status'=>'Inactive',
             'user_id'=>auth()->id()
           ]);

                return redirect()->back()->with('success','role has been revoked successefuly');
            }
            else{
                return redirect()->back()->with('error','role can not be revoked');
            }
        }

        if(request('users')){
       $delete_user = User::findorfail($id);
       if($delete_user->delete()){
           return redirect()->back()->with('success','User Deleted Successfuly');
       }
    }
 }
}
