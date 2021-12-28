@extends('layouts.main')
@section('content')
<style >
	/*.Input_change{
		display: inline;

	}*/
	/*.div_change{
		display: inline-block;
	}*/
</style>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Dashboard-->
								<!--begin::Row-->
								<div class="row mt-0 mt-lg-1" >
									<div class="col-xl-12">
										<!--begin::Mixed Widget 17-->
										<div class="card card-custom gutter-b card-stretch "  >
											<h4 class="mb-8 mt-6 font-weight-bold text-dark">Role Details</h4>
											<form class="form  mt-12"  method="post" action="{{route('roles.store')}}" >
			@csrf

				<!-- <h4 class="mb-8 font-weight-bold text-dark">Module Details</h4> -->
				<div class="row">
					<div class="col-xl-12">
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
  <!-- <p>You can also Asign Permission</p> -->

  <div class="row">
  	<!-- <?php print_r($module->children);?> -->
  	@foreach($module->children as $child)

    <div class="col-3 "><input class="Input_change" type="checkbox"  name="module_id[]" value="{{$child->id}}">&nbsp;{{$child->name}}</div>
    @endforeach
   <!--  <div class="col-3 bg-warning">.col-3</div>
    <div class="col-3 bg-success">.col-3</div>
    <div class="col-3 bg-primary">.col-3</div> -->
  </div>
   @endforeach
</div>
					<div class="d-flex justify-content-between border-top mt-5 pt-10">
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
						</div>
						<!--end::Entry-->
					</div>
@endsection