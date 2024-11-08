<?php $__env->startSection('content'); ?>

                <div class="content d-flex flex-column flex-column-fluid" id="tc_content">
                    <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid">
                        <div class="container-fluid">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb bg-white mb-0 px-0 py-2">
                                    <li class="breadcrumb-item active" aria-current="page">General Settings</li>
                                    <li class="breadcrumb-item active" aria-current="page">Users</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--end::Subheader-->
                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container-fluid">

                             <div class="row">
                                        <div class="col-lg-12 col-xl-12">
                                            <div class="card card-custom bg-transparent shadow-none border-0" >
                                            <div class="card-header align-items-center  border-bottom-dark px-0">
                                                    <div class="card-title mb-0">
                                                        <h6 class="card-label mb-0 font-weight-bold text-body">Users
                                                        </h6>
                                                    </div>


<div class="d-flex">
    <button class="btn ml-2 p-0 kt_notes_panel_toggle"
    data-toggle="tooltip" title="" data-placement="right"data-original-title="Check out more demos">
                                    <span class="bg-secondary h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center  rounded-circle shadow-sm ">
                                    <i class="fa fa-print"></i>
                                                            </span>

                                                        </button>

                                                        <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'SuperAdmin')): ?>
                                                        <a href="<?php echo e(route('roles.index')); ?>" class="btn btn-primary ripple my-2 btn-icon-text">
                                                          Roles & Permission
                                                        </a>
                                                        <?php endif; ?>
                                                    </div>


                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <?php if($user !="[]"): ?>
                                    <div class="row">

                                        <div class="col-12">
                                            <div class="card card-custom gutter-b bg-white border-0" >
                                                <div class="card-body" >
                                                    <div >
                                                        <div class=" table-responsive" id="printableTable">
                                                            
                                                                <table id="orderTable" class="display" style="width:100%">

                                                                    <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                      <th>User</th>
                                                     <th>E-mail</th>
                                                     <th>Role</th>
                                             <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Admin|GeneralAdmin|SuperAdmin')): ?>
                                           <th>Permission</th>
                                        <th>Department</th>
                                      <?php endif; ?>
                                  <th>Created</th>
                               <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Admin')): ?> <th>Action</th> <?php endif; ?>
                                                             </tr>
                                                    </thead>
                                                    <tbody>

                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($value->email != "superadmin@hakunamatatabookings.co.tz"): ?>
                                <tr class="border-bottom <?php if(auth()->id()== $value->id): ?>text-primary <?php endif; ?>" >
                                    <td><?php echo e($value->id); ?></td>
                        <th scope="row"><?php echo e($value->name); ?></a></th>
                        <td><?php echo e($value->email); ?></a></td>

                                                    <td>

            <?php $__empty_1 = true; $__currentLoopData = $userRoles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php if($role->sys_user_id == $value->id): ?>
            <form action="<?php echo e(route('users.destroy', $role->arole_id)); ?>" method="POST" >
                       <?php echo method_field('PUT'); ?>
                <input type="hidden" name="_method" value="delete">
                 <input type="hidden" name="users" value="users">
                 <input type="hidden" name="revoke" value="revoke">
<?php echo e(csrf_field()); ?>

<button type="submit"  name="role" title="Remove this role" class="btn btn-outline-primary btn-sm" value="<?php echo e($role->role_name); ?>" onclick="return confirm(id='Are you sure you want to revoke this permission to this role?')" style="margin-bottom:3px;">
      <span class="text-white btn-sm bg-danger">-</span>
      <?php echo e($role->role_name); ?>

           </button>

                        </form>
                                                               <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <span class="alert alert-danger">No Role</span>
                                                        <?php endif; ?>
      
<button type="button" class="btn btn-success btn-sm ripple my-2 btn-icon-text text-right" data-target="#role<?php echo e($value->id); ?>" data-toggle="modal"> 
    <i class="fa fa-plus"></i></button>

                                                    
                                                    <div class="modal" id="role<?php echo e($value->id); ?>" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                             <h6 class="modal-title">Assign role to <?php echo e($value->name); ?> </h6>
                                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                                <span aria-hidden="true">×</span></button>
                                                            </div>
                                                <form method="POST" action="<?php echo e(route('roles.store')); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                     <div class="modal-body">

                                                                            


                                        <div class="container">
                                            <div class="row">
                                         <div class="col-md-12 col-lg-12">
                         <div class="form-group row">
                      <label for="name" class="col-form-label "><?php echo e(__('Roles')); ?></label>
                        <select name="role_name" id="" class="form-control" required>
                         <option value="" selected>--Assign role --</option>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>

                                         <input type="hidden" name="addrole" value="addrole">
                                         <input type="hidden" name="user_id" value="<?php echo e($value->id); ?>">
                                                         </div>
                                                                </div>
                                                                </div>

                                                     

                                                                </div>
                                            <div class="modal-footer">
                                <button class="btn ripple btn-primary" type="submit">Save changes</button>
                                                        </form>

                                                         </div>
                                                        </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                    

                                                            </td>
                                                            <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Admin|SuperAdmin|GeneralAdmin')): ?>  <td>
                                                                <!-- <?php echo e($value->department_id); ?> -->
                                                  <?php $__empty_1 = true; $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                             <?php if($permission->model_id == $value->id): ?>
                
                <form action="<?php echo e(route('users.destroy', $value->id)); ?>" method="POST" >
                                                         <?php echo method_field('PUT'); ?>
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="users" value="users">
                                     <input type="hidden" name="revoke" value="revoke">
                                     <input type="hidden" name="siteid" value="<?php echo e($permission->id); ?>">                                                                    <?php echo e(csrf_field()); ?>

    <button type="submit"  name="permission" class="btn btn-sm  btn-outline-primary" value="<?php echo e($permission->permission_name); ?>" onclick="return confirm(id='Are you sure you want to revoke this permission to this role?')" style="margin-bottom:3px;"><span class="text-white btn-sm bg-danger">-</span> <?php echo e($permission->permission_name); ?></button>

                                                                        </form>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <span class="alert alert-danger">No separate permission</span>
                                                                    <?php endif; ?>

                                 <button type="button" class="btn btn-success btn-sm ripple my-2 btn-icon-text text-right" data-target="#permission<?php echo e($value->id); ?>" data-toggle="modal"> <i class="fa fa-plus"></i></button>

                                <div class="modal" id="permission<?php echo e($value->id); ?>" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-md" role="document">
                                    <div class="modal-content modal-content-demo">
                                         <div class="modal-header">
                                        <h6 class="modal-title">Assign permission to <?php echo e($value->name); ?> </h6>
                                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                                 <span aria-hidden="true">×</span></button>
                                                                    </div>
                <form method="POST" action="<?php echo e(route('roles.store')); ?>">
                                                                        <?php echo csrf_field(); ?>
                                            <div class="modal-body">

                                               


                                            <div class="container">
                                                            <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            <div class="form-group row">
                                           <label for="name" class="col-form-label "><?php echo e(__('Permission Level')); ?></label>
                                            <select name="permission_to_assign" id="" class="form-control" required>
                                                <option value="" selected>--Accessing level permission --</option>
                                                        <?php $__currentLoopData = $permit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permitted): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($permitted->id); ?>"><?php echo e($permitted->property_name); ?></option>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                         </select>
                                         <input type="hidden" name="user_id" value="<?php echo e($value->id); ?>">
                                                                    </div>
                                                                </div>
                                                                </div>

                                                       

                                                                        </div>
                                                 <div class="modal-footer">
                                              <button class="btn ripple btn-primary" type="submit">Save changes</button>
                                                                        </form>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                    
                                                                    </td>
                                                                    <?php endif; ?>
  

   <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Admin|SuperAdmin|GeneralAdmin')): ?>
   <td>
                                                                <!-- <?php echo e($value->department_id); ?> -->
                                                                        <?php $__empty_1 = true; $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                        <?php if($department->id == $value->department_id): ?>
                                                                        <form action="<?php echo e(route('users.destroy', $value->id)); ?>" method="POST" >
                                                                            <?php echo method_field('PUT'); ?>
                         <input type="hidden" name="_method" value="delete">
                         <input type="hidden" name="users" value="users">
                        <input type="hidden" name="revoke" value="revoke">
                    <input type="hidden" name="department_id" value="<?php echo e($department->id); ?>">

                                                                                    <?php echo e(csrf_field()); ?> <button type="submit" name="department" class="btn btn-sm  btn-outline-primary" value="<?php echo e($department->unit_name); ?>" onclick="return confirm(id='Are you sure you want to revoke this Department to this $value->name?')" style="margin-bottom:3px;"><span class="text-white btn-sm bg-danger">-</span> <?php echo e($department->unit_name); ?></button>

                                                                        </form>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                    <span class="alert alert-danger">No separate Department</span>
                                                                    <?php endif; ?>

                                                                    <button type="button" class="btn btn-success btn-sm ripple my-2 btn-icon-text text-right" data-target="#department<?php echo e($value->id); ?>" data-toggle="modal"> <i class="fa fa-plus"></i></button>


                                                    
                                                    <div class="modal" id="department<?php echo e($value->id); ?>" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog modal-md" role="document">
                                                            <div class="modal-content modal-content-demo">
                                                                <div class="modal-header">
                                                                    <h6 class="modal-title">Assign Department to: <?php echo e($value->name); ?> </h6>
                                                                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    </div>
                                                                    <form method="POST" action="<?php echo e(route('roles.store')); ?>">
                                                                        <?php echo csrf_field(); ?>
                                                                    <div class="modal-body">

                                                                            

                                                            <div class="container">
                                                            <div class="row">
                                                                    <div class="col-md-12 col-lg-12">
                                                                        <div class="form-group row">
                                                                            <label for="name" class="col-form-label "><?php echo e(__('Department')); ?></label>
                                                        <select name="department_id" id="department_id" class="form-control" required>
                                                        <option value="" selected>--select department --</option>
                                                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($department->id); ?>"><?php echo e($department->unit_name); ?></option>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                            </select>
                                                                            <!-- -->
                                                                            <input type="hidden" name="user_id" value="<?php echo e($value->id); ?>">
                                                                    </div>
                                                                </div>
                                                                </div>

                                                                            

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button class="btn ripple btn-primary" type="submit">Save changes</button>
                                                                        </form>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                    
                                                                    </td>
                                                                    <?php endif; ?>

                                                                    <td><?php echo e(date('d/m/y',strtotime($value->created_at))); ?></td>
                                                               <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Admin')): ?>     <td>
                                                                        <div class="button-list">

                                                                            <form action="<?php echo e(route('users.destroy', $value->id)); ?>" method="POST" >
                                                                            <?php echo method_field('PUT'); ?>
                                                                            <?php if(auth()->id()== $value->id): ?>  <?php else: ?>
                                                                            <input type="hidden" name="_method" value="delete">
                                                                            <input type="hidden" name="users" value="users">
                                                                                    <?php echo e(csrf_field()); ?>

                                                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(id='Are you sure you want to delete this user?')"><i class="fa fa-trash"></i></button>
                                                                            <?php endif; ?>
                                                                        </form>
                                                                        </div>
                                                                    </td>
                                                                    <?php endif; ?>
                                                                </tr>

                                                                
                                                                <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>

                                                        </div>
                                                    </div>


                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        

    <div  class="offcanvas offcanvas-right kt-color-panel p-1 kt_notes_panel">
        <div class="offcanvas-header d-flex align-items-center justify-content-between pb-3">
            <a href="#" class="btn btn-sm btn-icon btn-light btn-hover-primary kt_notes_panel_close" >
                <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                </svg>
            </a>
        </div>

 <div class="card-body"  style="background-color:#b2ca5d !important">
        <div class="card col-xl-12 col-md-12">
        <form id="myform" action="<?php echo e(route('print.show',1)); ?>" target="_blank" method="PUT" enctype="multipart/form-data">
         <?php echo csrf_field(); ?>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label class="text-dark" >User ID</label>
                        <input class="form-control block mt-1 w-full" type="text" name="userid" :value="old('id')" autofocus autocomplete="id" >
                        <small  class="form-text text-muted">Please Enter User ID to Print specific Data or leave Empty to Print all Data</small>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end mt-4">

               <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.button','data' => ['class' => 'btn-sm btn btn-dark float-left','onclick' => 'show_my_receipt()','type' => 'submit','value' => 'useridx','name' => 'useridx']]); ?>
<?php $component->withName('jet-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'btn-sm btn btn-dark float-left','onclick' => 'show_my_receipt()','type' => 'submit','value' => 'useridx','name' => 'useridx']); ?>
                       <?php echo e(__('Print')); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.button','data' => ['class' => 'btn-sm btn btn-dark float-right','type' => 'submit','name' => 'userid']]); ?>
<?php $component->withName('jet-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'btn-sm btn btn-dark float-right','type' => 'submit','name' => 'userid']); ?>
                        <?php echo e(__('Print All')); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                          </div>
                <!-- <button  class="btn-sm btn btn-dark float-right" type="submit">Print</button> -->
          </form>

      </div>
  </div>
    </div>

                </div>
                </div>

    <script>
          function show_my_receipt() {
       // open the page as popup //
       var page = 'http://www.pasah.net';
       var myWindow = window.open(page, "_blank", "scrollbars=yes,width=500,height=500,top=200");
       // focus on the popup //
       myWindow.focus();
       // if you want to close it after some time (like for example open the popup print the receipt and close it) //

      //  setTimeout(function() {
      //    myWindow.close();
      //  }, 1000);
     }
        </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\checkmaster\resources\views/admin/settings/users/users.blade.php ENDPATH**/ ?>