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
						<h3 class="card-title">Session</h3>
						<div class="card-toolbar">
							<div class="example-tools justify-content-center">
								<span class="example-toggle" data-toggle="tooltip" title="View code"></span>
								<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
							</div>
						</div>
					</div>
					<form class="form  mt-4"  method="post" action="{{route('sessions.store')}}" >
						@csrf

						<!-- <h4 class="mb-8 font-weight-bold text-dark">Module Details</h4> -->
						<div class="row" >
							<div class="col-xl-4">
								<!--begin::Input-->
								<div class="form-group">
									<label>Session Name<span class="text-danger">*</span></label>
									<input type="text" class="form-control " name="name"  required="" />
									<!-- <span class="form-text text-muted">Please enter Name</span> -->
								</div>
								<!--end::Input-->
							</div>
							<div class="col-xl-4">
								<!--begin::Input-->
								<div class="form-group">
									<label>Start Date<span class="text-danger">*</span></label>
									<input type="date" class="form-control " name="start_date" value='<?php echo date('Y-m-d');?>'  required="" />
									<!-- <span class="form-text text-muted">Please enter Name</span> -->
								</div>
								<!--end::Input-->
							</div>

							<div class="col-xl-4">
								<!--begin::Input-->
								<div class="form-group">
									<label>End Date<span class="text-danger">*</span></label>
									<input type="date" class="form-control " name="end_date" value='<?php echo date('Y-m-d');?>'  required="" />
									<!-- <span class="form-text text-muted">Please enter Name</span> -->
								</div>
								<!--end::Input-->
							</div>
							</div>
							<div class="row">
							<div class="col-xl-6">
								<!--begin::Input-->
								<div class="form-group">
									<label>Session Status<span class="text-danger">*</span></label>
									<select  name="status" class="form-control select2" required="true">
										<option value="1">Start</option>
										<option value="0">End</option>
									</select>
								</div>
								<!--end::Input-->
							</div>
						</div>

						<div class="d-flex justify-content-between border-top mt-0 pt-10 pb-10">
						<!-- <div class="mr-2">
							<button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>
						</div> -->
						<div>
							<button type="submit" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4">submit</button>
							
						</div>
					</div>
					<!--end::Wizard Actions-->
				</form>

				<!--end::Body-->
			</div>
			<!--end::Mixed Widget 17-->
		</div>

	</div>
	<!--end::Row-->

	<!--end::Row-->
	<!--end::Dashboard-->
</div>
<!--end::Container-->

@endsection