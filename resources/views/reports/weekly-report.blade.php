@extends('layouts.app')
@section('content')

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white mb-0 px-0 py-2">
				<li class="breadcrumb-item " aria-current="page"><a href="/dash-property/{id}" role="button" class="btn-sm btn-primary"><<</a></li>
                    <li class="breadcrumb-item " aria-current="page">{{$property->property_name}}</li>
                    <li class="breadcrumb-item active" aria-current="page"><strong>{{$reportTime}}</strong></li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-xl-12">
                    <div class="card card-custom gutter-b bg-transparent shadow-none border-0" >
                        <div class="card-header align-items-center   border-bottom-dark px-0">
                            <div class="card-title mb-0">
                                <h5 class="card-label mb-0 font-weight-bold text-body">{{$property->property_name}}
                                </h5>
                            </div>
                            <div class="icons d-flex">

                                <a href="#" onclick="printDiv()" class="ml-2">
                                    <span class="icon h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">
                                        <svg width="15px" height="15px" viewBox="0 0 16 16" class="bi bi-printer-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z"/>
                                            <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                                            <path fill-rule="evenodd" d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                          </svg>
                                    </span>

                                </a>
                                <a href="#" class="ml-2" >
                                    <span class="icon h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">
                                        <svg width="15px" height="15px" viewBox="0 0 16 16" class="bi bi-file-earmark-text-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm7 2l.5-2.5 3 3L10 5a1 1 0 0 1-1-1zM4.5 8a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                                          </svg>
                                    </span>

                                </a>

                            </div>
                        </div>

                    </div>


                </div>
            </div>
            <div class="row">
              <div class="col-12 col-md-12">
                 <div class="card card-custom gutter-b bg-white border-0" >

                     <div class="card-body">

            <form method="GET" action="{{ route('weekly-reportx',[$property_id,$status]) }}">
                             <div class="form-group row justify-content-center mb-0">

                                 <div class="col-md-3">
                                     <label class="text-dark">Date Range</label>
                                     @if(!empty($filter_date))
                                     <input type="text" name="date" id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                     <span>selected date is: {{ $filter_date }}</span>
                                     @else
                                     <input type="text" name="date" id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                     @endif

                                     {{-- <div>
                                         <i class="fa fa-calendar"></i>&nbsp;
                                         <span></span> <i class="fa fa-caret-down"></i>
                                     </div> --}}

                                 </div>
                                 <div class="col-md-3">
                                     <div class="form-group mb-0" >
                                         <label class="text-dark" >Select Metaname</label>
                                             <select class="arabic-select w-100 mb-3 h-30px" name="metaname_search" >

                                                 <option value="All">All</option>
                                                @if(!empty($_GET['metaname_search']))
                                                 <option value="<?php echo $_GET['metaname_search'] ?>" selected><?php echo $_GET['metaname_search'] ?></option>
                                                 @endif
                                                 @foreach ($metanames as $meta)
                                                 <option value="{{ $meta->metaname_name }}">{{ $meta->metaname_name }}</option>
                                                 @endforeach

                                             </select>
                                       </div>
                                 </div>

                                 <div class="col-md-3">
                                     <div class="form-group mb-0" >
                                         <label class="text-dark" >Select Key Indicator</label>
                                             <select class="arabic-select w-100 mb-3 h-30px" name="indicator_search" >
                                                 <option value="All" selected>All</option>
                                                 @if(!empty($_GET['indicator_search']))
                                                 <option value="<?php echo $_GET['indicator_search'] ?>" selected><?php echo $_GET['indicator_search'] ?></option>
                                                 @endif
                                                 @foreach ($keyIndicators as $keyInd)
                                                 <option value="{{ $keyInd->key_name }}">{{ $keyInd->key_name }}</option>
                                                 @endforeach
                                             </select>
                                       </div>
                                 </div>

                                 <div class="col-md-3">
                                   <!-- <x-jet-button class="ml-4">
                                       {{ __('Log in') }}
                                   </x-jet-button> -->
                                     <div class="form-group mb-0" >
                                       <x-jet-button class="ml-4 btn-success" name="search" value="search">
                                           {{ __('Search') }}
                                       </x-jet-button>
                                       <x-jet-button class="ml-4 btn-primary" name="print" value="print">
                                           {{ __('Print') }}
                                       </x-jet-button>
                                       </div>
                                 </div>
                             </div>
                           </form>
                     </div>
                 </div>
             </div>

                <div class="col-lg-12 col-xl-12">
                    <div class="card card-custom gutter-b bg-white border-0" >
                        <div class="card-body" >
                            <div >
                                <div class=" table-responsive" id="printableTable">
                                    <table id="orderTable" class="display" style="width:100%">

                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Metaname</th>
                                            <th>Asset name</th>
                                            <th>Questions</th>
                                            <th>Answer</th>
                                            <th>Status</th>
                                            <th>Description</th>
                                            <th>Posted by</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="kt-table-tbody text-dark">
                                        @foreach ($reportWeeklyData as $weeklyData)
                                        <tr class="kt-table-row kt-table-row-level-0">
                                            <td>{{ $weeklyData->id }}</td>
                                            <td>{{ $weeklyData->metaname_name }}</td>
                                            <td>{{ $weeklyData->asset_name }}</td>
                                            <td>{{ $weeklyData->qns }}</td>
                                            <td>{{ $weeklyData->answer }}</td>
                                              <td @if($weeklyData->answer_classification ==='Bad') style="background-color:yellowGreen;"@endif 
  @if($weeklyData->answer_label ==='Maintenance-low') style="background-color:#efca1f;"@endif @if($weeklyData->answer_label ==='Maintenance-medium') style="background-color:#db6515;"@endif @if($weeklyData->answer_label ==='Maintenance-high') style="background-color:#db5a5a;"@endif

                                                @if($weeklyData->answer_classification ==='Good') style="background-color:green;"@endif>{{ $weeklyData->answer }}@if($weeklyData->answer_label !='no_value') ({{$weeklyData->answer_label}}) @endif</td>
                                            <!-- <td><div class="logo mr-auto"><img src="{{ URL::asset('/storage/img/'.$weeklyData->photo) }}" width="60" height="40"></div></td> -->
                                            <td>{{ $weeklyData->description }}</td>
                                            <td>{{ $weeklyData->name }}</td>
                                            <td>{{ date("d-M-Y", strtotime($weeklyData->datex)) }}</td>
                                            <td>

                                                <form method="post" action="{{ route('report-view-print',[$weeklyData->id,$weeklyData->property_id]) }}">
                                                @csrf
                                                <input type="hidden" name="_method" value="post">
                                                <input type="hidden" name="uri" value="{{$_SERVER['REQUEST_URI']}}">
                                                <!-- <button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete this customer?')">
                                                    <span class="fa fa-eye"><span></button> -->
                                                    <button class="btn btn-success btn-sm" type="submit">
                                                    <span class="fa fa-eye"><span></button>
                                             </form>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>


                        </div>
                    </div>


                </div>
            </div>

        </div>

    </div>

</div>



@endsection
