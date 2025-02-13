<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->
 <?php echo \Livewire\Livewire::styles(); ?>

<head>

	<meta charset="utf-8" />
	<title>Checklist System</title>
	<meta name="description" content="Checklist Master,Lodge Inspection system"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link href="../../../assets/css/style.css?v=1.0" rel="stylesheet" type="text/css" />
  	<link href="../../../assets/scss/stylepanel.css" rel="stylesheet" type="text/css" />

	<!--end::Global Theme Styles-->
   <link rel="stylesheet" type="text/css" href="../../../css/bgcolor.css"/>

	<link href="../../../assets/api/pace/pace-theme-flat-top.css" rel="stylesheet" type="text/css" />
	<link href="../../../assets/api/mcustomscrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
	<!-- <link href="../../../assets/css/multiple-select.min.css" rel="stylesheet"> -->
	<link href="../../../assets/css/hierarchy-select.min.css" rel="stylesheet">

	<link href="../../../assets/api/datatable/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
	<link href="../../../assets/css/daterangepicker.css" rel="stylesheet">

    <link href="../../../assets/api/pace/pace-theme-flat-top.css" rel="stylesheet" type="text/css" />
	<link href="../../../assets/api/mcustomscrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />

	<link href="../../../assets/api/datatable/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
	<link href="../../../assets/api/multiple-select/multiple-select.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../../../assets/api/daterange-picker/daterangepicker.css" />
    <link rel="manifest" href="../../../manifest.json">

    <!-- Custom styles -->

    <script>
        if ('serviceWorker' in navigator) {
  window.addEventListener('load', function() {
    navigator.serviceWorker.register('sw.js').then(function(registration) {
    // Registration was successful
      console.log('ServiceWorker registration successful with scope: ', registration.scope);
    }, function(err) {
      // registration failed :(
      console.log('ServiceWorker registration failed: ', err);
    });
  });
}
    </script>
    <script src="../../js/jQuery311.min.js" type="text/javascript"></script>
   
<link rel="shortcut icon" href="../../assets/images/misc/logo.svg" />
</head>

<body id="tc_body" class="header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-fixed">
   <!-- Paste this code after body tag -->

	<!--begin::Header Mobile-->
	<div id="tc_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
		<!--begin::Logo-->
		<a href="/admin" class="brand-logo">

						<?php if(isset($company->logo)): ?>
 <span class="brand-logo" style="padding:8px;padding-left:30px;"><img style="height: 15vh;width: 100%;" alt="Logo" src="<?php echo e(asset('storage/logo/'.$company->logo)); ?>"/></span>
<?php endif; ?>

		</a>

		<!--end::Logo-->
		<!--begin::Toolbar-->
		<div class="d-flex align-items-center">
			<button class="btn p-0" id="tc_aside_mobile_toggle">
				<svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-justify-right" fill="currentColor"
					xmlns="#">
					<path fill-rule="evenodd"
						d="M6 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-4-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
				</svg>
			</button>

			<button class="btn p-0 ml-2" id="tc_header_mobile_topbar_toggle">
				<span class="svg-icon svg-icon-xl">
					<svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor"
						xmlns="#">
						<path fill-rule="evenodd"
							d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
					</svg>
				</span>
			</button>

		</div>
		<!--end::Toolbar-->
	</div>
	<!--end::Header Mobile-->
	<!--begin::Main-->
	<div class="d-flex flex-column flex-root"   style="background-color:#fff !important">
		<!--begin::Page-->
		<div class="d-flex flex-row flex-column-fluid page"  style="background-color:#fff !important">

      <!--begin::Aside-->
  <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Admin|GeneralManager|GeneralAdmin|SuperAdmin|Manager|User|Store|HouseKeeper|Maintenancier|MaintenanceReport')): ?>

  <?php
  $wrapper="wrapper";
   ?>

       <div>
			<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="tc_aside">
				<!--begin::Brand-->
				<div class="brand flex-column-auto" id="tc_brand">
					<?php if(isset($company->logo)): ?>
 <span class="brand-logo" style="padding:8px;padding-left:30px;"><img style="height: 15vh;width: 100%;" alt="Logo" src="<?php echo e(asset('storage/logo/'.$company->logo)); ?>"/></span>
<?php endif; ?>
       </div>

				<!--begin::Aside Menu-->
				<div class="aside-menu-wrapper flex-column-fluid overflow-auto h-100" id="tc_aside_menu_wrapper" style="background-color:#">
					<!--begin::Menu Container-->
					<div id="tc_aside_menu" class="aside-menu  mb-5" data-menu-vertical="1" data-menu-scroll="1"
						data-menu-dropdown-timeout="500">
						<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						<!--end::Menu Nav-->
					</div>
					<!--end::Menu Container-->
				</div>
				<!--end::Aside Menu-->
			</div>
		</div>
<?php endif; ?>

			<div class="aside-overlay"></div>
			<!--end::Aside-->
			<!--begin::Wrapper-->
			<div class='d-flex flex-column flex-row-fluid <?php if(isset($wrapper)): ?><?php echo $wrapper ?><?php endif; ?>' id="tc_wrapper">
				<!--begin::Header-->
				<div id="tc_header" class="header header-fixed" style="background-color:#d9c7a8">
					<!--begin::Container-->
					<div class="container-fluid d-flex align-items-stretch justify-content-between">
						<!--begin::Header Menu Wrapper-->
						<div class="header-menu-wrapper header-menu-wrapper-left" id="tc_header_menu_wrapper">
							<!--begin::Header Menu-->
							<div id="tc_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
								<!--begin::Header Nav-->
								<ul class="menu-nav">

										<li class="menu-item menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here menu-item-active p-0"
										data-menu-toggle="click" aria-haspopup="true">
										<!--begin::Toggle-->
										<div class="btn  btn-clean btn-dropdown mr-0 p-0" id="tc_aside_toggle">
											<span class="svg-icon svg-icon-xl svg-icon-primary" style="padding:20px;">

												<svg width="24px" height="24px" viewBox="0 0 16 16" class="bi bi-list"
													fill="currentColor" xmlns="#">
													<path fill-rule="evenodd"
														d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
												</svg>
											</span>
										</div>
										<!--end::Toolbar-->
									</li>

								</ul>
								<!--end::Header Nav-->
							</div>
							<!--end::Header Menu-->
						</div>
						<!--end::Header Menu Wrapper-->
						<!--begin::Topbar-->
						<div class="topbar">                          
							<div class="topbar-item">
								<div class="quick-search quick-search-inline ml-20 mr-1 w-300px"
									id="kt_quick_search_inline">


									<!--begin::Dropdown-->
									<div
										class="dropdown-menu dropdown-menu-left dropdown-menu-lg dropdown-menu-anim-up">
										<div class="quick-search-wrapper scroll ps" data-scroll="true" data-height="350"
											data-mobile-height="200" style="height: 350px; overflow: hidden;">
											<div class="ps__rail-x" style="left: 0px; bottom: 0px;">
												<div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
												</div>
											</div>
											<div class="ps__rail-y" style="top: 0px; right: 0px;">
												<div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;">
												</div>
											</div>
										</div>
									</div>
									<!--end::Dropdown-->
								</div>
							</div>

							<!--begin::Notifications-->
							<div class="dropdown">
                <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'SuperAdmin|GeneralAdmin|GeneralManager|Manager|Admin|HouseKeeping|Maintenancier')): ?>
								<div class="topbar-item" data-toggle="dropdown" data-display="static">
									<div class="btn btn-icon btn-clean btn-dropdown mr-1">
										<div class="svg-icon svg-icon-xl svg-icon-primary" title="Notification">

											<svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-bell"
												fill="currentColor" xmlns="#">
												<path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z" />
												<path fill-rule="evenodd"
													d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
											</svg>
											<div class="lds-ripple">
												<div></div>
												<div></div>
											</div>
										</div>

										<span class="badge badge-pill badge-secondary"><?php echo e($qnsCount->count() ?? 0); ?></span>
									</div>
								</div>
<?php endif; ?>

								<div class="dropdown-menu p-0 m-0 dropdown-menu-right w-300px">
									<form>

										<div class="d-flex flex-column p-3 border-bottom rounded-top">
 
										</div>

                                        <div class="nav-hover scrollbar-1 ">
										 
                                              <!-- <p class="text-center">No notification</p> -->

											<a href="/managers-inspection" class="nav-item border-bottom">
												<div class="nav-link">
													<div class="nav-icon mr-3">
														<!-- <i class="fas fa-cog text-primary"></i> -->
													</div>
													<div class="nav-text">
														<div class="font-weight-bold" style="color:red">Urgently We need to clear all addressed Issues</div>
														<!-- <div class="text-muted">23 hrs ago</div> -->
													</div>
												</div>
											</a>

                                        </div>
										<div class="d-flex flex-column p-3 rounded-top">

											<h4 class="d-flex justify-content-center mb-0  rounded-top">
												<a href="/managers-inspection" class="font-size-base text-primary">View All</a>
											</h4>

										</div>
									</form>
								</div>
							</div>
							<!--end::Notifications-->
							<!--begin::user-->
							<div class="dropdown">
								<div class="topbar-item" data-toggle="dropdown" data-display="static">
									<div class="btn btn-icon w-auto btn-clean d-flex align-items-center pr-1 pl-3">
										<span class="text-dark-50 font-size-base d-none d-xl-inline mr-3"><?php if(auth()->guard()->check()): ?><?php echo e(Auth::user()->name); ?><?php endif; ?></span>
										<span class="symbol symbol-35 symbol-light-success">
											<span class="symbol-label font-size-h5 ">
												<svg width="20px" height="20px" viewBox="0 0 16 16"
													class="bi bi-person-fill" fill="currentColor"
													xmlns="#">
													<path fill-rule="evenodd"
														d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
												</svg>
											</span>
										</span>
									</div>
								</div>

								<div class="dropdown-menu dropdown-menu-right" style="min-width: 150px;background-color:#;">

									<a href="#" class="dropdown-item">
										<span class="svg-icon svg-icon-xl svg-icon-primary mr-2">
											<svg xmlns="#" width="20px" height="20px"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
												stroke-linecap="round" stroke-linejoin="round"
												class="feather feather-user">
												<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
												<circle cx="12" cy="7" r="4"></circle>
											</svg>
										</span>
										Edit Profile
									</a>

									<a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
								onclick="event.preventDefault();
											  document.getElementById('logout-form').submit();">
										<span class="svg-icon svg-icon-xl svg-icon-primary mr-2">
											<svg xmlns="#" width="20px" height="20px"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
												stroke-linecap="round" stroke-linejoin="round"
												class="feather feather-power">
												<path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path>
												<line x1="12" y1="2" x2="12" y2="12"></line>
											</svg>
										</span>
										Logout
									</a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>


								</div>

							</div>
													</div>

													      <?php if($message= Session::get('success')): ?>
<div class="alert alert-success" role="alert">
	<button aria-label="Close" class="close" data-dismiss="alert" type="button">
	<span aria-hidden="true">&times;</span></button>
	<strong>Well done!</strong> <?php echo e($message); ?>

</div>
<?php endif; ?>

<?php if($message= Session::get('delete')): ?>
<div class="alert alert-danger" role="alert">
	<button aria-label="Close" class="close" data-dismiss="alert" type="button">
	<span aria-hidden="true">&times;</span></button>
	<strong>Attention!</strong> <?php echo e($message); ?>

</div>
<?php endif; ?>
<?php if($message= Session::get('info')): ?>
<div class="alert alert-danger" role="alert">
	<button aria-label="Close" class="close" data-dismiss="alert" type="button">
	<span aria-hidden="true">&times;</span></button>
	<strong>Sorry!</strong> <?php echo e($message); ?>

</div>
<?php endif; ?>
<?php if($message= Session::get('error')): ?>
<div class="alert alert-danger" role="alert">
	<button aria-label="Close" class="close" data-dismiss="alert" type="button">
	<span aria-hidden="true">&times;</span></button>
	<strong>Sorry!</strong> <?php echo e($message); ?>

</div>
<?php endif; ?>


<?php if($errors->any()): ?>
<div class="alert alert-danger">
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>
						
					</div>
				</div>
				
 <?php if(isset($slot)): ?>
 <?php echo e($slot); ?>

 <?php else: ?>
 <?php echo $__env->yieldContent('content'); ?>
  <div class="footer bg-white py-4 d-flex flex-lg-column" id="tc_footer">
                                    <div
                        class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">

                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted font-weight-bold mr-2 float-right">©2022</span>
                            <span class="ext-muted font-weight-bold mr-2 text-center" style="color: #000;">Licensed to: <?php echo e($company->company_name??'Set Company Profile'); ?></span>
                        </div>
                    </div>
                </div>
          <?php endif; ?>

			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
	<!--end::Main-->

  <script src="../../../assets/js/plugin.bundle.min.js"></script>
	<script src="../../../assets/js/bootstrap.bundle.min.js"></script>
	<script src="../../../assets/api/jqueryvalidate/jquery.validate.min.js"></script>
	<script src="../../../assets/api/apexcharts/apexcharts.js"></script>
	<script src="../../../assets/api/apexcharts/scriptcharts.js"></script>
	<script src="../../../assets/api/pace/pace.js"></script>
	<script src="../../../assets/api/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="../../../assets/api/quill/quill.min.js"></script>
	 <script src="../../../assets/api/datatable/jquery.dataTables.min.js"></script>
	<script src="../../../assets/js/sweetalert.js"></script>
	<script src="../../../assets/js/sweetalert1.js"></script>
    <script src="../../../assets/js/multiple-select.min.js"></script>
	<script src="../../../assets/js/jquery.datatables.min.js"></script>

    <script src="../../../assets/api/multiple-select/multiple-select.min.js"></script>
    <script src="../../../assets/api/daterange-picker/moment.min.js"></script>
    <script src="../../../assets/api/daterange-picker/daterangepicker.min.js"></script>

   	<script src="./../../assets/js/script.bundle.js"></script>

	      <script src="../../../assets/js/hierarchy-select.js"></script>
	          <script src="../../../assets/js/hierarchy-select.min.js"></script>

	           <script src="../../img_library/scripts.js" type="text/javascript"></script>

    <script>
		var options = {
	  debug: 'info',
	  modules: {
		toolbar: '#toolbar'
	  },
	  placeholder: 'Compose an epic...',
	  readOnly: true,
	  theme: 'snow'
	};
	var editor = new Quill('#editor', options);


	jQuery(document).ready( function () {
		jQuery('#myTable2').dataTable( {


		"pagingType": "simple_numbers",
		"order": [],
		"columnDefs": [ {
		  "targets"  : 'no-sort',
		  "orderable": false,
		}]
	});
	});

	jQuery(document).ready(function() {
		jQuery('#orderTable').DataTable({
			"pagingType": "simple_numbers",
            order:[[0, 'desc']],

		"columnDefs": [ {
		  "targets"  : 'no-sort',
		  "orderable": false,
        //   "orderSequence": [ "desc" ], "targets": [ 10 ]
		}]
		});
	} );
	</script>


<script>
jQuery(function() {

var start = moment().subtract(29, 'days');
var end = moment();

function cb(start, end) {
    jQuery('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
}

jQuery('#reportrange').daterangepicker({
    startDate: start,
    endDate: end,
    ranges: {
       'Today': [moment(), moment()],
       'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
       'Last 7 Days': [moment().subtract(6, 'days'), moment()],
       'Last 30 Days': [moment().subtract(29, 'days'), moment()],
       'This Month': [moment().startOf('month'), moment().endOf('month')],
       'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    }
}, cb);

cb(start, end);

});
</script>

<script>
window.addEventListener("load",function() {
    setTimeout(function(){
        // This hides the address bar:
        window.scrollTo(0, 1);
    }, 0);
});
</script>
 <?php echo \Livewire\Livewire::scripts(); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\checkmaster\resources\views/layouts/app.blade.php ENDPATH**/ ?>