@extends('layouts.main')
@section('content')
<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<div class="row">
									<div class="col-lg-12 bg-white">
										<!--begin::Card-->
										<!-- <div class="card card-custom gutter-b example example-compact" style="border : 1px solid yellow;"> -->
											<div class="card-header">
												<h3 class="card-title">User Form</h3>
												<div class="card-toolbar">
													<div class="example-tools justify-content-center">
														<span class="example-toggle" data-toggle="tooltip" title="View code"></span>
														<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
													</div>
												</div>
											</div>
											<form class="form  mt-4"  method="POST" action="{{  route('register') }}" >
			@csrf

				<!-- <h4 class="mb-8 font-weight-bold text-dark">Module Details</h4> -->
				<div class="row" >
					<div class="col-lg-3">
						<!--begin::Input-->
						
							<label> Name</label>
							<input type="text" class="form-control form-control-solid form-control-lg" name="name" placeholder="Name" />
							<span class="form-text text-muted">Please enter  Name</span>
						
						<!--end::Input-->
					</div>
					<div class="col-lg-3">
						<!--begin::Input-->
						<!-- <div class="form-group"> -->
							<label> Email</label>
							<input type="email" class="form-control form-control-solid form-control-lg" name="email" placeholder="Email" />
							<span class="form-text text-muted">Please enter Email</span>
						<!-- </div> -->
						<!--end::Input-->
					</div>
					<div class="col-lg-3">
						<!--begin::Input-->
						<!-- <div class="form-group"> -->
							<label>Password</label>
							<input type="password" class="form-control form-control-solid form-control-lg" name="password" placeholder="password" />
							<span class="form-text text-muted">Please enter Password</span>
						<!-- </div> -->
						<!--end::Input-->
					</div>
					<div class="col-lg-3">
						<!--begin::Input-->
						<!-- <div class="form-group"> -->
							<label>Password</label>
							<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
							<span class="form-text text-muted">Please enter Confirm Password</span>
						<!-- </div> -->
						<!--end::Input-->
					</div>
					<div class="col-lg-3">
						<!-- <div class="form-group"> -->
							<label>Role</label>
							<select name="role_id" required="true" class="form-control form-control-solid form-control-lg">
								<option value=""> Select Role </option>
								@foreach($roles as $role)
								<option value="{{$role->id}}">{{$role->name}}</option>
								@endforeach
							</select>
						<!-- </div> -->
					</div>
				</div>
					
					<div class="d-flex justify-content-between border-top mt-0 pt-10 pb-10">
						<!-- <div class="mr-2">
							<button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>
						</div> -->
						<div>
							<button type="submit" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4">Submit</button>
							
						</div>
					</div>
														<!--end::Wizard Actions-->
				</form>
											
											<!--end::Body-->
										<!-- </div> -->
										<!--end::Mixed Widget 17-->
									<!-- </div> -->
									
								</div>
								</div>
								</div>
								</div>
								<!--end::Row-->
								
								<!--end::Row-->
								<!--end::Dashboard-->
							<!-- </div> -->
							<!--end::Container-->
						<!-- </div> -->
						<!--end::Entry-->
					<!-- </div> -->
@endsection