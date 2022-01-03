@extends('layouts.main')
@section('content')
<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<div class="row">
									<div class="col-lg-12">
										<!--begin::Card-->
										<!-- <div class="card card-custom gutter-b example example-compact" style="border : 1px solid yellow;"> -->
											<div class="card-header">
												<h3 class="card-title">Student Form</h3>
												<div class="card-toolbar">
													<div class="example-tools justify-content-center">
														<span class="example-toggle" data-toggle="tooltip" title="View code"></span>
														<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
													</div>
												</div>
											</div>
			<form class="form  mt-12 "  method="post" action="{{route('students.store')}}"  enctype="multipart/form-data" >
				@csrf
					<h4 class="mb-8 font-weight-bold text-dark">Registration Info</h4>
				<div class="row">
			      <div class="col-lg-9" style="float: left; " >

				    <div class="form-row">
					<div class="form-group col-lg-4">
						<label for="inputCity">Registration No</label>
						<input type="text" name="registration_no" class="form-control" id="inputCity">
					</div>
					<div class="form-group col-lg-4">
						<label for="inputCity">Admission No</label>
						<input type="text" name="admission_no" class="form-control" id="inputCity">
					</div>
					<div class="form-group col-lg-4">
						<label for="enrollment_registration">Enrollment Registration</label>
						<select id="enrollment_registration" name="enrollment_registration" class="form-control">
							<option selected>Choose</option>
							<option>123</option>
							<option>123</option>
							<option>123</option>
						</select>
					</div>
</div>
<div class="row">
	<div class="form-group col-lg-6">
		<label for="inputCity">Edit Registration No</label>
		<input type="text" name="edit_registration_no" class="form-control" id="inputCity">
	</div>
	<div class="form-group col-lg-6">
		<label for="inputState">School Name</label>
		<select id="inputState" name="campus_id" class="form-control ">
			<option selected>Choose School</option>
			@foreach($schools as $school)
			<option value="{{$school->id}}">{{$school->name}}</option>
			@endforeach
		</select>
	</div>
    <!-- <div class="form-group col-lg-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
  </div> -->
</div>

</div>
<div class="col-lg-3" style="float: right; " >
	<div class="col-xl-3">
		<!--begin::Input-->
		<div class="form-group" style=" overflow-x: hidden;">
			<p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;"></p>
			<p><label for="file" style="cursor: pointer;">Upload Image</label></p>
			<p><img id="output" width="50" height="50" /></p></div>
			<!--end::Input-->
		</div>
	</div>



</div> 
<hr>
<h4 class="mb-8 font-weight-bold text-dark">Personal Details</h4>
<div class="row">
	<div class="form-group col-lg-3">
		<label for="inputCity">First Name</label>
		<input type="text" name="first_name" class="form-control" id="inputCity">
	</div>
	<div class="form-group col-lg-3">
		<label for="inputCity">Last Name</label>
		<input type="text" name="last_name" class="form-control" id="inputCity">
	</div>
	<div class="form-group col-lg-3">
		<label for="inputCity">Surname</label>
		<input type="text" name="surname" class="form-control" id="inputCity">
	</div>
	<div class="form-group col-lg-3">
		<label for="dob">Date Of Birth</label>
		<input type="date" name="dob" class="form-control" id="dob">
	</div>

</div>
<div class="row">
	<div class="form-group col-lg-3">
		<label for="inputCity">Father Name</label>
		<input type="text" name="father_name" class="form-control" id="inputCity">
	</div>
	<div class="form-group col-lg-3">
		<label for="father_cnic">Father CNIC</label>
		<input type="text" name="father_cnic_no" class="form-control" id="father_cnic">
	</div>
	<div class="form-group col-lg-3">
		<label for="inputState">Father Occupation</label>
		<select id="inputState" name="father_occupation" class="form-control ">
			<option selected>Choose</option>
			<option value="Farmer">Farmer</option>
			<option value="Officer">Officer</option>
			<option value="Driver">Driver</option>
		</select>
	</div>
	<div class="form-group col-lg-3">
		<label for="student_cnic">Student Form-B</label>
		<input type="text" name="student_cnic" class="form-control" id="student_cnic">
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-3">
		<label for="inputState">Religion</label>
		<select id="inputState" name="religion_id" class="form-control ">
			<option selected>Choose</option>
			@foreach($religions as $religion)
			<option value="{{$religion->id}}">{{$religion->title}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group col-lg-3">
		<label for="inputState">Cast</label>
		<select id="inputState" name="cast_id" class="form-control ">
			<option selected>Choose</option>
			@foreach($casts as $cast)
			<option value="{{$cast->id}}">{{$cast->title}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group col-lg-3">
		<label for="inputState">Nationality</label>
		<select id="inputState" name="country_id" class="form-control ">
			<option selected>Choose</option>
			@foreach($countries as $country)
			<option value="{{$country->id}}">{{$country->name}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group col-lg-3">
		<label for="inputState">Domicile</label>
		<select id="inputState" name="province_id" class="form-control ">
			<option selected>Choose</option>
			@foreach($provinces as $province)
			<option value="{{$province->id}}">{{$province->name}}</option>
			@endforeach
		</select>
	</div>
</div>
<hr>
<h4 class="mb-8 font-weight-bold text-dark">Health Details</h4>
<div class="row">
	<div class="form-group col-lg-3">
		<label for="inputState">Gender</label>
		<select id="inputState" name="gender" class="form-control ">
			<option selected>Choose</option>
			<option value="male">Male</option>
			<option value="female">Female</option>
		</select>
	</div>
	<div class="form-group col-lg-3">
		<label for="inputState">Blood Group</label>
		<select id="inputState" name="blood_id" class="form-control ">
			<option selected>Choose</option>
			@foreach($bloods as $blood)
			<option value="{{$blood->id}}">{{$blood->name}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group col-lg-3">
		<label for="inputState">Health</label>
		<select id="inputState" name="health_name" class="form-control ">
			<option selected>Choose</option>
			<option value="Health">Health</option>
			<option value="Health1">Health1</option>
			
		</select>
	</div>
	<div class="form-group col-lg-3">
		<label for="father_cnic">Waight</label>
		<input type="text" name="waight" class="form-control" id="father_cnic">
	</div>
	<div class="form-group col-lg-3">
		<label for="father_cnic">Height</label>
		<input type="text" name="height" class="form-control" id="father_cnic">
	</div>
	<div class="form-group col-lg-3">
		<label for="inputState">House Name</label>
		<select id="inputState" name="house_name" class="form-control ">
			<option selected>Choose</option>
			<option value="Flat1">Flat1</option>
			<option value="Flat2">Flat2</option>
			
		</select>
	</div>
</div>
<h4 class="mb-8 font-weight-bold text-dark">Academic Details</h4>
<div class="row">
	<div class="form-group col-lg-3">
		<label for="inputCity">Date Of Admission</label>
		<input type="date" name="date_of_admission" class="form-control" id="inputCity">
	</div>
	<div class="form-group col-lg-3">
		<label for="inputCity">Class Of Admission</label>
		<select id="inputState" name="admission_class_id" class="form-control ">
			<option selected>Choose</option>
			@foreach($levels as $level)
			<option value="{{$level->id}}">{{$level->name}}</option>
			@endforeach
			
		</select>
	</div>
	<div class="form-group col-lg-3">
		<label for="inputCity">Current Class</label>
		<select id="inputState" name="current_class_id" class="form-control ">
			<option selected>Choose</option>
			@foreach($levels as $level)
			<option value="{{$level->id}}">{{$level->name}}</option>
			@endforeach
			
		</select>
	</div>
	<div class="form-group col-lg-3">
		<label for="dob">Section</label>
		<select id="inputState" name="section_id" class="form-control ">
			<option selected>Choose</option>
			@foreach($sections as $section)
			<option value="{{$section->id}}">{{$section->name}}</option>
			@endforeach
			
		</select>
	</div>

</div>
<h4 class="mb-8 font-weight-bold text-dark">Contact Details</h4>
<div class="row">
	<div class="form-group col-lg-3">
		<label for="inputCity">City/Village Name</label>
		<select id="inputState" name="city_id" class="form-control ">
			<option selected>Choose</option>
			@foreach($cities as $city)
			<option value="{{$city->id}}">{{$city->name}}</option>
			@endforeach
			
		</select>
	</div>
	<div class="form-group col-lg-3">
		<label for="inputCity">Postal Addrss</label>
		<input type="text" name="postal_address" class="form-control" id="inputCity">
	</div>
	<div class="form-group col-lg-3">
		<label for="inputCity">Permanent Addrss</label>
		<input type="text" name="permanent_address" class="form-control" id="inputCity">
	</div>
	<div class="form-group col-lg-3">
		<label for="inputCity">Contact No</label>
		<input type="text" name="contact_no" class="form-control" id="inputCity">
		
	</div>
	<div class="form-group col-lg-3">
		<label for="dob">Cellular No</label>
		<input type="text" name="cellular_no" class="form-control" id="inputCity">


	</div>
	<div class="form-group col-lg-3">
		<label for="dob">Guardian Name</label>
		<input type="text" name="guardian_name" class="form-control" id="inputCity">


	</div>
	<div class="form-group col-lg-3">
		<label for="dob">Guardian CNIC</label>
		<input type="text" name="guardian_cnic" class="form-control" id="inputCity">


	</div>
	<div class="form-group col-lg-3">
		<label for="dob">Guardian Mobile Number</label>
		<input type="text" name="guardian_mobile_number" class="form-control" id="inputCity">


	</div>

</div>
<h4 class="mb-8 font-weight-bold text-dark">Previous School Details</h4>
<div class="row">
	<div class="form-group col-lg-3">
		<label for="inputCity">School Name</label>
		<select id="inputState" name="school_id" class="form-control ">
			<option selected disabled="">--School--</option>
			@foreach($schools as $school)
			<option value="{{$school->id}}">{{$school->name}}</option>
			@endforeach
			
		</select>
	</div>
	<div class="form-group col-lg-3">
		<label for="inputCity">WithDrawl No</label>
		<input type="text" name="withdrawl_no" class="form-control" id="inputCity">
	</div>
	<div class="form-group col-lg-3">
		<label for="inputCity">CLC No</label>
		<input type="text" name="clc_no" class="form-control" id="inputCity">
	</div>
	<div class="form-group col-lg-3">
		<label for="inputCity">Remarks</label>
		<input type="text" name="remark" class="form-control" id="inputCity">
		
	</div>
	

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
<script>
	var loadFile = function(event) {
		var image = document.getElementById('output');
		image.src = URL.createObjectURL(event.target.files[0]);
	};
</script>
@endpush