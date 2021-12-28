@extends('layouts.main')
@section('content')
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
											<h4 class="mb-8 mt-6 font-weight-bold text-dark">Update Role Details</h4>
											<form class="form  mt-12"  method="post" action="{{route('roles.update',$role->id)}}" >
			@csrf
			@method('PUT')

				<!-- <h4 class="mb-8 font-weight-bold text-dark">Module Details</h4> -->
				<div class="row">
					<div class="col-xl-12">
						<!--begin::Input-->
						<div class="form-group">
							<label>Role Name</label>
			 				<input type="text" class="form-control form-control-solid form-control-lg" name="name" placeholder="Name" value="{{$role->name}}" />
							<span class="form-text text-muted">Please enter Role Name</span>
						</div>
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
					
				
					<div class="d-flex justify-content-between border-top mt-5 pt-10">
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
						</div>
						<!--end::Entry-->
					</div>
@endsection