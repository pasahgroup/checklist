<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\userRole;
use App\Models\userProperty;

use App\Models\registerProgram;
use App\Models\warehouse;
use Spatie\Permission\Traits\HasRoles;
class roleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas = Role::get();
        $permission = Permission::get();
        $rolepermission = Role::
        join('role_has_permissions','roles.id','role_has_permissions.role_id')
        ->join('permissions','role_has_permissions.permission_id','permissions.id')
        ->select('roles.name as rolename', 'permissions.name as permission_name')
        ->get();
        $warehouses = warehouse::get();
        return view('admin.settings.users.roles', compact('datas','permission','rolepermission','warehouses'));
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
        //dd('hh');
      
        if(request('role')){
            if(Role::where('name',request('name'))->exists()){
                return redirect()->back()->with('error','This role already created');
            }
            else{
        $role = Role::create(['name' => request('name')]);
        return redirect()->back()->with('success','Role created successefuly');
            }
        }
        elseif(request('department_id')){           
                $user = User::where('id',request('user_id'))
                ->update([
                 'department_id'=>request('department_id'),
                  'user_id'=>auth()->id()
                ]);
            return redirect()->back()->with('success','The Department assigned successefuly');
            // }
        }

        elseif(request('permission')){
            if(Permission::where('name',request('name'))->exists()){
                return redirect()->back()->with('error','This permission already created');
            }
            else{
            $permission = Permission::create(['name' => request('name')]);
            return redirect()->back()->with('success','Permission created successefuly');
            }
        }
        elseif(request('addrole')){

 $user = User::where('id',request('user_id'))->first();
 $user->assignRole(request('role_name'));

   $role = userRole::where('sys_user_id',request('user_id'))
   ->where('role_id',request('role_name'))
    ->first();
        if($role){
           $role->update([
            'status'=>'Active',
            'user_id'=>auth()->id()
           ]);
           return redirect()->back()->with('success','Role Updated successfully');
        }
        else{

   $appliedto =userRole::Create([
        'sys_user_id'=>request('user_id'),
        'role_id'=>request('role_name'),        
        'status'=>'Active',
        'user_id'=>auth()->id()        
        ]);

            return redirect()->back()->with('success','Role Updated successfully');
         }

        }

        elseif(request('roletopermission')){

                // dd('printz');
            $role = Role::where('id',request('role_id'))->first();
            $permission = Permission::where('id',request('permission_id'))->first();
            $role->givePermissionTo($permission);
            return redirect()->back()->with('success','Permission given to the role successefuly');
        }
        elseif(request('permission_to_assign')){

            // dd(auth()->user()->id);
         //dd(request('permission_to_assign'));
           
        $user = User::findorfail(request('user_id'));
       $user->update([
            'property_id'=>request('permission_to_assign'),
            'user_id'=>auth()->id()
           ]);



  // $user = user::where('id',auth()->user()->id)
  //              ->update([
  //               'department_id'=>"",
  //                'user_id'=>auth()->id()

  //             ]);


 // $userSiteReg = userProperty::UpdateOrCreate([
 //        'sys_user_id'=>request('user_id'),
 //        'property_id'=>request('permission_to_assign'),
 //    ],
 //    [
 //        'status'=>'Active',
 //        'user_id'=>auth()->id()
 //        ]);
}

         return redirect()->back()->with('success','Permission given to the user successefuly');
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
        if(request('revoke')){
            $permission = request('permission');
              $role =Role::where('id',$id)->first();
              if($role->revokePermissionTo($permission)){
                return redirect()->back()->with('success','permission revoked successefuly');
            }
            else{
                return redirect()->back()->with('error','permission can not be revoked');
            }

          }
      if(request('permission')){
        $delete = Permission::where('id',$id);
        if($delete->delete()){
            return redirect()->back()->with('success','permission deleted successefuly');
        }
        else{
            return redirect()->back()->with('error','permission can not be deleted');
        }
      }

      if(request('role')){
        $delete = Role::where('id',$id);
        if($delete->delete()){
            return redirect()->back()->with('success','Role deleted successefuly');
        }
        else{
            return redirect()->back()->with('error','Role can not be deleted');
        }
      }

    }
}
