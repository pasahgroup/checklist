@extends('layouts.app')
@section('content')

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script> -->
   <script src="../../js/webcam.js" type="text/javascript"></script>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> -->

  <style>
#bot {
color: #eeeeee;
background: #1fa0e4;
background: -webkit-linear-gradient(#1fa0e4, #1992d1);
background: -moz-linear-gradient(#1fa0e4, #1992d1);
background: -o-linear-gradient(#1fa0e4, #1992d1);
background: -ms-linear-gradient(#1fa0e4, #1992d1);
background: linear-gradient(#1fa0e4, #1992d1);
}
#bot > h4:hover{
font-weight: bolder;
text-decoration: none;
}

#bot .panel-heading:hover {

color: #333333;
background: blue ;
padding-left: 45px;
border-color: #dddddd;

}
</style>

	<link href="../../../css/bootstrap335.css" rel="stylesheet" type="text/css" />
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->

<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
<!-- <div class="subheader py-2 py-lg-6 subheader-solid">
            <div class="container-fluid">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white mb-0 px-0 py-2">
                  <li class="breadcrumb-item active" aria-current="page">Checklist Master</li>
                  <li class="breadcrumb-item active" aria-current="page">Checklist</li>
                </ol>
              </nav>
            </div>
          </div> -->
          <hr/>
<div class="row container-fluid">
<div class="col-lg-12 col-md-12 col-sm-12">

            @isset($metadatas)
                                  <div class="card card-custom gutter-b bg-white border-0">
                                  <div class="card-body">

    <!-- Old form was placed here -->
Department Name: <i>{{$departGetName->department_name}}</i> | Unit name: <i>{{$departGetName->unit_name}}
<div class="row">
 <div class="card-body"  style="background-color:#f6f7f2 !important"></i>
<!-- <label class="text-dark" ><b>Indicator Questions :<i style="color:#f6f7f4">(Metaname : {{$metaAll}})</i></b> -->
  <label class="text-dark" ><b>Indicator Questions :<i style="color:#f6f7f4">(Metaname : {{$metaAll}})</i></b>
<!-- <p id="demo"></p> -->
  <script>
  // Set the date we're counting down to
  var countDownDate = new Date("Jan 5, 20290 11:37:25").getTime();
  //var countDownDate = new date("D m,Y H:i:s").getTime();
  // Update the count down every 1 second
  var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Output the result in an element with id="demo"
     document.getElementById("demo").innerHTML = now + "d";

    // document.getElementById("demo").innerHTML = hours + "h "
    // + minutes + "m " + seconds + "s ";

    // If the count down is over, write some text
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("demo").innerHTML = "TIME EXPIRED";
    }
  }, 1000);
  </script>
</label>

  <div class="panel panel-default" style="background-color:#fff !important">    <!-- /Start new  -->

    @foreach ($metas as $meta)
    <h6 class="panel-title"></h6>
    <div class="card" data-toggle="collapse" href="#meta_{{$meta->id}}" id="pid{{$meta->id}}" class="panel-group btn-sm" onclick="setPropertyFunction({{$meta->id}})" onkeyup ="setPropertyFunction({{$meta->id}})" style="background-color:#718275 !important">
    <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12" style="color: #fff">
    {{ $meta->metaname_name }}
  <!-- </div>
  <div class="col-lg-2 col-md-2 col-sm-2" style="color: #fff"> -->
    <span class="float-right">Progress: <b style="color:#9af219">{{number_format($answerCount->where('metaname_name',$meta->metaname_name)->count()/$totalqns->where('metaname_name',$meta->metaname_name)->count()*100),1}}% </b></span>
  </div>
    <!--  -->
    </div>
    </div>
    <!-- {{$pp}} -->
  @foreach ($pp as $p)
    <div wire:ignore.self id="meta_{{$meta->id}}" class="panel-collapse collapse">
 <div class="row">
   <div class="col-md-12 col-sm-12">
    @if($p->metaname_id ==$meta->id)
      <div class="panel-heading">
        <!-- <h5 class="panel-title"></h5> -->
         <div class="" data-toggle="collapse" href="#collapse{{$p->id}}" id="pid{{$p->id}}" class="panel-group btn-sm" onclick="setPropertyFunction({{$p->id}})" onkeyup ="setPropertyFunction({{$p->id}})" style="background-color:#718275 !important">

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12" style="color: #fff">
      {{$p->asset_name}}

<!-- </div>
  <div class="col-lg-2 col-md-2 col-sm-2" style="color: #fff"> -->
<!-- </div>
<div class="col-lg-2 col-md-2 col-sm-2"> -->
<span class="float-right">
@foreach ($checkQnsProp as $chkp)
@if($p->id ==$chkp->asset_id)
<input type="checkbox"  onclick="myFunctionxx()" id="statusx" name="statusx" value="0" @if ($p->id==$chkp->asset_id) checked @endif> | ({{ number_format(($answerPerc->where('metaname_id',$chkp->metaname_id)->where('asset_id',$chkp->asset_id)->count())/($qnsAppliedPerc->where('metaname_id',$chkp->metaname_id)->count())*100),2}})%
@endif
@endforeach
</span>
  </div>
</div>

    <input type="hidden" name="prop[]" value="{{$p->id}}">
       </div>
        <!-- </div> -->

      <!-- Start of Asset loop -->
  <div wire:ignore.self id="collapse{{$p->id}}" class="panel-collapse collapse">

 @foreach ($sections as $section)
 @if($section->metaname_id==$p->metaname_id)
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel-heading">


<div class="" data-toggle="collapse" href="#collapp{{$p->id}}_{{$section->section}}" id="" class="panel-group btn-sm" onclick="setSectionFunction({{$p->id}},{{$section->id}},'{{$section->section}}')" onkeyup ="setSectionFunction({{$p->id}},{{$section->id}},'{{$section->section}}')" style="background-color:#dfd6c4 !important">

                <div class="row">
                  <div class="col-lg-10 col-md-10 col-sm-10" style="color: #black">
 <span style="background-color:#">{{$section->section}} </span>

 <span class="float-right">
 @foreach ($checkQnsProp as $chkp)
 @if($p->id ==$chkp->asset_id)
 <input type="checkbox"  onclick="myFunctionxx()" id="statusx" name="statusx" value="0" @if ($p->id==$chkp->asset_id) checked @endif> | ({{ number_format(($answerPerc->where('metaname_id',$chkp->metaname_id)->where('asset_id',$chkp->asset_id)->where('section',$section->section)->count())/($qnsAppliedPerc->where('metaname_id',$chkp->metaname_id)->where('section',$section->section)->count())*100),2}})%
 @endif
 @endforeach
 </span>
</div>
</div>
</div>

<!-- <div wire:ignore.self id="collapsexxx" class="panel-collapse collapse"> -->

               <!-- <div class="form-group card">
                 <div class="row">

    </div>
  </div> -->
  <!-- <div class="" data-toggle="collapse" href="#collapccc" id="" class="panel-group btn-sm" style="background-color:#718275 !important"> -->
  <div wire:ignore.self id="collapp{{$p->id}}_{{$section->section}}" class="panel-collapse collapse">
<!-- <div wire:ignore.self id="collapse{{$p->id}}" class="panel-collapse collapse"> -->
<!-- TEst form here -->
<form  method="post"  action="{{ route('checklist.store') }}" enctype="multipart/form-data">
                      @csrf
<input type="hidden" name="_method" value="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="property_id" id="property_id" value="{{$property_id}}">



<input type="hidden" name="qnID" id="qnID" value="">
<input type="hidden" name="qnAID[]" id="qnAID" value="">
<input type="hidden" name="aID" id="aID{{$p->id}}_{{$section->id}}" value="{{$p->id}}">
<input type="hidden" name="section_name{{$p->id}}_{{$section->id}}" id="section_name{{$p->id}}_{{$section->id}}">


<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
            <!-- {{$qns}} -->
       @foreach ($qns as $qn )
       @if($p->metaname_id ==$qn->metaname_id && $qn->section==$section->section)
              <div class="panel-group btn-sm" style="background-color:#d9c7a8 !important"><b> {{$p->id}}:{{$qn->id}}: {{$qn->section}} </b>: {{ $qn->qns  }}</div>
            <div class="form-group card">
              <div class="row">
       @foreach ($metadatas as $metadata)
           @if($metadata->indicator_id ==$qn->id)

          <div class="col-xl-3 col-md-3 col-sm-3">
          <label>{{$metadata->answer}}</label>
           @if($metadata->datatype=="checkbox")
          <input type="{{$metadata->datatype}}" name="ids{{$p->id}}[]" id="indicator_id" value="{{$metadata->id}}" onclick="myFunction({{$qn->id}})" onkeyup="myFunction({{$qn->id}})"
             @foreach ($checkQns as $checkq)
              @if($p->id ==$checkq->asset_id && $checkq->indicator_id==$qn->id && $metadata->answer==$checkq->answer)
           @if ($p->id ==$checkq->asset_id && $checkq->indicator_id ==$qn->id && $metadata->answer==$checkq->answer) checked @endif
          @endif
           @endforeach
        >
       @endif
           @if($metadata->datatype=="radio")
          <input type="{{$metadata->datatype}}" name="idx{{$p->id}}_{{$qn->id}}_{{$meta->id}}_{{$p->id}}_{{$section->id}}[]" id="indicator_id" value="{{$metadata->id}}" onclick="setQnFunction({{$p->id}},{{$qn->id}})" onkeyup="setQnFunction({{$p->id}},{{$qn->id}})"
             @foreach ($checkQns as $checkq)
              @if($p->id ==$checkq->asset_id && $checkq->indicator_id ==$qn->id && $metadata->id==$checkq->opt_answer_id)
           @if ($p->id ==$checkq->asset_id && $checkq->indicator_id ==$qn->id && $metadata->id==$checkq->opt_answer_id) checked @endif
          @endif
           @endforeach
           >

         @endif
         </div>

           @endif
    @endforeach
     </div>
</div>


      <div class="panel-heading">
        <h4 class="panel-title"> <div class="cardx"><a data-toggle="collapse" href="#collapsee{{$p->id}}{{$qn->id}}">Description if any</a>
       </div>
      </div>
      <div id="collapsee{{$p->id}}{{$qn->id}}" class="panel-collapse collapse">

  <textarea rows="4" cols="40" id="desc" name="desc{{$p->id}}_{{$qn->id}}_{{$meta->id}}_{{$p->id}}_{{$section->id}}[]" placeholder="---enter description if any---" class="form-control" style="white-space: normal;overflow:hidden" maxlength="680">
      @foreach ($checkQns as $checkq)
  @if($p->id ==$checkq->asset_id && $checkq->indicator_id ==$qn->id && $checkq->property_id ==$p->property_id)
   @if($checkq->description !=null)
    {{$checkq->description}}
    @endif
  @endif
@endforeach
  </textarea>
          </div>

    <div class="panel-heading">
        <h4 class="panel-title"> <div class="cardx">   <a data-toggle="collapse" href="#collap{{$p->id}}{{$qn->id}}">Photo if any</a>
       </div>
    </div>

      <div class="row">
        <div class="col-lg-10 col-md-10 col-sm-10">
      <div id="collap{{$p->id}}{{$qn->id}}" class="panel-collapse collapse">
     <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                              <div class="form-group">
                            <!-- start webcam -->
<div id="my_camera{{$p->id}}_{{$qn->id}}"></div>
<br/>
<input type="file" name="attachment{{$p->id}}_{{$qn->id}}_{{$meta->id}}_{{$p->id}}_{{$section->id}}[]" accept="image/*" capture="camera">
<!-- <input type="text" name="vv" value="{{$p->id}}_{{$qn->id}}"> -->
<!-- <input type=button value="Take Photo" onClick="take_snapshot({{$p->id}},{{$qn->id}})"> -->
<!-- <input type="hidden" name="image" class="image-tag"> -->

<!-- End -->

                                </div>
                                </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
          <!-- <input type="hidden" name="attachmentp{{$p->id}}_{{$qn->id}}[]" class="image-tag"> -->
            <!-- <div id="result{{$p->id}}_{{$qn->id}}">Image will appear here...</div> -->

            <!-- <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">
              </div>

              <img src=" @foreach ($checkQns as $checkq)
  @if($p->id ==$checkq->asset_id && $checkq->indicator_id ==$qn->id && $checkq->property_id ==$p->property_id)
   @if($checkq->photo !=null)
    {{$checkq->photo}}
    @endif
  @endif
      @endforeach " onClick="triggerClick()" id="profileDisplay">
            </span> -->
</div>
</div>

      </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2">

      <div class="form-group">
            <label class="radio-inline">Ready:
               <input type="checkbox"  onclick="myFunction()" id="status" name="status" value="0" disabled="true"

              @foreach ($checkQns as $checkq)
              @if($p->id ==$checkq->asset_id && $checkq->indicator_id ==$qn->id)
      checked
           @endif
           @endforeach
           >
           </label>
</div>

<input type="hidden" name="col" value="{{$col}}">
</div>
</div>
<a href="#" class="previous">&laquo; Previous</a>
<a href="#" class="next">Next &raquo;</a>
<div class="btn-container">
    <button class="pre" onclick="previous()">Previous</button>
    <button class="next" onclick="next()">Next</button>
</div>
   @endif
   @endforeach

<div class="row">
 <div class="col-md-11 col-sm-11">
 <div class="wawa-bgcolor">
                  <button  class="btn-sm btn btn-secondary float-right" type="submit" name="save" value="{{$p->id}}_{{$section->id}}">Save</button>
 </div>
</div>
<hr>
</div>

   </div>
   </div>


  </div>
  </div>

</div>
</div>
 @endif
  @endforeach
</div>

</div>
<!-- End of asset loop -->


 @endif
</div>
</div>
</div>
       @endforeach
         @endforeach
             </div>
<hr/>
<x-jet-button type="submit" class="btn-sm btn btn-secondary float-right" name="email_send" value="email_send">
    {{ __('Finish') }}
</x-jet-button>


         <button class="btn-sm btn btn-dark float-right" role="button" name="email_send" value="email_send">Finish</button>
               <button  class="btn-sm btn btn-secondary float-right" type="submit" name="save" value="{{$p->id}}_{{$section->id}}">Save{{$p->id}}_{{$section->id}}</button>

           </div>
           </div>
   <div class="row">
     <div class="col-md-6 col-sm-6">
     </div>

</div>
      @endisset
  </form>
               </div>
                            </div>
                            </div>


<script type="text/javascript">
  $(document).ready(function() {
$('.qnNo').materialSelect();
});
</script>

<script>
const ages = [3, 10, 18,42, 20];

document.getElementById("demo").innerHTML = ages.findIndex(checkAge);

function checkAge(age) {
  return age >18;
}
</script>

<script type="text/javascript" src="../../js/jquery.js"></script>

<script>
     function numberWithCommas(n) {
    return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
     }

$('.toggle-class').on('change',function(){
    let status = $(this).prop('checked') == true ? true : false;
    let grader_id = $(this).data('id');

let status=4;
alert(status);

 $('#'+status+'').val(200);


    $.ajax({
       type:'POST',
       dataType:'json',
       url:"{{ route('checklistx.store') }}", // add your earlier created route here
       data:{'grade': status, 'grade_id': grader_id},
       success: function(data){
        console.log('success');
         alert('passed');
     }
   });


});
</script>

<script type="text/javascript">
  function setSectionFunction(aid,sid,ssn) {
 // alert(aid);
   //alert(sid);
 //    alert(ssn);
 var section_name="section_name"+(aid)+'_'+(sid);
  var aID="aID"+(aid)+'_'+(sid);
 //alert(section_name);
 //$('#section_name').val(ssn);
  $('#'+section_name+'').val(ssn);
    $('#'+aID+'').val(aid);
  }
</script>

<script type="text/javascript">
function setMetaFunction(id) {
  //alert(id);
$('#metavv').text(id);
}
  function setPropertyFunction(id) {
     //alert(id);
 $('#aID').val(id);
  }


   function setQnFunction(pID,qID) {
      const arrT=[];
    //alert(pID);
     //alert(qID);
     //document.getElementById("demo").innerHTML = cars;
     var variables=document.getElementById('qnAID').value;

  //alert(variables);
const fruits = new Array('Apple', 'Banana');
 //alert(fruits);
//const fruits =[];
//document.getElementById("demo").innerHTML = cars;
//sarrT=fruits.push(qID);
//console.log(fruits.length);
 //alert(fruits);

 $('#qnAID').val(fruits);
  // alert(fruits);
 $('#qnID').val(qID);
  }
</script>



<script>
     function numberWithCommas(n) {
    return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
     }

function myFunction(id) {
     //
//var id;
  // let status = $(this).prop('checked') == true ? true : false;
  //   let grader_id = $(this).data('id');
//alert(id);
//let status="status";
//alert(status);



 var v1=document.getElementById(status).value;
 //alert(v1);
   //  $.ajax({
   //     type:'POST',
   //     dataType:'json',
   //     url:"{{ route('checklistx.store') }}", // add your earlier created route here
   //     data:{'grade': 43, 'grade_id': 20},
   //     success: function(data){
   //      console.log('success');
   //       alert('passed');
   //   }
   // });

  var urv="ur_"+(id);
    var upv="up_"+(id);
    var anQty="qty"+(id);
      var antQty="tqty"+(id);
    var aprice="price_"+(id);
      var asubtotal="subtotal_"+(id);

    var ur=document.getElementById(urv).value;
     var up=document.getElementById(upv).value;
     var unitPrice=document.getElementById(aprice).value;
    var StoreQty=document.getElementById(antQty).value;


 var soldQty=numberWithCommas((ur*up).toFixed(2));
if(ur>=0 && up>=0)
{
//var soldQty=numberWithCommas((ur*up));
var subtotal=(unitPrice*soldQty).toFixed(2);
   //totalCost +=subtotal;

 if(Number(soldQty)<=Number(StoreQty))
 {
  $('#'+anQty+'').val(soldQty);
  $('#'+asubtotal+'').val(subtotal);

}
else
{
    alert('Sold Quantity exceed the available Stock:'+ StoreQty);
    $('#'+urv+'').val(0);
    $('#'+upv+'').val(0);
     $('#'+anQty+'').val(0.00);
     $('#'+asubtotal+'').val(0.00);

  }
}

  var sum_amount = 0;
  $('#'+urv+'').each(function(){
    sum_amount +=$(this).val();

  })
}

function numberWithCommas(n) {
    return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
     }

 //     function sum()
 //     {
 //        $('.amount').each(function(){
 //            alert('df');
 //    //if statement here
 //    // use $(this) to reference the current div in the loop
 //    //you can try something like...
 //    // if(condition){
 //    // }
 // });
 //     }
</script>
<script language="JavaScript">
<script type="text/javascript">
    Webcam.set({
        width: 250,
        height: 250,
        image_format: 'jpeg',
        jpeg_quality: 90
    });


    //Webcam.attach( '#my_camera59');
    function take_snapshot(p,qn) {
    var dashcanten=(p)+'_'+(qn);
      var result="result"+(dashcanten);
     // alert(result);
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById(result).innerHTML = '<img src="'+data_uri+'"/>';
        });

var my_camera="my_camera"+(dashcanten);
        // Webcam.attach( '#my_camera59');
        Webcam.attach('#'+my_camera+'');
    }
</script>

<script>

    let children = document.querySelector('ul').children;
    let i = 0;

    children[i].classList.add('selected');// Item default selection

    function resetClass() {
        for (let j = 0; j < children.length; j++) {
            children[j].classList.remove('selected');
        }
    }

    function next() {
        if (i >= children.length - 1) {
            return false;
        }
        resetClass();
        i++;
        children[i].classList.add('selected')
    }

    function previous() {
        if (i <= 0) {
            return false;
        }
        resetClass();
        i--;
        children[i].classList.add('selected')
    }
</script>
@endsection
