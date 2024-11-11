<div>
  <?php if($message): ?>
                            <div class="alert alert-danger">
                              <h5   class="text-center"><?php echo e($message); ?></h5>
                            </div>
                            <?php endif; ?>

 <div class="content d-flex flex-column flex-column-fluid" id="tc_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid">
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-white mb-0 px-0 py-2">
                        <li class="breadcrumb-item active" aria-current="page">Indicator Settings</li>
                         <li class="breadcrumb-item active" aria-current="page">Assign Indicators to Metaname:(AIM)</li>

                    </ol>
                </nav>
            </div>
        </div>
        <hr>

           <div class="row container-fluid">

                <div class="col-xl-6 col-md-6">
                  <h5 class="title font-weight-bold text-center">List of Metaname</h5>                    <div class="card card-custom gutter-b bg-white border-0">
                                                           <div class="card-body">

    <form  method="post"  action="<?php echo e(route('assign-indicator.store')); ?>" enctype="multipart/form-data">
                             <?php echo csrf_field(); ?>
    <input type="hidden" name="_method" value="post">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">


<div class="form-group">
   <?php if(isset($metanames)): ?>
    <div class="row">
         <div class="form-group">

      <label>Metaname</label>
                           <select name="metaname" id="metaname" class="form-control" required>
                             <option value="">--- Select metaname ---</option>
  <?php $__currentLoopData = $metanames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $metaname): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <option value="<?php echo e($metaname->id); ?>"><?php echo e($metaname->metaname_name); ?></option>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </select>


 </div>

   <div class="form-group">
    
               <label class="text-dark">Section</label>
                        <select name="section" id="section" class="form-control" required>
                          <option value="">--- Select section ---</option>
                          

        <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($session->session_name); ?>"><?php echo e($session->session_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
                     
   <!-- </div>
   <div class="form-group"> -->
    <!-- <?php echo e($deps); ?> -->
  <label>Department</label>
  <select name="depart" id="depart" class="form-control" required>
                           <option value="">--- Select deoartment ---</option>
                        <?php $__currentLoopData = $deps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $depart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <option value="<?php echo e($depart->id); ?>"><?php echo e($depart->unit_name); ?></option>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
   </div>
    </div>
   <?php endif; ?>
</div>


                                </div>
                                 </div>
                                 </div>




                <div class="col-xl-6 col-md-6">
                  <h5 class="title font-weight-bold text-center">List of Indicators/Qns</h5>                    <div class="card card-custom gutter-b bg-white border-0">
                                                           <div class="card-body">
<div class="form-group">
 <?php if(isset($indicators)): ?>
      <?php $__currentLoopData = $indicators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indicator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="row">
      <div class="col-xl-9 col-md-9"><?php echo e($indicator->qns); ?></div>
     <div class="col-xl-3 col-md-3"><input type="checkbox" name="indicators[]" value="<?php echo e($indicator->id); ?>"></div>
   </div>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <?php endif; ?>
</div>


                                </div>
                                <div class="wawa-bgcolor">
                                    <button  class="btn btn-dark float-right" type="submit">Appy</button>
                                 </div>
                                 </div>
                                 </div>


                                   </form>

                                </div>
                                 </div>
                                 </div>
                                 </div>


<script type="text/javascript">
  $(document).ready(function() {
$('.qnNo').materialSelect();
});
</script>

<script>
  $("#con_people").on( "click", function() {

   //var price = document.getElementById('the_id_of_the_textbox').value;
 var sum=0.00;
var p = $(this).val();
//
  // function numberWithCommas(n) {
  //   return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  //    }

var formatter = new Intl.NumberFormat('en-US', {
  style: 'currency',
  currency: 'USD',
});


    var p1=3000; //1 price per person
    var p2=2604;//2-3 price per person
    var p3=2254;//4-5 price per person
    var p4=2076;//6-7 price per person


if(p>0)
{

  if(p==1)
  {
   sum=p1*p;

  }
  else if(p==2 || p==3)
{
 sum=p2*p;
 }
  else if(p==4 || p==5)
{
 sum=p3*p;
 }
  else if(p==6 || p==7)
{
 sum=p4*p;
 }

sum=sum.toFixed(2);

//var val = parseFloat(sum);
sum= formatter.format(sum);
$('#total').val(sum);

}
else
{
    var v= $('#total').val(0.00);
}

});
</script>
</div>
<?php /**PATH C:\xampp\htdocs\checkmaster\resources\views/livewire/assign-indicator.blade.php ENDPATH**/ ?>