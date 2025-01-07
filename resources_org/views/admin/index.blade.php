@extends('layouts.app')
@section('content')
<style>
table, th, td {
  border: 1px solid green;
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
                        <li class="breadcrumb-item active" aria-current="page">General Dashboard Report</li>
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
						   <div class="col-lg-12 col-xl-12 col-sm-12">
                    <div class="card card-custom gutter-b bg-white border-0" >
                        <div class="card-body">
                            <div>
                                <div class="table-responsive" id="printableTable">
                                    <table id="orderTable" class="display" style="width:100%">


                                        <thead>
									 <tr>
									  <th>Property Name</th>
                <th colspan="3">Daily Report</th>
                <th colspan="3">Weekly Report</th>
				 <th colspan="3">Monthly Report</th>
            </tr>
				<tr>
				<th>Property name</th>


               <th>Good</th>
                <th>Bad</th>
				 <th>Critical</th>
				</div>
				<th>Good</th>
                <th>Bad</th>
				 <th>Critical</th>

				<th>Good</th>
                <th>Bad</th>
				 <th>Critical</th>
            </tr>
                                        </thead>
                                        <tbody class="kt-table-tbody text-dark">
										 @foreach ($properties as $property)
										<tr class="kt-table-row kt-table-row-level-0">

										   <td>
										   <a href="/report-property/{{$property->id}}/dashboard">
										 {{ $property->property_name }}
										 </a>
										  </td>
							<td style="background-color: @if ($dataDaily->where('property_id',$property->id)->where('answer_classification','Good')->count()>0)green @endif">
                             <a href="/daily-report/property/{{$property->id}}/Good">

										{{$dataDaily->where('property_id',$property->id)->where('answer_classification','Good')->count()}}

										  </a>
										 </td>
										 <td style="background-color: @if ($dataDaily->where('property_id',$property->id)->where('answer_classification','Good')->count()>0)yellowGreen @endif">
										  <a href="/daily-report/property/{{$property->id}}/Bad">
											 {{$dataDaily->where('property_id',$property->id)->where('answer_classification','Bad')->count()}}
											 </a>
										 </td>
										<td style="background-color: @if ($dataDaily->where('property_id',$property->id)->where('answer_classification','Good')->count()>0)maroon @endif">
										 <a href="/daily-report/property/{{$property->id}}/Critical">
										{{$dataDaily->where('property_id',$property->id)->where('answer_classification','Critical')->count()}}
										</a>
										</td>

										<td style="background-color: @if ($dataDaily->where('property_id',$property->id)->where('answer_classification','Good')->count()>0)green @endif">
										 <a href="/weekly-report/property/{{$property->id}}/Good">
										{{$dataWeekly->where('property_id',$property->id)->where('answer_classification','Good')->count()}}
										</a>
										</td>
										
										  <td style="background-color: @if ($dataDaily->where('property_id',$property->id)->where('answer_classification','Good')->count()>0)yellowGreen @endif">
											 <a href="/weekly-report/property/{{$property->id}}/Bad">

											{{$dataWeekly->where('property_id',$property->id)->where('answer_classification','Bad')->count()}}
										</a>
										</td>
										 <td style="background-color: @if ($dataDaily->where('property_id',$property->id)->where('answer_classification','Good')->count()>0)maroon @endif">
										 <a href="/weekly-report/property/{{$property->id}}/Critical">
										{{$dataWeekly->where('property_id',$property->id)->where('answer_classification','Critical')->count()}}
										</a>

										</td>

										  <td style="background-color: @if ($dataDaily->where('property_id',$property->id)->where('answer_classification','Good')->count()>0)green @endif">
										 <a href="/monthly-report/property/{{$property->id}}/Good">
										{{$dataMonthly->where('property_id',$property->id)->where('answer_classification','Good')->count()}}
										 </a>
										 </td>
										 <td style="background-color: @if ($dataDaily->where('property_id',$property->id)->where('answer_classification','Good')->count()>0)yellowGreen @endif">
											  <a href="/monthly-report/property/{{$property->id}}/Bad">
											 {{$dataMonthly->where('property_id',$property->id)->where('answer_classification','Bad')->count()}}
										</a>
										</td>
										<td style="background-color: @if ($dataDaily->where('property_id',$property->id)->where('answer_classification','Good')->count()>0)maroon @endif">
										  <a href="/monthly-report/property/{{$property->id}}/Critical">
										 {{$dataMonthly->where('property_id',$property->id)->where('answer_classification','Critical')->count()}}
										</a>
										</td>
										</tr>
										 @endforeach

                                        {{-- @foreach ($reportDailyReader as $dailyDataR)
                                        <tr class="kt-table-row kt-table-row-level-0">
                                            <td>{{ $dailyDataR->id }}</td>
                                            <td>{{ $dailyDataR->metaname_name }}</td>
                                            <td>{{ $dailyDataR->asset_name }}</td>
                                            <td>{{ $dailyDataR->qns }}</td>
                                            <td>{{ $dailyDataR->answer }}</td>
                                            <td @if($dailyDataR->answer_classification ==='Bad') style="background-color:yellowGreen;"@endif @if($dailyDataR->answer_classification ==='Critical') style="background-color:maroon;"@endif @if($dailyDataR->answer_classification ==='Good') style="background-color:green;"@endif>{{ $dailyDataR->answer_classification }}</td>
                                            <td>{{ $dailyDataR->name }}</td>
                                            <td>{{ date("d-M-Y", strtotime($dailyDataR->datex)) }}</td>
                                            <td>
                                                <form action="#" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="delete">
                                                    <!-- <button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete this customer?')">
                                                        <span class="fa fa-eye"><span></button> -->

                                                        <button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete this data?')">
                                                        <span class="fa fa-eye"><span></button>
                                                </form>
                                            </td>

                                        </tr>
										@endforeach --}}
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

                            @role('Admin|Account|SuperAdmin')
                            @isset($pending_orders)
                                        <div class="col-lg-4  col-xl-4 col-md-4">

                                            <div class="card card-custom gutter-b bg-white border-0">
                                                <div class="card-header align-items-center  border-0">
                                                    <div class="card-title mb-0">
                                                        <h3 class="card-label text-body font-weight-bold mb-0">Report
                                                        </h3>
                                                    </div>

                                                </div>
                                                <div class="card-body px-0">
                                                    <ul class="list-group scrollbar-1" style="height: 300px;">
                                                        <a href="/order">
                                                      <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between py-2">
                                                        <div class="list-left d-flex align-items-center">
                                                            <span class="d-flex align-items-center justify-content-center rounded svg-icon w-45px h-45px bg-primary text-white mr-2">
                                                                <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-lightning-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"/>
                                                                  </svg>
                                                              </span>
                                                          <div class="list-content">
                                                            <span class="list-title text-body">Pending Report</span>
                                                            <span class="text-muted d-block text-success">
                                                                {{ $pending_orders->orders_count }}
                                                              Rep</span>
                                                          </div>

                                                        </div>
                                                        <span>
                                                            <span>
                                                            {{$pending_orders->orders_count}}
                                                         </span>
                                                    </span>
                                                      </li>
                                                    </a>
                                                      <a href="/outstandings">
                                                      <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between py-2">
                                                        <div class="list-left d-flex align-items-center">
                                                            <span class="d-flex align-items-center justify-content-center rounded svg-icon w-45px h-45px bg-secondary text-white mr-2">
                                                                <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-bar-chart-line-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2z"/>
                                                                  </svg>
                                                              </span>
                                            <div class="list-content">
                                            <span class="list-title text-body">Outstandings</span>
                                            <span class="text-muted d-block text-success">
                                                {{-- number_format($overdue->overdue_count) --}} Reportx</span>
                                            </div>
                                                        </div>

                                                      </li>
                                                    </a>
                                                    <a href="/payment">
                                                      <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between py-2">
                                                        <div class="list-left d-flex align-items-center">
                                                            <span class="d-flex align-items-center justify-content-center rounded svg-icon w-45px h-45px bg-success text-white mr-2">
                                                                <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-credit-card-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0V4z"/>
                                                                    <path fill-rule="evenodd" d="M0 7v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7H0zm3 2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1H3z"/>
                                                                  </svg>
                                                              </span>
                                                          <div class="list-content">
                                                            <span class="list-title text-body">Data</span>
                                                            <span class="text-muted d-block text-success">
                                                                Report</span>
                                                          </div>
                                                        </div>
                                                        <span>report</span>
                                                      </li>
                                                    </a>

                                                    </ul>
                                                  </div>
                                              </div>
                                        </div>


                                        <div class="col-lg-4  col-xl-4 col-md-4">
                            <div class="card card-custom gutter-b bg-white border-0">
                                <div class="card-header align-items-center  border-0">
                                    <div class="card-title mb-0">
                                        <h3 class="card-label text-body font-weight-bold mb-0">Report2
                                        </h3>
                                    </div>

                                </div>
                                <div class="card-body px-0">
                                    <ul class="list-group scrollbar-1" style="height: 300px;">
                                      <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between py-2">
                                        <div class="list-left d-flex align-items-center">
                                            <span class="d-flex align-items-center justify-content-center rounded svg-icon w-45px h-45px bg-primary text-white mr-2">
                                               <i class="fa fa-home"></i>
                                              </span>
                                          <div class="list-content">
                                            <span class="list-title text-body">Top report</span>
                                            <span class="text-muted d-block text-success"> {{ $top_shop->warehouse ?? '-' }}</span>
                                          </div>

                                        </div>
                                        <span>
                                            <span>
                                                 {{ number_format($top_shop->total_selling ?? 0 )}}
                                         </span>
                                    </span>
                                      </li>
                                      <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between py-2">
                                        <div class="list-left d-flex align-items-center">
                                            <span class="d-flex align-items-center justify-content-center rounded svg-icon w-45px h-45px bg-secondary text-white mr-2">
                                                <i class="fa fa-user"></i>
                                              </span>
                                          <div class="list-content">
                                            <span class="list-title text-body">Top Report</span>
                                            <span class="text-muted d-block text-success">{{ $top_customer->customer_name ?? '-'}}</span>
                                          </div>
                                        </div>
                                        <span>  {{ number_format($top_customer->total_selling ?? 0) }}</span>
                                      </li>
                                      <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between py-2">
                                        <div class="list-left d-flex align-items-center">
                                            <span class="d-flex align-items-center justify-content-center rounded svg-icon w-45px h-45px bg-success text-white mr-2">
                                                <i class="fa fa-shopping-cart"></i>
                                              </span>
                                          <div class="list-content">
                                            <span class="list-title text-body">Top Report</span>
                                            <span class="text-muted d-block text-success">{{ $top_product->item ?? '-' }}</span>
                                          </div>
                                        </div>
                                        <span> {{ number_format($top_product->total_value ?? 0) }}</span>
                                      </li>
                                    </ul>
                                  </div>
                              </div>
                        </div>

                            <div class="col-lg-4 col-xl-4 col-md-4">
                                            <div class="card card-custom gutter-b bg-white border-0">
                                                <div class="card-header align-items-center  border-0">
                                                    <div class="card-title mb-0">
                                                        <h3 class="card-label text-body font-weight-bold mb-0">Online Staff
                                                        </h3>
                                                    </div>

                                                </div>
                                                <div class="card-body px-0">
                                                    <ul class="list-group scrollbar-1" style="height: 300px;">
                                                      @foreach ($sessions as $session)
                                                      <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between py-2">
                                                        <div class="list-left d-flex align-items-center">
                                                            <span class="d-flex align-items-center justify-content-center rounded svg-icon w-45px h-45px  text-white mr-2">
                                                                <i class="fa fa-user text-success"></i>
                                                              </span>
                                                          <div class="list-content">
                                                            <span class="list-title text-body">{{ $session->name }}</span>
                                                            <?php $dates = date("Y-m-d H:i:s", $session->last_activity) ?>
                                                            <small class="text-muted d-block">{{ \Carbon\Carbon::now()->diffForHumans($dates) }}</small>
                                                          </div>
                                                        </div>
                                                        <span>{{ date("H:i:s", $session->last_activity)}}</span>
                                                      </li>
                                                      @endforeach

                                                    </ul>
                                                  </div>
                                              </div>
                                        </div>
                            @endisset
                            @endrole

                        </div>
                        @endrole
                        @role('')
                        <div class="alert alert-info">You do not have permission, kindly contact system admin</div>
                        @endrole
               </div>
                </div>
            </div>
    @endsection
