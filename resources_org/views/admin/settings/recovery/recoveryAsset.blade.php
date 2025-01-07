@extends('layouts.app')
@section('content')
  <script src="../../img_library/scripts.js" type="text/javascript"></script>
				<!--begin::Content-->
				<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
					<!--begin::Subheader-->
					<div class="subheader py-2 py-lg-6 subheader-solid">
						<div class="container-fluid">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb bg-white mb-0 px-0 py-2">
									<li class="breadcrumb-item active" aria-current="page">Data Recovery</li>
									<li class="breadcrumb-item active" aria-current="page">Assets</li>
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
														<h4 class="card-label mb-0 font-weight-bold text-body">List of Deleted Assets
														</h4>
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

										<div class="col-12 ">
											<div class="card card-custom gutter-b bg-white border-0" >
												<div class="card-body" >
													<div >
														<div class=" table-responsive" id="printableTable">
                                                            <table id="orderTable" class="display" style="width:100%">

																<thead class="text-body">
																	<tr>
																		<th>ID</th>
																		<th >Asset Name</th>
																		<th>Asset Type</th>
																		<th>Asset Serial no</th>
																   	<th>Asset Tag no</th>
                                    <th>Property Name</th>
                                    <th>Image</th>
																	  <th class="d-none d-lg-block">Descriptions</th>
																		<th>Status</th>
																		<th class="no-sort text-right">Action</th>
																	</tr>
																</thead>
																<tbody class="kt-table-tbody text-dark">
                                                                    @foreach ($assets as $asset)
																	<tr class="kt-table-row kt-table-row-level-0">
																		<td >{{ $asset->id }}</td>
																		<td>{{ $asset->asset_name }}</td>
																		<td>{{ $asset->asset_type }}</td>
                                    <td>{{ $asset->asset_serial_no }}</td>
                                    <td>{{ $asset->asset_tag_no }}</td>
                                      <td>{{ $asset->property_name }}</td>
																		 <td><div class="logo mr-auto"><img src="{{ URL::asset('/storage/properties/'.$asset->photo) }}" width="60" height="40"></div></td>

																		<td>{{ $asset->asset_description }}</td>
																		<td>{{ $asset->status }}</td>
																		<td>
 <!-- start Modal -->
  <div class="modal fade" id="issue{{ $asset->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit {{ $asset->item }}</h5>
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
						<input type="text" name="property_name" class="form-control" value="{{$asset->property_name}}">
						<small  class="form-text text-muted">please enter property name</small>
					</div>

                    <div class="form-group">
						<label class="text-dark" >Category</label>
                        <select name="property_category" id="" class="form-control">
                          <option>{{$asset->property_name}}</option>
                                        <option>Hotel</option>
                                          <option>Lodge</option>
                                      <option>Camp Site</option>
                                      <option>Other</option>
                        </select>
					</div>

                 <div class="form-group">
						<label class="text-dark" >Rank</label>
                        <select name="property_rank" id="" class="form-control">

                                        <option>{{$asset->property_rank}}</option>
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
                        <input type="number" name="room_no" class="form-control" name="room_no" min="0" required="" value="{{$asset->room_no}}">
                        </div>

 	<div class="form-group">
						<label class="text-dark" >Location Name </label>
						<input type="text" name="location_name" class="form-control" value="{{$asset->location_name}}">
						<small  class="form-text text-muted">please enter location name</small>
					</div>


                           <div class="form-group">
                        <label class="text-dark" >Phone</label>
                        <input type="number" name="phone" class="form-control" name="phone" min="0" value="{{$asset->phone}}">
                        </div>

                       <div class="form-group">
                        <label class="text-dark" >Email</label>
                        <input type="mail" name="email" class="form-control" name="email" value="{{$asset->email}}">
                        </div>

                <div class="form-group">
                        <label class="text-dark" >Description</label>
                        <textarea class="form-control" rows="3" id="property_description" name="property_description">{{$asset->property_description}}</textarea>
                        </div>

				</div>

				     <div class="form-group">
                        <label class="text-dark" >Photo</label>
                        <input type="file" name="attachment[]" onChange="displayImage(this)" id="attachment" accept="image/*" class="" style="display:block;">
                        </div>


   <div class="form-group">
                      <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">
                <!-- <h4>Update image</h4> -->
              </div>
              <img src="images/no.png" onClick="triggerClick()" id="profileDisplay" width="100px">
            </span>
  </div>



			</div>
			<button type="submit" class="btn btn-primary">Update</button>
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


                                                                                    <a href="{{ route('recovery-assets',$asset->id) }}" class="btn-success dropdown-item click-delete" id="click-edit1" onclick="return confirm(id='Are you sure you want to Recovery this  {{$asset->asset_name}}')">Recovery</a>


                                                                                <form action="{{ route('assets_.destroy',$asset->id) }}" method="POST">
                                                                                    @csrf
                                                                                    <input type="hidden" name="_method" value="delete">
																					<input type="submit" class="dropdown-item" value="Permanent delete" onclick="return confirm(id='Are you sure you want to delete Permanently this Asset?')">
                                                                                </form>
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


	<iframe name="print_frame" width="0" height="0"  src="about:blank"></iframe>

</body>
<!--end::Body-->

</html>
@endsection
