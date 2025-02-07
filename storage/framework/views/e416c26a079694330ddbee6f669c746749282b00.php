<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 5 Multi-step Form Example</title>

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
    <div class="progress mt-3" style="height: 30px;">
      <div class="progress-bar progress-bar-striped progress-bar-animated" style="font-weight:bold; font-size:15px;" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <div class="card mt-3">
      <div class="card-header font-weight-bold">My Bootstrap 5 multi-step-form</div>
      <div class="card-body p-4 step">
        <div class="radio-group row justify-content-between px-3 text-center" style="justify-content:center !important">
          <div class="col-auto me-sm-2 mx-1 card-block py-0 text-center radio">
            <div class="opt-icon"><i class="fas fa-user-plus" style="font-size: 80px; margin-left: 25px;"></i></div>
            <p><b>Register</b></p>
          </div>
          <div id="suser" class="selected col-auto ms-sm-2 mx-1 card-block py-0 text-center radio">
            <div class="opt-icon"><i class="fas fa-users" style="font-size: 80px;"></i></div>
            <p><b>Existing user</b></p>
          </div>
        </div>
        <div class="searchfield text-center pb-1" style="font-size:12px">Enter<b> Credentials</b></div>
        <div class="searchfield input-group px-5">
          <span class="input-group-text" id="basic-addon1"><i class="fas fa-search text-white" aria-hidden="true"></i></span>
          <input id="txt-search" class="form-control" type="text" placeholder="Searchf" aria-label="Search">
        </div>
        <div id="filter-records" class="mx-5"></div>
      </div>
      <div id="userinfo" class="card-body p-4 step" style="display: none">
        <div class="text-center">
          <h5 class="card-title font-weight-bold pb-2">User information</h5>
        </div>

        <div class="form-group row">
          <div class="col-2"></div>
          <div class="col-4">
            <label for="fname">First Name<b style="color: #dc3545;">*</b></label>
            <input type="text" name="name" class="form-control" id="fname" required>
            <div class="invalid-feedback">This field is required</div>
          </div>
          <div class="col-4">
            <label for="lname">Last Name<b style="color: #dc3545;">*</b></label>
            <input type="text" class="form-control" id="lname" required>
            <div class="invalid-feedback">This field is required</div>
          </div>
        </div>
        <div class="form-group row pt-2">
          <label for="team" class="col-2 text-end control-label col-form-label">Team</label>
          <div class="col-8">
            <input type="text" class="form-control" id="team">
          </div>
        </div>
        <div class="form-group row pt-2">
          <label for="address" class="col-2 text-end control-label col-form-label">Address</label>
          <div class="col-8">
            <input type="text" class="form-control" id="address">
          </div>
        </div>
        <div class="form-group row pt-2">
          <label for="tel" class="col-2 text-end control-label col-form-label">Tel/Gsm</label>
          <div class="col-8">
            <input type="text" class="form-control" id="tel">
          </div>
        </div>
        <div class="text-center text-muted"><b style="color: #dc3545;">*</b> required fields</div>
      </div>
      <div class="card-body p-5 step" style="display: none">Step 3</div>
      <div class="card-body p-5 step" style="display: none">Step 4</div>
      <div class="card-body p-5 step" style="display: none">Step 5</div>
      <div class="card-footer">
        <button class="action back btn btn-sm btn-outline-warning" style="display: none">Back</button>
        <button class="action next btn btn-sm btn-outline-secondary float-end" disabled="">Next</button>
        <button class="action submit btn btn-sm btn-outline-success float-end" style="display: none">Submit</button>
      </div>
    </div>

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
<?php /**PATH C:\xampp\htdocs\checkmaster\resources\views/layouts/app_web.blade.php ENDPATH**/ ?>