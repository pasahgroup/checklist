<?php $__env->startSection('content'); ?>

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white mb-0 px-0 py-2">
				<li class="breadcrumb-item " aria-current="page"><a href="/dash-property/{id}" role="button" class="btn-sm btn-primary"><<</a></li>
                    <li class="breadcrumb-item " aria-current="page"><?php echo e($property->property_name); ?></li>
                    <li class="breadcrumb-item active" aria-current="page"><strong><?php echo e($reportTime); ?></strong></li>
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
                    <div class="card card-custom gutter-b bg-transparent shadow-none border-0" >
                        <div class="card-header align-items-center   border-bottom-dark px-0">
                            <div class="card-title mb-0">
                                <h5 class="card-label mb-0 font-weight-bold text-body"><?php echo e($property->property_name); ?>

                                </h5>
                            </div>
                            <div class="icons d-flex">

                                <a href="#" onclick="printDiv()" class="ml-2">
                                    <span class="icon h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">
                                        <svg width="15px" height="15px" viewBox="0 0 16 16" class="bi bi-printer-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z"/>
                                            <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                                            <path fill-rule="evenodd" d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                          </svg>
                                    </span>

                                </a>
                                <a href="#" class="ml-2" >
                                    <span class="icon h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">
                                        <svg width="15px" height="15px" viewBox="0 0 16 16" class="bi bi-file-earmark-text-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm7 2l.5-2.5 3 3L10 5a1 1 0 0 1-1-1zM4.5 8a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                                          </svg>
                                    </span>

                                </a>

                            </div>
                        </div>

                    </div>


                </div>
            </div>
            <div class="row">
              <div class="col-12 col-md-12">
                 <div class="card card-custom gutter-b bg-white border-0" >

                     <div class="card-body">

            <form method="GET" action="<?php echo e(route('weekly-reportx',[$property_id,$status])); ?>">
                             <div class="form-group row justify-content-center mb-0">

                                 <div class="col-md-2">
                                     <label class="text-dark">Date Range</label>
                                     <?php if(!empty($filter_date)): ?>
                                     <input type="text" name="date" id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                     <span>selected date is: <?php echo e($filter_date); ?></span>
                                     <?php else: ?>
                                     <input type="text" name="date" id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                     <?php endif; ?>

                                     

                                 </div>
                                 <div class="col-md-2">
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

                                 <div class="col-md-2">
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
                                     <div class="form-group" style="padding:22px;">
                                       <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.button','data' => ['class' => ' btn-success','name' => 'search','value' => 'search']]); ?>
<?php $component->withName('jet-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => ' btn-success','name' => 'search','value' => 'search']); ?>
                                           <?php echo e(__('Search')); ?>

                                        <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                       <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.button','data' => ['class' => ' btn-primary','name' => 'print','value' => 'print']]); ?>
<?php $component->withName('jet-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => ' btn-primary','name' => 'print','value' => 'print']); ?>
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
                        <div class="card-body" >
                            <div >
                                <div class=" table-responsive" id="printableTable">
                                    <table id="orderTable" class="display" style="width:100%">

                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Metaname</th>
                                            <th>Asset name</th>
                                            <th>Questions</th>
                                            <th>Answer</th>
                                            <th>Status</th>
                                            <th>Description</th>
                                            <th>Posted by</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="kt-table-tbody text-dark">
                                        <?php $__currentLoopData = $reportData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weeklyData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="kt-table-row kt-table-row-level-0">
                                            <td><?php echo e($weeklyData->id); ?></td>
                                            <td><?php echo e($weeklyData->metaname_name); ?></td>
                                            <td><?php echo e($weeklyData->asset_name); ?></td>
                                            <td><?php echo e($weeklyData->qns); ?></td>
                                            <td><?php echo e($weeklyData->answer); ?></td>
                                              <td <?php if($weeklyData->answer_classification ==='Bad'): ?> style="background-color:yellowGreen;"<?php endif; ?> 
  <?php if($weeklyData->answer_label ==='Maintenance-low'): ?> style="background-color:#efca1f;"<?php endif; ?> <?php if($weeklyData->answer_label ==='Maintenance-medium'): ?> style="background-color:#db6515;"<?php endif; ?> <?php if($weeklyData->answer_label ==='Maintenance-high'): ?> style="background-color:#db5a5a;"<?php endif; ?>

                                                <?php if($weeklyData->answer_classification ==='Good'): ?> style="background-color:green;"<?php endif; ?>><?php echo e($weeklyData->answer); ?><?php if($weeklyData->answer_label !='no_value'): ?> (<?php echo e($weeklyData->answer_label); ?>) <?php endif; ?></td>
                                            <!-- <td><div class="logo mr-auto"><img src="<?php echo e(URL::asset('/storage/img/'.$weeklyData->photo)); ?>" width="60" height="40"></div></td> -->
                                            <td><?php echo e($weeklyData->description); ?></td>
                                            <td><?php echo e($weeklyData->name); ?></td>
                                            <td><?php echo e(date("d-M-Y", strtotime($weeklyData->datex))); ?></td>
                                            <td>

                                                <form method="post" action="<?php echo e(route('report-view-print',[$weeklyData->id,$weeklyData->property_id])); ?>">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="_method" value="post">
                                                <input type="hidden" name="uri" value="<?php echo e($_SERVER['REQUEST_URI']); ?>">
                                                <!-- <button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete this customer?')">
                                                    <span class="fa fa-eye"><span></button> -->
                                                    <button class="btn btn-success btn-sm" type="submit">
                                                    <span class="fa fa-eye"><span></button>
                                             </form>
                                            </td>

                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>


                        </div>
                    </div>


                </div>
            </div>

        </div>

    </div>

</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\checkmaster\resources\views/reports/weekly-report.blade.php ENDPATH**/ ?>