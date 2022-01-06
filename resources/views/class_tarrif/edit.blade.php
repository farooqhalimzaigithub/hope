@extends('layouts.main')
@section('content')
<div class="d-flex flex-column-fluid">
	<!--begin::Container-->
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<!--begin::Card-->
				<!-- <div class="card card-custom gutter-b example example-compact" style="border : 1px solid yellow;"> -->
					<div class="card-header">
						<h3 class="card-title">Bank Account Form</h3>
						<div class="card-toolbar">
							<div class="example-tools justify-content-center">
								<span class="example-toggle" data-toggle="tooltip" title="View code"></span>
								<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
							</div>
						</div>
					</div>
					<form class="form  mt-12"  method="post" action="{{route('class_tarrifs.update',$class_tarrif->id)}}" >
						@csrf
						@method('PUT')

						<!-- <h4 class="mb-8 font-weight-bold text-dark">Module Details</h4> -->
						<div class="row">
							<div class="form-group col-lg-4">
								<label for="inputState">Class Name</label>
								<select id="inputState" name="class_id" class="form-control ">
									<option selected>Choose Fee</option>
									@foreach($classes as $class)
									@if($class->id==$class_tarrif->class_id)
									<option value="{{$class->id}}" selected="">{{$class->name}}</option>
									@else
									<option value="{{$class->id}}">{{$class->name}}</option>
									@endif
									@endforeach
								</select>
							</div>
							<div class="form-group col-lg-4">
								<label for="inputState">Fee Name</label>
								<select id="inputState" name="fee_id" class="form-control ">
									<option selected>Choose Fee</option>
									@foreach($fees as $fee)
									@if($fee->id==$class_tarrif->fee_id)
									<option value="{{$fee->id}}" selected="">{{$fee->name}}</option>
									@else
									<option value="{{$fee->id}}">{{$fee->name}}</option>
									@endif
									@endforeach
								</select>
							</div>
							<div class="col-lg-4">
								<!--begin::Input-->
								<div class="form-group">
									<label> Amount</label>
									<input type="number" value="{{$class_tarrif->amount}}" class="form-control form-control-solid form-control-lg" name="amount"  required="" />
									<!-- <span class="form-text text-muted">Please enter Number</span> -->
								</div>
								<!--end::Input-->
							</div>
							
						</div>
						
						<!-- </div> -->

						<div class="d-flex justify-content-between border-top mt-0 pt-10 pb-10">
						<!-- <div class="mr-2">
							<button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>
						</div> -->
						<div>
							<button type="submit" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4">Update</button>
							
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

