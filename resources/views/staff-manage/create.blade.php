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
						<h3 class="card-title">Staff Form</h3>
						<small class="text-danger">The * fields must be required</small>
						<div class="card-toolbar">
							<div class="example-tools justify-content-center">
								<span class="example-toggle" data-toggle="tooltip" title="View code"></span>
								<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
							</div>
						</div>
					</div>
					<form class="form  mt-2 "  method="post" action="{{route('staffs.store')}}"  enctype="multipart/form-data" >
						@csrf
						
						<h4 class="mb-8 font-weight-bold text-dark">Personal Details</h4>
						
						
						<div class="row">
							<div class="col-lg-9" style="float: left; " >

								<div class="form-row">
									<div class="form-group col-lg-4">
								<label for="inputCity">First Name <span class="text-danger">*</span></label>
								<input type="text" name="first_name" class="form-control" id="inputCity" required="">
							</div>
							<div class="form-group col-lg-4">
								<label for="inputCity">Last Name <span class="text-danger">*</span></label>
								<input type="text" name="last_name" class="form-control" id="inputCity" required="">
							</div>
							<div class="form-group col-lg-4">
								<label for="inputCity">Surname</label>
								<input type="text" name="sur_name" class="form-control" id="inputCity">
							</div>
							

									
								</div>
								<div class="row">
									<div class="form-group col-lg-4">
								<label for="father_cnic"> CNIC <span class="text-danger">*</span></label>
								<input type="text" name="cnic_no" class="form-control" id="cnic" required="" >
							</div>
							<div class="form-group col-lg-4">
								<label for="dob">Date Of Birth <span class="text-danger">*</span></label>
								<input type="date" name="dob" class="form-control" value="<?php echo date('Y-m-d');?>" id="dob" required="">
							</div>
							<div class="form-group col-lg-4">
								<label >Designation</label>
								<!-- <select id="inputState" name="designation_id" class="form-control ">
									<option selected>Choose</option> -->
									<select class="form-control select2"   name="designation_id">
														<option label="Label"></option>
									@foreach($designations as $designation)
									<option value="{{$designation->id}}">{{$designation->name}}</option>
									@endforeach

								</select>
							</div>
							
									
														


    <!-- <div class="form-group col-lg-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
  </div> -->
</div>

</div>
<div class="col-lg-3 " style="float: right; "  >
	<div class="col-xl-3 ">
		<!--begin::Input-->
		<div class="form-group" >
			
			<p><img id="output" width="100" height="100" style="border: 1px solid black; margin-left: 30px; margin-top: 30px;" /></p>
				<p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;"></p>
			<p><label for="file" style="cursor: pointer; margin-left: 50px;">Browse..</label></p>
		</div>
			<!--end::Input-->
		</div>
	</div>



</div>
<div class="row">
							<div class="form-group col-lg-3">
										<label for="inputCity">Registration No</label>
										<input type="text" name="registration_no" class="form-control" id="inputCity">
									</div>
									<div class="form-group col-lg-3">
										<label for="inputCity">Phone No</label>
										<input type="text" name="phone_no" class="form-control" id="inputCity">

									</div>
									<div class="form-group col-lg-3">
										<label for="dob">Mobile No</label>
										<input type="text" name="mobile_no" class="form-control" id="inputCity">


									</div>
									<div class="form-group col-lg-3">
										<label >Staff Category</label>
										
											<select class="form-control select2"   name="staff_category_id">
														<option label="Label"></option>
											@foreach($staff_categories as $staff_category)
											<option value="{{$staff_category->id}}">{{$staff_category->name}}</option>
											@endforeach
										</select>
									</div>

						</div>
						<div class="row">
							
							
								<div class="form-group col-lg-3">
								<label >City/Village Name</label>
								<select class="form-control select2" name="city_id">
								<option label="Label"></option>
									@foreach($cities as $city)
									<option value="{{$city->id}}">{{$city->name}}</option>
									@endforeach

								</select>
								</div>
									
									<div class="form-group col-lg-3">
								<label >Gender</label>
								
									<select class="form-control select2"   name="gender">
								   <option label="Label"></option>
									<option value="male">Male</option>
									<option value="female">Female</option>
								</select>
							</div>
							<div class="form-group col-lg-3">
								<label for="inputSte">Marital Status</label>
								<select class="form-control select2"   name="marital_status">
								<option label="Label"></option>
									<option value="single">Single</option>
									<option value="marreid">Marreid</option>
								</select>
							</div>
							<div class="form-group col-lg-3">
										<label for="inputCity">Appointment Date</label>
										<input type="date" name="appointment_date" value="<?php echo date('Y-m-d');?>" class="form-control"  />
									</div>	
							</div>
							<div class="row">
								<div class="form-group col-lg-3">
										<label for="inputsc">School</label>
											<select class="form-control select2" id="inputsc"  name="school_id">
								           <option label="Label"></option>
											@foreach($schools as $school)
											<option value="{{$school->id}}">{{$school->name}}</option>
											@endforeach

										</select>
									</div>
									<div class="form-group col-lg-3">
										<label for="inputCity">Campus</label>
											<select class="form-control select2" id="inputCity"  name="campus_id">
								           <option label="Label"></option>
											@foreach($campuses as $campus)
											<option value="{{$campus->id}}">{{$campus->name}}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group col-lg-6">
										<label for="inputCity">Postal Addrss</label>
										<textarea type="text" name="address" class="form-control" placeholder="Addrss" id="inputCity"></textarea>
									</div>	
							
						</div> 
<hr>
<h4 class="mb-8 font-weight-bold text-dark">Academic | Educational Details</h4>
<div class="row">
	<div class="col-12"  >
		<table class="table table-bordered " id="item_table">
			<tr class="bg-default" style="text-align: center;">
				<th >#</th>
				<th width="15%">Year</th>
				<th width="15%">Roll No</th>

				<th width="15%">Total Mark</th>
				<th width="15%">Obtain Mark</th>
				<th width="10%">Percentage %</th>
				<th width="15%">Board </th>
				<th width="15%">Description</th>
				<th><button type="button" name="add" id="add" class="btn btn-success btn-sm add">+</button></th>
			</tr>
			<tbody>
			</tbody>
		</table>
	</div>    
</div>
<hr>
<h4 class="mb-8 font-weight-bold text-dark">Professional Details</h4>
<div class="row">
	<div class="col-12"  >
		<table class="table table-bordered " id="item2_table">
			<tr class="bg-default" style="text-align: center;">
				<th >#</th>
				<th width="15%">Year</th>
				<th width="15%">Roll No</th>

				<th width="15%">Total Mark</th>
				<th width="15%">Obtain Mark</th>
				<th width="10%">Percentage %</th>
				<th width="15%">Board </th>
				<th width="15%">Description</th>
				<th><button type="button" name="add2" id="add2" class="btn btn-success btn-sm add2">+</button></th>
			</tr>
			<tbody>
			</tbody>
		</table>
	</div>    
</div>




<h4 class="mb-8 font-weight-bold text-dark">Contact Details</h4>
<div class="row">
	
	<table class="table table-responsive">
		<tr>
			<td><label for="dd">Basic Salery <span class="text-danger">*</span></label></td>
			<td> <input type="text" step="any" value="@if(isset($product->name)){{$product->name}} @endif" class="common" name="basic_salery"  required>
			</td>
		</tr>
		<tr>
			<td>
				<label for="ff">Class Incharge <span class="text-danger">*</span></label>
			</td>
			<td>
				<input type="text" class="common" name="class_incharge" required>
			</td>
			<td><label for="dd">E.O.B.I</label></td>
				<td> <input type="text"   class="common" name="e_o_b_i" required>
				</td>
			

		</tr>




		<tr>
			<td><label for="dd">Chief Proctor </label></td>
			<td> <input type="text"   class="common" name="chief_proctor" required>
			</td>
			<td><label for="dd">Income Tax</label></td>
				<td> <input type="text"   class="common" name="income_tax" required>
				</td>
			

			

		</tr>
		<tr>
			<td><label for="dd">Controller Of Examination</label></td>
			<td> <input type="text" step="any"  class="common" name="controller_of_examination"  required>
			</td>
			
			<td><label for="dd">WelFare Fund</label></td>
				<td> <input type="text"  class="common" name="welfare_fund" required>
				</td>
			
			
				

			</tr>
			<tr>
				<td><label for="dd">Debate Incharge</label></td>
			<td> <input type="text"   class="common" name="debate_incharge" required>
			</td>
				
				
				<td> <label for="dd">Others</label></td>
				<td> <input type="text"   class="common" name="others" required>
				</td>
				

			</tr>
			<tr>
				<td><label for="dd">Sport Incharge</label></td>
			<td> <input type="text"  class="common" name="sport_incharge" required>
			</td>
				
				
				
				
				

			</tr>
			<tr>
				<td><label for="dd">Account Allowance</label>
				<td> <input type="text"    class="common" name="account_allowance" required>
				</td>

				
			</tr>
			<tr>
				<td><label for="dd">Lab Incharge</label></td>
				<td> <input type="text"  class="common" name="lab_incharge" required>
				</td>
				<td><label for="dd">Total Allowance</label></td>
				<td> <input type="text"  readonly="readonly"  style="background: light-white;" class="common" value="0" name="total_allowance" required>
				</td>
			</tr>
			<tr>
				<td><label for="dd">House Incharge </label></td>
				<td> <input type="text"   class="common" name="house_incharge" required>
				</td>
				<td><label for="dd">Total Deductions</label></td>
				<td> <input type="text" readonly=""  value="0"  class="common" name="total_deduction" required>
				</td>
			</tr>
			<tr>
				<td> <label for="dd">Other</label></td>
				<td> <input type="text"   class="common" name="others2" required>
				</td>
				<td><label for="dd">Net Salery</label></td>
				<td> <input type="text"  readonly="" value="0" class="common" name="net_salery" required>
				</td>
			</tr>

		</table>

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


@push('script')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script>
	$(document).ready(function(){
    // alert('okk');
    var count =  0;

    $(document).on('click','#add',function(){
    	count++;
    	html += '';
    	var html = '<tr>';
    	html += '<tr  id="row'+count+'">';
    	html += '<td>'+count+'</td>';
    	
    	html += '<td><input type="text"  id="year" placeholder="Year"  name="edu_year[]" class="form-control year"/></td>';
    	html += '<td><input type="number"  placeholder="Roll No" id="roll_no"  name="edu_roll_no[]" class="form-control roll_no"/></td>';
    	html += '<td><input type="number"  placeholder="Total Marks" id="total_mark" name="edu_total_mark[]" class="form-control percentage"/></td>';
    	html += '<td><input type="number"   placeholder="Obtain Marks" id="edu_obtain_mark" name="edu_obtain_mark[]" class="form-control percentage"/></td>';
    	html += '<td><input type="text"  placeholder="Percentage " id="percentage"  name="edu_percentage[]" class="form-control percentage"/></td>';
    	html += '<td><input type="text"  placeholder="Board " id="board"  name="edu_board[]" class="form-control board"/></td>';
    	html += '<td ><textarea type="text"  id="description" placeholder="description"  name="edu_description[]" class="form-control description"/></textarea></td>';
    	html += '<td style="text-align:center"><button type="button" data-id="'+count+' " name="remove" class="btn my btn-danger btn-sm "> - </button></td>';
    	html += '</tr>';


    	$('#item_table').append(html);
    });
});
	$(document).on('click','.my',function(){

		var count=$(this).data('id');
		var row= $('#row'+count).remove();
		console.log(count);

	});
	var count =  0;
	$(document).on('click','#add2',function(){
		// alert('okk');
		count++;
		html += '';
		var html = '<tr>';
		html += '<tr  id="row'+count+'">';
		html += '<td>'+count+'</td>';
		
		html += '<td><input type="text"  id="year" placeholder="Year"  name="prof_year[]" class="form-control year"/></td>';
		html += '<td><input type="number"  placeholder="Roll No" id="roll_no"  name="prof_roll_no[]" class="form-control roll_no"/></td>';
		html += '<td><input type="number"  placeholder="Total Marks" id="total_mark" name="prof_total_mark[]" class="form-control percentage"/></td>';
		html += '<td><input type="number"   placeholder="Obtain Marks" id="obtain_mark" name="prof_obtain_mark[]" class="form-control percentage"/></td>';
		html += '<td><input type="text"  placeholder="Percentage " id="percentage"  name="prof_percentage[]" class="form-control percentage"/></td>';
		html += '<td><input type="text"  placeholder="Board " id="board"  name="prof_board[]" class="form-control board"/></td>';
		html += '<td ><textarea type="text"  id="description" placeholder="description"  name="prof_description[]" class="form-control description"/></textarea></td>';
		html += '<td style="text-align:center"><button type="button" data-id="'+count+' " name="remove" class="btn my2 btn-danger btn-sm "> - </button></td>';
		html += '</tr>';


		$('#item2_table').append(html);
	});
	$(document).on('click','.my2',function(){

		var count=$(this).data('id');
		var row= $('#row'+count).remove();
		console.log(count);

	});

</script>
<script>
	var loadFile = function(event) {
		var image = document.getElementById('output');
		image.src = URL.createObjectURL(event.target.files[0]);
	};
</script>
@endpush