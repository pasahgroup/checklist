<div>
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

<div class="content d-flex flex-column flex-column-fluid" id="tc_content">

<div class="row container-fluid">
<div class="col-lg-12 col-md-12 col-sm-12">

            @isset($metanames)
                                  <div class="card card-custom gutter-b bg-white border-0">
                                  <div class="card-body">
    <!-- Old form was placed here -->
Department Name: <i>{{$departGetName->department_name ?? ''}}</i> | Unit name: <i>{{$departGetName->unit_name ?? ''}}
<div class="row">
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
            <label class="text-dark">Metaname</label>
                      <select wire:model="metaname_model" name="metaname_model" id="metaname_model" onclick="setMetanameFunction()" onkeyup="setMetanameFunction()"  class="form-control" required>
                          <option value="">--- Select metaname to apply ---</option>

                         @foreach($metanames as $metaname)
                         <option value="{{$metaname->id}}">{{$metaname->metaname_name}}</option>
                        @endforeach
              </select>

            </div>

  <div class="form-group">
            <label class="text-dark">Asset name</label>
            <div class="form-group">
                      <select wire:model="selectedOption" id="asset_model" wire:chage="asset_model" class="form-control" required>
                          <option value="">--- Select Asset name to apply ---</option>

                         @foreach($assets as $asset)
                         <option value="{{$asset->id}}">{{$asset->asset_name}}</option>
                            @endforeach
                     </select>
  </div>
 <input type="text" wire.model="assetID" name="assetID" id="assetID" value="{{$selectedOption}}">
  </div>

</div>

 <div class="row">
    @isset($assets)
    @if(!empty($selectedOption))
       @foreach ($sections as $section)
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="panel-heading">

    <div class="" data-toggle="collapse" href="#collapp{{$metaname_id}}_{{$section->section}}" id="" class="panel-group btn-sm" onclick="setSectionFunction({{$metaname_id}},'{{$section->section}}')" onkeyup ="setSectionFunction({{$metaname_id}},'{{$section->section}}')" style="background-color:#dfd6c4 !important">
                    <div class="row">
                      <div class="col-lg-10 col-md-10 col-sm-10" style="color: #black">
     <span style="background-color:#">{{$section->section}}</span>

     <span class="float-right">
   @foreach ($checkQnsProp as $chkp)
        @if($assetID ==$chkp->asset_id)
     <input type="checkbox"  onclick="myFunctionxx()" id="statusx" name="statusx" value="0" @if ($assetID==$chkp->asset_id) checked @endif> | ({{ number_format(($answerPerc->where('metaname_id',$chkp->metaname_id)->where('asset_id',$chkp->asset_id)->where('section',$section->section)->count())/($qnsAppliedPerc->where('metaname_id',$chkp->metaname_id)->where('section',$section->section)->count())*100),2}})%
     @endif
     @endforeach

     </span>
    </div>
    </div>
    </div>

      <!-- <div class="" data-toggle="collapse" href="#collapccc" id="" class="panel-group btn-sm" style="background-color:#718275 !important"> -->
      <div wire:ignore.self id="collapp{{$metaname_id}}_{{$section->section}}" class="panel-collapse collapse">
    <!-- <div wire:ignore.self id="collapse{{$metaname_id}}" class="panel-collapse collapse"> -->
    <!-- TEst form here -->
    <form  method="post"  action="{{ route('checklist.store') }}" enctype="multipart/form-data">
                          @csrf
    <input type="hidden" name="_method" value="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" wire.model="metaname_id" name="metaname_id" id="metaname_id" value="{{$assetID}}">

<input type="hidden" wire.model="metaname_id" name="metaname_id" id="metaname_id" value="{{$metaname_id}}">
<input type="text" wire.model="assetID" name="assetID" id="assetID" value="{{$selectedOption}}">
<input type="hidden" wire.model="propertyID" name="propertyID" id="propertyID" value="1">

    <input type="hidden" name="qnID" id="qnID" value="">
    <input type="hidden" name="qnAID[]" id="qnAID" value="">
    <input type="hidden" name="aID" id="aID{{$metaname_id}}_{{$section->section}}" value="{{$metaname_id}}">
    <input type="hidden" name="section_name{{$metaname_id}}_{{$section->section}}" id="section_name{{$metaname_id}}_{{$section->section}}">

    <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
           @foreach ($qns as $qn)
           @if($metaname_id ==$qn->metaname_id && $qn->section==$section->section)
                          <div class="form-group card">
                          <div class="panel-group btn-sm" style="background-color:#d9c7a8 !important"><b> {{$metaname_id}}:{{$qn->id}}: {{$qn->section}} </b>: {{ $qn->qns  }}</div>

                  <div class="row-card">
           @foreach ($metadatas as $metadata)
           @if($metadata->indicator_id ==$qn->id)

              <div class="col-xl-3 col-md-3 col-sm-3">
              <label>{{$metadata->answer}}</label>
               @if($metadata->datatype=="checkbox")
              <input type="{{$metadata->datatype}}" name="ids{{$metaname_id}}[]" id="indicator_id" value="{{$metadata->id}}" onclick="myFunction({{$qn->id}})" onkeyup="myFunction({{$qn->id}})"
                 @foreach ($checkQns as $checkq)
                  @if($assetID ==$checkq->asset_id && $checkq->indicator_id==$qn->id && $metadata->answer==$checkq->answer)
               @if ($assetID ==$checkq->asset_id && $checkq->indicator_id ==$qn->id && $metadata->answer==$checkq->answer) checked @endif
              @endif
               @endforeach
            >
           @endif
               @if($metadata->datatype=="radio")
              <input type="{{$metadata->datatype}}" name="idx{{$metaname_id}}_{{$qn->id}}_{{$metaname_id}}_{{$section->section}}[]" id="indicator_id" value="{{$metadata->id}}" onclick="setQnFunction({{$metaname_id}},{{$qn->id}})" onkeyup="setQnFunction({{$metaname_id}},{{$qn->id}})"
                 @foreach ($checkQns as $checkq)
                  @if($assetID ==$checkq->asset_id && $checkq->indicator_id ==$qn->id && $metadata->id==$checkq->opt_answer_id)
               @if ($assetID ==$checkq->asset_id && $checkq->indicator_id ==$qn->id && $metadata->id==$checkq->opt_answer_id) checked @endif
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
            <h4 class="panel-title"> <div class="cardx"><a data-toggle="collapse" href="#collapsee{{$metaname_id}}{{$qn->id}}">Description if any</a>
           </div>
          </div>
          <div id="collapsee{{$metaname_id}}{{$qn->id}}" class="panel-collapse collapse">

      <textarea rows="4" cols="40" id="desc" name="desc{{$metaname_id}}_{{$qn->id}}_{{$metaname_id}}_{{$section->section}}[]" placeholder="---enter description if any---" class="form-control" style="white-space: normal;overflow:hidden" maxlength="680">
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
{{$assetID}}
                  @foreach ($checkQns as $checkq)
                  @if($assetID==$checkq->asset_id && $checkq->indicator_id ==$qn->id)
          checked
               @endif
               @endforeach
               >
               </label>
    </div>

    <input type="hidden" name="col" value="{{$col}}">
    </div>
    </div>

       @endif
       @endforeach

    <div class="row">
     <div class="col-md-11 col-sm-11">
     <div class="wawa-bgcolor">
                      <button  class="btn-sm btn btn-secondary float-right" type="submit" name="save" value="{{$metaname_id}}_{{$section->section}}">Save</button>
     </div>
    </div>
    </div>

       </div>
       </div>

  </form>
      </div>
      </div>

    </div>

      @endforeach
      @endif
    @endisset
      </div>


<!-- set form to send Email here -->
<!-- <x-jet-button type="submit" class="btn-sm btn btn-secondary float-right" name="email_send" value="email_send">
   {{ __('Finish') }}
</x-jet-button> -->

     <button class="btn-sm btn btn-dark float-right" role="button" name="email_send" value="email_send">Finish</button>
    <!-- <button  class="btn-sm btn btn-secondary float-right" type="submit" name="save" value="{{$assetID?? ''}}_{{$section->section?? ''}}">Save{{$assetID?? ''}}_{{$section->section?? ''}}</button> -->


           </div>
           </div>
   <!-- <div class="row">
     <div class="col-md-6 col-sm-6">
     </div>

</div> -->
      @endisset

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

 var section_name="section_name"+(aid)+'_'+(sid);
  var aID="aID"+(aid)+'_'+(sid);
  $('#'+section_name+'').val(ssn);
    $('#'+aID+'').val(aid);
  }
</script>

<script type="text/javascript">
  function setMetanameFunction(metaname_id) {
     //alert(metaname_id);
 $('#aID').val(id);
  }

   function setMetanameFunctionxxx(metaname_id) {
      const arrT=[];
     var variables=document.getElementById('qnAID').value;

  //alert(variables);
const fruits = new Array('Apple', 'Banana');
 $('#qnAID').val(fruits);
  // alert(fruits);
 $('#qnID').val(qID);
  }
</script>

<script type="text/javascript">
function setAssetFunction(id) {
$('#asset_name').val(id);
}
</script>


<script type="text/javascript">
  function setPropertyFunction(id) {
     //alert(id);
 $('#aID').val(id);
  }

   function setQnFunction(pID,qID) {
      const arrT=[];
     var variables=document.getElementById('qnAID').value;

  //alert(variables);
const fruits = new Array('Apple', 'Banana');
 $('#qnAID').val(fruits);
  // alert(fruits);
 $('#qnID').val(qID);
  }
</script>
</div>
