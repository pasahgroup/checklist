<?php $__env->startSection('content'); ?>

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white mb-0 px-0 py-2">
                    <li class="breadcrumb-item " aria-current="page">Report</li>
                    <li class="breadcrumb-item active" aria-current="page">Sales Report</li>
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
                                <h3 class="card-label mb-0 font-weight-bold text-body">Sales Report
                                </h3>
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


                            </div>
                        </div>

                    </div>


                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-custom gutter-b bg-white border-0" >

                        <div class="card-body">
                            <div class="table-responsive" id="">
                                <table id="" class="table table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Total Customers</th>
                                        <th>Total Cash</th>
                                        <th>Total Due</th>
                                        <th>Total sales</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo e(number_format($total_customers->total_customers)); ?></td>
                                        <td><?php echo e(number_format($totals->total_cash)); ?></td>
                                        <td><?php echo e(number_format($totals->total_credit)); ?></td>
                                        <td><?php echo e(number_format($totals->total_revenue)); ?></td>


                                    </tr>
                                </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="col-12">
                    <div class="card card-custom gutter-b bg-white border-0" >

                        <div class="card-body">
                            <form method="GET" action="<?php echo e(route('filter-sales')); ?>">
                                <div class="form-group row justify-content-center mb-0">

                                    <div class="col-md-3">
                                        <label class="text-dark" >Choose Your Date</label>
                                        <input type="text" name="date" id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                        
                                        <span style="font-size: 11px;" class="text-danger "> <?php echo e($dates); ?></span>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group mb-0" >
                                            <label class="text-dark" >Sales person</label>
                                                <select class="arabic-select w-100 mb-3 h-30px" name="sales_person" >
                                                    <?php if(isset($salesp)): ?>
                                                    <option value="<?php echo e($salesp->id); ?>" selected disabled><?php echo e($salesp->name); ?></option>
                                                    <?php else: ?>
                                                    <option value="All" selected >All</option>
                                                    <?php endif; ?>

                                                    <?php $__currentLoopData = $salespeople; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salesperson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($salesperson->id); ?>"><?php echo e($salesperson->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </select>
                                          </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group mb-0" >
                                            <label class="text-dark" >Customer</label>
                                                <select class="arabic-select w-100 mb-3 h-30px" name="customer" >
                                                    <?php if(isset($cust)): ?>
                                                    <option value="<?php echo e($cust->id); ?>" selected disabled><?php echo e($cust->customer_name); ?></option>
                                                    <?php else: ?>
                                                    <option value="All" selected >All</option>
                                                    <?php endif; ?>


                                                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->customer_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                          </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="form-group mb-0" >
                                            <label class="text-dark" ></label>
                                            <button class="btn btn-primary ">Filter </button>
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
                            <div >
                                <div class="table-responsive" id="printableTable">
                                    <table id="orderTable" class="display" style="width:100%">

                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Admin')): ?>
                                                <th>Sales Person</th>
                                                <?php endif; ?>
                                                <th>Customer Name</th>
                                                <th>Payment Type</th>
                                                <th>Total Tsh.</th>
                                                <th>Outstanding Tsh.</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody class="kt-table-tbody text-dark">
                                            <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="kt-table-row kt-table-row-level-0">
                                                <td><a href="<?php echo e(route('show-order',$sale->order_id)); ?>"> # <?php echo e($sale->id); ?></a></td>
                                                <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Admin')): ?>
                                                <td><?php echo e($sale->name); ?></td>
                                                <?php endif; ?>
                                                <td> <?php echo e($sale->customer_name); ?></td>
                                                <td>
                                                    <?php switch($sale->status):
                                                        case ('Credit'): ?>
                                                        <span class="btn-sm bg-warning text-black ">Credit</span>
                                                            <?php break; ?>

                                                            <?php case ('Cash'): ?>
                                                            <span class="btn-sm bg-success text-white">Cash</span>
                                                            <?php break; ?>
                                                            <?php case ('Installment'): ?>
                                                            <span class="btn-sm bg-warning ">Installment</span>
                                                            <?php break; ?>
                                                            <?php case ('Bank'): ?>
                                                            <span class="btn-sm bg-dark text-white">Bank</span>
                                                            <?php break; ?>
                                                        <?php default: ?>

                                                    <?php endswitch; ?>

                                                </td>
                                                <td><?php echo e(number_format($sale->paid)); ?></td>
                                                <td><?php echo e(number_format($sale->balance)); ?></td>
                                                <td><?php echo e(date("d/m/Y", strtotime($sale->created_at))); ?></td>

                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                        <tfoot>

                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        <th></th>
                                    <th><?php echo e(number_format($totals->total_cash)); ?></th>
                                    <th><?php echo e(number_format($totals->total_credit)); ?></th>

                                    <th></th>
                                        </tfoot>

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

<iframe name="print_frame" width="0" height="0"  src="about:blank"></iframe>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\checkmaster\resources\views/admin/reports/sales-filter.blade.php ENDPATH**/ ?>