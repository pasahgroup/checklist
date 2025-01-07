<?php

namespace App\Http\Livewire;


 use App\Models\orderItem;
 use App\Models\Property;

use App\Models\metadata;
use App\Models\metanameDatatype;
use Spatie\Permission\Models\Role;
use App\Models\department;
use App\Models\metaname;

use App\Models\setIndicator;
use App\Models\qnsAppliedto;
use App\Models\activityRole;
use App\Models\user;
use App\Models\userRole;

use App\Models\departmentRole;
use Livewire\Component;
use Illuminate\Http\Request;

class AssignRolesUserLivewire extends Component
{

 public $departments = "";
      public $post;
      public $message = "";
      public $pos_id = [];
      public $metaname_id;
      public $site_id;
  public $names=[];
  public $properties;

       public $qnType;
        public $times;
        public $qnNo;
           public $qn_no;

public function store(Request $request)
    {
 $users = request('users');
 $roles = request('roles');


 if($users ==null)
     {
return redirect()->back()->with('error','Users not selected');
     }

   if($users !=null)
     {
      // {{$indicators}}
    foreach ($users as $user) {

    foreach ($roles as $role) {

    $appliedto =userRole::UpdateOrCreate([
        'sys_user_id'=>$user,
        'role_id'=>$role,
        'status'=>'Active',
        'user_id'=>auth()->id()
        ]);

        }
      }

     }
     else
     {
      return redirect()->back()->with('error','Roles not selected');
     }
//
//   }
   return redirect()->back()->with('success','Users Assigned successfly');
    }



    public function render(Request $request)
    {
     $pos_id=$this->metaname_id;
     $qnType=$this->qnType;
     $times=$this->qnNo;

    $qn_no=$this->qn_no;
  // $this->orderProducts = orderItem::where('id',$post)
    //    //  ->get();
          // $this->departments=department::get();
          // dd($this->departments);
    // return view('livewire.department')->layout('livewire.showFrame');
    //    // return view('livewire.department');
// dd(request('metaname_id'));
   // $this->departments = department::where('id',18)
        // ->get();
        //    $orderProducts = property2::where('id',18)
        // ->get();
    //dd($this->qn_no);
             $roles = role::get();
              $activities = metaname::get();
                $users = user::where('status','Active')
                ->where('name','!=',"")
                ->get();
                  $departs = department::get();
               // dd($departments);
            $metadatas = metanameDatatype::where('metaname_id',$this->metaname_id)->get();

      return view('livewire.user-roles',compact('roles','users','departs'))
      ->layout('layouts.app');


  }
}
