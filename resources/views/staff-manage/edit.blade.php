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
						<div class="card-toolbar">
							<div class="example-tools justify-content-center">
								<span class="example-toggle" data-toggle="tooltip" title="View code"></span>
								<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
							</div>
						</div>
					</div>
					<form class="form  mt-2 "  method="post" action="{{route('staffs.update',$staff->id)}}"  enctype="multipart/form-data" >
						@csrf
						@method('PUT')
						
						<h4 class="mb-8 font-weight-bold text-dark">Personal Details</h4>
						
						
						<div class="row">
							<div class="col-lg-9" style="float: left; " >

								<div class="form-row">
									<div class="form-group col-lg-4">
								<label for="inputCity">First Name</label>
								<input type="text" name="first_name" value="{{$staff->first_name}}" class="form-control" id="inputCity">
							</div>
							<div class="form-group col-lg-4">
								<label for="inputCity">Last Name</label>
								<input type="text" name="last_name" value="{{$staff->last_name}}" class="form-control" id="inputCity">
							</div>
							<div class="form-group col-lg-4">
								<label for="inputCity">Surname</label>
								<input type="text" name="sur_name" value="{{$staff->sur_name}}" class="form-control" id="inputCity">
							</div>
							

									
								</div>
								<div class="row">
									<div class="form-group col-lg-4">
								<label for="father_cnic"> CNIC</label>
								<input type="text" name="cnic_no" value="{{$staff->cnic_no}}" class="form-control" id="cnic">
							</div>
							<div class="form-group col-lg-4">
								<label for="dob">Date Of Birth</label>
								<input type="date" name="dob" value="{{$staff->dob}}" class="form-control" id="dob">
							</div>
							<div class="form-group col-lg-4">
								<label for="inputCity">Designation</label>
								<select id="inputState" name="designation_id"  class="form-control ">
									<option selected>Choose</option>
									@foreach($designations as $designation)
									@if($designation->id==$staff->designation_id)
									<option value="{{$designation->id}}" selected="">{{$designation->name}}</option>
									@else
									<option value="{{$designation->id}}">{{$designation->name}}</option>
									@endif
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
			
			<p><img id="output" src="{{asset('public/images/'.$staff->image)}}"  width="100" height="100" style="border: 1px solid black; margin-left: 30px; margin-top: 30px;" /></p>
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
										<input type="text" name="registration_no" value="{{$staff->registration_no}}" class="form-control" id="inputCity">
									</div>
									<div class="form-group col-lg-3">
										<label for="inputCity">Phone No</label>
										<input type="text" name="phone_no" value="{{$staff->phone_no}}" class="form-control" id="inputCity">

									</div>
									<div class="form-group col-lg-3">
										<label for="dob">Mobile No</label>
										<input type="text" name="mobile_no" value="{{$staff->mobile_no}}" class="form-control" id="inputCity">


									</div>
									<div class="form-group col-lg-3">
										<label for="inputState">Staff Category</label>
										<select id="inputState" name="staff_category_id" class="form-control ">
											<option selected>Staff Category</option>
											@foreach($staff_categories as $staff_category)
											@if($staff_category->id==$staff->staff_category_id)
											<option value="{{$staff_category->id}}" selected="">{{$staff_category->name}}</option>
											@else
											<option value="{{$staff_category->id}}">{{$staff_category->name}}</option>
											@endif
											@endforeach
										</select>
									</div>

						</div>
						<div class="row">
							
							
									<div class="form-group col-lg-3">
										<label for="inputCity">City/Village Name</label>
										<select id="inputState" name="city_id" class="form-control ">
											<option selected>Choose</option>
											@foreach($cities as $city)
											@if($city->id==$staff->city_id)
											<option value="{{$city->id}}" selected="">{{$city->name}}</option>
											@else
											<option value="{{$city->id}}">{{$city->name}}</option>
											@endif
											@endforeach

										</select>
									</div>
									
									<div class="form-group col-lg-3">
								<label for="inputState">Gender</label>
								<select id="inputState" name="gender" class="form-control ">
									<option selected>Choose</option>
									@if($staff->male)
									<option value="male" selected="">Male</option>
									<option value="female">Female</option>
									@else
									<option value="male" >Male</option>
									<option value="female" selected="">Female</option>
										@endif
								</select>
							</div>
							<div class="form-group col-lg-3">
								<label for="inputState">Marital Status</label>
								<select id="inputState" name="gender" class="form-control ">
									<option selected>Choose</option>
									@if($staff->single)
									<option value="single" selected="">Single</option>
									<option value="marreid">Marreid</option>
									@else
									<option value="single" >Single</option>
									<option value="marreid" selected="">Marreid</option>
									@endif
								</select>
							</div>
							
							<div class="form-group col-lg-3">
										<label for="inputCity">Appointment Date</label>
										<input type="date" name="appointment_date" value="{{$staff->appointment_date}}" class="form-control"  />
									</div>	
								</div>
								<div class="row">
									<div class="form-group col-lg-3">
										<label for="scc">School</label>
										<select id="inputState" name="school_id" class="form-control ">
											<option selected>Choose</option>
											@foreach($schools as $school)
											@if($school->id==$staff->school_id)
											<option value="{{$school->id}}" selected="">{{$school->name}}</option>
											@else
											<option value="{{$school->id}}">{{$school->name}}</option>
											@endif
											@endforeach

										</select>
									</div>
									<div class="form-group col-lg-3">
										<label for="idss">Campus</label>
										<select id="inputState" name="campus_id" class="form-control ">
											<option selected>Choose</option>
											@foreach($campuses as $campus)
											@if($campus->id==$staff->campus_id)
											<option value="{{$campus->id}}" selected="">{{$campus->name}}</option>
											@else
											<option value="{{$campus->id}}">{{$campus->name}}</option>
											@endif
											@endforeach
										</select>
									</div>
									<div class="form-group col-lg-6">
										<label for="inputCity">Postal Addrss</label>
										<textarea type="text" value="{{$staff->address}}" name="address" class="form-control" placeholder="Addrss" id="inputCity">{{$staff->address}}</textarea>
									</div>	
							
						</div> 
<hr>
<h4 class="mb-8 font-weight-bold text-dark">Academic | Educational Details</h4>
<div class="row">
	<div class="col-12"  >
		<table class="table table-bordered " id="item_table">
			 
			<tr class="bg-default" style="text-align: center;">
				<th >#</th>
				<th width="15%">Description</th>
				<th width="15%">Year</th>
				<th width="15%">Roll No</th>

				<th width="15%">Total Mark</th>
				<th width="15%">Obtain Mark</th>
				<th width="10%">Percentage %</th>
				<th width="15%">Board </th>
				<th><button type="button" name="add" id="add" class="btn btn-success btn-sm add">+</button></th>
			</tr>
			<tbody>
				<?php $i=1;?>
             @if($edu_info->isEmpty())
             <tr class="table_append_rows" id="table_append_rows_{{$i}}"> 
                           
                            
                            <td class="edu_description">
                                <input  type="hidden" name="raw_row[]" value="0" id="raw_row">
                                <textarea type="text"  id="edu_description" width="5%" name="edu_description[]" class="form-control edu_description" placeholder="Description" ></textarea></td>
                                <td><input type="text"  id="year" width="5%" name="edu_year[]" class="form-control  year"/></td>
                                <td><input type="text"  id="edu_roll_no" width="5%" name="edu_roll_no[]" class="form-control  edu_roll_no"/></td>
                                <td><input type="text"  id="edu_total_mark" width="5%" name="edu_total_mark[]" class="form-control  edu_total_mark"/></td>
                                <td><input type="text"  id="edu_obtain_mark" width="5%" name="edu_obtain_mark[]" class="form-control  edu_obtain_mark"/></td>
                                <td><input type="text"  id="edu_percentage" width="5%" name="edu_percentage[]" class="form-control  edu_percentage"/></td>
                                <td><input type="text"  id="edu_board" width="5%" name="edu_board[]" class="form-control  edu_board"/></td>
                                
                                   <td><div ></div><button  type="button" name="add_to" id="add_to" class="btn btn-success btn-sm add_to">+</button></td>
                                </tr>
                                @else
                               <tr class="table_append_rows" id="table_append_rows_{{$i}}"> 
                               	 @foreach ($edu_info as $data)
                               	 <td>{{$i}}</td>
                            <td class="edu_description">
                                <input  type="hidden" name="raw_row[]" value="0" id="raw_row">
                                <textarea type="text"  id="edu_description" width="5%" name="edu_description[]" value="{{$data->edu_description}}" class="form-control edu_description">{{$data->edu_description}}</textarea> </td>
                                <td><input type="text"  id="year" value="{{$data->edu_year}}" width="5%" name="edu_year[]" class="form-control  year"/></td>
                                <td><input type="text"  id="edu_roll_no" value="{{$data->edu_roll_no}}" width="5%" name="edu_roll_no[]" class="form-control  edu_roll_no"/></td>
                                <td><input type="text"  id="edu_total_mark" value="{{$data->edu_total_mark}}" width="5%" name="edu_total_mark[]" class="form-control  edu_total_mark"/></td>
                                <td><input type="text"  id="edu_obtain_mark" value="{{$data->edu_obtain_mark}}" width="5%" name="edu_obtain_mark[]" class="form-control  edu_obtain_mark"/></td>
                                <td><input type="text"  id="edu_percentage" value="{{$data->edu_percentage}}" width="5%" name="edu_percentage[]" class="form-control  edu_percentage"/></td>
                                <td><input type="text"  id="edu_board" value="{{$data->edu_board}}" width="5%" name="edu_board[]" class="form-control  edu_board"/></td>
                                   <td><div ></div><button  type="button" name="add_to" id="add_to" class="btn btn-danger btn-sm add_to">-</button></td>
                                </tr>
                                <?php $i++; ?>
                                @endforeach
                                @endif
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
				<th width="15%">Description</th>
				<th width="15%">Year</th>
				<th width="15%">Roll No</th>

				<th width="15%">Total Mark</th>
				<th width="15%">Obtain Mark</th>
				<th width="10%">Percentage %</th>
				<th width="15%">Board </th>
				<th><button type="button" name="add2" id="add2" class="btn btn-success btn-sm add2">+</button></th>
			</tr>
			<tbody>
				<tbody>
				<?php $i=1;?>
             @if($prof_info->isEmpty())
             <tr class="table_append_rows" id="table_append_rows_{{$i}}"> 
                           
                            
                            <td class="prof_description">
                                <input  type="hidden" name="raw_row[]" value="0" id="raw_row">
                                <textarea type="text"  id="prof_description" width="5%" name="prof_description[]" class="form-control prof_description" placeholder="Description" ></textarea></td>
                                <td><input type="text"  id="year" width="5%" name="prof_year[]" class="form-control  year"/></td>
                                <td><input type="text"  id="prof_roll_no" width="5%" name="prof_roll_no[]" class="form-control  prof_roll_no"/></td>
                                <td><input type="text"  id="prof_total_mark" width="5%" name="prof_total_mark[]" class="form-control  prof_total_mark"/></td>
                                <td><input type="text"  id="prof_obtain_mark" width="5%" name="prof_obtain_mark[]" class="form-control  prof_obtain_mark"/></td>
                                <td><input type="text"  id="prof_percentage" width="5%" name="prof_percentage[]" class="form-control  prof_percentage"/></td>
                                <td><input type="text"  id="prof_board" width="5%" name="prof_board[]" class="form-control  prof_board"/></td>
                                
                                   <td><div ></div><button  type="button" name="add_to" id="add_to" class="btn btn-success btn-sm add_to">+</button></td>
                                </tr>
                                @else
                               <tr class="table_append_rows" id="table_append_rows_{{$i}}"> 
                               	 @foreach ($prof_info as $data)
                               	 <td>{{$i}}</td>
                            <td class="prof_description">
                                <input  type="hidden" name="raw_row[]" value="0" id="raw_row">

                                <textarea type="text"  id="prof_description" width="5%" name="prof_description[]" value="{{$data->prof_description}}" class="form-control prof_description">{{$data->prof_description}}</textarea></td>
                                <td><input type="text"  id="year" value="{{$data->prof_year}}" width="5%" name="prof_year[]" class="form-control  year"/></td>
                                <td><input type="text"  id="prof_roll_no" value="{{$data->prof_roll_no}}" width="5%" name="prof_roll_no[]" class="form-control  prof_roll_no"/></td>
                                <td><input type="text"  id="prof_total_mark" value="{{$data->prof_total_mark}}" width="5%" name="prof_total_mark[]" class="form-control  prof_total_mark"/></td>
                                <td><input type="text"  id="prof_obtain_mark" value="{{$data->prof_obtain_mark}}" width="5%" name="prof_obtain_mark[]" class="form-control  prof_obtain_mark"/></td>
                                <td><input type="text"  id="prof_percentage" value="{{$data->prof_percentage}}" width="5%" name="prof_percentage[]" class="form-control  prof_percentage"/></td>
                                <td><input type="text"  id="prof_board" value="{{$data->prof_board}}" width="5%" name="prof_board[]" class="form-control  prof_board"/></td>
                                   <td><div ></div><button  type="button" name="add_to" id="add_to" class="btn btn-danger btn-sm add_to">-</button></td>
                                </tr>
                                <?php $i++; ?>
                                @endforeach
                                @endif
			</tbody>
			</tbody>
		</table>
	</div>    
</div>




<h4 class="mb-8 font-weight-bold text-dark">Contact Details</h4>
<div class="row">
	
	<table class="table table-responsive">
		<tr>
			<td><label for="dd">Basic Salery *</label></td>
			<td> <input type="text" step="any" value="{{$staffSaleryInfo->basic_salery}}" class="common" name="basic_salery"  required>
			</td>
		</tr>
		<tr>
			<td>
				<label for="ff">Class Incharge  *</label>
			</td>
			<td>
				<input type="text" class="common" value="{{$staffSaleryInfo->class_incharge}}" name="class_incharge" >
			</td>
			<td><label for="dd">E.O.B.I</label></td>
				<td> <input type="text"   class="common" value="{{$staffSaleryInfo->e_o_b_i}}" name="e_o_b_i" >
				</td>
			

		</tr>




		<tr>
			<td><label for="dd">Chief Proctor </label></td>
			<td> <input type="text"   class="common" name="chief_proctor" value="{{$staffSaleryInfo->chief_proctor}}" >
			</td>
			<td><label for="dd">Income Tax</label></td>
				<td> <input type="text" value="{{$staffSaleryInfo->income_tax}}"   class="common" name="income_tax" >
				</td>
			

			

		</tr>
		<tr>
			<td><label for="dd">Controller Of Examination</label></td>
			<td> <input type="text" step="any"  value="{{$staffSaleryInfo->controller_of_examination}}" class="common" name="controller_of_examination"  >
			</td>
			
			<td><label for="dd">WelFare Fund</label></td>
				<td> <input type="text"  class="common" value="{{$staffSaleryInfo->welfare_fund}}" name="welfare_fund" required>
				</td>
			
			
				

			</tr>
			<tr>
				<td><label for="dd">Debate Incharge</label></td>
			<td> <input type="text"   class="common" value="{{$staffSaleryInfo->debate_incharge}}" name="debate_incharge" required>
			</td>
				
				
				<td> <label for="dd">Others</label></td>
				<td> <input type="text"   class="common" value="{{$staffSaleryInfo->others}}" name="others" required>
				</td>
				

			</tr>
			<tr>
				<td><label for="dd">Sport Incharge</label></td>
			<td> <input type="text"  class="common" value="{{$staffSaleryInfo->sport_incharge}}" name="sport_incharge" required>
			</td>
				
				
				
				
				

			</tr>
			<tr>
				<td><label for="dd">Account Allowance</label>
				<td> <input type="text" value="{{$staffSaleryInfo->account_allowance}}"    class="common" name="account_allowance" required>
				</td>

				
			</tr>
			<tr>
				<td><label for="dd">Lab Incharge</label></td>
				<td> <input type="text"  class="common" value="{{$staffSaleryInfo->lab_incharge}}" name="lab_incharge" required>
				</td>
				<td><label for="dd">Total Allowance</label></td>
				<td> <input type="text"  readonly="readonly"  value="{{$staffSaleryInfo->total_allowance}}" style="background: light-white;" class="common" value="0" name="total_allowance" required>
				</td>
			</tr>
			<tr>
				<td><label for="dd">House Incharge </label></td>
				<td> <input type="text"  value="{{$staffSaleryInfo->house_incharge}}"  class="common" name="house_incharge" required>
				</td>
				<td><label for="dd">Total Deductions</label></td>
				<td> <input type="text" readonly=""  value="0" value="{{$staffSaleryInfo->total_deduction}}"  class="common" name="total_deduction" required>
				</td>
			</tr>
			<tr>
				<td> <label for="dd">Other</label></td>
				<td> <input type="text"   class="common" value="{{$staffSaleryInfo->others2}}" name="others2" required>
				</td>
				<td><label for="dd">Net Salery</label></td>
				<td> <input type="text"  readonly="" value="0" value="{{$staffSaleryInfo->net_salery}}" class="common" name="net_salery" required>
				</td>
			</tr>

		</table>

	</div>

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


@stop

@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    	html += '<td ><textarea type="text"  id="description" placeholder="description"  name="edu_description[]" class="form-control description"/></textarea></td>';
    	html += '<td><input type="text"  id="year" placeholder="Year"  name="edu_year[]" class="form-control year"/></td>';
    	html += '<td><input type="number"  placeholder="Roll No" id="roll_no"  name="edu_roll_no[]" class="form-control roll_no"/></td>';
    	html += '<td><input type="number"  placeholder="Total Marks" id="total_mark" name="edu_total_mark[]" class="form-control percentage"/></td>';
    	html += '<td><input type="number"   placeholder="Obtain Marks" id="edu_obtain_mark" name="edu_obtain_mark[]" class="form-control percentage"/></td>';
    	html += '<td><input type="text"  placeholder="Percentage " id="percentage"  name="edu_percentage[]" class="form-control percentage"/></td>';
    	html += '<td><input type="text"  placeholder="Board " id="board"  name="edu_board[]" class="form-control board"/></td>';
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
		html += '<td ><textarea type="text"  id="description" placeholder="description"  name="prof_description[]" class="form-control description"/></textarea></td>';
		html += '<td><input type="text"  id="year" placeholder="Year"  name="prof_year[]" class="form-control year"/></td>';
		html += '<td><input type="number"  placeholder="Roll No" id="roll_no"  name="prof_roll_no[]" class="form-control roll_no"/></td>';
		html += '<td><input type="number"  placeholder="Total Marks" id="total_mark" name="prof_total_mark[]" class="form-control percentage"/></td>';
		html += '<td><input type="number"   placeholder="Obtain Marks" id="obtain_mark" name="prof_obtain_mark[]" class="form-control percentage"/></td>';
		html += '<td><input type="text"  placeholder="Percentage " id="percentage"  name="prof_percentage[]" class="form-control percentage"/></td>';
		html += '<td><input type="text"  placeholder="Board " id="board"  name="prof_board[]" class="form-control board"/></td>';
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