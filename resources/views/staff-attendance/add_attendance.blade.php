@extends('layouts.main')
@section('content')


<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

	 <!-- <div class="subheader py-2 py-lg-6 subheader-transparent" id="kt_subheader">
		<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
			begin::Info
			
			
			<div class="d-flex align-items-center">
				
			</div>
		
		</div>
	</div> -->
	<!--end::Subheader-->
	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Teachers-->
			<div class="d-flex flex-row">
				<!--begin::Aside-->

				<!--end::Aside-->
				<!--begin::Content-->
				<div class="flex-row-fluid ml-lg-8">
					<!--begin::Card-->
					<div class="card card-custom">
						<!--begin::Header-->
						<div class="card-header flex-wrap border-0 pt-6 mg-0 pb-0">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label font-weight-bolder text-dark">Attendance </span>
								<!-- <span class="text-muted mt-1 font-weight-bold font-size-sm">Manage over 1600 Fee Tarrif</span> -->
							</h3>
							<div class="card-toolbar">
								<div class="dropdown dropdown-inline" data-toggle="tooltip" title="">
									<!--begin::Trigger Modal-->
									<!-- <a class="nav-link py-2 px-4 btn btn-primary"  href="#"><i class="ki ki-plus text-light"></i>  Add New</a> -->

									<!--end::Trigger Modal-->
									<!--begin::Modal Content-->

									<!--end::Modal Content-->
								</div>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body">
              <form action="{{route('staff_attendances.store')}}" method="POST" >
                @csrf
                 <div class="row">
                  <div class="form-group">
                       <label class="form-control-label">Date: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="date" value="<?php echo date('Y-m-d'); ?>" name="att_date" required >
                  </div>
                 </div>
          <div class="row">
            <!-- <div class="col-6 p-5 pt-1">
              <select id="inputState" name="staff_id" class="form-control staff_id">
                <option selected>Choose Staff</option>
                @foreach($staffs as $staff)
                <option value="{{$staff->id}}" 
                    >
                    {{ $staff->first_name }}
                    
                </option>
                  @endforeach
              </select>
            </div> -->
          </div>
<table id="example" class="table table-striped table-bordered" >
  <thead>
    <tr>
      <th scope="col">S.NO</th>
      <th scope="col">Name</th>
      <th scope="col">CNIC</th>
      <th scope="col">DOB</th>
      <!-- <th scope="col">Received Amount</th>
      <th scope="col">Discount</th>
      <th scope="col">Balance</th>
      <th scope="col">Total</th> -->
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="append_herew">
  	@foreach($staffs as $staff)
  	<tr data-id="{{$staff->id}}">
  		<td>{{$loop->iteration}}</td>
  		<td>
  		<input type="hidden" name="staff_id[]" value="{{$staff->id}}">
  		{{$staff->first_name}}
  		</td>
  		<td>{{$staff->cnic_no}}</td>
  		<td>{{$staff->dob}}</td>
  		<td >Present
            <input type="checkbox" class="check_id addClass" onclick="clickHandleCheckBox(this)"  name="attendance[]"  value="Present" checked>
            Absent
            <input type="checkbox" class="check_id" onclick="clickHandleCheckBox(this)" name="attendance[]" value="Absent" >
            Leave
            <input type="checkbox" class="check_id" onclick="clickHandleCheckBox(this)" name="attendance[]" value="Leave" > 
             </td>
  	</tr>
  	  @endforeach
   
  </tbody>
</table>
<div class="card-footer">
        <button type="submit" id="submit" class="btn btn-info">Submit</button>
        <!-- <button type="submit" class="btn btn-danger float-right">Cancel</button> -->
    </div>
</form>
</div>

															<!--end::Body-->
														</div>
														<!--end::Card-->
													</div>
													<!--end::Content-->
												</div>
												<!--end::Teachers-->
											</div>
											<!--end::Container-->
										</div>
										<!--end::Entry-->
									</div>
									<!--end::Content-->
									@endsection
									@push('script')
<script >

   // =============select section==================
   var counter=0;
    $(document).on('change', '.staff_id', function () {
            // second method
             var staff_id=$(this).val();
             // aler(class_section_session_id);
             // var product_id = tr.find('.product_id').val();
              console.log(staff_id);
  $.ajax({
         type:'get',
         url: 'staffCommonList',
         data:{'staff_id':staff_id},
        success:function(data){
                // debugger;
              console.log(data);
                 var html="";
  //               var received_amount_sum = 0;
  //               var amount_sum = 0;
  //               var balance_sum = 0;
  //              $('.bd-example-modal-lg').modal('show');
             $.each(data, function(l1, row1)
             {
                 // debugger;
              // $.each(row1, function(l1, rowf)
              // {
              counter++;
                   // debugger;
            // if(rowf.students!=null && rowf.students!="")
            //   {  
                console.log(rowf);
            // debugger;   
             html+=`<tr>
             <td ><input type="hidden" value="`+counter+`" name="raw_row[]">`+counter+`</td>
             <td ><input type="hidden" name="student_id[]" value="`+rowf.id+`" />`+rowf.first_name+`</td>
             <td ><input type="hidden" name="father_name[]" value="`+rowf.father_name+`"  >`+rowf.father_name+`</td><td><input type="hidden" name= "dob[]" value="`+rowf.dob+`" id="dob">`+rowf.dob+`</td>
            <td >Present
            <input type="checkbox" class="check_id addClass" onclick="clickHandleCheckBox(this)"  name="attendance[]"  value="Present" checked>
            Absent
            <input type="checkbox" class="check_id" onclick="clickHandleCheckBox(this)" name="attendance[]" value="Absent" >
            Leave
            <input type="checkbox" class="check_id" onclick="clickHandleCheckBox(this)" name="attendance[]" value="Leave" > 
             </td>
           
                    


              </td>
             
              </tr>`;
            // }
          // }); 
          }); 
            $('#append_herew').empty();
           $('#append_herew').append(html);
        },
         error:function(){
        }
   });
  });   
    
function clickHandleCheckBox(e) {
  var tr=$(e).parent();//get parent of click 
  // console.log(tr);
  tr.find('.check_id').prop('checked',false);//find all inside row or parent
  $(e).prop("checked", true);//checked who click 

}


function checkBoxP() {
   // var tr=$(this).parent().parent();
    // var percentage=tr.find('#percentage').val();
 if ($('#checked_p').is(":checked",true)) {
  alert('checked');
  $("#checked_l").prop("checked", false);
  $("#checked_a").prop("checked", false);
    $(this).prop("checked", true);
    // $("#checked_l").attr("checked", false);
    // $("#checked_a").attr("checked", false);
 }else{
alert('un checked');
// $("#checked_l").attr("checked", false);
//     $("#checked_a").attr("checked", false);
//     $("#checked_p").attr("checked", true);
 }
}
 function checkBoxA() {
 if ($('#checked_a').is(":checked",true)) {
  alert('checked');
   $("#checked_l").prop("checked", false);
  $("#checked_p").prop("checked", false);
  $(this).prop("checked", true);
    // $("#checked_l").attr("checked", false);
    // $("#checked_p").attr("checked", false);
 }else{
alert('un checked');
// $("#checked_l").attr("checked", false);
//     $("#checked_a").attr("checked", true);
//     $("#checked_p").attr("checked", false);
 }
}
 function checkBoxL() {
 if ($('#checked_l').is(":checked",true)) {
  alert('checked');
   $("#checked_a").prop("checked", false);
  $("#checked_p").prop("checked", false);
  $(this).prop("checked", true);
    // $("#checked_a").attr("checked", false);
    // $("#checked_p").attr("checked", false);
 }else{
  // $("#checked_l").attr("checked", true);
  //   $("#checked_a").attr("checked", false);
  //   $("#checked_p").attr("checked", false);
alert('un checked');
 }
}

    // var tr=$(this).parent().parent();
    // var percentage=tr.find('#percentage').val();

   // var tr = $(this).closest('tr');
  // $(".addClass").attr("checked", false); //uncheck all checkboxes
   //check the clicked one

</script>
									<!-- <script src="{{asset('assets/data-table-libs/js/bootstrap.min.js')}}"></script> -->
									<!-- <script src="{{asset('assets/data-table-libs/js/jquery.min.js')}}"></script> -->
									<!-- <script src="{{asset('assets/data-table-libs/js/jquery.dataTables.min.js')}}"></script> -->
									<!-- <script src="{{asset('assets/data-table-libs/js/popper.min.js')}}"></script> -->
									<!-- <script >
										

									</script> -->


									@endpush



