<div>

  @if($message)
                            <div class="alert alert-danger">
                              <h5   class="text-center">{{ $message }}</h5>
                            </div>
                            @endif

                                    <div class="subheader py-2 py-lg-6 subheader-solid">
            <div class="container-fluid">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white mb-0 px-0 py-2">
                  <li class="breadcrumb-item active" aria-current="page">Roles & Permission</li>
                    <li class="breadcrumb-item active" aria-current="page">Assign Activities to User:(AAU)</li>
                </ol>
              </nav>
            </div>
          </div>
             <hr>

  <div class="content d-flex flex-column flex-column-fluid" id="tc_content">
            <div class="row container-fluid">

                <div class="col-xl-6 col-md-6">
                  <h5 class="title font-weight-bold text-center">Users List</h5>                    <div class="card card-custom gutter-b bg-white border-0">
                   <div class="card-body">
                       <form  method="post"  action="{{ route('user-activity.store') }}" enctype="multipart/form-data">
                             @csrf
    <input type="hidden" name="_method" value="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">


<div class="form-group">
    @isset($users)
      @foreach($users as $user)
      <div class="row">
      <div class="col-xl-9 col-md-9">{{$user->name}}</div>
     <div class="col-xl-3 col-md-3"><input type="checkbox" name="users[]" value="{{$user->id}}"></div>
   </div>
   @endforeach
   @endisset
</div>


                                </div>
                                 </div>
                                 </div>




                <div class="col-xl-6 col-md-6">
                  <h5 class="title font-weight-bold text-center">List of Activities/Metaname</h5>                    <div class="card card-custom gutter-b bg-white border-0">

          <div class="card-body">
<div class="form-group">

     @isset($activities)

      @foreach($activities as $activity)
      <div class="row">
      <div class="col-xl-8 col-md-8 col-xs-8">{{$activity->metaname_name}}</div>
     <div class="col-xl-4 col-md-4 col-xs-4"><input type="checkbox" name="activities[]" value="{{$activity->id}}">
     </div>
   </div>
   @endforeach
   @endisset
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
