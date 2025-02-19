<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Buruhani Wawa">


  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta content="Experienced hiking and Tour Safaris" name="description">
  <meta content="ISOL Tours" name="keywords">
  <meta content="Buruhani Wawa" name="author">


  <title><?php echo e($title ?? 'ISOL Tours'); ?></title>
  <link rel="icon" type="image/png" href="../mold/assets/img/favicon.png" />

  <link rel="stylesheet" href="../mold/assets/css/min/bootstrap.min.css" media="all">
  <link rel="stylesheet" href="../mold/assets/css/jqueryui.css" media="all">
  <link rel="stylesheet" href="../mold/vendor/animate-css/animate.css" media="all">
  <link rel="stylesheet" href="../mold/assets/font/iconfont/iconstyle.css" media="all">
  <link rel="stylesheet" href="../mold/assets/font/font-awesome/css/font-awesome.css" media="all">
  <link rel="stylesheet" href="../mold/assets/css/main.css" media="all" id="maincss">
  <link rel="stylesheet" href="../../css/style-shortline.css">

<link rel="stylesheet" href="../assetf/style.css">
 <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../../assets/corporate/css/style.css" rel="stylesheet">

  <!-- Custom -->
  <link href="../../img_library/main.css" rel="stylesheet">
    <link href="../../img_library/mform.css" rel="stylesheet">
    <link href="../../css/mform.css" rel="stylesheet">
    <link href="../../css/tooltip.css" rel="stylesheet">

      <link href="../../tooltip/tooltip.css" rel="stylesheet">
        <link href="../../tooltip/tooltip.css" rel="stylesheet">

<!-- Custom css -->
 <link rel="stylesheet" href="../css/font621.min.css">

<link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
<link href="../../assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
<link href="../../assets/pages/css/animate.css" rel="stylesheet">

 <script src="../js/jquery361.min.js"></script>
 <script src="../custom/js/bootstrap.min.js"></script>



  <!-- <link href="../../assets/pages/css/animate.css" rel="stylesheet">
  <link href="../../assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
-->
</head>
<body>


  <div class="container top-header-area" style="background:#000;padding:1px">
         <div class="align-items-center py-2 px-xl-5 d-lg-flex" style="background-color:#a5ac84;margin-top:0px;margin-bottom:0px;">
              <div class="col-lg-2 col-md-4">
                <a href="" class="text-decoration-none">
                    <span class="h3 text-uppercase text-primary bg-dark px-2">ISOL</span>
                    <span class="h3 text-uppercase text-dark bg-primary px-2 ml-n1">Tour</span>
                </a>
            </div>

              <div class="col-lg-4 col-md-7">
                 <div class="email-address_no">
                    <a href="mailto:info@isoltours.com">
                      <i class="fa fa-envelope" style="color:pink;"></i><b style="color:#000;">  info@isoltours.com</b></a>
                       <a href="https://wa.link/z5mmcd" style="padding-left:10px">
                            <img src="../../../images/whatsapp.png" alt="" style="width:20px; height:20px;">
                               <b style="color:#000;">(+255)653 223 318</b>
                            </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-8 text-left">
                      <form  method="post"  action="#" enctype="multipart/form-data">
                                  <?php echo csrf_field(); ?>
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="search any keyword" required="">
                        <div class="input-group-append">
                            <button class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>


            <div class="col-lg-2 col-md-4 text-right">
<!-- btn btn-primary btn-square mr-2 -->
                      <a href="#"  class="btn btn-outline btn-primary"><i class="fab fa-twitter"></i></a>
      <a href="#"  class="btn btn-outline btn-primary" href=""><i class="fab fa-facebook-f"></i></a>
          <a href="#"  class="btn btn-outline btn-primary"><i class="fab fa-linkedin-in"></i></a>
           <a href="#"  class="btn btn-outline btn-primary"><i class="fab fa-instagram"></i></a>

            </div>
        </div>
    </div>



    <header class="header-area">
        <!-- Main Header Area -->
        <div class="main-header-area" id="stickyHeader" style="background:#fdfdfd;">
           <!-- <div class="main-header-area" id="stickyHeader" style="background:#2e4432;"> -->
            <div class="classy-nav-container breakpoint-off">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="southNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="/"></a>
                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>

  <li><a href="/">Home</a>
                                  <!--   <ul class="dropdown">
                                         <li><a href="/">Home</a></li>
                                    </ul -->
                                </li>



                                    <li><a href="#">Tour Packages</a>
                                    <div class="megamenu">
                                        <ul class="single-mega cn-col-4">
                                            <li class="title">Packages</li>
                                            <li><a href="/safaris">Wildlife Safaris</a></li>
                                            <li><a href="/trekking">Hiking & Trekking</a></li>
                                            <li><a href="/holiday">Beach Holidays</a></li>
                                            <li><a href="/dayTours">Day Tours</a></li>
                                            <li><a href="/historical-sites">Historical Sites</a></li>
                                        </ul>

                                        <ul class="single-mega cn-col-4">
                                            <li class="title">Special Packages</li>
                                             <li><a href="/group">All Group Tours</a></li>
                          <li><a href="/Group-scheduled">Scheduled Group Tours</a></li>
                <li><a href="/offers">Special Offers</a></li>
                <li><a href="/special-occasions">Special Occasions</a></li>
                   <li><a href="/cultural">Cultural Tours</a></li>
                    <li><a href="/addons">Addons</a></li>
                                        </ul>
                                    </div>
                                </li>





                                <li><a href="#">Services</a>
                                    <ul class="dropdown">
                                         <li><a href="/whatWeOfferClient">ISOL Tour Services</a></li>
                <li><a href="/drongo-attractions">ISOL Tour Attractios</a></li>
                <li><a href="#">ISOL Crafts and Designing</a></li>

                                    </ul>
                                </li>



                                 <li><a href="/safaris-gallery">Galleries</a>
                                    <!-- <ul class="dropdown">
                                         <li><a href="/safaris-gallery">Gallery</a></li>
                                    </ul> -->
                                </li>



                                <li><a href="#">Opportunities</a>
                                    <ul class="dropdown">
                                        <li><a href="/New-Agent">Agent-Register</a></li>
                        <li><a href="/New-tourGuide">Tour Guide -Register</a></li>
                        <li><a href="/New-Partner">Partner-Register</a></li>

                                    </ul>
                                </li>





                                    <li><a href="/aboutus">About Us</a>
                                   <!--  <ul class="dropdown">
                                         <li><a href="/safaris-gallery">About Us</a></li>
                                    </ul> -->
                                   </li>

                                  <li><a href="/mailing">Contact</a>
                                    <!-- <ul class="dropdown">
                                         <li><a href="/aboutus">Contact</a></li>
                                    </ul> -->
                                </li>

    <li><a href="#" class="btn btn-primary" style="color:#pink">My Safari</a>


                                    <ul class="dropdown">
                                         <li><a href="/tailorForm" class="btn-outline btn-success">Create New Safari(Tailor Maide)</a></li>
                <li><a href="/tailorClientForm" class="btn-outline btn-success">My Existing Safari-Tailor Made</a></li>
                <li><a href="/bookingTrip" class="btn-outline btn-primary">My Existing Safari</a></li>

                                    </ul>
                                </li>
    </ul>

      </div>
     </div>
 </nav>
           </div>
        </div>
    </header>

     <?php echo $__env->yieldContent('content'); ?>

  <!-- <footer id="footer"> -->

  <footer class="footer-area section-padding-100-0 bg-img gradient-background-overlay" style="background-image: url(../assetf/img/bg-img/cta.jpg); color:yellow;">
    <div class="container-fluid">


   <div class="px-xl-5 pt-5">
              <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Destinations</h5>

                              <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="/circuitTour/Northern Circuit"><i class="fa fa-angle-right mr-2"></i>Northern Circuit</a>
                            <a class="text-secondary mb-2" href="/circuitTour/Southern Circuit"><i class="fa fa-angle-right mr-2"></i>Southern Circuit</a>
                            <a class="text-secondary mb-2" href="/circuitTour/Eastern Circuit"><i class="fa fa-angle-right mr-2"></i>Eastern Circuit</a>
                            <a class="text-secondary mb-2" href="/circuitTour/Western Circuit"><i class="fa fa-angle-right mr-2"></i>Western Circuit</a>
                     <a class="text-secondary mb-2" href="/circuitTour/Central Circuit"><i class="fa fa-angle-right mr-2"></i>Central Circuit</a>
                        </div>
                        <br>

                    </div>
            <div class="col-lg-8 col-md-12">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">About ISOL Tours</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Why Adventure with us</a>
                            <a class="text-secondary mb-2" href="/whatWeOfferClient"><i class="fa fa-angle-right mr-2"></i>What We offer</a>
                            <a class="text-secondary mb-2" href="/"><i class="fa fa-angle-right mr-2"></i>Accommodation-Hotels</a>
                            <a class="text-secondary mb-2" href="/accommodation-camps"><i class="fa fa-angle-right mr-2"></i>Accommodation-Camps</a>

                        </div>
                    </div>
                       <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Support</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Visa information</a>
                            <a class="text-secondary mb-2" href="/whatWeOfferClient"><i class="fa fa-angle-right mr-2"></i>Health & Vaccination</a>
                            <a class="text-secondary mb-2" href="/"><i class="fa fa-angle-right mr-2"></i>Payment Methods</a>
                            <a class="text-secondary mb-2" href="/accommodation-camps"><i class="fa fa-angle-right mr-2"></i>About Tanzania</a>

                        </div>
                    </div>


                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Contacts</h5>

                           <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Address:<?php echo e($contacts->address??'Arusha'); ?></a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Contact No: <?php echo e($contacts->phone??' No Number'); ?></a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Email: <?php echo e($contacts->email??'No Email'); ?></a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Website: <?php echo e($contacts->website??'No Website'); ?></a>
                        </div>
                    </div>
            </div>
        </div>
    </div>

                 <div class="border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-5 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    2024 &copy; <a class="text-primary" href="#">ISOL Tour</a>. All Rights Reserved.<a href="javascript:;">| Privacy Policy</a>  |  <a href="javascript:;">Terms of Service</a>  |  <a href="https://isol.com:2096" target=”_blank” >Email</a>
                </p>
            </div>
            <div class="col-md-4 px-xl-0">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="col-md-3 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary float-right">
                  Developed by: <a href="https://www.pasah.net" target="_blank">www.pasah.net</a>
                </p>
            </div>
        </div>
  </footer>



  <script src="../mold/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../mold/vendor/jqueryui/jquery-ui-1.10.3.custom.min.js"></script>
  <script src="../mold/vendor/jquery.ui.touch-punch.min.js"></script>
  <script src="../mold/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

  <script src="../mold/vendor/waypoints/lib/jquery.waypoints.min.js"></script>
  <script src="../mold/vendor/owlcarousel/owl.carousel.min.js"></script>
  <script src="../mold/vendor/retina.min.js"></script>
  <script src="../mold/vendor/jquery.imageScroll.min.js"></script>
  <script src="../mold/assets/js/min/responsivetable.min.js"></script>
  <script src="../mold/assets/js/bootstrap-tabcollapse.js"></script>

  <script src="../mold/assets/js/min/countnumbers.min.js"></script>
  <script src="../mold/assets/js/main.js"></script>

  <!-- Current Page JS -->
  <script src="../mold/assets/js/min/home.min.js"></script>
  <script>
    $(document).ready(function(){
            $('.equal-height > div').deasil_equalHeight();
            $('#carousel').carousel({
              interval: 10000
            })
          });
          $(window).resize(function(){
            $('.equal-height > div').deasil_equalHeight();
          });
  </script>

    <script src="../assetf/js/plugins.js"></script>
    <script src="../assetf/js/classy-nav.min.js"></script>
    <script src="../assetf/js/jquery-ui.min.js"></script>

    <script src="../assetf/js/active.js"></script>
     <script src="../assets/js/main.js"></script>

<!-- Custom Javascript -->
 <script src="../../img_library/scripts.js" type="text/javascript"></script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\checkmaster\resources\views/layouts/apps.blade.php ENDPATH**/ ?>