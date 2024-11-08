<?php $__env->startSection('content'); ?>


<hr>
				<div class="d-flex flex-column flex-column-fluid" id="tc_content">

						<!--begin::Container-->
						<div class="container">

									<div class="card card-custom gutter-b bg-white border-0" >
										<div class="card-header border-0 align-items-center">
											<h4 class="card-label mb-0 font-weight-bold text-body">Business Name Settings
											</h4>
										</div>
										<div class="card-body">

											<div class="row">

                                                <div class="col-md-12 col-sm-12">
                                                    <div class="tab-content" id="v-pills-tabContent1">
                                                        <div class="tab-pane fade show active" id="general" role="tabpanel" >
                                                              <form  method="post"  action="<?php echo e(route('company-profile.store')); ?>" enctype="multipart/form-data">
                             <?php echo csrf_field(); ?>
    <input type="hidden" name="_method" value="post">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">



															<div class="form-group row">
																<div class="col-md-6">
																	<label >Business Name</label>
																	<fieldset class="form-group mb-3">
	<input type="text" name="business_name" class="form-control border-dark"  placeholder="" value="<?php echo e($profile->company_name??''); ?>">
																	
</div>

											</fieldset>
																
									<div class="col-md-6">
									<label >Phone Number</label>
								<input class="form-control" type="number" name="phone_number" value="<?php echo e($profile->phone_number??''); ?>" required>
																</div>

								<div class="col-md-6">
									<label >Email</label>
								<input class="form-control" type="email" name="email" value="<?php echo e($profile->email??''); ?>">
																</div>
                                                    <div class="col-md-6">
								<label >Address</label>
							<input class="form-control" type="text" name="address" value="<?php echo e($profile->address??''); ?>">
																</div>
						<div class="col-md-6">
						<label >TIN</label>
					<input class="form-control" type="text" name="tin" value="<?php echo e($profile->tin??''); ?>">
																</div>
                                        <div class="col-md-6">
									<label >VRN</label>
							<input class="form-control" type="text" name="vrn" value="<?php echo e($profile->vrn??''); ?>">
																</div>

								<div class="col-md-6">
							<label >Upload Logo</label>
						<fieldset class="form-group mb-3 border-dark rounded p-1">
					<input type="file" class="d-block w-100" id="attachment" name="attachment[]" accept="image/*">
																	</fieldset>
																</div>

									  <div class="col-md-6">
									<label >Code</label>
							<input class="form-control" type="text" name="code" value="<?php echo e($profile->code?? $pin); ?>" readonly>
																</div>

						<div class="col-md-12">
																	<button type="submit" class="btn btn-primary float-right">Update</button>
																</div>

															</div>
														</form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
										</div>

						</div>
					</div>

</body>
<!--end::Body-->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\checkmaster\resources\views/admin/profile/profile.blade.php ENDPATH**/ ?>