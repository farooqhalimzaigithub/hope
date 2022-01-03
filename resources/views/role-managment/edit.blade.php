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
											<form class="form  mt-12"  method="post" action="{{route('roles.update',$role->id)}}" >
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
				<div class="container-fluid">
					<!-- <pre/> -->
					
					
 
  <p> Asign Permission</p>

  <div class="row">

  	@foreach($modules as $module)

    <div class="col-3 "><input class="Input_change" type="checkbox"  name="module_id[]" value="{{$module->id}}" id="name_id" {{ in_array($module->id, $permissions) ? 'checked' : '' }}>&nbsp;{{$module->name}}</div>
    @endforeach
  </div>
 
</div>


					
					<!-- <div class="col-xl-3">
						<div class="form-group">
							 <label class="" for="name_id">Modules :</label>
						<ul class="inline">
      @foreach($modules as $module)
    
    <li class="inline" id="name_id" style="text-decoration: none; list-style: none;"><i class="lni-check-mark-circle"></i>{{$module->name}}  <input type="checkbox"  data-serv_id="{{$module->id}}" class="custom_module module_checked"  data-id="{{$module->id}}" name="module_id[]"  value="{{$module->id}}"  id="name_id" {{ in_array($module->id, $permissions) ? 'checked' : '' }} /></li>
    @endforeach
    </ul>
                  
						</div>
					</div> -->
					
				
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