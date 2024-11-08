@extends('layouts.app')
@section('content')
<style>
table, th, td {
  border: 0px solid green;
  border-collapse: collapse;
}
</style>

    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="tc_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid">
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-white mb-0 px-0 py-2">

					@if(request()->path()=="report-property/".$id."/dashboard")
                        <li class="breadcrumb-item active" aria-current="page"><a href="/admin" role="button" class="btn-sm btn-primary"><<</a></li>
                      @endif
					  @if(request()->path()=="report-property/".$id)
                        <li class="breadcrumb-item active" aria-current="page"><a href="/dash-property/{id}" role="button" class="btn-sm btn-primary"><<</a></li>
                      @endif

					   <li class="breadcrumb-item active" aria-current="page">General Dashboard for</li>
						<li class="breadcrumb-item active" aria-current="page"><strong>{{$properties->property_name}}</strong></li>

                    </ol>
                </nav>
            </div>
        </div>
        <hr>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-fluid">
                
                <div class="row">
 @role('Manager|Admin|GeneralAdmin|SuperAdmin')
                          <div class="col-lg-4  col-xl-4 col-md-4">
                        <div class="card card-custom gutter-b bg-white border-0">
                        <div class="card-header align-items-center  border-0">
                                            <div class="card-title mb-0">
                                                        <h6 class="card-label text-body font-weight-bold mb-0">Daily Report : Inspection
                                                        </h6>
                                                    </div>
                                                </div>

                                                <div class="card-body px-0">
                                                    <ul class="list-group scrollbar-1" style="height: 300px;">
                                                    @foreach($dailyMetaCollects as $key=>$dailyMetaCollect)

                                                      <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between py-2">
                    <div class="list-left d-flex align-items-center">
                    <span class="d-flex align-items-center justify-content-center rounded svg-icon w-45px h-45px bg-secondary text-white mr-2">
    <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-bar-chart-line-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2z"/>
                                                                  </svg>
                                                              </span>
                             <div class="list-content">
                        <span class="list-title text-body"><strong>{{$key}}</strong>: Progress in {{number_format($answerCount->where('metaname_name',$key)->count()/$totalqns->where('metaname_name',$key)->count()*100),1}}%</span>
            <span class="text-muted d-block text-success">
                <div class="col-md-12">
                <div class="row">
            @isset($key)
            @if($dailyMetaCollect->where('metaname_name',$key)->where('answer_classification','Good')->count()>0)
       <form action="{{ route('daily-reportx',[$dailyMetaCollect->pluck('property_id')->first(),'Good']) }}" method="PUT" >
                @csrf
    <input type="hidden" name="_method" value="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="hidden" name="property_id" id="property_id" value="{{$dailyMetaCollect->pluck('property_id')->first()}}">
        <input type="hidden" name="metaname_id" id="metaname_id" value="{{$dailyMetaCollect->pluck('metaname_id')->first()}}">
        <input type="hidden" name="asset_id" id="asset_id" value="{{$dailyMetaCollect->pluck('asset_id')->first()}}">
        <button type="submit" name="critical" id="critical" style="background-color:darkGreen"><strong style="color:#fff;">Good: {{$dailyMetaCollect->where('metaname_name',$key)->whereIn('answer_classification',['Good'])->count()}} | {{number_format(($dailyMetaCollect->where('metaname_name',$key)->whereIn('answer_classification',['Good'])->count()/$dailyMetaCollect->where('metaname_name',$key)->whereIn('answer_classification',['Good','Bad','Critical','Maintenance-low','Maintenance-medium','Maintenance-high','NA'])->count()*$answerCount->where('metaname_name',$key)->count()/$totalqns->where('metaname_name',$key)->count()* 100),1)}}% </strong></button>
    </form>
@endif

            @if($dailyMetaCollect->where('metaname_name',$key)->where('answer_classification','Bad')->count()>0)
        <form action="{{ route('daily-reportx',[$dailyMetaCollect->pluck('property_id')->first(),'Bad']) }}" method="PUT" >
                @csrf
    <input type="hidden" name="_method" value="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="hidden" name="property_id" id="property_id" value="{{$dailyMetaCollect->pluck('property_id')->first()}}">
        <input type="hidden" name="metaname_id" id="metaname_id" value="{{$dailyMetaCollect->pluck('metaname_id')->first()}}">
        <input type="hidden" name="asset_id" id="asset_id" value="{{$dailyMetaCollect->pluck('asset_id')->first()}}">
        <button type="submit" name="critical" id="critical" style="background-color:#000"><strong style="color:yellow;">Bad: {{$dailyMetaCollect->where('metaname_name',$key)->whereIn('answer_classification',['Bad'])->count()}} | {{number_format(($dailyMetaCollect->where('metaname_name',$key)->whereIn('answer_classification',['Bad'])->count()/$dailyMetaCollect->where('metaname_name',$key)->whereIn('answer_classification',['Good','Bad','Critical','Maintenance-low','Maintenance-medium','Maintenance-high','NA'])->count()* $answerCount->where('metaname_name',$key)->count()/$totalqns->where('metaname_name',$key)->count()*100),1)}}%</strong></button>
    </form>
        |@endif

        @if($dailyMetaCollect->where('metaname_name',$key)->where('answer_classification','Critical')->count()>0)
            <form action="{{ route('daily-reportx',[$dailyMetaCollect->pluck('property_id')->first(),'Critical']) }}" method="PUT" >
                @csrf
    <input type="hidden" name="_method" value="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="hidden" name="property_id" id="property_id" value="{{$dailyMetaCollect->pluck('property_id')->first()}}">
        <input type="hidden" name="metaname_id" id="metaname_id" value="{{$dailyMetaCollect->pluck('metaname_id')->first()}}">
        <input type="hidden" name="asset_id" id="asset_id" value="{{$dailyMetaCollect->pluck('asset_id')->first()}}">

        <button type="submit" name="critical" id="critical" style="background-color:#000"><strong style="color:red;">Critical: {{$dailyMetaCollect->where('metaname_name',$key)->whereIn('answer_classification',['Critical'])->count()}} | {{number_format(($dailyMetaCollect->where('metaname_name',$key)->whereIn('answer_classification',['Critical'])->count()/$dailyMetaCollect->where('metaname_name',$key)->whereIn('answer_classification',['Good','Bad','Critical','Maintenance-low','Maintenance-medium','Maintenance-high','NA'])->count()*$answerCount->where('metaname_name',$key)->count()/$totalqns->where('metaname_name',$key)->count()* 100),1)}}%</strong></button>
    </form>
        @endif


        @if($dailyMetaCollect->where('metaname_name',$key)->where('answer','Maintenance')->count()>0)
            <form action="{{ route('daily-reportx',[$dailyMetaCollect->pluck('property_id')->first(),'Maintenance']) }}" method="PUT" >
                @csrf
    <input type="hidden" name="_method" value="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="hidden" name="property_id" id="property_id" value="{{$dailyMetaCollect->pluck('property_id')->first()}}">
        <input type="hidden" name="metaname_id" id="metaname_id" value="{{$dailyMetaCollect->pluck('metaname_id')->first()}}">
        <input type="hidden" name="asset_id" id="asset_id" value="{{$dailyMetaCollect->pluck('asset_id')->first()}}">

        <button type="submit" name="maintenance" id="maintenance" style="background-color:yellow"><strong style="color:red;">Maint.: {{$dailyMetaCollect->where('metaname_name',$key)->whereIn('answer',['Maintenance'])->count()}} | {{number_format(($dailyMetaCollect->where('metaname_name',$key)->whereIn('answer_classification',['Maintenance-low','Maintenance-medium','Maintenance-high'])->count()/$dailyMetaCollect->where('metaname_name',$key)->whereIn('answer_classification',['Good','Bad','Critical','Maintenance-low','Maintenance-medium','Maintenance-high','NA'])->count()*$answerCount->where('metaname_name',$key)->count()/$totalqns->where('metaname_name',$key)->count()* 100),1)}}%</strong></button>
    </form>
        @endif
@endisset
</div>
</div>
            </span>
                                                          </div>
                                                        </div>
                                                        <span>
                                                            <span>

                                                         </span>
                                                    </span>
                                                      </li>
                       @endforeach

                                                    </ul>
                                                  </div>
                                              </div>
                                        </div>
                             <div class="col-lg-4  col-xl-4 col-md-4">

                                            <div class="card card-custom gutter-b bg-white border-0">
                                                <div class="card-header align-items-center  border-0">
                                                    <div class="card-title mb-0">
                                                        <h6 class="card-label text-body font-weight-bold mb-0">Weekly Report : Inspection
                                                        </h6>
                                                    </div>

                                                </div>
                                                <div class="card-body px-0">
                                                    <ul class="list-group scrollbar-1" style="height: 300px;">

                                                        @foreach($weeklyMetaCollects as $keyW=>$weeklyMetaCollect)
                                                      <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between py-2">
                    <div class="list-left d-flex align-items-center">
                    <span class="d-flex align-items-center justify-content-center rounded svg-icon w-45px h-45px bg-primary text-white mr-2">
        <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-lightning-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
     <path fill-rule="evenodd" d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"/>
                </svg>
                                                     </span>
                             <div class="list-content">
                        <span class="list-title text-body"><strong>{{$keyW}}</strong>: Issues </span>
            <span class="text-muted d-block text-success">
                <div class="col-md-12">
                <div class="row">
            @isset($keyW)
            @if($weeklyMetaCollect->where('metaname_name',$keyW)->where('answer_classification','Good')->count()>0)
       <form action="{{ route('weekly-reportx',[$weeklyMetaCollect->pluck('property_id')->first(),'Good']) }}" method="PUT" >

                @csrf
    <input type="hidden" name="_method" value="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="hidden" name="property_id" id="property_id" value="{{$weeklyMetaCollect->pluck('property_id')->first()}}">
        <input type="hidden" name="metaname_id" id="metaname_id" value="{{$weeklyMetaCollect->pluck('metaname_id')->first()}}">
        <input type="hidden" name="asset_id" id="asset_id" value="{{$weeklyMetaCollect->pluck('asset_id')->first()}}">

        <button type="submit" name="critical" id="critical" style="background-color:darkGreen"><strong style="color:#fff;">Good: {{$weeklyMetaCollect->where('metaname_name',$keyW)->whereIn('answer_classification',['Good'])->count()}} | {{number_format(($weeklyMetaCollect->where('metaname_name',$keyW)->whereIn('answer_classification',['Good'])->count()/$weeklyMetaCollect->where('metaname_name',$keyW)->whereIn('answer_classification',['Good','Bad','Critical','Maintenance-low','Maintenance-medium','Maintenance-high','NA'])->count()* 100),1)}}%</strong></button>
          </form>
@endif

            @if($weeklyMetaCollect->where('metaname_name',$keyW)->where('answer_classification','Bad')->count()>0)
            <form action="{{ route('weekly-reportx',[$weeklyMetaCollect->pluck('property_id')->first(),'Bad']) }}" method="PUT" >
                @csrf
    <input type="hidden" name="_method" value="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="hidden" name="property_id" id="property_id" value="{{$weeklyMetaCollect->pluck('property_id')->first()}}">
        <input type="hidden" name="metaname_id" id="metaname_id" value="{{$weeklyMetaCollect->pluck('metaname_id')->first()}}">
        <input type="hidden" name="asset_id" id="asset_id" value="{{$weeklyMetaCollect->pluck('asset_id')->first()}}">

        <button type="submit" name="critical" id="critical" style="background-color:#000"><strong style="color:yellow;">Bad: {{$weeklyMetaCollect->where('metaname_name',$keyW)->whereIn('answer_classification',['Bad'])->count()}} | {{number_format(($weeklyMetaCollect->where('metaname_name',$keyW)->whereIn('answer_classification',['Bad'])->count()/$weeklyMetaCollect->where('metaname_name',$keyW)->whereIn('answer_classification',['Good','Bad','Critical','Maintenance-low','Maintenance-medium','Maintenance-high','NA'])->count()* 100),1)}}%</strong></button>
    </form>
        |@endif

        @if($weeklyMetaCollect->where('metaname_name',$keyW)->where('answer_classification','Critical')->count()>0)
             <form action="{{ route('weekly-reportx',[$weeklyMetaCollect->pluck('property_id')->first(),'Critical']) }}" method="PUT" >
                @csrf
    <input type="hidden" name="_method" value="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="hidden" name="property_id" id="property_id" value="{{$weeklyMetaCollect->pluck('property_id')->first()}}">
        <input type="hidden" name="metaname_id" id="metaname_id" value="{{$weeklyMetaCollect->pluck('metaname_id')->first()}}">
        <input type="hidden" name="asset_id" id="asset_id" value="{{$weeklyMetaCollect->pluck('asset_id')->first()}}">

        <button type="submit" name="critical" id="critical" style="background-color:#000"><strong style="color:red;">Critical: {{$weeklyMetaCollect->where('metaname_name',$keyW)->whereIn('answer_classification',['Critical'])->count()}} | {{number_format(($weeklyMetaCollect->where('metaname_name',$keyW)->whereIn('answer_classification',['Critical'])->count()/$weeklyMetaCollect->where('metaname_name',$keyW)->whereIn('answer_classification',['Good','Bad','Critical','Maintenance-low','Maintenance-medium','Maintenance-high','NA'])->count()* 100),1)}}%</strong></button>
    </form>
        @endif


        @if($weeklyMetaCollect->where('metaname_name',$keyW)->where('answer','Maintenance')->count()>0)
             <form action="{{ route('weekly-reportx',[$weeklyMetaCollect->pluck('property_id')->first(),'Maintenance']) }}" method="PUT" >
                @csrf
    <input type="hidden" name="_method" value="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="hidden" name="property_id" id="property_id" value="{{$weeklyMetaCollect->pluck('property_id')->first()}}">
        <input type="hidden" name="metaname_id" id="metaname_id" value="{{$weeklyMetaCollect->pluck('metaname_id')->first()}}">
        <input type="hidden" name="asset_id" id="asset_id" value="{{$weeklyMetaCollect->pluck('asset_id')->first()}}">

        <button type="submit" name="maintenance" id="maintenance" style="background-color:yellow"><strong style="color:red;">Maint.: {{$weeklyMetaCollect->where('metaname_name',$keyW)->whereIn('answer',['Maintenance'])->count()}} | {{number_format(($weeklyMetaCollect->where('metaname_name',$keyW)->whereIn('answer',['Maintenance'])->count()/$weeklyMetaCollect->where('metaname_name',$keyW)->whereIn('answer_classification',['Good','Bad','Critical','Maintenance-low','Maintenance-medium','Maintenance-high','NA'])->count()* 100),1)}}%</strong></button>
    </form>
        @endif
               @endisset
</div>
</div>
            </span>
                                                          </div>

                                                        </div>
                                                        <span>
                                                            <span>

                                                         </span>
                                                    </span>
                                                      </li>


@endforeach
                                                    </ul>
                                                  </div>
                                              </div>
                                        </div>

                                       

                                         <div class="col-lg-4  col-xl-4 col-md-4">
                                            <div class="card card-custom gutter-b bg-white border-0">
                                                <div class="card-header align-items-center  border-0">
                                                    <div class="card-title mb-0">
                                                        <h6 class="card-label text-body font-weight-bold mb-0">Monthly Report : Inspection
                                                        </h6>
                                                    </div>

                                                </div>
                                                <div class="card-body px-0">
                                                    <ul class="list-group scrollbar-1" style="height: 300px;">

                                                    @foreach($monthlyMetaCollects as $keyM=>$monthlyMetaCollect)
                                                      <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between py-2">
                    <div class="list-left d-flex align-items-center">
                    <span class="d-flex align-items-center justify-content-center rounded svg-icon w-45px h-45px bg-primary text-white mr-2">
        <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-lightning-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
     <path fill-rule="evenodd" d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"/>
                </svg>
                                                     </span>
                             <div class="list-content">
                        <span class="list-title text-body"><strong>{{$keyM}}</strong>: Issues </span>
            <span class="text-muted d-block text-success">
                <div class="col-md-12">
                <div class="row">
            @isset($keyM)
            @if($monthlyMetaCollect->where('metaname_name',$keyM)->where('answer_classification','Good')->count()>0)
       <form action="{{ route('monthly-reportx',[$monthlyMetaCollect->pluck('property_id')->first(),'Good']) }}" method="PUT" >
                @csrf
    <input type="hidden" name="_method" value="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="hidden" name="property_id" id="property_id" value="{{$monthlyMetaCollect->pluck('property_id')->first()}}">
        <input type="hidden" name="metaname_id" id="metaname_id" value="{{$monthlyMetaCollect->pluck('metaname_id')->first()}}">
        <input type="hidden" name="asset_id" id="asset_id" value="{{$monthlyMetaCollect->pluck('asset_id')->first()}}">

        <button type="submit" name="critical" id="critical" style="background-color:darkGreen"><strong style="color:#fff;">Good: {{$monthlyMetaCollect->where('metaname_name',$keyM)->whereIn('answer_classification',['Good'])->count()}} | {{number_format(($monthlyMetaCollect->where('metaname_name',$keyM)->whereIn('answer_classification',['Good'])->count()/$monthlyMetaCollect->where('metaname_name',$keyM)->whereIn('answer_classification',['Good','Bad','Critical','Maintenance-low','Maintenance-medium','Maintenance-high','NA'])->count()* 100),1)}}%</strong></button>
    </form>
@endif

            @if($monthlyMetaCollect->where('metaname_name',$keyM)->where('answer_classification','Bad')->count()>0)
            <form action="{{ route('monthly-reportx',[$monthlyMetaCollect->pluck('property_id')->first(),'Bad']) }}" method="PUT" >
                @csrf
    <input type="hidden" name="_method" value="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="hidden" name="property_id" id="property_id" value="{{$monthlyMetaCollect->pluck('property_id')->first()}}">
        <input type="hidden" name="metaname_id" id="metaname_id" value="{{$monthlyMetaCollect->pluck('metaname_id')->first()}}">
        <input type="hidden" name="asset_id" id="asset_id" value="{{$monthlyMetaCollect->pluck('asset_id')->first()}}">

        <button type="submit" name="critical" id="critical" style="background-color:#000"><strong style="color:yellow;">Bad: {{$monthlyMetaCollect->where('metaname_name',$keyM)->whereIn('answer_classification',['Bad'])->count()}} | {{number_format(($monthlyMetaCollect->where('metaname_name',$keyM)->whereIn('answer_classification',['Bad'])->count()/$monthlyMetaCollect->where('metaname_name',$keyM)->whereIn('answer_classification',['Good','Bad','Critical','Maintenance-low','Maintenance-medium','Maintenance-high','NA'])->count()* 100),1)}}%</strong></button>
    </form>
        |@endif

        @if($monthlyMetaCollect->where('metaname_name',$keyM)->where('answer_classification','Critical')->count()>0)
          <form action="{{ route('monthly-reportx',[$monthlyMetaCollect->pluck('property_id')->first(),'Critical']) }}" method="PUT" >
                @csrf
    <input type="hidden" name="_method" value="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="hidden" name="property_id" id="property_id" value="{{$monthlyMetaCollect->pluck('property_id')->first()}}">
        <input type="hidden" name="metaname_id" id="metaname_id" value="{{$monthlyMetaCollect->pluck('metaname_id')->first()}}">
        <input type="hidden" name="asset_id" id="asset_id" value="{{$monthlyMetaCollect->pluck('asset_id')->first()}}">

        <button type="submit" name="critical" id="critical" style="background-color:#000"><strong style="color:red;">Critical: {{$monthlyMetaCollect->where('metaname_name',$keyM)->whereIn('answer_classification',['Critical'])->count()}} | {{number_format(($monthlyMetaCollect->where('metaname_name',$keyM)->whereIn('answer_classification',['Critical'])->count()/$monthlyMetaCollect->where('metaname_name',$keyM)->whereIn('answer_classification',['Good','Bad','Critical','Maintenance-low','Maintenance-medium','Maintenance-high','NA'])->count()* 100),1)}}%</strong></button>
    </form>
          @endif



          @if($monthlyMetaCollect->where('metaname_name',$keyM)->where('answer','Maintenance')->count()>0)
            <form action="{{ route('monthly-reportx',[$monthlyMetaCollect->pluck('property_id')->first(),'Maintenance']) }}" method="PUT" >
                  @csrf
      <input type="hidden" name="_method" value="POST">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <input type="hidden" name="property_id" id="property_id" value="{{$monthlyMetaCollect->pluck('property_id')->first()}}">
          <input type="hidden" name="metaname_id" id="metaname_id" value="{{$monthlyMetaCollect->pluck('metaname_id')->first()}}">
          <input type="hidden" name="asset_id" id="asset_id" value="{{$monthlyMetaCollect->pluck('asset_id')->first()}}">

          <button type="submit" name="maintenance" id="maintenance" style="background-color:yellow"><strong style="color:red;">Maint.: {{$monthlyMetaCollect->where('metaname_name',$keyM)->whereIn('answer',['Maintenance'])->count()}} | {{number_format(($monthlyMetaCollect->where('metaname_name',$keyM)->whereIn('answer',['Maintenance'])->count()/$monthlyMetaCollect->where('metaname_name',$keyM)->whereIn('answer_classification',['Good','Bad','Critical','Maintenance-low','Maintenance-medium','Maintenance-high','NA'])->count()* 100),1)}}%</strong></button>
      </form>
            @endif
        @endisset
</div>
</div>
  </span>
                                                          </div>

                                                        </div>
                                                        <span>
                                                            <span>

                                                         </span>
                                                    </span>
                                                      </li>


@endforeach

                                                    </ul>
                                                  </div>
                                              </div>
                                        </div>







  <div class="col-lg-4  col-xl-4 col-md-4">
                                            <div class="card card-custom gutter-b bg-white border-0">
                                                <div class="card-header align-items-center  border-0">
                                                    <div class="card-title mb-0">
                                                        <h6 class="card-label text-body font-weight-bold mb-0">Daily Duty Manager Report : Inspection
                                                        </h6>
                                                    </div>

                                                </div>
                                                <div class="card-body px-0">
                                                    <ul class="list-group scrollbar-1" style="height: 300px;">

                                                    @foreach($monthlyMetaCollects as $keyM=>$monthlyMetaCollect)
                                                      <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between py-2">
                    <div class="list-left d-flex align-items-center">
                    <span class="d-flex align-items-center justify-content-center rounded svg-icon w-45px h-45px bg-primary text-white mr-2">
        <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-lightning-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
     <path fill-rule="evenodd" d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"/>
                </svg>
                                                     </span>
                             <div class="list-content">
                        <span class="list-title text-body"><strong>{{$keyM}}</strong>: Issues </span>
            <span class="text-muted d-block text-success">
                <div class="col-md-12">
                <div class="row">
            @isset($keyM)
            @if($monthlyMetaCollect->where('metaname_name',$keyM)->where('answer_classification','Good')->count()>0)
       <form action="{{ route('monthly-reportx',[$monthlyMetaCollect->pluck('property_id')->first(),'Good']) }}" method="PUT" >
                @csrf
    <input type="hidden" name="_method" value="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="hidden" name="property_id" id="property_id" value="{{$monthlyMetaCollect->pluck('property_id')->first()}}">
        <input type="hidden" name="metaname_id" id="metaname_id" value="{{$monthlyMetaCollect->pluck('metaname_id')->first()}}">
        <input type="hidden" name="asset_id" id="asset_id" value="{{$monthlyMetaCollect->pluck('asset_id')->first()}}">

        <button type="submit" name="critical" id="critical" style="background-color:darkGreen"><strong style="color:#fff;">Good: {{$monthlyMetaCollect->where('metaname_name',$keyM)->whereIn('answer_classification',['Good'])->count()}} | {{number_format(($monthlyMetaCollect->where('metaname_name',$keyM)->whereIn('answer_classification',['Good'])->count()/$monthlyMetaCollect->where('metaname_name',$keyM)->whereIn('answer_classification',['Good','Bad','Critical','Maintenance-low','Maintenance-medium','Maintenance-high','NA'])->count()* 100),1)}}%</strong></button>
    </form>
@endif

            @if($monthlyMetaCollect->where('metaname_name',$keyM)->where('answer_classification','Bad')->count()>0)
            <form action="{{ route('monthly-reportx',[$monthlyMetaCollect->pluck('property_id')->first(),'Bad']) }}" method="PUT" >
                @csrf
    <input type="hidden" name="_method" value="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="hidden" name="property_id" id="property_id" value="{{$monthlyMetaCollect->pluck('property_id')->first()}}">
        <input type="hidden" name="metaname_id" id="metaname_id" value="{{$monthlyMetaCollect->pluck('metaname_id')->first()}}">
        <input type="hidden" name="asset_id" id="asset_id" value="{{$monthlyMetaCollect->pluck('asset_id')->first()}}">

        <button type="submit" name="critical" id="critical" style="background-color:#000"><strong style="color:yellow;">Bad: {{$monthlyMetaCollect->where('metaname_name',$keyM)->whereIn('answer_classification',['Bad'])->count()}} | {{number_format(($monthlyMetaCollect->where('metaname_name',$keyM)->whereIn('answer_classification',['Bad'])->count()/$monthlyMetaCollect->where('metaname_name',$keyM)->whereIn('answer_classification',['Good','Bad','Critical','Maintenance-low','Maintenance-medium','Maintenance-high','NA'])->count()* 100),1)}}%</strong></button>
    </form>
        |@endif

        @if($monthlyMetaCollect->where('metaname_name',$keyM)->where('answer_classification','Critical')->count()>0)
          <form action="{{ route('monthly-reportx',[$monthlyMetaCollect->pluck('property_id')->first(),'Critical']) }}" method="PUT" >
                @csrf
    <input type="hidden" name="_method" value="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="hidden" name="property_id" id="property_id" value="{{$monthlyMetaCollect->pluck('property_id')->first()}}">
        <input type="hidden" name="metaname_id" id="metaname_id" value="{{$monthlyMetaCollect->pluck('metaname_id')->first()}}">
        <input type="hidden" name="asset_id" id="asset_id" value="{{$monthlyMetaCollect->pluck('asset_id')->first()}}">

        <button type="submit" name="critical" id="critical" style="background-color:#000"><strong style="color:red;">Critical: {{$monthlyMetaCollect->where('metaname_name',$keyM)->whereIn('answer_classification',['Critical'])->count()}} | {{number_format(($monthlyMetaCollect->where('metaname_name',$keyM)->whereIn('answer_classification',['Critical'])->count()/$monthlyMetaCollect->where('metaname_name',$keyM)->whereIn('answer_classification',['Good','Bad','Critical','Maintenance-low','Maintenance-medium','Maintenance-high','NA'])->count()* 100),1)}}%</strong></button>
    </form>
          @endif



          @if($monthlyMetaCollect->where('metaname_name',$keyM)->where('answer_classification','Maintenance')->count()>0)
            <form action="{{ route('monthly-reportx',[$monthlyMetaCollect->pluck('property_id')->first(),'Maintenance']) }}" method="PUT" >
                  @csrf
      <input type="hidden" name="_method" value="POST">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <input type="hidden" name="property_id" id="property_id" value="{{$monthlyMetaCollect->pluck('property_id')->first()}}">
          <input type="hidden" name="metaname_id" id="metaname_id" value="{{$monthlyMetaCollect->pluck('metaname_id')->first()}}">
          <input type="hidden" name="asset_id" id="asset_id" value="{{$monthlyMetaCollect->pluck('asset_id')->first()}}">

          <button type="submit" name="maintenance" id="maintenance" style="background-color:yellow"><strong style="color:red;">Maint.: {{$monthlyMetaCollect->where('metaname_name',$keyM)->whereIn('answer_classification',['Maintenance'])->count()}} | {{number_format(($monthlyMetaCollect->where('metaname_name',$keyM)->whereIn('answer_classification',['Maintenance'])->count()/$monthlyMetaCollect->where('metaname_name',$keyM)->whereIn('answer_classification',['Good','Bad','Critical','Maintenance-low','Maintenance-medium','Maintenance-high','NA'])->count()* 100),1)}}%</strong></button>
      </form>
            @endif
        @endisset
</div>
</div>
  </span>
                                                          </div>

                                                        </div>
                                                        <span>
                                                            <span>

                                                         </span>
                                                    </span>
                                                      </li>


@endforeach

                                                    </ul>
                                                  </div>
                                              </div>
                                        </div>


                        </div>
                        @endrole
                        @role('')
                        <div class="alert alert-info">You do not have permission, kindly contact system admin</div>
                        @endrole
               </div>
                </div>
            </div>

@endsection
