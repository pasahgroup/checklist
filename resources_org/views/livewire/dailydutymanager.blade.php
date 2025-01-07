@extends('layouts.app')
@section('content')
   <!-- <script src="../../js/webcam.js" type="text/javascript"></script> -->

  <style>
  #Yes {
  background-color: green;
  color:white;
}
#No {
    background-color:#dbf227;
}

#Maintenance {
  background-color:#fc6c85;
}
#Critical {
  background-color: Red;
}
#NA {
  background-color: Gray;
  color:white;
}

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
.txtarea{
    border-right: 1px solid #ddd;
    border-top: 1px solid #ddd;
    border-left: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
    width:100%;
    background: #fff;
}
</style>

<!-- <script type="text/javascript" src="../js/activitydata.js"></script> -->
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery311.min.js"></script>

  <link href="../../../css/bootstrap335.css" rel="stylesheet" type="text/css" />
  @if($message?? '')
                            <div class="alert alert-danger">
                              <h5 class="text-center">{{ $message }}</h5>
                            </div>
@endif
<div class="content d-flex flex-column flex-column-fluid" id="tc_content">

<div class="row container-fluid">
<div class="col-lg-12 col-md-12 col-sm-12">
  <div class="card card-custom gutter-b bg-white border-0">
  <div class="card-body">
  </div>


          @isset($metanames)
                                  <div class="card card-custom gutter-b bg-white border-0">
                                  <div class="card-body">

    <!-- Old form was placed here -->
  DAILY MANAGER DUTIES QUESTIONNAIRE
<div class="">
 <div class="card-body"  style="background-color:#f6f7f2 !important"></i>

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
    <!-- {{$metanames}} -->
            <label class="text-dark">Metaname:: {{$metaname_id}}::{{$metanamess->metaname_name?? ''}}</label>
              <select  name="metaname_model" id="metaname_model" onchange="setMetanameFunction({{$metaname_id}})" onkeyup="setMetanameFunction({{$metaname_id}})"  class="form-control" required>
                          <option value="">--- Select metaname to apply ---</option>

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
       <form  method="GET"  action="{{ route('daily-duty-manager.index') }}" enctype="multipart/form-data">
            @csrf
           <input type="hidden" name="_method" value="GET">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <input type="hidden" name="metaname_id" id="metaname_id" value="{{$metaname_id}}">

          <label class="text-dark">Asset name</label>
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
 
 <div class="row" id="data_display">
    @isset($assets)
    @if(!empty($selectedOption))
       @foreach ($sections as $section)
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="panel-heading">

    <div class="" data-toggle="collapse" href="#collapp{{$metaname_id}}_{{$section->section}}" id="" class="panel-group btn-sm" onclick="setSectionFunction('{{$metaname_id}}','{{$section->section}}')" onkeyup ="setSectionFunction('{{$metaname_id}}','{{$section->section}}')" style="background-color:#dfd6c4 !important">
                    <div class="row">
                      <div class="col-lg-10 col-md-10 col-sm-10" style="color: #black">
   @if($section->section !="")
     <span style="background-color:#">{{$section->section}}:{{$section->metaname_id}}</span>

  <span class="float-right">

   @foreach ($checkQnsProp as $chkp)
        @if($selectedOption ==$chkp->asset_id && $qnsAppliedPerc->where('metaname_id',$chkp->metaname_id)->where('section',$section->section)->count()>0)
      {{$answerPerc->where('metaname_id',$chkp->metaname_id)->where('asset_id',$chkp->asset_id)->where('section',$section->section)->count()}} | {{$qnsAppliedPerc->where('metaname_id',$chkp->metaname_id)->where('section',$section->section)->count()}}
     <input type="checkbox"  onclick="myFunctionxx()" id="statusx" name="statusx" value="0" @if ($selectedOption==$chkp->asset_id) checked @endif> | ({{ number_format(($answerPerc->where('metaname_id',$chkp->metaname_id)->where('asset_id',$chkp->asset_id)->where('section',$section->section)->count())/($qnsAppliedPerc->where('metaname_id',$chkp->metaname_id)->where('section',$section->section)->count())*100),2}})%
     @endif
     @endforeach
  </span>
  @endif
    </div>
    </div>
    </div>

      <!-- <div class="" data-toggle="collapse" href="#collapccc" id="" class="panel-group btn-sm" style="background-color:#718275 !important"> -->
      <div wire:ignore.self id="collapp{{$metaname_id}}_{{$section->section}}" class="panel-collapse collapse">
    <!-- <div wire:ignore.self id="collapse{{$metaname_id}}" class="panel-collapse collapse"> -->
    <!-- TEst form here -->
    <form  method="post"  action="{{ route('daily-duty-manager.store') }}" enctype="multipart/form-data">
        @csrf
    <input type="hidden" name="_method" value="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

 <input type="hidden" wire.model="metaname_id" name="metaname_id" id="metaname_id" value="{{$metaname_id}}">
 <input type="hidden" wire.model="propertyID" name="propertyID" id="propertyID" value="{{$propertyID->property_id}}">
 <input type="hidden" name="assetID" id="assetID" value="{{$selectedOption}}">

    <!-- <input type="hidden" name="qnID" id="qnID" value=""> -->
    <!-- <input type="hidden" name="qnAID[]" id="qnAID" value=""> -->
    <input type="hidden" name="aID" id="aID{{$metaname_id}}_{{$section->section}}" value="{{$metaname_id}}">
    <!-- <input type="hidden" name="section_name{{$metaname_id}}_{{$section->section}}" id="section_name{{$metaname_id}}_{{$section->section}}"> -->

    <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
  


           @foreach ($qns as $qn)
           @if($metaname_id ==$qn->metaname_id && $qn->section==$section->section)
         
                          <div class="form-group card">
                          <div class="panel-group btn-sm" style="background-color:#c0e3c4 !important"><b> {{$metaname_id}}:{{$qn->id}}: {{$qn->section}} </b>: {{ $qn->qns  }}</div>

          <div class="row-card">
           @foreach ($metadatasCollects->where('indicator_id',$qn->id) as $metadata)
           @if($metadata->indicator_id ==$qn->id)

              <div class="col-xl-3 col-md-3 col-sm-3" id="{{$metadata->answer}}">
            
               @if($metadata->datatype=="checkbox")
              <input type="{{$metadata->datatype}}" name="ids{{$metaname_id}}[]" id="indicator_id" value="{{$metadata->id}}" onclick="myFunction('{{$qn->id}}')" onkeyup="myFunction('{{$qn->id}}')"
                 @foreach ($checkQns as $checkq)
                                   @if($selectedOption ==$checkq->asset_id && $checkq->indicator_id==$qn->id && $metadata->answer==$checkq->answer)
               @if ($selectedOption ==$checkq->asset_id && $checkq->indicator_id ==$qn->id && $metadata->answer==$checkq->answer) checked @endif
              @endif
               @endforeach
            >
           @endif

               @if($metadata->datatype=="radio")
              <input type="{{$metadata->datatype}}" name="idx{{$metaname_id}}_{{$qn->id}}_{{$metaname_id}}_{{$section->section}}[]" id="idx{{$metaname_id}}_{{$qn->id}}_{{$metaname_id}}_{{$section->section}}" value="{{$metadata->id}}" onclick="myFunctionMaintenance('{{$metaname_id}}','{{$qn->id}}','{{$section->section}}','{{$metadata->answer}}')" onkeyup="myFunctionMaintenance('{{$metaname_id}}','{{$qn->id}}','{{$section->section}}','{{$metadata->answer}}')"

                 @foreach ($checkQns as $checkq)
                  @if($selectedOption ==$checkq->asset_id && $checkq->indicator_id ==$qn->id && $metadata->id==$checkq->opt_answer_id)
               @if ($selectedOption ==$checkq->asset_id && $checkq->indicator_id ==$qn->id && $metadata->id==$checkq->opt_answer_id) checked
              @endif
               @if($metadata->answer=="Maintenance")
               <br>
               @isset($checkq->answer_label)
               @if($checkq->answer_label !="no_value")
                <label>selected: <i>{{$checkq->answer_label}}</i></label>
                @endif
                @endisset

                <div id="popup{{$metaname_id}}_{{$qn->id}}_{{$metaname_id}}_{{$section->section}}" style="display:none;">
                  <select name="idx{{$metaname_id}}_{{$qn->id}}_{{$metaname_id}}_{{$section->section}}[]" id="maintenance{{$metaname_id}}_{{$qn->id}}_{{$metaname_id}}_{{$section->section}}"  class="form-control" required>

                   @isset($checkq->answer_label)
                   @if($checkq->answer_label !="no_value")
                   <option value="{{$checkq->answer_label}}">{{$checkq->answer_label}}</option>
                   @endif
                   @endisset

                   <option value="no_value">--level of maintenance--</option>
                   <option style="background-color:yellow" value="Maintenance-low">Maintenance-low</option>
                   <option style="background-color:salmon" value="Maintenance-medium">Maintenance-medium</option>
                   <option style="background-color:red" value="Maintenance-high">Maintenance-high</option>
                  </select>

                </div>
                <br>

               @endif
               @endif
               @endforeach
              >
             @endif




@if($metadata->answer=="Maintenance")
   <div id="popup{{$metaname_id}}_{{$qn->id}}_{{$metaname_id}}_{{$section->section}}" style="display:none;">
     <select name="idx{{$metaname_id}}_{{$qn->id}}_{{$metaname_id}}_{{$section->section}}[]" id="maintenance{{$metaname_id}}_{{$qn->id}}_{{$metaname_id}}_{{$section->section}}"  class="form-control" required>
        <option value="no_value">--level of maintenance--</option>
                   <option style="background-color:yellow" value="Maintenance-low">Maintenance-low</option>
                   <option style="background-color:salmon" value="Maintenance-medium">Maintenance-medium</option>
                   <option style="background-color:red" value="Maintenance-high">Maintenance-high</option>
     </select>
   </div>
   <br>
@endif
           </div>
         @endif
        @endforeach
         </div>
    </div>

          <div class="panel-heading">
            <h4 class="panel-title"> <div class="cardx"><a data-toggle="collapse" href="#collapsee{{$metaname_id}}{{$qn->id}}">Description if any</a>
           </div>
          </div>
          <div id="collapsee{{$metaname_id}}{{$qn->id}}" class="panel-collapse collapse">
      <textarea rows="4" cols="40" id="desc" name="desc{{$metaname_id}}_{{$qn->id}}_{{$metaname_id}}_{{$section->section}}[]" placeholder="---enter description if any---" class="txtarea" style="white-space: normal;overflow:hidden">
          @foreach ($checkQns as $checkq)
      @if($assetID ==$checkq->asset_id && $checkq->indicator_id ==$qn->id && $checkq->property_id ==$propertyID->property_id)
       @if($checkq->description !=null)
        {{$checkq->description}}
        @endif
      @endif
    @endforeach
    </textarea>
    </div>

        <div class="panel-heading">
            <h4 class="panel-title"> <div class="cardx">   <a data-toggle="collapse" href="#collap{{$metaname_id}}{{$qn->id}}">Photo if any</a>
           </div>
        </div>

          <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-10">
          <div id="collap{{$metaname_id}}{{$qn->id}}" class="panel-collapse collapse">
         <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                  <div class="form-group">
                                <!-- start webcam -->
    <div id="my_camera{{$metaname_id}}_{{$qn->id}}"></div>
    <br/>
    <input type="file" name="attachment{{$metaname_id}}_{{$qn->id}}_{{$metaname_id}}_{{$section->section}}[]" accept="image/*" capture="camera">
    <!-- <input type="text" name="vv" value="{{$metaname_id}}_{{$qn->id}}"> -->
    <!-- <input type=button value="Take Photo" onClick="take_snapshot({{$metaname_id}},{{$qn->id}})"> -->
    <!-- <input type="hidden" name="image" class="image-tag"> -->

    <!-- End -->

                                    </div>
                                    </div>
            <div class="col-lg-6 col-md-6 col-sm-6">

    </div>
    </div>

          </div>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-2">
          <div class="form-group">
                <label class="radio-inline">Ready:
                   <input type="checkbox"  onclick="myFunction()" id="status" name="status" value="0" disabled="true"

                  @foreach ($checkQns as $checkq)
                  @if($selectedOption==$checkq->asset_id && $checkq->indicator_id ==$qn->id)
             checked
               @endif
               @endforeach
               >
               </label>
          </div>

  {{--  <input type="hidden" name="col" value="{{$col}}"> --}}
    </div>
    </div>
       @endif
       @endforeach

    <div class="container">
     <div class="col-md-10 col-sm-10">
     <div style="background-color:#f6f7f2 !important">
        <button  class="btn-sm btn btn-secondary float-right" type="submit" name="save" value="{{$metaname_id}}_{{$section->section}}">Save</button>
     </div>
    </div>
    </div>
      <hr>

       </div> 
       <!-- end of If condition -->


       </div>

         <!-- <button  class="btn-sm btn btn-secondary float-right" type="submit" name="email_send" value="email_send">email_sent</button> -->
  </form>

      </div>
      </div>
      </div>

      @endforeach
      @endif
      @endisset
      </div>


           </div>
           </div>
  
<br>
<div class="row">
 <div class="col-md-11 col-sm-11">
              <a href="/email-send/{id}" class="btn-sm btn btn-dark float-right" role="button">Finish</a>
 </div>

      @endisset
               </div>

               </div>
                </div>

<script>
function displayRadio() {
  var radios = document.getElementsByName('options');

  for (var i = 0; i < radios.length; i++) {
    if (radios[i].value === 'Maintenance ') {

      // radios[i].checked = true;
      //alert('found');
      break;
    }
  }
}

</script>


<script>
var selectedFruit = 'Apple';
var fruits = ['Apple', 'Banana', 'Cherry', 'Date'];
$('#myInput').combobox({
  dataSource: fruits
});

var filteredFruits = fruits.filter(function(fruit) {
  return fruit === selectedFruit;
});
$('#myInput').combobox({
  dataSource: filteredFruits
});

</script>


                            <script>
                            function myFunctionMaintenance(meta,qn,sec,qnl) {

 // var section_name='idh'+id;
  // var popup='popup'+id;
// alert(qnl);

// $('#'+section_name+'').val(ssn);
  //$('#'+id+'').val(aid);
//    var section_namex='section_name'+id+'_'+id;
// alert(section_namex);
var section_name="popup"+(meta)+'_'+(qn)+'_'+meta+'_'+sec;
var maintenance_name="maintenance"+(meta)+'_'+(qn)+'_'+meta+'_'+sec;

//maintenance
 // alert(section_name);

  var checkBox = document.getElementById(section_name);
  // alert(checkBox.checked);
  if(qnl==="Maintenance")
  {
        document.getElementById(section_name).style.display = "block";
            document.getElementById(maintenance_name).selectedIndex  =0;
  }else{
        document.getElementById(section_name).style.display = "none";
        //  document.getElementById(maintenance_name).selectedIndex  =0;
        // alert(maintenance_name);
  }

//   if (checkBox.checked == true){
//     document.getElementById(popup).style.display = "block";
//   text.style.display = "block";
//   }
//   else{
//     document.getElementById(popup).style.display = "none";
// }
}

                            function myFunctionMaintenancex(id) {

                              // var variables=document.getElementById('idx2').value;

                              // var checkBox = document.getElementById("idxy").value;
                              //      alert(checkBox);
                              // var text = document.getElementById("text");
                              // alert(text);
                              if (checkBox.checked == true){
                                text.style.display = "block";
                              } else {
                                 text.style.display = "none";
                              }
                            }
                            </script>




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






<script type="text/javascript">
  function setSectionFunction(aid,sid,ssn) {

 var section_name="section_name"+(aid)+'_'+(sid);
  var aID="aID"+(aid)+'_'+(sid);
  $('#'+section_name+'').val(ssn);
    $('#'+aID+'').val(aid);
  }
</script>

<script type="text/javascript">
  function setMetanameFunction(id) {
      //alert(id);
    var elementM = document.getElementById("metaname_model").value;
     //alert(elementM);
 $('#metaname_id').val(elementM);
         document.getElementById("data_display").style.display = "none";
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


<script type="text/javascript">
  function setPropertyFunction(id) {
     //alert(id);
 $('#aID').val(id);
  }


   function setQnFunction(meta,qID,sec) {
    //  const arrT=[];
    // var variables=document.getElementById('qnAID').value;

  //alert(variables);
// const fruits = new Array('Apple', 'Banana');
//  $('#qnAID').val(fruits);
//   // alert(fruits);
//  $('#qnID').val(qID);

   var rad="idx"+(meta)+'_'+(qID)+'_'+(meta)+'_'+(sec);

//Radio buttons
var radios = document.getElementsByName(rad);

for (var i = 0; i < radios.length; i++) {
  if (radios[i].value === 'Maintenance ') {

    // radios[i].checked = true;
    //alert('found');
    break;
  }
   }
  }
</script>


  <script>
     function showPopup() {
       document.getElementById("popup").style.display = "block";
     }
     function submit() {
       const input1 = document.getElementById("input1").value;
       const input2 = document.getElementById("input2").value;

       alert(`Input 1: ${input1}, Input 2: ${input2}`);

       document.getElementById("popup").style.display = "none";
     }
     </script>

     <script type="text/javascript">
       $(document).ready(function(){
      // Department Change
      $('#metaname_model').change(function(){
         // ward
         var v = $(this).val();

        // alert(v);
           // Empty the dropdown
          $('#asset_model').find('option').not(':first').remove();
         // $('#village').find('option').not(':first').remove();
         // $('#project_name').find('option').not(':first').remove();
         // $('#project_activities').find('option').not(':first').remove();

         // AJAX request
         $.ajax({
           url: 'getDDM/'+v,
           type: 'get',
           dataType: 'json',
           success: function(response){

             var len = 0;
             if(response['dataA'] != null){
               len = response['dataA'].length;
             }

                       if(len > 0){
               // Read data and create <option >
               for(var i=0; i<len; i++){

                 var id = response['dataA'][i].id;
                 var name = response['dataA'][i].asset_name;
                 var option = "<option value='"+id+"'>"+name+"</option>";
                 $("#asset_model").append(option);
               }
             }
             //DAta are here

           }
        });
      });
    });
     </script>
@endsection