@extends('layouts.main')
@section('content')
<!-- for datatables -->
<!-- <link href="{{asset('assets/data-table-libs/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" /> -->

<!-- <link href="{{asset('assets/data-table-libs/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" /> -->
<!--begin::Content-->
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
                    @if($record->section)
                    {{ ' | '.$record->section->name }}
                    @endif
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
      <th scope="col">Class</th>
      <th scope="col">Fee Amount</th>
      <th scope="col">Received Amount</th>
      <th scope="col">Discount</th>
      <th scope="col">Balance</th>
      <th scope="col">Total</th>
      <!-- <th scope="col">Action</th> -->
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
  var count=0;
      $(document).on('change', '.class_section_session_id', function () {
            // second method
             var class_section_session_id=$(this).val();
             // aler(class_section_session_id);
             // var product_id = tr.find('.product_id').val();
              console.log(class_section_session_id);
  $.ajax({
         type:'get',
         url: 'classWiseRecord',
         data:{'class_section_session_id':class_section_session_id},
        success:function(response){
       // debugger;
              console.log(response);
               var html="";
            $.each(response, function(l1, row1)
            {
                // debugger;
            //   $.each(row1.student_fee, function(l1, rowf)
            // {
              count++;
                  // debugger;
           if(row1.student!=null && row1.student!="")
           {  
           // debugger;   
             html+=`<tr>
             <td ><input type="hidden" value="`+count+`" name="raw_row[]">`+count+`</td>
             <td ><input type="hidden"  ><input type="hidden" name= "student_id[]" value="`+row1.student.first_name+`" id="student_id">`+row1.student.first_name+`</td>
             <td ><input type="hidden" name= "class_section_session_id[]" value="`+class_section_session_id+`" class="form-control" id="class_section_session_id">`+row1.css.class.name+`</td>
             <td ><input type="hidden" value="`+row1.id+`" name= "amount[]" id="amount" >`+row1.fee_tarrif.amount+`</td>
             // <td ><input type="hidden" name= "received_amount[]"  >`+row1.received_amount+`</td><td ><input type="hidden" name= "discount[]"  >`+row1.received_amount+`</td>
             // <td ><input type="hidden" name= "balance[]"  >`+row1.balance+`</td>
             // <td ><input type="hidden" name= "total[]"  >`+row1.total+`</td>
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
</script>
									<!-- <script src="{{asset('assets/data-table-libs/js/bootstrap.min.js')}}"></script> -->
									<!-- <script src="{{asset('assets/data-table-libs/js/jquery.min.js')}}"></script> -->
									<!-- <script src="{{asset('assets/data-table-libs/js/jquery.dataTables.min.js')}}"></script> -->
									<!-- <script src="{{asset('assets/data-table-libs/js/popper.min.js')}}"></script> -->
									<!-- <script >
										
									</script> -->


									@endpush



