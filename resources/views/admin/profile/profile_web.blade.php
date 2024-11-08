@extends('layouts.app_web')
@section('content')

	<style>
  ul#stepForm, ul#stepForm li {
    margin: 0;
    padding: 0;
  }
  ul#stepForm li {
    list-style: none outside none;
  } 
  label{margin-top: 10px;}
  .help-inline-error{color:red;}
</style>
  </head>
  <body>
  
  <br />
  <br />
  <br />


    <div class="card card-custom gutter-b bg-white border-0" >  
      <div class="clearfix"></div>
<div class="container" style="padding-left: 0px; padding-right: 15px;">
   <div class="page-header">
        <h4>Lodge Registration Form</h4>
      </div>
  <div class="panel panel-success">
    <div class="panel-heading">
      <h3 class="panel-title">Complete this form in 3 steps!</h3>
    </div>
    <div class="panel-body">
      <!-- <form name="basicform" id="basicform" method="post" action="#" enctype="multipart/form-data"> -->
        

   <form   id="basicform"  name="basicform" method="POST"  action="{{ route('company-profile-create.store') }}" enctype="multipart/form-data">
                             @csrf
    <input type="hidden" name="_method" value="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
       <input type="hidden"  id="profile_web" name="profile_web" class="form-control" value="profile_web">

        <div id="sf1" class="frm">
          <fieldset>
            <legend>Step 1 of 3</legend>

                  <div class="col-md-6">
                                  <label >Business Name</label>
  <input type="text" name="business_name" class="form-control border-dark"  placeholder="bisiness name">
                                  
</div>
     

  <div class="col-md-6">
            <label >TIN</label>
          <input class="form-control" type="text" name="tin" placeholder="tin">
                                </div>
                                        <div class="col-md-6">
                  <label >VRN</label>
              <input class="form-control" type="text" name="vrn" placeholder="vrn">
                                </div>
      <div class="col-md-6">
                  <label >Phone Number</label>
                <input class="form-control" type="number" name="phone_number" placeholder="company mobile number" required>
                                </div>
			 
       <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button class="btn btn-success open1 float-right" type="button">Next <span class="fa fa-arrow-right"></span></button> 
              </div>
            </div>

          </fieldset>
        </div>

        <div id="sf2" class="frm" style="display: none;">
          <fieldset>
            <legend>Step 2 of 3</legend>

           
            <div class="form-group">
              <label class="col-lg-2 control-label" for="upass1">Address: </label>
              <div class="col-lg-6">
               <input class="form-control" type="text" name="address" placeholder="company address">
              </div>
            </div>

            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="form-group">
              <label class="col-lg-2 control-label" for="upass1">Upload Logo: </label>
              <div class="col-lg-6">                           
            <fieldset class="form-group mb-3 border-dark rounded p-1">
          <input type="file" class="d-block w-100" id="attachment" name="attachment[]" accept="image/*">
                                  </fieldset>
                                </div>

<div class="clearfix" style="height: 10px;clear: both;"></div>
<label class="col-lg-2 control-label" for="upass1">Who Registered: </label>
<div class="clearfix" style="height: 10px;clear: both;"></div>
  <div class="form-group">
              <label class="col-lg-2 control-label" for="upass1">First name: </label>
              <div class="col-lg-6">
               <input class="form-control" type="text" name="first_name" placeholder="first name">
              </div>
            </div>

            <div class="clearfix" style="height: 10px;clear: both;"></div>
              <div class="form-group">
              <label class="col-lg-2 control-label" for="upass1">Last name: </label>
              <div class="col-lg-6">
               <input class="form-control" type="text" name="last_name" placeholder="last name">
              </div>
            </div>
<div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button class="btn btn-warning back2 float-left" type="button"><span class="fa fa-arrow-left"></span> Back</button> 
                <button class="btn btn-success open2 float-right" type="button">Next <span class="fa fa-arrow-right"></span></button> 
              </div>
            </div>

          </fieldset>
        </div>

        <div id="sf3" class="frm" style="display: none;">
          <fieldset>
            <legend>Step 3 of 3</legend>
         <div class="form-group">
              <label class="col-lg-2 control-label" for="upass1">User code: </label>
              <div class="col-lg-6">
                <input type="text" value="{{$pin}}" id="code" name="code" class="form-control" autocomplete="off" required readonly>
              </div>
            </div>
             <div class="clearfix" style="height: 10px;clear: both;"></div>
              <div class="form-group">
              <label class="col-lg-2 control-label" for="upass1">User Email: </label>
              <div class="col-lg-6">
                <input class="form-control" type="email" id="email" name="email" placeholder="company email">
              </div>
            </div>
            <div class="clearfix" style="height: 10px;clear: both;"></div>

           
            <div class="form-group">
              <label class="col-lg-2 control-label" for="upass1">Password:</label>
              <div class="col-lg-6">
                <input type="password" placeholder="Your Password" id="upass1" name="upass1" class="form-control" autocomplete="off">
              </div>
            </div>

            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="form-group">
              <label class="col-lg-2 control-label" for="upass1">Confirm Password: </label>
              <div class="col-lg-6">
                <input type="password" placeholder="Confirm Password" id="upass2" name="upass2" class="form-control" autocomplete="off">
              </div>
            </div>

            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button class="btn btn-warning back3" type="button"><span class="fa fa-arrow-left"></span> Back</button> 
                <button class="btn btn-success float-right" type="submit" name="submit">Submit </button> 
                <img src="images/spinner.gif" alt="" id="loader" style="display: none">
              </div>
            </div>

          </fieldset>
        </div>
      </form>
    </div>
  </div>

</div>
</div>

<script type="text/javascript">  
  jQuery().ready(function() {

    // validate form on keyup and submit
    var v = jQuery("#basicform").validate({
      rules: {
		    tin: {
          required: true,
          minlength: 2,
          maxlength: 16
        },
         business_name: {
          required: true,
          minlength: 2,
          maxlength: 64
        },
 address: {
          required: true,
          minlength: 2,
          maxlength: 64
        },
        first_name: {
          required: true,
          minlength: 2,
          maxlength: 64
        },
        last_name: {
          required: true,
          minlength: 2,
          maxlength: 64
        },
        u_name: {
          required: true,
          minlength: 2,
          maxlength: 16
        },
        email: {
          required: true,
          minlength: 2,
          email: true,
          maxlength: 100,
        },
        upass1: {
          required: true,
          minlength: 6,
          maxlength: 15,
        },
        upass2: {
          required: true,
          minlength: 6,
          equalTo: "#upass1",
        }

      },
      errorElement: "span",
      errorClass: "help-inline-error",
    });

    $(".open1").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf2").show("slow");
      }
    });

    $(".open2").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf3").show("slow");
      }
    });
    
    $(".open3").click(function() {
      if (v.form()) {
        $("#loader").show();
         setTimeout(function(){
           $("#basicform").html('<h2>Thanks for your time.</h2>');
         }, 1000);
        return false;
      }
    });
    
    $(".back2").click(function() {
      $(".frm").hide("fast");
      $("#sf1").show("slow");
    });

    $(".back3").click(function() {
      $(".frm").hide("fast");
      $("#sf2").show("slow");
    });

  });
</script>
@endsection
