
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
						<li class="breadcrumb-item active" aria-current="page"><strong>
              <select class="arabic-select w-100 mb-3 h-30px" name="property_search" >
                  <option value="{{$property->id ?? 0}}">{{$property->property_name?? 0}}</option>
                 @if(!empty($_GET['property_search']))
                  <option value="<?php echo $_GET['property_search'] ?>" selected><?php echo $_GET['property_search'] ?></option>
                  @endif

                  @foreach ($propertiesNames as $pname)
                  <option value="{{ $pname->id }}">{{ $pname->property_name }}</option>
                  @endforeach
              </select>
            </strong></li>

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
 @role('Admin|GeneralAdmin|SuperAdmin')
                    <div class="col-12 col-md-12">
                    <div class="card card-custom gutter-b bg-white border-0" >
                        <div class="card-body">
                            <form method="GET" action="{{ route('report-action',$property->id) }}" @if ($prnt=="1") target="_blank" @endif>
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
                                            <label class="text-dark" >Select property name</label>
                                                <select class="arabic-select w-100 mb-3 h-30px" name="property_search" >
                                                    <!-- <option value="All">All</option> -->
                                                   @if(!empty($_GET['property_search']))
                                                    <option value="<?php echo $_GET['property_search'] ?>" selected><?php echo $_GET['property_search'] ?></option>
                                                    @endif
                                                    @foreach ($propertiesNames as $pname)
                                                    <option value="{{ $pname->id }}">{{ $pname->property_name }}</option>
                                                    @endforeach

                                                </select>
                                          </div>
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
                                                    <!-- <option value="All" selected>All</option> -->
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
                        <div class="card-body">
                            <div>
                                <div class="table-responsive" id="printableTable">
                                    <table id="orderTable" class="display" style="width:100%">

                                        <thead>
                                            <tr>
                                            <th>Id</th>
                                            <th>Metaname</th>
                                            <th>Asset name</th>
                                            <th>Questions</th>
                                            <th>Answer</th>
                                            <th>Answer status</th>
                                              <th>Photo</th>
                                            <th>Posted by</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="kt-table-tbody text-dark">
                                        @foreach ($reportDailyReader as $dailyDataR)
                                        <tr class="kt-table-row kt-table-row-level-0">
                                            <td>{{ $dailyDataR->id }}</td>
                                            <td>{{ $dailyDataR->metaname_name }}</td>
                                            <td>{{ $dailyDataR->asset_name }}</td>
                                            <td>{{ $dailyDataR->qns }}</td>
                                            <td>{{ $dailyDataR->answer }}</td>
                                            <td @if($dailyDataR->answer_classification ==='Bad') style="background-color:yellowGreen;"@endif @if($dailyDataR->answer_classification ==='Critical') style="background-color:maroon;"@endif @if($dailyDataR->answer_classification ==='Good') style="background-color:green;"@endif>{{ $dailyDataR->answer_classification }}</td>
                                          							<td><div class="logo mr-auto"><img src="{{ URL::asset('/storage/img/'.$dailyDataR->photo) }}" width="60" height="40"></div></td>
                                            <td>{{ $dailyDataR->name }}</td>
                                            <td>{{ date("d-M-Y", strtotime($dailyDataR->datex)) }}</td>
                                            <td>
                                                  <form method="post" action="{{ route('report-view-post',[$dailyDataR->id,$id]) }}">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="post">
                                                    <input type="hidden" name="uri" value="{{$_SERVER['REQUEST_URI']}}">
                                                    <button class="btn btn-success btn-sm" type="submit">
                                                    <span class="fa fa-eye"><span></button>

<!-- <button href="" role="button" type="Submit"><span class="btn-sm btn-primary"><i class="fa fa-eye"></i><span></button> -->
                                                    <!-- <a href="/report-view/{{$dailyDataR->id}}/{{$id}}"  <span class="fa fa-eye"><span></a> -->
                                                </form>
                                            </td>

                                        </tr>
                                            @endforeach
                                        </tbody>
                                    <tfoot>

                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>{{-- number_format($total_request->total_request) --}}</th>
                                    <th></th>
                                    <th></th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>


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
