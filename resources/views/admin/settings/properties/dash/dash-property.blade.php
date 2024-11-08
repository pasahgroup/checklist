@extends('layouts.app')
@section('content')
<style>
table, th, td {
  border: 0px solid green;
  border-collapse: collapse;
}
</style>

  <script src="../../img_library/scripts.js" type="text/javascript"></script>
				<!--begin::Content-->
				<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
					<!--begin::Subheader-->
					<div class="subheader py-2 py-lg-6 subheader-solid">
						<div class="container-fluid">
							<nav aria-label="breadcrumb">
															<ol class="breadcrumb bg-white mb-0 px-0 py-2">
											<li class="breadcrumb-item active" aria-current="page">Main Dashboard</li>
									<li class="breadcrumb-item active" aria-current="page">Properties</li>
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
								<div class="col-12">
									<div class="row">
										<div class="col-lg-12 col-xl-12">
											<div class="card card-custom bg-transparent shadow-none border-0" >
												<div class="card-header align-items-center  border-bottom-dark px-0">
													<div class="card-title mb-0">
														<h5 class="card-label mb-0 font-weight-bold text-body">Property List
														</h5>
													</div>
												    <div class="icons d-flex">
														<button  class="btn ml-2 p-0 kt_notes_panel_toggle"
														  data-toggle="tooltip" title="" data-placement="right"
																			data-original-title="Check out more demos" >
														<!-- 	<span class="bg-secondary h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center  rounded-circle shadow-sm ">

																<svg width="25px" height="25px" viewBox="0 0 16 16" class="bi bi-plus white" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
																	<path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
																  </svg>
															</span> -->

														</button>
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
										<div class="col-12 ">
											<div class="card card-custom gutter-b bg-white border-0" >
												<div class="card-body" >
													<div >
														<div class=" table-responsive" id="printableTable">
                                                            <table id="orderTable" class="display" style="width:100%">

																<thead class="text-body">
																	<tr>
																		<th>ID</th>
																		<th >Property Name</th>
																		<th>Category</th>
																		<th>Location</th>
																		<th>Status</th>

																		<th class="no-sort text-right">Action</th>
                                   <th class="no-sort text-right">Indicator Switch</th>
																	</tr>
																</thead>
																<tbody class="kt-table-tbody text-dark">
                                                                    @foreach ($properties as $property)
																	<tr class="kt-table-row kt-table-row-level-0">
																		<td><a href="/report-property/{{$property->id}}" target="_blank">{{ $property->id }}</a></td>
																		<td><a href="/report-property/{{$property->id}}" target="_blank">{{ $property->property_name }}</a></td>
																		<td>{{ $property->property_category }}</td>
																		<td>{{ $property->location_name }}</td>
																		<td>{{ $property->status }}</td>
																		<td>
 <!-- start Modal -->
  <div class="modal fade" id="issue{{ $property->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit: {{ $property->property_name }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           	<form id="myform" action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
			<div class="row">

				<div class="col-12">
					<div class="form-group">
						<label class="text-dark" >Property Name </label>
						<input type="text" name="property_name" class="form-control" value="{{$property->property_name}}">
						<small  class="form-text text-muted">please enter property name</small>
					</div>

                    <div class="form-group">
						<label class="text-dark" >Category</label>
                        <select name="property_category" id="" class="form-control">
                          <option>{{$property->property_category}}</option>
                                        <option>Hotel</option>
                                          <option>Lodge</option>
                                      <option>Camp Site</option>
                                      <option>Other</option>
                        </select>
					</div>

                 <div class="form-group">
						<label class="text-dark" >Rank</label>
                        <select name="property_rank" id="" class="form-control">

                                        <option>{{$property->property_rank}}</option>
                                          <option>0</option>
                                      <option>1</option>
                                      <option>2</option>
                                            <option>3</option>
                                      <option>4</option>
                                      <option>5</option>
                        </select>
					</div>



                         <div class="form-group">
                        <label class="text-dark" >Number of Rooms</label>
                        <input type="number" name="room_no" class="form-control" name="room_no" min="0" required="" value="{{$property->room_no}}">
                        </div>

 	<div class="form-group">
						<label class="text-dark" >Location Name </label>
						<input type="text" name="location_name" class="form-control" value="{{$property->location_name}}">
						<small  class="form-text text-muted">please enter location name</small>
					</div>


                           <div class="form-group">
                        <label class="text-dark" >Phone</label>
                        <input type="number" name="phone" class="form-control" name="phone" min="0" value="{{$property->phone}}">
                        </div>

                       <div class="form-group">
                        <label class="text-dark" >Email</label>
                        <input type="email" name="email" class="form-control" name="email" value="{{$property->email}}">
                        </div>

                <div class="form-group">
                        <label class="text-dark" >Description</label>
                        <textarea class="form-control" rows="3" id="property_description" name="property_description">{{$property->property_description}}</textarea>
                        </div>

			</div>

				     <div class="form-group">
                        <label class="text-dark" >Photo</label>
                        <input type="file" name="attachment[]" onChange="displayImage(this)" id="attachment" accept="image/*" class="" style="display:block;">
                        </div>

{{ URL::asset('/storage/properties/'.$property->photo) }}
   <div class="form-group">
                      <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">
                <!-- <h4>Update image</h4> -->
              </div>
              <img src="{{ URL::asset('/storage/properties/'.$property->photo) }}" onClick="triggerClick()" id="profileDisplay" width="100px">
            </span>
  </div>



			</div>
			 <x-jet-button class="btn-sm btn btn-dark float-right">
                    {{ __('Update') }}
                </x-jet-button>
		  </form>
        </div>

      </div>
    </div>
  </div>
  {{-- end of modal --}}


																			<div class="card-toolbar text-right">
																				<button class="btn p-0 shadow-none" type="button" id="dropdowneditButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																					<span class="svg-icon">
																						<svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-three-dots text-body" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
																							<path fill-rule="evenodd" d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"></path>
																						</svg>
																					</span>
																				</button>
																				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdowneditButton2"  style="position: absolute; transform: translate3d(1001px, 111px, 0px); top: 0px; left: 0px; will-change: transform;">

  <a href="/properties" class="btn-success dropdown-item click-delete" id="click-edit1">Details</a>
                                                                                    <a href="javascript:void(0)" class="dropdown-item click-edit" id="click-edit1" data-toggle="modal" data-target="#issue{{ $property->id }}">Edit</a>
                                                                                    <a href="{{ route('delete-property',$property->id) }}" class="btn-success dropdown-item click-delete" id="click-edit1" onclick="return confirm(id='Are you sure you want to delete this  {{$property->property_name}}')">Delete</a>

                                                                              <!--   <form action="{{ route('properties.destroy',$property->id) }}" method="POST">
                                                                                    @csrf
                                                                                    <input type="hidden" name="_method" value="delete">
																					<input type="submit" class="dropdown-item" value="Delete" onclick="return confirm(id='Are you sure you want to delete this property?')">
                                                                                </form> -->
																				</div>
																				</div>
																		</td>

                                    <!-- update Indicator view -->
                                    <td>
 <!-- start Modal -->
  <div class="modal fade" id="indicator{{ $property->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Switch Indicators On or Off,From not appearing to the surveyed Part</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="myform" action="{{ route('update-time-show',$property->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
      <div class="row">

        <div class="col-12">

                    <div class="form-group">
            <label class="text-dark" >Indicator switch</label>
                        <select name="indicator_setting" id="" class="form-control">
                          <option></option>
                                        <option value="0">Off</option>
                                          <option value="1">On</option>
                        </select>
                          <small  class="form-text text-muted">Once update if On, the Indicators appear for surveyed</small>
          </div>


      </div>
      </div>
       <x-jet-button class="btn-sm btn btn-dark float-right">
                    {{ __('Update') }}
                </x-jet-button>
      </form>
        </div>

      </div>
    </div>
  </div>
  {{-- end of modal --}}


                                      <div class="card-toolbar text-right">
                                        <button class="btn p-0 shadow-none" type="button" id="dropdowneditButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <span class="svg-icon">
                                            <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-three-dots text-body" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                              <path fill-rule="evenodd" d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"></path>
                                            </svg>
                                          </span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdowneditButton2"  style="position: absolute; transform: translate3d(1001px, 111px, 0px); top: 0px; left: 0px; will-change: transform;">


                                                                                    <a href="javascript:void(0)" class="dropdown-item click-edit" id="click-edit1" data-toggle="modal" data-target="#indicator{{ $property->id }}">View</a>
                                                                                                                      </div>
                                        </div>
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


					</div>

				</div>

</body>
</html>
@endsection
