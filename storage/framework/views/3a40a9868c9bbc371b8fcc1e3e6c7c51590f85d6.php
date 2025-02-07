<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lodge Registration Form</title>

    <!-- Bootstrap 5 CSS -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css'>
    <!-- Font Awesome 5 -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css'>

	<!-- Demo CSS -->
	<link rel="stylesheet" href="css/demo.css">
  	<link href="../../../multi2/css/demo.css" rel="stylesheet" type="text/css" />

  </head>
  <body>
 <header class="intro">
 </header>

 <main>
  <article>

    <!-- partial:index.partial.html -->
<div class="container d-flex justify-content-center pt-2">
</div>

<div class="col-12 p-3 collapse" id="collapseExample">
  <div class="card">
    <div class="card-header font-weight-bold">Available features</div>
    <div class="card-body">
      <ul>
        <li>Multi step form using Bootstrap 5, Jquery and CSS</li>
        <li>Automatically percentage calculation of the progress bar</li>
        <li><b>Step 1:</b> Add new user / Search existing user</li>
        <ul>
          <li>Option "Add new user"</li>
          <ul>
            <li>Abilty to click on Next button</li>
          </ul>
          <li>Option Search existing user</li>
          <ul>
            <li>Display input field, which is searchable</li>
            <li>Next button is disabled until a available option is selected from the searchlist.</li>
            <li>Next button will be deactivated when the selected value is being altered.</li>
            <li>When a user is selected the step 2 form will be filled with all available data.</li>
          </ul>
        </ul>
        <li><b>Step 2:</b> User information</li>
        <ul>
          <li>Input field "first name" and "last name" are required to advance to step 3.</li>
          <li>When first and/or last name is empty an invalid warning will be displayed.</li>
        </ul>
      </ul>
    </div>
  </div>
</div>

<div class="container d-flex justify-content-center" style="min-width:720px!important">
  <div class="col-11 col-offset-2">
    <!-- <div class="progress mt-3" style="height: 30px;">
      <div class="progress-bar progress-bar-striped progress-bar-animated" style="font-weight:bold; font-size:15px;" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
    </div> -->

  <?php if (isset($component)) { $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\GuestLayout::class, []); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <form   id="basicform"  name="basicform" method="POST"  action="<?php echo e(route('company-profile-create.store')); ?>" enctype="multipart/form-data">
                              <?php echo csrf_field(); ?>
     <input type="hidden" name="_method" value="post">
     <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
    <input type="hidden"  id="profile_web" name="profile_web" class="form-control" value="profile_web">

      <div class="card-header font-weight-bold">Register a New Lodge</div>
      <div class="card-body p-4 step">

        <div class="searchfield text-center pb-1" style="font-size:12px"></div>

                          <div class="col-md-12">
                                          <label >Business Name</label>
          <input type="text" name="business_name" class="form-control border-dark"  placeholder="bisiness name" required>
        </div>


          <div class="col-md-12">
                    <label >TIN</label>
                  <input class="form-control" type="text" name="tin" placeholder="tin">
                                        </div>
                                                <div class="col-md-12">
                          <label >VRN</label>
                      <input class="form-control" type="text" name="vrn" placeholder="vrn">
                                        </div>
              <div class="col-md-12">
                          <label >Phone Number</label>
                        <input class="form-control" type="number" name="phone_number" placeholder="company mobile number" required>
                                        </div>

        			  <div class="clearfix" style="height: 1px;clear: both;"></div>

                 <div class="col-md-12">
                          <label>Region</label>
                        <input class="form-control" type="text" name="region" placeholder="region">
                                        </div>
                     <div class="col-md-12">
                          <label >District</label>
                      <input class="form-control" type="text" name="district" placeholder="district">
                                        </div>

    </div>


      <div id="userinfo" class="card-body p-4 step" style="display: none">
        <div class="text-center">
          <h5 class="card-title font-weight-bold pb-2">User information</h5>
        </div>


        <div class="form-group row pt-2">
          <label for="team" class="col-4 text-end control-label col-form-label">Address:</label>
          <div class="col-8">
            <input type="text" class="form-control" id="address" placeholder="company address" required>
              <div class="invalid-feedback">This field is required</div>
          </div>
        </div>


        <div class="form-group row pt-2">
          <label for="team" class="col-4 text-end control-label col-form-label">Category:</label>
          <div class="col-8">
              <fieldset class="form-group mb-3 border-dark rounded p-1">
                <select  name="property_category" id="property_category" class="">
                          <option value="">--- Select property category ---</option>
                         <option>Camp site</option>
                         <option>Lodge</option>
                         <option>Hotel</option>
                     </select>
              <div class="invalid-feedback">This field is required</div>
                </fieldset>
          </div>
        </div>



                        <div class="form-group row pt-2">
                          <label for="team" class="col-4 text-end control-label col-form-label">Upload logo:</label>
                          <div class="col-8">
                              <fieldset class="form-group mb-3 border-dark rounded p-1">
                          <input type="file" class="d-block w-100" id="attachment" name="attachment[]" accept="image/*">
                              <div class="invalid-feedback">This field is required</div>
                                </fieldset>
                          </div>
                        </div>


                        <label class="col-lg-12 control-label" for="upass1">Who Registered: </label>
                        <div class="clearfix" style="height: 1px;clear: both;"></div>


        <div class="form-group row pt-2">
          <label for="team" class="col-4 text-end control-label col-form-label">First Name</label>
          <div class="col-8">
            <input type="text" class="form-control" id="first_name" required>
              <div class="invalid-feedback">This field is required</div>
          </div>
        </div>

        <div class="form-group row pt-2">
          <label for="team" class="col-4 text-end control-label col-form-label">Last Name</label>
          <div class="col-8">
            <input type="text" class="form-control" id="last_name" required>
              <div class="invalid-feedback">This field is required</div>
          </div>
        </div>
      </div>

      <div class="card-body p-5 step" style="display: none">

           <div class="form-group row pt-2">
             <label for="team" class="col-4 text-end control-label col-form-label">User Code:</label>
             <div class="col-8">
                 <input type="text" value="<?php echo e($pin); ?>" id="code" name="code" class="form-control" autocomplete="off" required readonly>
                 <div class="invalid-feedback">This field is required</div>
             </div>
           </div>


           <div class="form-group row pt-2">
             <label for="team" class="col-4 text-end control-label col-form-label">User Email:</label>
             <div class="col-8">
              <input class="form-control" type="email" id="email" name="email" placeholder="company email">
                 <div class="invalid-feedback">This field is required</div>
             </div>
           </div>


           <div class="form-group row pt-2">
             <label for="team" class="col-4 text-end control-label col-form-label">Password</label>
             <div class="col-8">
               <input type="password" placeholder="Your Password" id="password" name="password" class="form-control" autocomplete="off">
                 <div class="invalid-feedback">This field is required</div>
             </div>
           </div>

           <div class="form-group row pt-2">
             <label for="team" class="col-4 text-end control-label col-form-label">Confirm Password:</label>
             <div class="col-8">
             <input type="password" placeholder="Your Password" id="password" name="password" class="form-control" autocomplete="off">
                 <div class="invalid-feedback">This field is required</div>
             </div>
           </div>
      </div>

      <div class="card-footer">
        <button class="action back btn btn-sm btn-outline-warning" style="display: none">Back</button>
        <button class="action next btn btn-sm btn-outline-secondary float-end"="">Next</button>
        <button class="action submit btn btn-sm btn-outline-success float-end" type="submit" name="submit" style="display: none">Submit</button>
      </div>
  </form>
       <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015)): ?>
<?php $component = $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015; ?>
<?php unset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015); ?>
<?php endif; ?>

  </div>
</div>
<!-- partial -->

  </article>
 </main>

  <footer class="credit">Author: Crezzur - Distributed By: <a title="Awesome web design code & scripts" href="https://www.codehim.com?source=demo-page" target="_blank">CodeHim</a></footer>
<!-- jQuery JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<!-- Bootstrap 5 JS -->
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js'></script>
<!-- Multi-step Form JS -->
<script src="js/bootstrap-multi-step-form.js"></script>
 <script src="../../multi2/js/bootstrap-multi-step-form.js" type="text/javascript"></script>
  </body>
</html>
<?php /**PATH C:\xampp\htdocs\checkmaster\resources\views/admin/profile/profile_web.blade.php ENDPATH**/ ?>