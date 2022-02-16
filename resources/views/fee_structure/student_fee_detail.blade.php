@extends('layouts.main')
@section('content')
<style type="text/css">
	@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap");



.modal-body {
    background-color: #fff;
    border-color: #fff
}

.close {
    color: #000;
    cursor: pointer
}

.close:hover {
    color: #000
}

.form-check-input:checked {
    background-color: #8f37aa;
    border-color: #8f37aa
}

.form-check-input:focus {
    border-color: #8bbafe;
    outline: 0;
    box-shadow: none
}

label.radio {
    cursor: pointer
}

label.radio input {
    position: absolute;
    top: 0;
    left: 0;
    visibility: hidden;
    pointer-events: none
}

label.radio span {
    padding: 7px 12px;
    border: 2px solid #8f37aa;
    display: inline-block;
    color: #8f37aa;
    border-radius: 3px;
    text-transform: capitalize
}

label.radio input:checked+span {
    border-color: #8f37aa;
    background-color: #8f37aa;
    color: #fff
}

.fee {
    padding: 8px;
    border: 1px solid #eee;
    border-radius: 4px;
    box-shadow: 0px 0px 7px rgba(0, 0, 0, 0.2);
    margin-right: 8px
}

label.radio1 {
    cursor: pointer;
    width: 100%;
    margin-right: 7px
}

label.radio1 input {
    position: absolute;
    top: 0;
    left: 0;
    visibility: hidden;
    pointer-events: none
}

label.radio1 span {
    padding: 20px 12px;
    border: 2px solid #8f37aa;
    display: inline-block;
    color: #8f37aa;
    border-radius: 3px;
    text-transform: capitalize;
    width: 100%
}

label.radio1 input:checked+span {
    border-color: #8f37aa;
    background-color: #8f37aa;
    color: #fff
}

.form-control {
    border: 2px solid #ced4da
}

.form-control:focus {
    box-shadow: none;
    border-color: #8f37aa
}

.pay {
    color: #fff;
    background-color: #8f37aa;
    border-color: #8f37aa;
    border-radius: 3px;
    padding: 8px
}

.pay:hover {
    color: #fff;
    background-color: #8f37aa;
    border-color: #8f37aa;
    border-radius: 3px;
    padding: 8px
}

.cancel {
    text-decoration: none;
    color: #8f37aa
}
</style>
<!-- <button type="button" class="btn btn-success launch" data-toggle="modal" data-target="#staticBackdrop"> <i class="fa fa-info"></i> Pay Fee Now </button> -->

<!-- for datatables -->
<!-- <link href="{{asset('assets/data-table-libs/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" /> -->

<!-- <link href="{{asset('assets/data-table-libs/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" /> -->
<!--begin::Content-->
<!-- modal  Start-->

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
         
<table id="example" class="table table-striped table-bordered" >
  <thead>
    <tr>
      <th scope="col">S.NO</th>
      <th scope="col">Month</th>
      <th scope="col">Amount</th>
      <th scope="col">Received Amount</th>
      <!-- <th scope="col">Received Amount</th> -->
      <th scope="col">Balance</th>
      <!-- <th scope="col">Discount</th>
      <th scope="col">Total</th> -->
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="append_here">
  	@foreach($stdRecords as $record)
  	<tr data-id="{{$record->id}}">
  		 <td><input type="hidden" value="{{$record->student->first_name}}" name="">{{$loop->iteration}}</td>
  		 <td>{{$record->month}}</td>
  		 <td>{{$record->amount}}</td>
  		 <td>{{$record->received_amount}}</td>
  		 <td>{{$record->amount-$record->received_amount}}</td>
  		 <td><a href="javascript:void(0)" class="btn btn-success paymentDetailShow" id="paymentDetailShow" data-id="{{$record->id}}" data-amount="{{$record->amount}}" data-received_amount="{{$record->received_amount}}"   data-month="{{$record->month}}"  data-student_class="{{$record->css->class->name}}" data-student_name="{{$record->student->first_name}}" data-student_id="{{$record->student->id}}" data-session_id="{{$record->session->id}}"  data-class_section_session_id="{{$record->css->id}}"  > <i class="fa fa-info">Pay Fee Now</i></a>

  		</td>
  	</tr>
  	@endforeach
   
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

									<div class="modal fade"   id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body ">
                <form method="post" action="javascript:void(0)" id="add_form">
                    <input type="text" name="student_id" class="m_student_id">
                    <input type="text" name="class_section_session_id" class="m_class_section_session_id">
                    <input type="text" name="session_id" class="m_session_id">
             
                <div class="d-flex justify-content-between align-items-center"> <span class="text-uppercase">Pay Now</span> <i class="fa fa-close close" data-dismiss="modal"></i> </div>
                <div class="row mt-3">
                    <div class="col-md-6">

                        <div class="d-flex flex-column"> <small>Student Name</small> <span class="font-weight-bold m_student_name" ></span> </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex flex-column"> <small>Payment Date</small> <span class="font-weight-bolder"><?php echo date('Y-m-d'); ?></span> </div>
                    </div>
                </div>
                <div class="mt-3 d-flex flex-column"> <small >Class</small> <span class="font-weight-bolder m_student_class "></span> </div>
                <div class="mt-3"> <small>Payment Plan</small>
                    <div class="row mt-1">
                        <div class="col-md-6">
                            <div class="form-check"> <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked> <label class="form-check-label" for="flexRadioDefault1"> Monthly </label> </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check"> <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" > <label class="form-check-label" for="flexRadioDefault2"> Weekly </label> </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="mt-3"> <label class="radio"> <input type="radio" name="week" value="1" checked> <span>1st Week</span> </label> <label class="radio"> <input type="radio" name="week" value="2"> <span>2nd Week</span> </label> <label class="radio"> <input type="radio" name="week" value="3"> <span>3rd Week</span> </label> <label class="radio"> <input type="radio" name="week" value="4"> <span>4th Week</span> </label> </div> -->
                <div class="mt-3 text-center fee align-items-center">
                    <h3 class="mb-0 font-weight-light total"></h3>
                </div>
                <!-- <div class="mt-3"> <small>Payment Method</small>
                    <div class="d-flex flex-row"> <label class="radio1"> <input type="radio" name="payment" value="bank"> <span><i class="fa fa-bank"></i> BANK TRANSFER</span> </label> <label class="radio1"> <input type="radio" name="payment" value="card"> <span><i class="fa fa-credit-card-alt"></i> CREDIT CARD</span> </label> </div>
                </div> -->
                <div class="mt-3 mr-2">
                    <div class="row g-2">
                        <div class="col-md-6">
                             <input type="text" class="m_id" name="id" id="id">
                            <div class="inputbox"> <small>Month of Fee</small> <input type="text" class="form-control m_month" name="month" id="model_month"  readonly="" > </div>
                        </div>
                        <div class="col-md-6">
                            <div class="inputbox"> <small>Total Amount</small> <input type="text" class="form-control m_amount" name="amount" id="model_amount" readonly=""> </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3 mr-2">
                    <div class="row g-2">
                        <div class="col-md-6">
                            <div class="inputbox"> <small>Received Amount</small> <input type="text" class="form-control m_received_amount" id="model_received_amount" name="received_amount" readonly=""> </div>
                        </div>
                        <div class="col-md-6">
                            <div class="inputbox"> <small>Paid</small> <input type="text" id="model_payment" class="form-control model_payment" name="paid" > </div>
                        </div>
                        <div class="row g-2">
                        <div class="col-md-6">
                            <div class="inputbox"> <small>Balance</small> <input type="text" class="form-control m_balance" name="balance" id="model_balance" readonly=""> </div>
                        </div>
                       </div>
                    </div>
                </div>
                <!-- <div class="mt-3 mr-2">
                    <div class="row g-2">
                        <div class="col-md-6">
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <div class="inputbox"> <small>Date</small> <input type="text" class="form-control" name=""> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="inputbox"> <small>Month</small> <input type="text" class="form-control" name=""> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="inputbox"> <small>CVV</small> <input type="text" class="form-control" name=""> </div>
                        </div>
                    </div>
                </div> -->
                <hr class="mr-2 mt-4">
                <div class="mt-3 mr-2 d-flex justify-content-end align-items-center"> <a href="#" class="button btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</a> <button class=" ml-2 btn btn-primary btn_paid" id="send_form">PAY NOW</button> </div>
                   </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
 
     <!-- ==================Start Of Edit Footer=============== -->
 <script>
        $(document).ready(function(){
           
            $(document).on('click','.paymentDetailShow',function(e){
            	e.preventDefault();
               $('.m_student_name').text($(this).data('student_name'));
               $('.m_id').val($(this).data('id'));
               $('.m_month').val($(this).data('month'));
               $('.total').text($(this).data('amount'));
               $('.m_amount').val($(this).data('amount'));
               $('.m_received_amount').val($(this).data('received_amount'));
             
               // $('.m_balance').val($(this).data('balance'));
               $('.m_student_class').text($(this).data('student_class'));
                 $('.m_student_id').val($(this).data('student_id'));
                 $('.m_session_id').val($(this).data('session_id'));
                 $('.m_class_section_session_id').val($(this).data('class_section_session_id'));
               $("#staticBackdrop").modal('show');
            });
        });


        $(document).on('keyup', '#model_payment', function () 
        {
				 var  received_amount=$('#model_received_amount').val();
				 var  payment=$(this).val();
				 var total_paid=(+payment+ +received_amount);
        				var  total_amount1=$('#model_amount').val();
        				var  total_amount=parseInt(total_amount1);
        		if (payment <= total_amount){
				        var after_rec=total_amount-total_paid;
				         $('#model_balance').val(after_rec)
        		}else{
        			alert('Paid Amount Must Be Less Then Total');
        			 $('#model_payment').val('');
        			 $('#model_balance').val('')
        			 $('#model_balance').val('')
        		}
				 
        });
// ================  payment   ============= 
$(document).ready(function(){
$('.btn_paid').click(function(e){
   e.preventDefault();
   /*Ajax Request Header setup*/
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
   // Get form
        var form = $('#add_form')[0];
       // Create an FormData object 
        var data = new FormData(form);
   // $('#send_form').html('Sending..');
   // var data = new data(document.getElementById("add_form"));
    console.log(data);
   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('paidPayment')}}",
      type: 'post',
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      success: function(response){
        console.log(response);
        $('#staticBackdrop').modal('hide');
      }
  });
   });
});       
     </script>
    


@endpush