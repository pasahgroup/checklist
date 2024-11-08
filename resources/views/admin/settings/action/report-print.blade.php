<!DOCTYPE html>
<html>
<body>

<div class="container right-container col-md-6" id="printableArea" style="display:block;">
    <span id="link7">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h3 id="school_title"><?php echo "Tanzania Specialist";?> </h3>
                <p><p>
                <p style="font-size: 1.1em;" id="exam_title">Annual Examination [ 2015-2016 ] <p>
                <div class="row">
                    <div class="col-md-4">
                        <div class="header-time-date-marks">
                            <span id="exam_time">Time: 12 AM - 2 PM</span>
                            <span id="exam_date">Date: 30/12/2016</span>
                        </div>
                    </div>
                    <div class="col-md-8 header-time-date-marks" style="text-align: right;padding-right: 36px;">
                        <span id="exam_marks">100 Marks</span>
                    </div>
                </div>
            </div>
        </div>
        <hr / id="line" style="margin-top: 13px;">
        <div class="row q-question-type-style" id='question_section'>
        </div>
    </span>
</div>

 <div> <h1>
 asdads
 </h1>
</div>


<button class="btn btn-default" onclick="printDiv('printableArea')"><i class="fa fa-print" aria-hidden="true" style=" font-size: 17px;">Print</i></button>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
}
</script>

</body>
</html>
