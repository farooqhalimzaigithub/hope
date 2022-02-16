@extends('layouts.main')
@section('content')
<!-- for datatables -->
<!-- <link href="{{asset('assets/data-table-libs/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" /> -->

<!-- <link href="{{asset('assets/data-table-libs/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" /> -->
<!--begin::Content-->
<!-- modal  Start-->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    	<div class="container">
    		<div class="row col-lg-12"  >
    			<div class="card-header">
    				<h3>This is Header</h3>
    			</div>
    			<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">S.NO</th>
      <th scope="col">Month Of Fee</th>
      <th scope="col">Amount </th>
      <th scope="col">Received Amount</th>
      <th scope="col">Balance </th>
    </tr>
  </thead>
  <tbody id="append_here_modal">
    
  </tbody>
</table>
    		</div>
    		<div class="row col-lg-12" style="border: 1px solid black; height: 200px;">
    			<div class="">
    				<h3>Other Details of fee</h3>
    			</div>
    		</div>
    		
    	</div>
   
    </div>
  </div>
</div>
<!-- modal  Start-->

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Subheader-->
	<div class="subheader py-2 py-lg-6 subheader-transparent" id="kt_subheader">
		<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
			<!--begin::Info-->
			
			<!--end::Info-->
			<!--begin::Toolbar-->
			<div class="d-flex align-items-center">
				<!--begin::Actions-->

				<!--end::Dropdown-->
			</div>
			<!--end::Toolbar-->
		</div>
	</div>
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
						<div class="card-header flex-wrap border-0 pt-6 pb-0">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label font-weight-bolder text-dark">All Fee Dteail</span>
								<!-- <span class="text-muted mt-1 font-weight-bold font-size-sm">Manage over 1600 Fee Tarrif</span> -->
							</h3>
							<div class="card-toolbar">
								<div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="left" data-original-title="Quick actions">
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
          <div class="row">
            <div class="col-4 p-5 pt-1">
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
          </div>
<table id="example" class="table table-striped table-bordered" >
  <thead>
    <tr>
      <th scope="col">S.NO</th>
      <th scope="col">Name</th>
      <th scope="col">F/Name</th>
      <th scope="col">CNIC</th>
      <!-- <th scope="col">Received Amount</th>
      <th scope="col">Discount</th>
      <th scope="col">Balance</th>
      <th scope="col">Total</th> -->
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="append_here">
   
  </tbody>
</table>
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
         url: 'feeDetailGet',
         data:{'class_section_session_id':class_section_session_id},
        success:function(response){
       // debugger;
              console.log(response);
               var html="";
               var url="";
            $.each(response, function(l1, row1)
            {
                // debugger;
            //   $.each(row1.student_fee, function(l1, rowf)
            // {
              s_count++;
                  // debugger;
           if(row1.student!=null && row1.student!="")
           {  
           // debugger; 
           url="{{url('getfeePayment')}}/"+row1.student.id;  
             html+=`<tr>
             <td ><input type="hidden" value="`+s_count+`" name="raw_row[]">`+s_count+`</td>
             <td ><input type="hidden" name="student_hidden_id[]" value="`+row1.student.id+`"  ><input type="hidden" name= "student_id[]" value="`+row1.student.first_name+`" id="student_id">`+row1.student.first_name+`</td>
            <td ><input type="hidden" name= "received_amount[]"  >`+row1.student.father_name+`</td><td ><input type="hidden" name= "discount[]"  >`+row1.student.dob+`</td>
            <td>
                    <a type="button" class="btn btn-success paymentDetailShow" id="paymentDetailShow" onclick="getPayment('${encodeURIComponent(JSON.stringify(row1))}')"> view Detail Payment</a>

        <a href="`+url+`" class="btn btn-sm btn-primary"><i class="fa fa-eye">Payment</i></a>
        


              </td>
             
              </tr>`;
            }
           // }); 
          }); 
            $('#append_here').empty();
           $('#append_here').append(html);
        },
         error:function(){
        }
   });
  });


  var counter=0;
       function getPayment(obj){
        // alert(12)
        var obj = JSON.parse(decodeURIComponent(obj))
        console.log(obj);
        // var student_name = document.getElementById();
        var student_id = obj.student.id;
        // console.log(student_id);
        $.ajax({
         type:'get',
         url: 'getStudentRecord',
         data:{'student_id':student_id},
        success:function(response){
       // debugger;
              console.log(response);

                var html="";
                var received_amount_sum = 0;
                var amount_sum = 0;
                var balance_sum = 0;
               $('.bd-example-modal-lg').modal('show');
             $.each(response, function(l1, row1)
             {
                // debugger;
            //   $.each(row1.student_fee, function(l1, rowf)
            // {
              counter++;
                  // debugger;
           // if(row1.student!=null && row1.student!="")
           // {  
           // debugger;   
             html+=`<tr>
             <td ><input type="hidden" value="`+counter+`" name="raw_row[]">`+counter+`</td>
             <td ><input type="hidden" name= "received_amount[]"  >`+row1.month+`</td>
             <td ><input type="hidden" name="amount[]"value="`+row1.amount+`"  >`+row1.amount+`</td><td><input type="hidden" name= "received_amount[]" value="`+row1.received_amount+`" id="received_amount">`+row1.received_amount+`</td>
            <td ><input type="hidden" name= "balance[]"  >${row1.amount - row1.received_amount}</td>
            <td>
                    


              </td>
             
              </tr>`;
            // }
           // }); 
           received_amount_sum = received_amount_sum + parseInt(row1.amount);
           amount_sum = amount_sum + parseInt(row1.received_amount);
           balance_sum+= parseInt(row1.amount) - parseInt(row1.received_amount);
          }); 
             html += `<tr ><td colspan="2" style="font-size:24px;  font-weight: bold;">Total</td><td style="font-weight: bold;">${received_amount_sum}</td><td style="font-weight: bold;">${amount_sum}</td><td style="font-weight: bold;">${balance_sum}</td></tr>`
            $('#append_here_modal').empty();
           $('#append_here_modal').append(html);
        },
         error:function(){
        }
   });



    }

</script>
									<!-- <script src="{{asset('assets/data-table-libs/js/bootstrap.min.js')}}"></script> -->
									<!-- <script src="{{asset('assets/data-table-libs/js/jquery.min.js')}}"></script> -->
									<!-- <script src="{{asset('assets/data-table-libs/js/jquery.dataTables.min.js')}}"></script> -->
									<!-- <script src="{{asset('assets/data-table-libs/js/popper.min.js')}}"></script> -->
									<script >
										

									</script>


									@endpush



