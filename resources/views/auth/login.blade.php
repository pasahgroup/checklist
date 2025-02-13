


@extends('layouts.app_login_pwd')
@section('content')
	<link href="../../../css/mform.css" rel="stylesheet" type="text/css" />
  <link href="../../../css/font621.min.css" rel="stylesheet" type="text/css" />
  <link href="../../../css/bootstrap431.min.css" rel="stylesheet" type="text/css" />
<style>
.bg-bannerw{

background-image:url({{URL::asset('../../assets/images/misc/bg-login.jpg')}});
    height: 100%
    width: 100%;
    position: relative;
    background-repeat: no-repeat;
    background-size:cover;
};
</style>

<main class="login-form" style="padding-top:60px;">
  <div class="cotainer">
      <div class="row justify-content-center">

          <div class="col-md-6">
              <div class="card">
                  <div class="card-header">Login Form</div>
                  <div class="card-body">


<x-guest-layout>
    <x-jet-authentication-card>
        <div class="">
        <x-slot name="logo">
            <span class="brand-text"><img style="height: 150px;" alt="Logo"
                src="../../assets/images/misc/bg-login.jpg" /></span>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif



				@if($message = Session::get('success'))
			  <div class="alert alert-success">
			    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
			    <span aria-hidden="true">&times;</span></button>
			    <strong>Well!: </strong> {{$message}}
			  </div>
			  @endif

			 @if($message = Session::get('info'))
			  <div class="alert alert-warning">
			    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
			    <span aria-hidden="true">&times;</span></button>
			    <strong>Ops!: </strong> {{$message}}
			  </div>
			  @endif

			 @if($message = Session::get('error'))
			  <div class="alert alert-danger">
			    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
			    <span aria-hidden="true">&times;</span></button>
			    <strong>Sorry!: </strong> {{$message}}
			  </div>
			  @endif



{{--
        <form method="post" action="{{ route('login') }}">
--}}

                   <form  method="post"  action="{{ route('login') }}" enctype="multipart/form-data">
                @csrf
              <input type="hidden" name="_method" value="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {{--
            <div class="row">
               <div class="col-md-2">
                               <x-jet-label for="code" value="{{ __('Code') }}" />
                </div>
                  <div class="col-md-9">
                <input id="code" class="form-control" type="text" name="code" value="{{ app('request')->input('code') }}" required autofocus/>

                </div>
            </div>
            --}}

    <div class="mt-4">

                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
            </div>


         <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
            <a href="{{ route('forget.password.get') }}"><u>Forget Password</u></a><br>
            {{--
              <a href="{{ url('company-profile-web') }}"><strong style="color:green"><u>Register Lodge</u></strong></a>
              --}}
                      </form>
                        <button href="#bookNow" type="button" class="btn btn-success" data-toggle="modal">Book Now</button>
   </div>

    </x-jet-authentication-card>
</x-guest-layout>
        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted font-weight-bold mr-2 float-right">©2022</span>
                            <span class="ext-muted font-weight-bold mr-2 text-center" style="color:#000;">Licensed to: {{$company->company_name??'Set Company Profile'}}</span>
                        </div>

                  </div>

              </div>

          </div>
      </div>
  </div>
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

                      <form id="msform"  method="post"  action="{{ route('company-profile-create.store') }}" class="registration-form">
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

                <fieldset>
                    <div class="form-card">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="fs-title">Personal Details:| Step 1 - 3</h4>
                            </div>
                        </div>


 <div class="row form-group">
<div class="col-md-12">
								<label >Business Name</label>
<input type="text" name="business_name" class="form-control border-dark"  placeholder="bisiness name">
</div>

							</div>

							<div class="row form-group">
							<div class="col-md-6">
							<label >TIN</label>
							<input class="form-control" type="text" name="tin" placeholder="tin">
														</div>

						 <div class="col-md-6">
						 								<label>VRN</label>
					  <input class="form-control" type="text" name="vrn" placeholder="vrn">
						 </div>
						 							</div>

																			<div class="row form-group">
																		 <label>Region</label>
																		 <div class="col-md-10">
																	 <input class="form-control" type="text" name="region" placeholder="region">
																									</div>
																									</div>

																									<div class="row form-group">
																								 <label>District</label>
																								 <div class="col-md-10">
																							 <input class="form-control" type="text" name="district" placeholder="district">
																															</div>
																									</div>


                          <!-- <label class="fieldlabels">Phone: *</label> -->
                           <input type="text" name="phone_number" placeholder="Phone(+00 00 000 000)"/>
                        <input type="email" name="email" placeholder="email"/>

                    </div>
                         <button type="button" class="close float-left" data-dismiss="modal" style="background-color:#b32121;padding: 4px 20px;">Close</button>
                    <input type="button" name="next" class="next action-button" value="Next" />
                </fieldset>

                <fieldset>
                        <div class="form-card">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="fs-title">Tour Information:|Step 2 - 3</h4>
                            </div>
                         </div>



											 	            <div class="form-group">
											 	              <label class="col-lg-2 control-label" for="upass1">Address: </label>
											 	              <div class="col-lg-6">
											 	               <input class="form-control" type="text" name="address" placeholder="company address">
											 	              </div>
											 	            </div>

																		<div class="form-group">
																			<label class="col-lg-2 control-label" for="upass1">Category:</label>
																				<select  name="property_category" id="property_category" class="">
																									<option value="">--- Select property category ---</option>
																								 <option>Camp site</option>
																								 <option>Lodge</option>
																								 <option>Hotel</option>
																						 </select>
																		</div>
																		<div class="form-group">
																			<label class="col-lg-2 control-label" for="upass1">Upload Logo: </label>
																			<div class="col-lg-6">
																		<fieldset class="form-group mb-3 border-dark rounded p-1">
																	<input type="file" class="d-block w-100" id="attachment" name="attachment[]" accept="image/*">
																													</fieldset>
																												</div>
																												</div>


																												<div class="form-group">
																																		<label class="col-lg-2 control-label" for="upass1">First name: </label>
																																		<div class="col-lg-6">
																																		 <input class="form-control" type="text" name="first_name" placeholder="first name">
																																		</div>
																																	</div>

																																	<div class="clearfix" style="height: 1px;clear: both;"></div>
																																		<div class="form-group">
																																		<label class="col-lg-2 control-label" for="upass1">Last name: </label>
																																		<div class="col-lg-6">
																																		 <input class="form-control" type="text" name="last_name" placeholder="last name">
																																		</div>
																																	</div>



                    </div>

                         <button type="button" class="close float-left" data-dismiss="modal" style="background-color:#b32121;padding: 4px 20px;">Close</button>

                    <input type="button" name="previous" class="previous action-button-previous float-left" value="Previous" />
                    <input type="button" name="next" class="next action-button float-right" value="Next" />
                </fieldset>



								<fieldset>
												<div class="form-card">
												<div class="row">
														<div class="col-12">
																<h4 class="fs-title">Tour Information:|Step 3 - 3</h4>
														</div>
												 </div>



																		<div class="form-group">
																			<label class="col-lg-2 control-label" for="upass1">User code:</label>
																			<div class="col-lg-6">
																			   <input type="text" value="000000" id="code" name="code" class="form-control" autocomplete="off" required readonly>
																			</div>
																		</div>

																		<div class="form-group">
																			<label class="col-lg-2 control-label" for="upass1">User Email: </label>
																			<div class="col-lg-6">
																				<input class="form-control" type="email" id="email" name="email" placeholder="company email">
																			</div>
																		</div>

																		<div class="form-group">
																			<label class="col-lg-3 control-label" for="upass1">Password:</label>
																			<div class="col-lg-9">
																				<input type="password" placeholder="Your Password" id="password" name="password" class="form-control" autocomplete="off">
																			</div>
																		</div>

																		<div class="form-group">
																			<label class="col-lg-3 control-label" for="upass1">Confirm Password: </label>
																			<div class="col-lg-9">
																				<input type="password" placeholder="Confirm Password" id="password_confirmation" name="password_confirmation" class="form-control" autocomplete="off">
																			</div>
																		</div>

										</div>


										<button type="button" class="close float-left" data-dismiss="modal" style="background-color:#b32121;padding: 4px 20px;">Close</button>
										 <input type="button" name="previous" class="previous action-button-previous float-left" value="Previous" />
											 <button type="submit" class="btn btn-success float-right btn-submit" style="padding: 4px 20px;">Submit</button>
								</fieldset>



                <fieldset>
                    <div class="form-card">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="fs-title">Thank you!</h4>
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



  <script type="text/javascript">
    $('#msform').submit(function(e) {
        e.preventDefault();


        var url = $(this).attr("action");
        let formData = new FormData(this);
        // document.getElementById('waiting').innerText="Please wait ............";
          $(".btn-submit").prepend('<i class="fa fa-spinner fa-spin"></i>');
        $(".btn-submit").attr("disabled", 'disabled');


        $.ajax({
                type:'POST',
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => {
                    // alert('Form submitted successfully');
                      $(".btn-submit").find(".fa-spinner").remove();
                     $(".btn-submit").removeAttr("disabled");
                      //alert(base_url);

                    $("#msform").trigger("reset");
                    // url: APP_URL + "/save_favorite",
                    //$('#bookNow form :input').val("");
                        // $(this).find('form').trigger('reset');

                     //location.replace(url + "/login")

                   // window.location = response.url;
                   location.reload();
                   window.location = response.url;
                },
                error: function(response){
                    $('#msform').find(".print-error-msg").find("ul").html('');
                    $('#msform').find(".print-error-msg").css('display','block');
                    $.each( response.responseJSON.errors, function( key, value ) {
                        $('#msform').find(".print-error-msg").find("ul").append('<li>'+value+'</li>');

                    });

                    $(".btn-submit").find(".fa-spinner").remove();
                $(".btn-submit").removeAttr("disabled");
                }
        });
    });
</script>

<script type="text/javascript" src="../../../js/jquery321.min.js"></script>
<script type="text/javascript" src="../../../js/bootstrap431.bundle.min.js"></script>

  <script type="text/javascript">
$(document).ready(function(){
var current_fs, next_fs, previous_fs; //fieldsets
var opacity;
var current = 1;
var steps = $("fieldset").length;

setProgressBar(current);
$(".next").click(function(){

current_fs = $(this).parent();
next_fs = $(this).parent().next();

//Add Class Active
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show();
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
next_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(++current);
});

$(".previous").click(function(){

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//Remove class active
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show();

//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
previous_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(--current);
});

function setProgressBar(curStep){
var percent = parseFloat(100 / steps) * curStep;
percent = percent.toFixed();
$(".progress-bar")
.css("width",percent+"%")
}

$(".submit").click(function(){
return false;
})

});
</script>
@endsection
