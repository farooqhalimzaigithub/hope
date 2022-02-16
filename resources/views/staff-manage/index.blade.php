@extends('layouts.main')
@section('content')


					<!-- for datatables -->
					<!-- <link href="{{asset('assets/data-table-libs/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
						<link href="{{asset('assets/data-table-libs/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" /> -->
						<!--begin::Content-->
						<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
							<!-- The Modal -->
							<div class="modal fade" id="myModal">
								<div class="modal-dialog">
									<div class="modal-content">

										<!-- Modal Header -->
										<div class="modal-header">
											<h4 class="modal-title">Modal Heading</h4>
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>

										<!-- Modal body -->
										<div class="modal-body">
											Modal body
										</div>

										<!-- Modal footer -->
										<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
										</div>

									</div>
								</div>
							</div>
							<!--begin::Subheader-->
							<div class="subheader py-2 py-lg-6 subheader-transparent" id="kt_subheader">
								<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
									<!--begin::Info-->

									<!--end::Info-->
									<!--begin::Toolbar-->
									<div class="d-flex align-items-center">
										<!--begin::Actions-->

										<!--end::Dropdown-->
									</div>
									<!--end::Toolbar-->
								</div>
							</div>
							<!--end::Subheader-->
							<!--begin::Entry-->
							<div class="d-flex flex-column-fluid">
								<!--begin::Container-->
								<div class="container">
									<!--begin::Teachers-->
									<div class="d-flex flex-row">
										<!--begin::Aside-->

										<!--end::Aside-->
										<!--begin::Content-->
										<div class="flex-row-fluid ml-lg-8">
											<!--begin::Card-->
											<div class="card card-custom">
												<!--begin::Header-->
												<div class="card-header flex-wrap border-0 pt-6 pb-0">
													<h3 class="card-title align-items-start flex-column">
														<span class="card-label font-weight-bolder text-dark">staffs</span>
														<!-- <span class="text-muted mt-1 font-weight-bold font-size-sm">Manage over 1600 staff</span> -->
													</h3>
													<div class="card-toolbar">
														<div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="left" data-original-title="Quick actions">
															<!--begin::Trigger Modal-->
															<a class="nav-link py-2 px-4 btn btn-primary"  href="{{route('staffs.create')}}"><i class="ki ki-plus text-light"></i>  Add New</a>

															<!--end::Trigger Modal-->
															<!--begin::Modal Content-->

															<!--end::Modal Content-->
														</div>
													</div>
												</div>
												<!--end::Header-->
												<!--begin::Body-->
												<div class="card-body">
													<!--begin: Search Form-->
													<!--begin::Search Form-->

													<table id="example" class="table table-striped table-bordered" style="width:100%">
														<thead>
															<tr>
																<th>#</th>
																<th>Reg No#</th>
																<th>Profile Picture</th>
																<th> Name</th>
																<th> Date Of Birth</th>
																<th>CNIC</th>
																<!-- <th>Staff Category</th> -->
																<!-- <th>Designation</th>
																<th>Appointment Date</th> -->
								<th>Action</th>

							</tr>
						</thead>
					 	<tbody>
							@foreach($staffs as $staff)
							<tr data-id={{$staff->id}}>
								<td>{{$loop->iteration}}</td>
								<td>{{$staff->registration_no}}</td>
								<td><img src="{{asset('images/'.$staff->image)}} " class="rounded-circle avatar-xs" alt="profile" width="20" height="20" /></td>
								<td>{{$staff->first_name.' '.$staff->last_name.' '.$staff->sur_name}}</td>
								<td>{{$staff->dob}}</td>
								<td>{{$staff->cnic_no}}</td>
								 <!-- you can get all detail through relation -->
								<td>
									<a type="button" class="btn btn-icon btn-light btn-hover-primary btn-sm" data-toggle="modal" data-target="#myModal">
										<i class="fa fa-eye text-success"></i>
									</a>
									<a href="{{route('staffs.edit',$staff->id)}}" class="btn btn-icon btn-light btn-hover-primary btn-sm" >
										<i class="fa fa-edit text-success" aria-hidden="true"></i>
									</a>
									<a href="{{url('staff-delete',$staff->id)}}" class="btn btn-icon btn-light btn-hover-danger btn-sm">
										<i class="fa fa-trash text-success"></i>
									</a>
											<!-- <form method="post" action='{{route("staffs.destroy",$staff->id) }}'>
												{{csrf_field()}}
												{{method_field('DELETE')}}
												<button type="submit" class=" btn-primary"><i class="fa fa-trash text-danger mr-5"></i></button>
											</form> --></td>
										</tr>
										@endforeach
									</tbody>

								</table>
								<!--begin: Datatable-->
								<div class="datatable datatable-bordered " id="">

								</div>
								<!--end: Datatable-->
							</div>
							<!--end::Body-->
						</div>
						<!--end::Card-->
					</div>
					<!--end::Content-->
				</div>
				<!--end::Teachers-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Entry-->
	</div>
	<!--end::Content-->
	<!-- <div class="modal-dialog modal-lg" id="myModal">...</div> -->
	@endsection

	@push('script')
					<!-- <script src="{{asset('assets/data-table-libs/js/bootstrap.min.js')}}"></script>
					<script src="{{asset('assets/data-table-libs/js/jquery.min.js')}}"></script>
					<script src="{{asset('assets/data-table-libs/js/jquery.dataTables.min.js')}}"></script>
					<script src="{{asset('assets/data-table-libs/js/popper.min.js')}}"></script> -->






					@endpush



