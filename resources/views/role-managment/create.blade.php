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
												<h3 class="card-title">Role Form</h3>
												<div class="card-toolbar">
													<div class="example-tools justify-content-center">
														<span class="example-toggle" data-toggle="tooltip" title="View code"></span>
														<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
													</div>
												</div>
											</div>
											<form class="form  mt-12"  method="post" action="{{route('roles.store')}}" >
			@csrf

				<!-- <h4 class="mb-8 font-weight-bold text-dark">Module Details</h4> -->
				<div class="row" >
					<div class="col-lg-12">
						<!--begin::Input-->
						<div class="form-group">
							<label> Role Name</label>
							<input type="text" class="form-control form-control-solid form-control-lg" name="name" placeholder="Name" required="" />
							<span class="form-text text-muted">Please enter Role Name</span>
						</div>
						<!--end::Input-->
					</div>
				</div>
				<div class="container-fluid">
					<!-- <pre/> -->
					@foreach($modules1 as $module)
			
  <h2>{{$module->name}}</h2>

  <div class="row">
  	<!-- <?php print_r($module->children);?> -->
  	@foreach($module->children as $child)

    <div class="col-3 "><input class="Input_change" type="checkbox"  name="module_id[]" value="{{$child->id}}" checked >&nbsp;{{$child->name}}</div>
    @endforeach
   <!--  <div class="col-3 bg-warning">.col-3</div>
    <div class="col-3 bg-success">.col-3</div>
    <div class="col-3 bg-primary">.col-3</div> -->
  </div>
   @endforeach
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