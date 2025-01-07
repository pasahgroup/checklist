<div>

            <div class="row container-fluid">
                <div class="col-xl-12 col-md-12">
                        <div class="">
                            <?php if($message): ?>
                            <div class="alert alert-danger">
                              <h5   class="text-center"><?php echo e($message); ?></h5>
                            </div>
                            <?php endif; ?>
                        </div>


 <div class="content d-flex flex-column flex-column-fluid" id="tc_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid">
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-white mb-0 px-0 py-2">
                        <li class="breadcrumb-item active" aria-current="page">Indicator Settings</li>
                         <li class="breadcrumb-item active" aria-current="page">Register Indicator Question:(RIQ)</li>
                    </ol>
                </nav>
            </div>
        </div>
        <hr>

                            <div class="card card-custom gutter-b bg-white border-0   table-contentpos">
                            <?php if(isset($metadatas)): ?>
                                <div class="card-body">

                                <div class="">

                                      <!-- <form wire:submit.prevent="storeProperty(2,3)"> -->
                                           <form  method="post"  action="<?php echo e(route('setIndicator.store')); ?>" enctype="multipart/form-data">
                             <?php echo csrf_field(); ?>

       <div class="form-group">
            <label class="text-dark" >Indicator Question</label>
                        <textarea type="text" name="question" id="question" class="form-control" maxlength="220" required></textarea>
        </div>


  <div class="form-group">
            <label class="text-dark">Metaname</label>
                        <select name="applied_to" id="applied_to" class="form-control" required>
                          <option value="">--- Select metaname to apply ---</option>

                         <?php $__currentLoopData = $metanames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $metaname): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <option value="<?php echo e($metaname->id); ?>"><?php echo e($metaname->metaname_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
  </div>

   <div class="form-group">
            <label class="text-dark" >Duration</label>
                        <select name="duration" id="duration" class="form-control" required>
                          <option value="">--- Select duration ---</option>
  <option value="Daily">Daily</option>
   <option value="Daily Morning">Daily Morning</option>
    <option value="Daily Afternoon">Daily Afternoon</option>
    <option value="Weekly">Weekly</option>
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
  </div>


      <div class="form-group">
            <label class="text-dark" >Question Type</label>
                        <select name="qns_type" id="qns_type" class="form-control" required>
                        <option value="">--- Select type of Question ---</option>

                          <option value="radio">Optional Qns</option>
                           <option value="checkbox">Checklist Qns</option>
                    </select>
      </div>


    <div class="form-group">
           <label class="text-dark" >Number of Options Answers</label>
                        <select wire:model="metaname_id" name="metaname_id" id="metaname_id" class="form-control" required>
                          <option value="">--- Select group name ---</option>
                              <option value="2">2</option>
                           <option value="3">3</option>
                              <option value="4">4</option>
                                  <option value="5">5</option>
                                   <option value="6">6</option>
                                      <option value="7">7</option>
                                       <option value="8">8</option>

            </select>
    </div>

                                        <input type="hidden" name="_method" value="post">
                                               <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                <!-- <input type="text" name="metaname_id" value="<?php echo e($metaname_id); ?>"> -->


                                               <table class="table table-responsive table-hover">
                                                   <thead>

                                                   </thead>
                                                   <tbody>
                                                        <?php if(isset($metaname_id) && $metaname_id>=1): ?>
                                                          <label>Select Status of the Optional Answer</label>
                                                           <?php endif; ?>
                                                           <?php for($i = 0; $i <$metaname_id; $i++): ?>
                                                             <tr>
                                                            <td>Answer<?php echo e($i); ?></td>
                                                            <td> <input type="text" name="names[]" required=""></td>
                                                            <?php echo e($qns_type); ?>


                          <td>  <select name="answer_class[]" id="answer_class" class="form-control" >
                              <option value="Good" style="background-color:green;">Good</option>
                              <option value="Bad" style="background-color:yellowGreen">Bad</option>
                              <option value="Maintenance-low" style="background-color:yellow">Maintenance-low</option>
                                    <option value="Maintenance-medium" style="background-color:#FFBF00;">Maintenance-medium</option>
                              <option value="Maintenance-high" style="background-color:red">Maintenance-high</option>
                              <option value="NA" style="background-color:lightblue">NA</option>

                              </select></td>

                                                          <?php endfor; ?>
                                                            <?php else: ?>
                                                            <td>
                                                                   <textarea name="names[]" required=""></textarea>
                                                             <td>
                                                            <?php endif; ?>

                                                           </td>
                                                       </tr>


                                                   </tbody>
                                               </table>

                                       </div>

<button  class="btn-sm btn btn-primary float-right" type="submit">Save <i class="fas fa-save"></i></button>
                                   </form>

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
<?php /**PATH C:\xampp\htdocs\checkmaster\resources\views/livewire/indicator.blade.php ENDPATH**/ ?>