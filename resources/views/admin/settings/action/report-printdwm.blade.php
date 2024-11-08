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
                                  <li class="breadcrumb-item active" aria-current="page"><a href="{{ url()->previous() }}" role="button" class="btn-sm btn-primary"><<</a></li>
											<li class="breadcrumb-item active" aria-current="page">General settings</li>
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
														<h5 class="card-label mb-0 font-weight-bold text-body">Properties
														</h5>
													</div>
												    <div class="icons d-flex">
														<!-- <button  class="btn ml-2 p-0 kt_notes_panel_toggle"
														  data-toggle="tooltip" title="" data-placement="right"
																			data-original-title="Check out more demos" >
															<span class="bg-secondary h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center  rounded-circle shadow-sm ">

																<svg width="25px" height="25px" viewBox="0 0 16 16" class="bi bi-plus white" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
																	<path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
																  </svg>
															</span>
														</button> -->

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
                              <h5 id="school_title"><?php echo "Tanzania Specialist";?> </h5>
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


<!-- <form method="Post" action="{{ route('report-viewupdate',$reportDailyReader->id) }}">
    @csrf -->


                                             <p>Property: {{$reportDailyReader->property_name}}<p>
                                               <p>Qno: {{$reportDailyReader->id}}<p>
                                                 <p>Asset: {{$reportDailyReader->asset_name}}<p>
                                                     <p>Qns: {{$reportDailyReader->qns}}<p>

                                                    <div class="form-group">
                                                           <label>Answer:

                                                                                 <select name="optional_id" id="optional_id" class="form-control">
                                                                                   <option value="{{$reportDailyReader->opt_answer_id}}">{{$reportDailyReader->answer}}</option>
                                                                                  @foreach($optAnswers as $optAnswer)
                                                                                  <option value="{{$optAnswer->id}}">{{$optAnswer->answer}}</option>
                                                                                     @endforeach
                                                                             </select></label>
                                                               </div>

                                                            <p>Description: {{$reportDailyReader->description}}<p>
                                                            <p>Photo: <div class=""><img src="{{ URL::asset('/storage/img/'.$reportDailyReader->photo) }}" width="300" height="220"></div>{{$reportDailyReader->photo}}<p>

                                                            <p>--------------------------------------</p>
                                                            <p>Posted by: {{$reportDailyReader->name}}<p>
                                                            <p>Date: {{$reportDailyReader->datex}}<p>
                                                            <p>--------------------------------------</p>

                                                         </div>
                                                         </div>
                                                         <!-- <button type="submit" class="btn btn-primary">Update</button> -->
                                                       <!-- </form> -->

                           <a href="{{ url()->previous() }}" role="button" class="btn btn-primary" onclick="printDiv()">Print</a>
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
</html>
@endsection
