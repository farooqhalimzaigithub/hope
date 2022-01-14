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
						<h3 class="card-title">Bank Account Form</h3>
						<div class="card-toolbar">
							<div class="example-tools justify-content-center">
								<span class="example-toggle" data-toggle="tooltip" title="View code"></span>
								<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
							</div>
						</div>
					</div>
					<form class="form  mt-4"  method="post" action="{{route('bank_accounts.update',$bank_account->id)}}" >
						@csrf
						@method('PUT')

						<!-- <h4 class="mb-8 font-weight-bold text-dark">Module Details</h4> -->
						<div class="row">
							<div class="col-lg-4">
								<!--begin::Input-->
								<div class="form-group">
									<label>Account Name</label>
									<input type="text" class="form-control form-control-solid form-control-lg" name="account_name"  value="{{$bank_account->account_name}}"  required="" />
									<!-- <span class="form-text text-muted">Please enter Name</span> -->
								</div>
								<!--end::Input-->
							</div>
							<div class="col-lg-4">
								<!--begin::Input-->
								<div class="form-group">
									<label>Account Number</label>
									<input type="text" class="form-control form-control-solid form-control-lg" value="{{$bank_account->account_no}}"  name="account_no"  required="" />
									<!-- <span class="form-text text-muted">Please enter Number</span> -->
								</div>
								<!--end::Input-->
							</div>
							<div class="form-group col-lg-4">
								<label for="inputState">Bank Name</label>
								<select id="inputState" name="bank_id" class="form-control ">
									<option selected>Choose Bank</option>
									@foreach($banks as $bank)
									<option value="{{$bank->id}}">{{$bank->bank_name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-lg-4">
								<label for="inputState">Branch Name</label>
								<select id="inputState" id="branch_id" name="branch_id" class="form-control branch_id ">
									<option selected>Choose Branch</option>
									@foreach($branches as $branch)
									<option value="{{$branch->id}}">{{$branch->branch_name}}</option>
									@endforeach
								</select>
							</div>
							<div class="col-lg-4">
								<!--begin::Input-->
								<div class="form-group">
									<label>Branch Code</label>
									<input type="number" class="form-control form-control-solid form-control-lg branch_code" value="{{$bank_account->branch_code}}"  readonly="" id="branch_code" name="branch_code"  required="" />
									<!-- <span class="form-text text-muted">Please Enter  Branch Code</span> -->
								</div>
								<!--end::Input-->
							</div>
							<div class="col-lg-4">
								<!--begin::Input-->
								<div class="form-group">
									<label>Opening Balance</label>
									<input type="number" class="form-control form-control-solid form-control-lg" name="opening_balance" value="{{$bank_account->opening_balance}}"  required="" placeholder="0.0" />
									<!-- <span class="form-text text-muted">Please enter Opening Balance</span> -->
								</div>
								<!--end::Input-->
							</div>
						</div>
						<!-- </div> -->

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
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
</script>


<script >
	
		$(document).on('change', '.branch_id', function () {
            // second method
             var branch_id=$(this).val();
             // var product_id = tr.find('.product_id').val();
              console.log(branch_id);
  $.ajax({
        type:'get',
        // url:'{!!URL::to('categoryFind')!!}',
         url: '/getBranch',
        data:{'branch_id':branch_id},
        success:function(data){
             console.log(data);
            // this is sec method for get current price and qty in every row  
              $('#branch_code').val(data.branch_code);
              // tr.find('#stock_quantity').val(data[0].quantity);
              //  $('#price'+quantity_price_id).val("");
        }
   });
  });

</script>