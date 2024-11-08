@extends('layouts.app')
@section('content')

   <!-- <script src="../../js/webcam.js" type="text/javascript"></script> -->

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
font-weight: bolder;manager
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

  @if($message?? '')
                            <div class="alert alert-danger">
                              <h5 class="text-center">{{ $message }}</h5>
                            </div>
@endif
<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
<div class="subheader py-2 py-lg-6 subheader-solid">
            <div class="container-fluid">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white mb-0 px-0 py-2">
                  <li class="breadcrumb-item active" aria-current="page">Checklist Master</li>
                  <li class="breadcrumb-item active" aria-current="page">Checklist</li>
                </ol>
              </nav>
            </div>
          </div>
          <hr/>
<div class="row container-fluid">
<div class="col-lg-12 col-md-12 col-sm-12">


         @isset($pp)
                                  <div class="card card-custom gutter-b bg-white border-0">
                                  <div class="card-body">

    <!-- Old form was placed here -->
Manager Dashboard: (manager inspection)
<div class="row">
 <div class="card-body"  style="background-color:#f6f7f2 !important">

  <script>
  // Set the date we're counting down to
  var countDownDate = new Date("Jan 5, 2029000 11:37:25").getTime();
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

<div class="row">
  <div class="form-group">
            <label class="text-dark">Metaname:: {{$metaname_id}}::{{$metanamess->metaname_name?? ''}}</label>
              <select  name="metaname_model" id="metaname_model" onchange="setMetanameFunction({{$metaname_id}})" onkeyup="setMetanameFunction({{$metaname_id}})"  class="form-control" required>
                          <option value="">--- Select section to apply ---</option>

          @isset($metanamess->metaname_name)
                          @if($metanamess->metaname_name !=NULL)
                          <option value="{{$metanamess->id}}" selected>{{$metanamess->metaname_name}}</option>
                          @endif
                          @endisset

                         @foreach($metanames as $metaname)
                         <option value="{{$metaname->id}}">{{$metaname->metaname_name}}</option>
                        @endforeach
              </select>
        </div>

  <div class="form-group">
       <form  method="GET"  action="{{ route('managers-inspection.index') }}" enctype="multipart/form-data">
            @csrf
           <input type="hidden" name="_method" value="GET">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <input type="hidden" name="metaname_id" id="metaname_id" value="{{$metaname_id}}">

          <label class="text-dark">Asset name with issues</label>
            <div class="form-group">
                      <select name="asset_model" id="asset_model" onchange="setAssetFunction({{$assetID}})"  class="form-control" required>
                          <option value="">--- Select Asset name to apply ---</option>

                          @isset($propertyID->asset_name)
                          @if($propertyID->asset_name !=NULL)
                          <option value="{{$propertyID->id}}" selected>{{$propertyID->asset_name}}</option>
                          @endif
                          @endisset

                         @foreach($assets as $asset)
                         <option value="{{$asset->id}}">{{$asset->asset_name}}</option>
                            @endforeach
                     </select>
                    <input type="hidden" name="assetID" id="assetID" value="{{$assetID}}" readonly>
                    <input type="hidden" name="assetIDf" id="assetIDf" value="{{$assetIDf}}">
    <br>
    <button  class="btn-sm btn btn-primary float-right" type="submit" name="ff" value="{{$assetID}}" id="ff" onclick="setButtonFunction('{{$assetID}}')">View</button>
    </div>
    </form>
    </div>
  </div>

<div class="col-lg-12 col-md-12 col-sm-12">
  <div class="" id="data_display">
  <div class="panel panel-default" style="background-color:#fff !important">
  @foreach ($pp as $p)
 <div class="row">
   <div class="col-md-12 col-sm-12">
    @if($p->metaname_id ==$metaname_id)
      <div class="panel-heading">
        <!-- <h5 class="panel-title"></h5> -->
         <div class="" data-toggle="collapse" href="#collapse{{$p->id}}" id="pid{{$p->id}}" class="panel-group btn-sm" onclick="setPropertyFunction({{$p->id}})" onkeyup ="setPropertyFunction({{$p->id}})" style="background-color:#63886c !important">
<div class="row">
@if($qnsCount->where('metaname_id',$metaname_id)->where('asset_id',$p->id)->count()>0)

    <div class="col-lg-12 col-md-12 col-sm-12" style="color: #fff">
      {{$p->asset_name}}

<span class="float-right">Asset qns:{{$qnsCount->where('metaname_id',$metaname_id)->where('asset_id',$p->id)->count()}} |</span>
<span class="float-right">
@foreach ($checkQnsProp as $chkp)
@if($p->id ==$chkp->asset_id)
<input type="checkbox"  onclick="myFunctionxx()" id="statusx" name="statusx" value="0" @if ($p->id==$chkp->asset_id) checked @endif> | ({{ number_format(($answerPerc->where('metaname_id',$chkp->metaname_id)->where('asset_id',$chkp->asset_id)->count())/($qnsAppliedPerc->where('metaname_id',$chkp->metaname_id)->count())*100),2}})%
@endif
@endforeach
</span>
</div>
@endif
</div>
 </div>
              <!-- Start of Asset loop -->
  <div wire:ignore.self id="collapse{{$p->id}}" class="panel-collapse collapse">

 @foreach ($sections as $section)
 @if($section->metaname_id==$p->metaname_id && $section->section !="")
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel-heading">

<div class="" data-toggle="collapse" href="#collapp{{$p->id}}_{{$section->section}}" id="" class="panel-group btn-sm" onclick="setSectionFunction({{$p->id}},{{$section->id}},'{{$section->section}}')" onkeyup ="setSectionFunction({{$p->id}},{{$section->id}},'{{$section->section}}')" style="background-color:#dfd6c4 !important; border: 1px solid yellowgreen;">


@if($qnsCount->where('metaname_id',$metaname_id)->where('asset_id',$p->id)->where('section',$section->section)->count()>0)
                <div class="row">
                  <div class="col-lg-10 col-md-10 col-sm-10" style="color: #black">
 <span style="background-color:#">{{$section->section}}</span>

<span class="float-right">Section qns:{{$qnsCount->where('metaname_id',$metaname_id)->where('asset_id',$p->id)->where('section',$section->section)->count()}} |</span>
 <span class="float-right">
 @foreach ($checkQnsProp as $chkp)
 @if($p->id ==$chkp->asset_id)
 <input type="checkbox"  onclick="myFunctionxx()" id="statusx" name="statusx" value="0" @if ($p->id==$chkp->asset_id) checked @endif> | ({{ number_format(($answerPerc->where('metaname_id',$chkp->metaname_id)->where('asset_id',$chkp->asset_id)->where('section',$section->section)->count())/($qnsAppliedPerc->where('metaname_id',$chkp->metaname_id)->where('section',$section->section)->count())*100),2}})%
 @endif
 @endforeach
 </span>
</div>
</div>
@endif
</div>

  <!-- <div class="" data-toggle="collapse" href="#collapccc" id="" class="panel-group btn-sm" style="background-color:#718275 !important"> -->
<div wire:ignore.self id="collapp{{$p->id}}_{{$section->section}}" class="panel-collapse collapse">
<!-- <div wire:ignore.self id="collapse{{$p->id}}" class="panel-collapse collapse"> -->
<!-- TEst form here -->
<form  method="post"  action="{{ route('managers-inspection.store') }}" enctype="multipart/form-data">
                      @csrf
<input type="hidden" name="_method" value="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="property_id" id="property_id" value="{{$property_id}}">

<input type="hidden" name="qnID" id="qnID" value="">
<input type="hidden" name="meta" id="meta" value="{{$asset->id}}">
<!-- <input type="hidden" name="qnAID[]" id="qnAID" value=""> -->
<input type="hidden" name="aID" id="aID{{$p->id}}_{{$section->id}}" value="{{$p->id}}">

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
       @foreach ($qns as $qn )
       @if($p->metaname_id ==$qn->metaname_id && $qn->section==$section->section && $qn->asset_id==$p->id)
       <!-- <input type="text" name="aID" id="aID{{$qn->id}}" value="{{$qn->id}}"> -->

       <div class="panel-group btn-sm" style="background-color:#d9c7a8 !important"><b> {{$p->id}}:{{$qn->id}}: {{$qn->section}} </b>: {{ $qn->qns  }}</div>
            <div class="form-group card">
<span  @if($qn->answer_label =="no_value")
 style="background-color:#caee47"
 @endif

 @if($qn->answer_label =="Low")
  style="background-color:#caee47"
  @endif
 @if($qn->answer_label =="Medium")
 style="background-color:yellow"
 @endif

 @if($qn->answer_label =="High")
 style="background-color:#fc6c85"
 @endif
 >

  Answer: {{$qn->answer}}({{$qn->answer_label}}):{{$qn->opt_answer_id}}   |   Proposed answer:({{$qn->description}})
  <select name="idx{{$p->id}}_{{$qn->id}}_{{$metaname_id}}_{{$qn->opt_answer_id}}_{{$qn->indicator_id}}_{{$p->id}}_{{$section->id}}_{{$metaname_id}}[]" id="indicator_id"  onclick="setQnFunction({{$p->id}},{{$qn->id}})" onkeyup="setQnFunction({{$p->id}},{{$qn->id}})" class="form-control">
    <option value="">-- Action --</option>
    <option>Cleared</option>
    <option>Not cleared</option>
      <option>Action required</option>
 </select>
</span>
</div>

      <div class="panel-heading">
        <h4 class="panel-title"> <div class="card"><a data-toggle="collapse" href="#collapsee{{$p->id}}{{$qn->id}}">Description if any</a>
       </div>
      </div>
      <div id="collapsee{{$p->id}}{{$qn->id}}" class="panel-collapse collapse">

  <textarea rows="4" cols="40" id="desc" name="desc{{$p->id}}_{{$qn->id}}_{{$metaname_id}}_{{$qn->opt_answer_id}}_{{$qn->indicator_id}}_{{$p->id}}_{{$section->id}}_{{$metaname_id}}[]" placeholder="---enter description if any---" class="form-control" style="white-space: normal;overflow:hidden" maxlength="680">
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
        <h4 class="panel-title"> <div class="card">   <a data-toggle="collapse" href="#collap{{$p->id}}{{$qn->id}}">Photo if any</a>
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
<input type="file" name="attachment{{$p->id}}_{{$qn->id}}_{{$metaname_id}}_{{$qn->opt_answer_id}}_{{$qn->indicator_id}}_{{$p->id}}_{{$section->id}}_{{$metaname_id}}[]" accept="image/*" capture="camera">


                                </div>
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
           @if ($checkq->answer_value!=null) checked @endif
           @endif
           @endforeach
           >
           </label>
</div>

</div>
</div>
   @endif
   @endforeach
<div class="row">
 <div class="col-md-11 col-sm-11">
 <div class="wawa-bgcolor">
    <button  class="btn-sm btn btn-secondary float-right" type="submit" name="save" value="{{$p->id}}_{{$section->id}}_{{$metaname_id}}">Save</button>
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

         @endforeach
             </div>
              </div>
                </div>
<hr/>
             <button class="btn-sm btn btn-dark float-right" role="button" name="email_send" value="email_send">Finish</button>
             {{-- <button  class="btn-sm btn btn-secondary float-right" type="submit" name="save" value="{{$p->id}}_{{$section->id}}">Save{{$p->id}}_{{$section->id}}</button>  --}}

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
 var v1=document.getElementById(status).value;

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

  var sum_amount = 0;
  $('#'+urv+'').each(function(){
    sum_amount +=$(this).val();

  })
}

function numberWithCommas(n) {
    return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
     }

</script>

<!-- <script language="JavaScript"> -->
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

<script type="text/javascript">
function setAssetFunction(id) {
  var elementA = document.getElementById("asset_model").value;
  var elementOld = document.getElementById("assetIDf").value;
  //alert(elementA);
  //   alert(elementOld);
$('#assetID').val(elementA);

if(elementA==elementOld){
        document.getElementById("data_display").style.display = "block";
}
else{document.getElementById("data_display").style.display = "none";}
}

function setButtonFunction(id) {
  var elementB = document.getElementById("ff").value;
  document.getElementById("data_display").style.display = "block";
//$('#assetID').val(element);
}
</script>
<!-- <script type="text/javascript" src="../js/activityManagerdata.js"></script> -->
<script type="text/javascript" src="../../js/jquery.js"></script>

<script type="text/javascript">
  function setMetanameFunction(id) {
    //alert(id);
    var elementM = document.getElementById("metaname_model").value;
 $('#metaname_id').val(elementM);
         document.getElementById("data_display").style.display = "none";
  }
</script>

    @endsection
