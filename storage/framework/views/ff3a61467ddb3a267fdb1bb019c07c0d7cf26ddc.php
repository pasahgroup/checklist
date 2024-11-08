<?php $__env->startSection('content'); ?>

     <script src=
 "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>

    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js">
    </script>
  <script src=
 "https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js">
    </script>
 

<style>
table, th, td {
  border: 0px solid green;
  border-collapse: collapse;
}
</style>

    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="tc_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid">
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-white mb-0 px-0 py-2">
					<?php if(request()->path()=="report-property/".$id."/dashboard"): ?>
                        <li class="breadcrumb-item active" aria-current="page"><a href="/admin" role="button" class="btn-sm btn-primary"><<</a></li>
                      <?php endif; ?>
					  <?php if(request()->path()=="report-property/".$id): ?>
                        <li class="breadcrumb-item active" aria-current="page"><a href="/dash-property/{id}" role="button" class="btn-sm btn-primary"><<</a></li>
                      <?php endif; ?>

					   <li class="breadcrumb-item active" aria-current="page">General Dashboard for</li>
						<li class="breadcrumb-item active" aria-current="page"><strong>
              <select class="arabic-select w-100 mb-3 h-30px" name="property_search" >
                  <option value="<?php echo e($property->id ?? 0); ?>"><?php echo e($property->property_name?? 0); ?></option>
                 <?php if(!empty($_GET['property_search'])): ?>
                  <option value="<?php echo $_GET['property_search'] ?>" selected><?php echo $_GET['property_search'] ?></option>
                  <?php endif; ?>

                  <?php $__currentLoopData = $propertiesNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pname): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($pname->id); ?>"><?php echo e($pname->property_name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </strong></li>
                    </ol>
                </nav>
            </div>
        </div>
        <hr>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-fluid">
                <div class="row">
 <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Admin|GeneralAdmin|SuperAdmin|MaintenanceReport|Manager')): ?>
                     <div class="col-12 col-md-12">
                    <div class="card card-custom gutter-b bg-white border-0" >
                        <div class="card-body">
                            <form method="GET" action="<?php echo e(route('report-general',$id)); ?>" <?php if($prnt=="2"): ?> target="_blank" <?php endif; ?>>
                                <div class="form-group row justify-content-center mb-0">
                                    <div class="col-md-3">
                                        <label class="text-dark">Date Range</label>
                                        <?php if(!empty($filter_date)): ?>
                                        <input type="text" name="date" id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                        <span>selected date is: <?php echo e($filter_date); ?></span>
                                        <?php else: ?>
                                        <input type="text" name="date" id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                        <?php endif; ?>

                                        

                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group mb-0" >
                                            <label class="text-dark" >Select property name</label>
                                                <select class="arabic-select w-100 mb-3 h-30px" name="property_search" >
                                                    <!-- <option value="All">All</option> -->
                                                   <?php if(!empty($_GET['property_search'])): ?>
                                                    <option value="<?php echo $_GET['property_search'] ?>" selected><?php echo $_GET['property_search'] ?></option>
                                                    <?php endif; ?>
                                                    <?php $__currentLoopData = $propertiesNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pname): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($pname->id); ?>"><?php echo e($pname->property_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </select>
                                          </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group mb-0" >
                                            <label class="text-dark" >Select Metaname</label>
                                                <select class="arabic-select w-100 mb-3 h-30px" name="metaname_search" >
                                                    <option value="All">All</option>
                                                   <?php if(!empty($_GET['metaname_search'])): ?>
                                                    <option value="<?php echo $_GET['metaname_search'] ?>" selected><?php echo $_GET['metaname_search'] ?></option>
                                                    <?php endif; ?>
                                                    <?php $__currentLoopData = $metanames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($meta->metaname_name); ?>"><?php echo e($meta->metaname_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                          </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group mb-0" >
                                            <label class="text-dark" >Select Key Indicator</label>
                                                <select class="arabic-select w-100 mb-3 h-30px" name="indicator_search" >
                                                    <option value="All" selected>All</option>
                                                    <?php if(!empty($_GET['indicator_search'])): ?>
                                                    <option value="<?php echo $_GET['indicator_search'] ?>" selected><?php echo $_GET['indicator_search'] ?></option>
                                                    <?php endif; ?>
                                                    <?php $__currentLoopData = $keyIndicators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyInd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($keyInd->key_name); ?>"><?php echo e($keyInd->key_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                    
                                                    <option value="All-not-Good">All but not Good</option>
                                                </select>
                                          </div>
                                    </div>

                                    <div class="col-md-3">
                                      <!-- <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.button','data' => ['class' => 'ml-4']]); ?>
<?php $component->withName('jet-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'ml-4']); ?>
                                          <?php echo e(__('Log in')); ?>

                                       <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?> -->
                                        <div class="form-group mb-0" >
                                          <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.button','data' => ['class' => 'ml-4 btn-success','name' => 'search','value' => 'search']]); ?>
<?php $component->withName('jet-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'ml-4 btn-success','name' => 'search','value' => 'search']); ?>
                                              <?php echo e(__('Search')); ?>

                                           <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                          <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.button','data' => ['class' => 'ml-4 btn-primary','name' => 'print','value' => 'print','target' => '_blank']]); ?>
<?php $component->withName('jet-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'ml-4 btn-primary','name' => 'print','value' => 'print','target' => '_blank']); ?>
                                              <?php echo e(__('Print')); ?>

                                           <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                          </div>
                                    </div>
                                </div>
                              </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-xl-12">
                    <div class="card card-custom gutter-b bg-white border-0" >
                        <div class="card-body">
                            <div id="divID">
                          <div class="table-responsive" id="printableTable">
                                    <table id="orderTable" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                            <th>Id</th>
                                            <th>Metaname</th>
                                            <th>Asset name</th>
                                            <th>Questions</th>
                                            <td>Answer</td>
                                            <td>Answer status</td>
                                              <td>Description</td>
                                            <th>Posted by</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="kt-table-tbody text-dark">
                                        <?php $__currentLoopData = $reportDailyReader; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dailyDataR): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="kt-table-row kt-table-row-level-0">
                                            <td><?php echo e($dailyDataR->id); ?></td>
                                            <td><?php echo e($dailyDataR->metaname_name); ?></td>
                                            <td><?php echo e($dailyDataR->asset_name); ?></td>
                                            <td><?php echo e($dailyDataR->qns); ?></td>
                                            <td><?php echo e($dailyDataR->answer); ?></td>
                                            <td <?php if($dailyDataR->answer_label ==='Bad'): ?> style="background-color:yellowGreen;"<?php endif; ?>

                                             <?php if($dailyDataR->answer_label ==='Maintenance-low'): ?> style="background-color:#e2dc23;"<?php endif; ?> 
                                              <?php if($dailyDataR->answer_label ==='Maintenance-medium'): ?> style="background-color:#e26e23;"<?php endif; ?> 

                                               <?php if($dailyDataR->answer_label ==='Maintenance-high'): ?> style="background-color:#e22623;"<?php endif; ?> 

                                                <?php if($dailyDataR->answer_label ==='Good'): ?> style="background-color:green;"<?php endif; ?>>

                                                <?php echo e($dailyDataR->answer_label); ?>


                                            </td>
                                       
                                              <td><?php echo e($dailyDataR->description); ?></td>
                                            <td><?php echo e($dailyDataR->PostedBy); ?></td>
                                            <td><?php echo e(date("d-M-Y", strtotime($dailyDataR->Date))); ?></td>
                                            <td>
                                              <form method="post" action="<?php echo e(route('report-view-post',[$dailyDataR->id,$id])); ?>">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="_method" value="post">
                                                <input type="hidden" name="uri" value="<?php echo e($_SERVER['REQUEST_URI']); ?>">
                                                <button class="btn btn-success btn-sm" type="submit">
                                                <span class="fa fa-eye"><span></button>

<!-- <button href="" role="button" type="Submit"><span class="btn-sm btn-primary"><i class="fa fa-eye"></i><span></button> -->
                                                <!-- <a href="/report-view/<?php echo e($dailyDataR->id); ?>/<?php echo e($id); ?>"  <span class="fa fa-eye"><span></a> -->
                                            </form>
                                            </td>

                                        </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    <tfoot>

                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    </tfoot>
                                </table>
                            </div>

                        </div>


                    </div>
                </div>
            </div>

                        </div>
                        <?php endif; ?>
                        <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', '')): ?>
                        <div class="alert alert-info">You do not have permission, kindly contact system admin</div>
                        <?php endif; ?>
               </div>
                </div>
            </div>

 

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\checkmaster\resources\views/admin/settings/properties/dash/report-general.blade.php ENDPATH**/ ?>