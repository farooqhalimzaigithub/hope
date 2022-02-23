@extends('layouts.main')
@section('content')
<!-- Modal -->
     <div class="modal fade bs-example-modal-lg ShowAttendance" id="ShowAttendance" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Attendance Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form  method="post"  id="contact_us"  action="#">
                  @csrf
                <div class="form-row">
                   <div class="form-group col-md-4">
                      <label for="fees">Attendance Date</label>
                      <input type="date" class="form-control" id="att_date" name="att_date" />
                    </div>
                </div>
                <div class="form-row">
                    
                    <div class="form-group col-md-6">
                      <label for="received_amount">Class</label>
                      <input type="text" class="form-control" id="class_name"  name="class_section_session_id" readonly="" />
                      <input type="hidden" id="class_section_session_id"  name="class_section_session_id" />
                    </div>
                    <div class="form-group col-md-6">
                      <label for="student_name">Student</label>
                      <input type="text" class="form-control" name="student_id" id="student_name" placeholder="Name" readonly="">
                    </div>
                    
                  </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="hidden" id="attendance" name="attendance">
                      <label for="student_name">Attendance</label><br>
                      Present
                      <input type="checkbox"  class="common" value="Present"  id="present" onclick="clickHandleCheckBox(this)">&nbsp;&nbsp;&nbsp;Absent
                      <input type="checkbox"   class="common" value="Absent"  id="absent" onclick="clickHandleCheckBox(this)">&nbsp;&nbsp;
                      Leave
                      <input type="checkbox"   class="common"  value="Leave" id="leave" onclick="clickHandleCheckBox(this)">
                    </div>
                   
                    
                </div> 
                  <input type="hidden" name="att_id" id="att_id" value="att_id" />
                  <!-- <input type="text" name="old_balance" id="old_balance" /> -->
                  <!-- <input type="hidden" name="fee_id"  id="fee_id" /> -->
                 
               
                
            </div>
            <div class="modal-footer">
               <!--  <button type="reset" class="btn btn-light-primary font-weight-bold" data-dismiss="modal" form="fee-collection">Reset</button> -->
                <button class="btn btn-primary font-weight-bold" id="send_form" type="submit" form="fee-collection">Save</button>

            </div>
            </form>
        </div>
        </div>
    </div>
    <!-- end row -->
<!-- modal  Start-->

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
  <div class="alert alert-success d-none" align="center" id="msg">
    <!-- @if(Session::has('message')) -->
        <strong></strong>
    <!-- @endif -->
</div>

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
								<span class="card-label font-weight-bolder text-dark">Show All Attendances </span>
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
              <form action="{{route('student_attendances.store')}}" method="POST" >
                @csrf
                 <!-- <div class="row">
                  <div class="form-group">
                       <label class="form-control-label">Date: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="date" value="<?php echo date('Y-m-d'); ?>" name="att_date" required >
                  </div>
                 </div> -->
          <div class="row">
            <div class="col-4 p-5 pt-1">
               <label class="form-control-label">Class: <span class="text-danger">*</span></label>
              <select id="inputState" name="class_section_session_id" class="form-control class_section_session_id">
                <option selected>Choose Class</option>
                @foreach($classSectionSession as $record)
                <option value="{{$record->id}}" 
                    >
                    {{ $record->class->name }}
                    
                </option>
                  @endforeach
              </select>
            </div>
            <div class="col-4 p-5 pt-1">
               <label class="form-control-label">Section: <span class="text-danger">*</span></label>
              <select  name="section_id" id="section_append_here" class="form-control section_id">
                <option selected>Choose Section</option>
               
              </select>
            </div>
            <div class="col-4 p-5 pt-1">
              <label class="form-control-label">Date: <span class="text-danger">*</span></label>
                      <input class="form-control att_date" type="date" value="<?php echo date('Y-m-d'); ?>" name="att_date" required >
            </div>
            <div class="row">
                 <div class="col-4 p-5 pt-1 pl-9">
                      <button class="btn btn-primary search" type="button"  name="search" required >Search</button>
                  </div>
                 </div>
          </div>
          <hr>
<table id="example" class="table table-striped table-bordered" >
  <thead>
    <tr>
      <th >S.NO</th>
      <th scope="col">Name</th>
      <th scope="col">Class</th>
      <th scope="col">Attendance Date</th>
      <th scope="col">Attendance Status</th>
      <!-- <th scope="col">Received Amount</th>
      <th scope="col">Discount</th>
      <th scope="col">Balance</th>
      <th scope="col">Total</th> -->
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="append_herew">
   
  </tbody>
</table>
<!-- <div class="card-footer"> -->
        <!-- <button type="submit" id="submit" class="btn btn-info">Submit</button> -->
        <!-- <button type="submit" class="btn btn-danger float-right">Cancel</button> -->
    <!-- </div> -->
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
  var s_count=0;
      $(document).on('change', '.class_section_session_id', function () {
            // second method
             var class_section_session_id=$(this).val();
             // aler(class_section_session_id);
             // var product_id = tr.find('.product_id').val();
              console.log(class_section_session_id);
  $.ajax({
         type:'get',
         url: 'sessionList',
         data:{'class_section_session_id':class_section_session_id},
        success:function(data){
               // debugger;
              // console.log(data);
                // debugger;
               var op = "<option value=''>Choose</option>";
              $.each(data, function(k,row){
                // debugger;
                console.log(row.section);
                 // $.each(row.section, function(k,row1){
                  // debugger;
            op+= "<option value='"+row.section.id+"'>"+row.section.name+"</option>";
            // debugger;
               // });  
               }); 
               // debugger; 
              $('#section_append_here').empty("");
             $('#section_append_here').append(op);
        },
         error:function(){
        }
   });
  });

   // =============select section==================
   var counter=0;
    $(document).on('click', '.search', function () {
            // second method
             var att_date=$('.att_date').val();
             var section_id=$('.section_id').val();
             var class_section_session_id=$('.class_section_session_id').val();
             // aler(class_section_session_id);
             // var product_id = tr.find('.product_id').val();
              console.log(att_date);
              console.log(section_id);
              console.log(class_section_session_id);
  $.ajax({
         type:'get',
         url: 'sectionListShow',
         data:{'section_id':section_id,'att_date':att_date,'class_section_session_id':class_section_session_id},
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
              // $.each(row1.students, function(l1, rowf)
              // {
              counter++;
                   // debugger;
            // if(rowf.students!=null && rowf.students!="")
            //   {  
                // console.log(rowf);
            // debugger;   
             html+=`<tr>
             <td ><input type="hidden" value="`+counter+`" name="raw_row[]">`+counter+`</td>
             <td ><input type="hidden" name="student_id[]" value="`+row1.student.id+`" />`+row1.student.first_name+`</td>
              <td ><input type="hidden" name="student_id[]" value="`+row1.css.class.id+`" />`+row1.css.class.name+`</td>
             <td ><input type="hidden" name="att_date[]" value="`+row1.att_date+`"  >`+row1.att_date+`</td>`;
             if(row1.attendance =='Present'){
           html+=`<td><span class="badge bg-success font-size-12"> Present</span> </td>`;
            }
            if( row1.attendance =='Leave'){
               html+=`<td><span class="badge bg-info font-size-12"> Leave</span> </td>`;
            }
            if(row1.attendance =='Absent'){
               html+=`<td><span class="badge bg-danger font-size-12"> Absent</span> </td>`;
            }
             html+=`<td><a href="#" class="text-success" data-bs-toggle="modal" onclick="getPayment('${encodeURIComponent(JSON.stringify(row1))}')"><i class="fa fa-edit text-primary mr-5">Attendance</i></a></td></tr>`;
          }); 
            $('#append_herew').empty();
           $('#append_herew').append(html);
        },
         error:function(){
        }
   });
  });   
    
function clickHandleCheckBox(e) {
  // console.log(e).sibling();
 var sibling= $(e).siblings();
 var checked= $(e).val();
  console.log(sibling);
  // var tr=$(e).parent();//get parent of click 
 var p=(sibling).parent();
  // alert(p);
  // console.log(tr);
  p.find('.common').prop('checked',false);//find all inside row or parent
  $(e).prop("checked", true);//checked who click 

  $('#attendance').val(checked);

}


    // var tr=$(this).parent().parent();
    // var percentage=tr.find('#percentage').val();

   // var tr = $(this).closest('tr');
  // $(".addClass").attr("checked", false); //uncheck all checkboxes
   //check the clicked one
// ===========================show model ==============
function getPayment(obj){
            var obj = JSON.parse(decodeURIComponent(obj))
            console.log(obj);
          // get fetch record from obj
            var student_name = obj.student.first_name;
            var class_name = obj.css.class.name;
            var attendance = obj.attendance;
            var att_date = obj.att_date;
            var att_id = obj.id;
      // putting val in field
            $('#att_id').val(att_id);
            $('#student_name').val(student_name);
            $('#class_name').val(class_name);
            // $('#attendance').val(attendance);
            $('#att_date').val(att_date);
               $('#leave').prop('checked',false);
               $('#absent').prop('checked',false);
               $('#present').prop('checked',false);
            if(obj.attendance=="Present"){//this is for check or un check in model
               // $('#present').val(attendance);
               $('#present').prop('checked',true);
            }
            if(obj.attendance=="Absent"){
               // $('#absent').val(attendance);
               $('#absent').prop('checked',true);
            }
            if(obj.attendance=="Leave"){
               // $('#leave').val(attendance);
               $('#leave').prop('checked',true);
            }
            $('#ShowAttendance').modal('show');
       }

       // for updating
       
       $(document).ready(function() {
        $("#send_form").on('click',function(){
    // var formData = new FormData($(this)[0]);
    var formData = new FormData(document.getElementById("contact_us"));
    console.log(formData);
      $.ajax({
            method: 'post',
            processData: false,
            contentType: false,
            cache: false,
            data: formData,
            dataType:'json',
            enctype: 'multipart/form-data',
             url: 'submitAttendance',
         success: function(data) {
          console.log(data);
           $('#ShowAttendance').modal('hide');
          $('#msg').removeClass('d-none').text(data.message).fadeIn('slow');
     //$('#msg').html("data insert successfully").fadeIn('slow') //also show a success message 
           $('#msg').delay(5000).fadeOut('slow')
            // console.log(data);
         }
      });
    });
});




</script>
									<!-- <script src="{{asset('assets/data-table-libs/js/bootstrap.min.js')}}"></script> -->
									<!-- <script src="{{asset('assets/data-table-libs/js/jquery.min.js')}}"></script> -->
									<!-- <script src="{{asset('assets/data-table-libs/js/jquery.dataTables.min.js')}}"></script> -->
									<!-- <script src="{{asset('assets/data-table-libs/js/popper.min.js')}}"></script> -->
									<!-- <script >
										

									</script> -->


									@endpush



