<!DOCTYPE html>
<!--
Template Name: Kundol Admin - Bootstrap 4 HTML Admin Dashboard Theme
Author: Themescoder
Website: http://www.themescoder.net/
Contact: support@themescoder.net
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->
 @livewireStyles
<head>

	<meta charset="utf-8" />
	<title>Checklist System</title>
	<meta name="description" content="Checklist Master, Sales and CRM system" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<!--begin::Fonts-->
	<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" /> -->
	<!--end::Fonts-->

	<!--begin::Global Theme Styles(used by all pages)-->
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
       <!-- <script src="../../js/activitydata.js" type="text/javascript"></script> -->


<link rel="shortcut icon" href="../../assets/images/misc/logo.svg" />
</head>

<body id="tc_body" class="header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-fixed">
   <!-- Paste this code after body tag -->

    <!-- <div class="se-pre-con">
	<div class="pre-loader">
	  <img class="img-fluid" src="./assets/images/loadergif.gif" alt="loading">
	</div>
  </div> -->

		<!--begin::Page-->
		<div class="d-flex flex-row flex-column-fluid page"  style="background-color:#fff !important">

			<!--end::Aside-->
			<!--begin::Wrapper-->
			<div class='d-flex flex-column flex-row-fluid @isset($wrapper)<?php echo $wrapper ?>@endisset' id="tc_wrapper">
				
                @if($message= Session::get('success'))
<div class="alert alert-success" role="alert">
	<button aria-label="Close" class="close" data-dismiss="alert" type="button">
	<span aria-hidden="true">&times;</span></button>
	<strong>Well done!</strong> {{ $message }}
</div>
@endif
@if($message= Session::get('delete'))
<div class="alert alert-danger" role="alert">
	<button aria-label="Close" class="close" data-dismiss="alert" type="button">
	<span aria-hidden="true">&times;</span></button>
	<strong>Attention!</strong> {{ $message }}
</div>
@endif
@if($message= Session::get('error'))

<div class="alert alert-danger" role="alert">
	<button aria-label="Close" class="close" data-dismiss="alert" type="button">
	<span aria-hidden="true">&times;</span></button>
	<strong>Sorry!</strong> {{ $message }}
</div>
@endif
{{-- Validation error message --}}
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

 @isset($slot)
 {{ $slot }}
 @else
 @yield('content')
          @endisset

			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->


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
 @livewireScripts
</body>
</html>
