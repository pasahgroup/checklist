

<?php $__env->startSection('content'); ?>
 <div class="container">
  <?php if($message = Session::get('success')): ?>
  <div class="alert alert-success">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
    <span aria-hidden="true">&times;</span></button>
    <strong>Well!: </strong> <?php echo e($message); ?>

  </div>
  <?php endif; ?>

 <?php if($message = Session::get('info')): ?>
  <div class="alert alert-warning">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
    <span aria-hidden="true">&times;</span></button>
    <strong>Ops!: </strong> <?php echo e($message); ?>

  </div>
  <?php endif; ?>

 <?php if($message = Session::get('error')): ?>
  <div class="alert alert-danger">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
    <span aria-hidden="true">&times;</span></button>
    <strong>Sorry!: </strong> <?php echo e($message); ?>

  </div>
  <?php endif; ?>
   <div class="package-list-wrap ">
                <img src="#" class="img-fluid" alt="det-img" style="min-height: 20vh !important;max-height: 50vh;background-size: cover;width: 100%;">
                <div class="package-list-content">
                    <p class="package-list-duration">1  Night(s)<span
                            class="rate">



                    </span>
                    </p>

                     <h3 class="package-list-title">
                    Program
                    </h3>
                    <button href="#bookNow" type="button" class="btn btn-success" data-toggle="modal">Book Now</button>


                </div>

            </div>
          </div>

  <div class="trip-detail">
    <div class="container">
      <div class="tab-wrap">

        <ul id="trip-tab" class="nav nav-tabs affix-top" data-spy="affix" data-offset-top="1290">
          <li class="active"><a href="#overview" data-toggle="tab">Overview</a>
          </li>
          <li class=""><a href="#itenary" data-toggle="tab">Itenary</a>
          </li>
           <li class=""><a href="#accomodation" data-toggle="tab">Accomodation</a>
          </li>

           <li class=""><a href="#inclusive" data-toggle="tab">Inclusive</a>
          </li>
          <li class=""><a href="#reveiws" data-toggle="tab">Reviews</a>
          </li>
        </ul>

        <div class="tab-content paper-effect">

          <div class="tab-pane active" id="overview">
            <div class="row">
              <div class="col-sm-6">


              </div>
              <div class="col-sm-6">
                <div class="border-box">
                  <br>
                  <div class="box-title">Safari Overview</div>
                  <ul class="trip-overview">
                    <li>
                      <span class="icon-road-sign"></span>
                      <div class="detail">
                        <div class="title">Trip profile</div>

                      </div>
                    </li>

                    <li>
                      <span class="icon-barcode"></span>
                      <div class="detail">
                        <div class="title">Tour Code</div>

                      </div>
                    </li>
                    <li>
                      <span class="icon-door-tag "></span>
                      <div class="detail">
                       <div class="title">Destinations</div>

                      </div>
                    </li>
                    <li>
                      <span class="icon-home"></span>
                      <div class="detail">

                                                <div class="title">Accomodations</div>

                      </div>
                    </li>
                    <li>
                      <span class="icon-bus"></span>
                      <div class="detail">
                        <div class="title">Transportation</div>

                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>


 <div class="tab-pane" id="itenary">
            <div class="row">
                   <div class="col-md-12 col-sm-12">
                <p class="card-text">

                                            </p>

                </div>
            </div>
          </div>


 <div class="tab-pane" id="accomodation">
            <div class="row">
                            <div class="col-md-12 col-sm-12">

                              </div>
            </div>
          </div>









          <div class="tab-pane" id="inclusive">



   <div class="row">
                                <div class="col-md-6 col-lg-6 col-sm-12">
                                  <div class="rating">                                                                      <h4>Not Inclusive</h4>
                                  </div>

    </div>
      <div class="col-lg-5">
                                            <div class="rating">
                                                <h4>Inclusive</h4>

                                            </div>


                                </div>

                                                  </div>


            <hr>
          </div>

          <div class="tab-pane" id="reveiws">
            <div class="review-comment">
              <br>
              <div class="row">
                <div class="col-sm-6">
                  <ul class="media-list review-comment">
                    <li class="media">
                      <div class="media-left">
                        <a href="#">
                          <img src="http://placehold.it/70x70" class="media-object" alt="">
                        </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">Kim L. Burney</h4>
                        <div class="rating">
                          <span class="icon-star"></span>
                          <span class="icon-star"></span>
                          <span class="icon-star"></span>
                          <span class="icon-star"></span>
                          <span class="icon-star-empty"></span>
                        </div>
                        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                      </div>
                    </li>
                    <li class="media">
                      <div class="media-left">
                        <a href="#">
                          <img src="http://placehold.it/70x70" class="media-object" alt="">
                        </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">Shing Ch'in</h4>
                        <div class="rating">
                          <span class="icon-star"></span>
                          <span class="icon-star"></span>
                          <span class="icon-star"></span>
                          <span class="icon-star"></span>
                          <span class="icon-star-empty"></span>
                        </div>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="col-sm-6">
                  <div class="add-comment">
                    <div class="border-box">
                      <div class="box-title">Leave a Review</div>
                        <form method="post"  action="#" class="registration-form">
                    <?php echo csrf_field(); ?>
                      <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="full_name" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" required>
                      </div>

                       <div class="form-group">
                        <label>Rating</label>
                        <select name="rank" class="form-group">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>

                       <div class="form-group">
                        <label>Comment</label>
                        <textarea class="form-control" rows="6" name="comments" required></textarea>
                        <button class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                    </div>
                  </div>

                </div>
              </div>


            </div>
          </div>
           <div class="row">
               <div class="col-sm-12 col-md-12 float-right">
                <div class="float-right">
   <button type="button" class="btn btn-primary hvr-sweep-to-right" data-toggle="modal" data-target="#bookNow">Book Now</button>

  </div>
  </div>
      </div>
        </div>
      </div>

    </div>
  </div>


    <div class="container">
      <div class="section-title center">
        <h3>Similar Trips</h3>
      </div>
      <div class="row item">
      </div>

    </div>


  <div class="modal fade modal-book-now" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Book Now</h4>
        </div>
        <div class="modal-body">

          <div class="preview-wrap">
            <div class="preview-img" style="background-image: url('assets/img/home_img/mountain.jpg')"></div>

            <div class="form-wrap">
              <form id="ajax-book" method="post" action="book_trip.php">
                <div id="form-messages" class="alert" role="alert" style="display: none;"></div>
                <input type="hidden" name="trip" id="trip" value="annapurna">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name" value="" required>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" value="" required>
                </div>

                <div class="form-group">
                  <label>Duration</label>
                  <div class="row">
                    <div class="col-sm-6">
                      <input type="text" name="from_date" id="from_date" class="form-control datepicker" placeholder="From" value="" required>
                    </div>
                    <div class="col-sm-6">
                      <input type="text" name="to_date" id="to_date" class="form-control datepicker" placeholder="To" value="" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Number of Person</label>
                  <input type="text" name="number_person" id="number_person" class="form-control" value="2" required>
                </div>
                <button class="btn btn-primary hvr-sweep-to-right">BooK Now</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

     <div id="bookNow" class="modal" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top:60px;">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
  <div class="preview-wrap">

            <div class="form-wrap">
                <

                <form id="msform"  method="post"  action="<?php echo e(route('company-profile-create.store')); ?>" class="registration-form" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

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




                            <div class="col-md-6">
                                            <label >Business Name</label>
                            <input type="text" name="business_name" class="form-control border-dark"  placeholder="bisiness name">
                            </div>
                            <div class="col-md-6">
                            <label >TIN</label>
                            <input class="form-control" type="text" name="tin" placeholder="tin">
                                          </div>

                                          <input type="text" name="phone" placeholder="Phone(+00 00 000 000)"/>
                                       <input type="email" name="email" placeholder="email"/>


             <div class="form-group">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="first_name" placeholder="first name" />

                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                           <input type="text" name="last_name" placeholder="last name" />
                                    </div>
                                </div>
  </div>

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

                             <button type="button" class="close float-left" data-dismiss="modal" style="background-color:#b32121;padding: 8px 30px;">Close</button>

                        <input type="button" name="previous" class="previous action-button-previous float-left" value="Previous" />
                        <input type="button" name="next" class="next action-button float-right" value="Next" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
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
            <label for=""> How did you hear about us?:</label>
</div>

     <div class="col-md-2">
           <label for="facebook">Facebook  </label>
          <input id="facebook" type="checkbox" class="zt-control"  name="hear[]" value="Facebook">

      </div>

      <div class="col-md-1">
        <label for="instagram">Instagram  </label>
          <input id="instagram" type="checkbox" class="zt-control"  name="hear[]" value="Instagram">
      </div>

<div class="col-md-1">
          <label for="google">Google </label>
          <input id="google" type="checkbox" class="zt-control"  name="hear[]" value="Google">
      </div>

      <div class="col-md-6">
          <label for="mouth">Word of Mouth </label>
          <input  id="mouth" type="checkbox" class="zt-control"  name="hear[]" value="Word of Mouth">
        </div>



  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <label for=""> Other Media:</label>
           <input type="text" class="form-control" name="hear_about_us">
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
                <div class="modal-footer">
                </div>
              </div>
            </div>
          </div>



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

                <form id="msform"  method="post"  action="#" class="registration-form">
                    <?php echo csrf_field(); ?>
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



                        <!--  <input type="text" name="first_name" placeholder="first name" />
                           <input type="text" name="last_name" placeholder="last name" />


 -->

             <div class="row form-group">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="first_name" placeholder="first name" />

                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                           <input type="text" name="last_name" placeholder="last name" />
                                    </div>
                                </div>
  </div>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.apps', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\checkmaster\resources\views/admin/profile/profile_web_2.blade.php ENDPATH**/ ?>