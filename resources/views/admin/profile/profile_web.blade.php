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

  <x-guest-layout>
    <form   id="basicform1"  name="basicform1" method="POST"  action="{{ route('company-profile-create.store') }}" enctype="multipart/form-data">
                              @csrf
     <input type="hidden" name="_method" value="post">
     <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                 <input type="text" value="{{$pin}}" id="code" name="code" class="form-control" autocomplete="off" required readonly>
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
        <button class="action back btn btn-sm btn-outline-warning" style="display: none" onclick="myFunc(e)">Back</button>
        <button class="action next btn btn-sm btn-outline-secondary float-end"="" onclick="myFunc(e)">Next</button>
        <button class="action submit btn btn-sm btn-outline-success float-end" type="submit" name="submit" style="display: none">Submit</button>
      </div>
  </form>
      </x-guest-layout>
      <br>
          <a  href="/login" class="card-header font-weight-bold">Back to Main Screen </a>
  </div>
</div>
<!-- partial -->

  </article>
 </main>




 <div class="modal fade modal-book-now" id="bookNow" tabindex="-1" role="dialog" style="margin-top:50px;">
 <div class="modal-dialog modal-lg" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
       <div class="preview-wrap">
         <div class="form-wrap">
             <h4 id="heading">Booking Form:<span style="color:#fafbfb">{{$programs->tour_name}}</span></h4>
             <!-- <form  method="post" id="post_form" action="{{ route('tourForm.store') }}"> -->

             <form id="msform"  method="post"  action="{{ route('tourForm.store') }}" class="registration-form">
                 @csrf
            <!-- progressbar -->
                 <ul id="progressbar">
                   <li class="active" id="account"><strong>Step 1:</strong></li>
                     <li id="personal"><strong>Step 2:</strong></li>
                     <li id="payment"><strong>Step 3:</strong></li>
                     <li id="confirm"><strong>Finish</strong></li>
                 </ul>
                   <div class="alert alert-danger print-error-msg" style="display:none">
                     <ul></ul>
                 </div>
                 <div class="progress">
                     <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                 </div> <br> <!-- fieldsets -->
                 <fieldset>
                     <div class="form-card">
                         <div class="row">
                             <div class="col-12">
                                 <h4 class="fs-title">Personal Details:| Step 1 - 4</h4>
                             </div>
                         </div>


<div class="form-group">
         @if($discounts !=null)
        <input type="hidden" class="form-control" name="unit_price" value="{{$discounts->new_price}}">
          @else
           <input type="hidden" class="form-control" name="unit_price" value="{{$programs->price}}">
          @endif

          <input type="hidden" class="form-control" name="tour_name" value="{{ $programs->tour_name }}">
         <input type="hidden" class="form-control" name="currency" value="{{ $programs->currency }}">
     </div>


                     <!--  <input type="text" name="first_name" placeholder="first name" />
                        <input type="text" name="last_name" placeholder="last name" />


-->
<div class="col-md-6">
                <label >Business Name</label>
<input type="text" name="business_name" class="form-control border-dark"  placeholder="bisiness name">
</div>


<div class="col-md-6">
<label >TIN</label>
<input class="form-control" type="text" name="tin" placeholder="tin">
              </div>





                           <!-- <label class="fieldlabels">Phone: *</label> -->
                            <input type="text" name="phone" placeholder="Phone(+00 00 000 000)"/>
                         <input type="email" name="email" placeholder="email"/>

                          <input type="text" name="country" placeholder="Nationality" />

                     </div>
                          <button type="button" class="close float-left" data-dismiss="modal" style="background-color:#b32121;padding: 8px 30px;">Close</button>
                     <input type="button" name="next" class="next action-button" value="Next" />
                 </fieldset>
                 <fieldset>

                         <div class="form-card">
                         <div class="row">
                             <div class="col-12">
                                 <h4 class="fs-title">Tour Information:|Step 2 - 4</h4>
                             </div>
                          </div>


          <div class="row">
                             <div class="col-lg-6 col-md-6 col-sm-6">
                                <label for="">Travel Date:</label>
                                 <div class="form-group">
                                     <input type="date" name="travel_date" id="travel_date" class="form-control" placeholder="From" value="">

                                 </div>
                             </div>

                             <div class="col-lg-6 col-md-6 col-sm-6">
                                <label for="">Adults (>16 yrs):</label>
                                 <div class="form-group">
                                     <input type="number" class="zt-control" name="adults" min="0" value="1">
                                 </div>
                             </div>
</div>

                             <div class="row">
                             <div class="col-lg-6 col-md-6 col-sm-6">
                                <label for="">Teens (12-14 yrs):</label>
                                 <div class="form-group">
                                     <input type="number" class="zt-control" name="teens" min="0" value="0">
                                 </div>
                              </div>
                             <div class="col-lg-6 col-md-6 col-sm-6">
                                <label for="">Children (5-12 yrs):</label>
                                 <div class="form-group">
                                     <input type="number" class="zt-control" name="children" min="0" value="0">
                                 </div>
                              </div>



                              <div class="col-md-6">
                                                 <label for="">Tour Addon:</label>
                                                                        <select class="selectpicker search-fields form-control" name="addon">
                              <option value="0" selected>None</option>
                              @foreach ($addons as $addon)
                            <option value="{{ $addon->price }}">{{ $addon->addon_name }} - {{ $addon->days }} days / ${{ $addon->price }}</option>
                              @endforeach
                          </select>
                                                </div>

                               <div class="col-md-6">
                                                   <label for="">Accommodation:</label>
                                                       <select class="form-control" name="accomodation">
                                                            <option value="0">--Select Accomodation--</option>
                                                            <option>Basic</option>
                                                             <option>Comfort</option>
                                                              <option>Deluxe</option>
                                                               <option>Mix</option>
                                                                <option>Not Sure</option>

                                                        </select>

                                                </div>
</div>


<input type="hidden" class="form-control" placeholder=""  name="tour_id" value="{{$programs->program_id}}" readonly="true">
<input type="hidden" class="form-control" placeholder=""  name="tour_type" value="{{$programs->category}}" readonly="true">



                     </div>

                          <button type="button" class="close float-left" data-dismiss="modal" style="background-color:#b32121;padding: 8px 30px;">Close</button>

                     <input type="button" name="previous" class="previous action-button-previous float-left" value="Previous" />
                     <input type="button" name="next" class="next action-button float-right" value="Next" />
                 </fieldset>
                 <fieldset>
                     <div class="form-card">
                         <div class="row">
                             <div class="col-12">
                                 <h4 class="fs-title">Other Information:|Step 3 - 4</h4>
</div>


 <div class="col-md-12">
             <div class="form-group">
                 <label for="">  Additional Information we should know?</label>

      <textarea class="form-control" id="" cols="2" rows="1" name="additional_information" placeholder="Type your additional information here..."></textarea>
     </div>
  </div>


  <div class="col-md-12">
     <div class="form-group">
         <label for=""> How did you hear about us?:</label>

    <div class="form-group">
        <label for="facebook">Facebook
       <input id="facebook" type="checkbox" class="zt-control"  name="hear[]" value="Facebook">
     </label>
     <label for="instagram">Instagram
       <input id="instagram" type="checkbox" class="zt-control"  name="hear[]" value="Instagram">
     </label>
       <label for="google">Google
       <input id="google" type="checkbox" class="zt-control"  name="hear[]" value="Google">
     </label>
       <label for="mouth">Word of Mouth
       <input  id="mouth" type="checkbox" class="zt-control"  name="hear[]" value="Word of Mouth">
     </label>
     </div>
     </div>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 <div class="form-group">
     <label for=""> Other Media:</label>
        <input type="text" class="form-control" name="hear_about_us">
     </div>
     </div>
                             </div>
                       </div>


                     <button type="button" class="close float-left" data-dismiss="modal" style="background-color:#b32121;padding: 8px 30px;">Close</button>
                      <input type="button" name="previous" class="previous action-button-previous float-left" value="Previous" />
                        <button type="submit" class="btn btn-success float-right btn-submit" style="padding: 8px 30px;">Submit</button>
                 </fieldset>
                 <fieldset>
                     <div class="form-card">
                         <div class="row">
                             <div class="col-12">
                                 <h4 class="fs-title">Finish:| Step 4 - 4</h4>
                             </div>
                         </div> <br>
                         <h2 class="purple-text text-center"><strong>Success!</strong></h2> <br>
                         <div class="row justify-content-center">
                             <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
                         </div> <br><br>
                         <div class="row justify-content-center">
                             <div class="col-7 text-center">
                                 <h5 class="purple-text text-center">You Have Successfully submitted</h5>
                             </div>
                         </div>
                     </div>

                 </fieldset>

             </form>
         </div>
     </div>
   </div>
 </div>
</div>
</div>



  <footer class="credit">Author: Crezzur - Distributed By: <a title="Awesome web design code & scripts" href="https://www.codehim.com?source=demo-page" target="_blank">CodeHim</a></footer>
<!-- jQuery JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<!-- Bootstrap 5 JS -->
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js'></script>
<!-- Multi-step Form JS -->
<script src="js/bootstrap-multi-step-form.js"></script>
 <script src="../../multi2/js/bootstrap-multi-step-form.js" type="text/javascript"></script>

 <script type="text/javascript">
$(document).ready(function(){
 function myFunc(e){
      e.preventDefault();
  }
});
 </script>

  </body>
</html>
