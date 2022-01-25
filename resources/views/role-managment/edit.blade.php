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
												<h3 class="card-title">Role Form</h3>
												<div class="card-toolbar">
													<div class="example-tools justify-content-center">
														<span class="example-toggle" data-toggle="tooltip" title="View code"></span>
														<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
													</div>
												</div>
											</div>
											<form class="form  mt-4"  method="post" action="{{route('roles.update',$role->id)}}" >
			@csrf
			@method('PUT')

				<!-- <h4 class="mb-8 font-weight-bold text-dark">Module Details</h4> -->
				<div class="row">
					<div class="col-lg-12">
						<!--begin::Input-->
						
							<label>Role Name</label>
			 				<input type="text" class="form-control form-control-solid form-control-lg" name="name" placeholder="Name" value="{{$role->name}}" />
							<span class="form-text text-muted">Please enter Role Name</span>
						
						<!--end::Input-->
					</div>
				</div>

<div class="container-fluid modules-wrapper">
	<div>check all <label><input type="checkbox" onchange="checkUncheckAll(this)"></label></div>
	<hr />
		@foreach($modules1 as $module)
<div class="whole" >
	<h6><label class="pointer">{{$module->name}}&nbsp;<input class="Input_change" type="checkbox"  name="module_id[]" value="{{$module->id}}" onchange="toggleCheckBoxes(this)" {{ in_array($module->id, $permissions) ? 'checked' : '' }}/></label></h6>

<div class="row" >
	@foreach($module->children as $child)
	<div class="col-3 "><label class="pointer"><input class="Input_change" type="checkbox"  name="module_id[]" value="{{$child->id}}" {{ in_array($child->id, $permissions) ? 'checked' : '' }}>&nbsp;{{$child->name}}</label></div>
	@endforeach
</div>
<hr />
</div>
@endforeach
</div>
				
				
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

  function toggleCheckBoxes(e){
	var $checks  = $(e).parents('.whole').find(".Input_change");
   	var $ckall = $(e);

    $.each($checks, function(){
        $(this).prop("checked", $ckall.prop('checked'));
    });
  }

  function checkUncheckAll(e){

	var $checks  = $(e).parents('.modules-wrapper').find(".Input_change");
   	var $ckall = $(e);

    $.each($checks, function(){
        $(this).prop("checked", $ckall.prop('checked'));
    });
  }

</script>