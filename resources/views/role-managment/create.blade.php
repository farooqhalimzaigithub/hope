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
											<form class="form  mt-4"  method="post" action="{{route('roles.store')}}" >
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
				<div class="container-fluid" >
					<!-- <pre/> -->
					@foreach($modules1 as $module)
			<div class="whole" >
				
			
  {{$module->name}}&nbsp;&nbsp;<input class="Input_change" type="checkbox"  id="parent_id" name="parent_id[]" value="{{$module->id}}" checked  onchange="checkAll(this)" />

  <div class="row" >
  	@foreach($module->children as $child)
    <div class="col-3 "><input class="Input_change" type="checkbox"  name="module_id[]" value="{{$child->id}}" checked >&nbsp;{{$child->name}}</div>
    @endforeach
  </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

  function checkAll(e){
  	var check=$(e).val();
 //  var g_id=$('#g1').val();
 // alert(check);
  	
	 var divid = $(e).parent().attr('class');
	    var all=$(divid).children(".class_input");
	 // var child= $(divid).find('.class_input');
	  console.log(all);
	 $( all ).each(function( i ) {
    		
           });
	   // console.loge(divid)
// if(){

// 	$(".class_input").prop("checked", false);	
// }else{
// $(".class_input").prop("checked", false);
// }


}


</script>
