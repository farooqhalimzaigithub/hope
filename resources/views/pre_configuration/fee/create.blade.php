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
												<h3 class="card-title">Fee   Form</h3>
												<div class="card-toolbar">
													<div class="example-tools justify-content-center">
														<span class="example-toggle" data-toggle="tooltip" title="View code"></span>
														<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
													</div>
												</div>
											</div>
											<form class="form  mt-4"  method="post" action="{{route('fees.store')}}" >
			@csrf

				<!-- <h4 class="mb-8 font-weight-bold text-dark">Module Details</h4> -->
				<div class="row">
					<div class="col-xl-4">
						<!--begin::Input-->
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control form-control-solid form-control-lg" name="name"  required="" />
							<!-- <span class="form-text text-muted">Please enter Name</span> -->
						</div>
						<!--end::Input-->
					</div>
					<div class="form-group col-lg-4">
								<label for="inputState">Fee Category</label>
								<select id="inputState" name="fee_category_id" class="form-control ">
									<option selected>Choose Fee Category</option>
									@foreach($fee_categories as $fee_category)
									<option value="{{$fee_category->id}}">{{$fee_category->name}}</option>
									@endforeach
								</select>
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