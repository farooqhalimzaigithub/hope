@extends('layouts.main')
@section('content')

<style type="text/css">
	.form-control{
		border:none;
	}
</style>
<div class="d-flex flex-column-fluid">

							<div class="container">
								<div class="row">
									<div class="col-lg-12 bg-white">



@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



											<div class="card-header">
												<h3 class="card-title">School  Form</h3>
												<div class="card-toolbar">
													<div class="example-tools justify-content-center">
														<span class="example-toggle" data-toggle="tooltip" title="View code"></span>
														<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
													</div>
												</div>
											</div>
											<form class="form"  method="post" action="{{route('schools.update',$school->id)}}" >
												<input type="hidden" name="district_id" value="{{ Auth::user()->district_id; }}">
			@csrf
			@method('PUT')
				<div class="container">

					<div class="row">
						<div class="col-xl-12">
							<div class="form-group">
								<label>School name</label>
								<input type="text" class="form-control" value="{{$school->name}}" name="name"  required="" />		
								<!-- <span class="form-text text-danger">Please enter Name</span> -->
							</div>
							
						</div>
					</div>

					<div class="row">
						<div class="col-xl-6">
							<div class="form-group">
								<label>Latitude</label>
								<input type="text" class="form-control" value="{{$school->lat}}" name="lat"  required="" />
							</div>
							
						</div>

						<div class="col-xl-6">
							<div class="form-group">
								<label>Longitude</label>
								<input type="text" class="form-control" name="lng" value="{{$school->lng}}"  required="" />
							</div>
							
						</div>
					</div>

					<div class="row">
						<div class="col-xl-6">
							<div class="form-group">
								<label>Address</label>
								<input type="text" class="form-control" value="{{$school->address}}" name="address"  required="" />
							</div>
							
						</div>

						<div class="col-xl-6">
							<div class="form-group">
								<label>Land Mark</label>
								<input type="text" class="form-control" value="{{$school->land_mark}}" name="land_mark"  required="" />
							</div>
							
						</div>
					</div>

					<div class="row">

					<div class="col-xl-2"><b>CS Type</b></div>
						<div class="col-xl-2">
							<label class="">
								<input type="radio" class="" name="school_type"  value="GCS" {{ $school->school_type == 'GCS' ? 'checked' : ''}}> GCS
							</label>
						</div>
						
						<div class="col-xl-2">
							<label class="">
								<input type="radio" class="" name="school_type" value="CFS" {{ $school->school_type == 'CFS' ? 'checked' : ''}}> CFS
							</label>
						</div>


						<div class="col-xl-2">
							<label class="">
								<input type="radio" class="" name="school_type" value="CBEC" {{ $school->school_type == 'CBEC' ? 'checked' : ''}}> CBEC
							</label>
						</div>


						<div class="col-xl-2">
							<label class="">
								<input type="radio" class="" name="school_type" value="BECS" {{ $school->school_type == 'BECS' ? 'checked' : ''}}> BECS
							</label>
						</div>


						<div class="col-xl-2">
							<label class="">
								<input type="radio" class="" name="school_type" value="Other"> Other
							</label>
						</div>
				</div>

				<div class="row mt-2">

				<div class="col-xl-2"><b>Status</b></div>
					<div class="col-xl-2">
						<label class="">
							<input type="radio" class="" name="status"  value="functional" {{ $school->status == 'functional' ? 'checked' : ''}}> Functional
						</label>
					</div>
					
					<div class="col-xl-2">
						<label class="">
							<input type="radio" class="" name="status" value="non-functional" {{ $school->status == 'non-functional' ? 'checked' : ''}}> Non-functional
						</label>
					</div>
				</div>


				<div class="row mt-2">

					<div class="col-xl-2"><b>Building Ownership</b></div>
						<div class="col-xl-2">
							<label class="">
								<input type="radio" class="" name="building_ownership"  value="Govt" {{ $school->building_ownership == 'Govt' ? 'checked' : ''}}> Govt
							</label>
						</div>
						
						<div class="col-xl-2">
							<label class="">
								<input type="radio" class="" name="building_ownership" value="VEC" {{ $school->building_ownership == 'VEC' ? 'checked' : ''}}> VEC
							</label>
						</div>


						<div class="col-xl-2">
							<label class="">
								<input type="radio" class="" name="building_ownership" value="Communal" {{ $school->building_ownership == 'Communal' ? 'checked' : ''}}> Communal
							</label>
						</div>


						<div class="col-xl-2">
							<label class="">
								<input type="radio" class="" name="building_ownership" value="Personal" {{ $school->building_ownership == 'Personal' ? 'checked' : ''}}> Personal
							</label>
						</div>
				</div>

				<div class="row mt-2">
					<div class="col-xl-2"><b>Gender</b></div>
					<div class="col-xl-2">
						<label class="">
							<input type="radio" class="" name="gender"  value="Boys" {{ $school->gender == 'Boys' ? 'checked' : ''}}> Boys
						</label>
					</div>
					<div class="col-xl-2">
						<label class="">
							<input type="radio" class="" name="gender" value="Girls" {{ $school->gender == 'Girls' ? 'checked' : ''}}> Girls
						</label>
					</div>
					<div class="col-xl-2">
						<label class="">
							<input type="radio" class="" name="gender" value="Co-education" {{ $school->gender == 'Co-education' ? 'checked' : ''}} > Co-education
						</label>
					</div>
				</div>

				<div class="row mt-2">
					<div class="col-xl-2"><b>Building Structure</b></div>
					<div class="col-xl-2">
						<label class="">
							<input type="radio" name="building_structure"  value="Pakka" class=""  {{ $school->building_structure == 'Pakka' ? 'checked' : ''}} > Pakka
						</label>
					</div>
					<div class="col-xl-2">
						<label class="">
							<input type="radio" class="" name="building_structure" value="Kacha" {{ $school->building_structure == 'Kacha' ? 'checked' : ''}} > Kacha
						</label>
					</div>
					<div class="col-xl-2">
						<label class="">
							<input type="radio" class="" name="building_structure" value="Mixed" {{ $school->building_structure == 'Mixed' ? 'checked' : ''}} > Mixed
						</label>
					</div>
					<div class="col-xl-2">
						<label class="">
							<input type="radio" class="" name="building_structure" value="Open-air-partial" {{ $school->building_structure == 'Open-air-partial' ? 'checked' : ''}}> Open air (Partial)
						</label>
					</div>

					<div class="col-xl-2">
						<label class="">
							<input type="radio" class="" name="building_structure" value="Open-air-complete" {{ $school->building_structure == 'Open-air-complete' ? 'checked' : ''}}> Open air (Complete)
						</label>
					</div>
				</div>
				<div class="d-flex justify-content-between border-top mt-5 mb-5"></div>

				<div class="row mb-2 mt-2">


<div class="col-md-4 col-12">
	<div class="form-group">
		<p><b>Email address <span class="text-danger">*</span></b></p>
		<label for="GCS" class="sr-only">GCS</label>
		<input type="text" class="form-control" value="{{$user->email}}" required="" name="email">
	</div>
</div>


<div class="col-md-4 col-12">
	<div class="form-group">
		<p><b>Responsible Persosn <span class="text-danger">*</span></b></p>
		<input type="text" class="form-control" value="{{$user->name}}" required="" name="responsible_person">
	</div>
</div>

<div class="col-md-4 col-12">
	<div class="form-group">
		<p><b>Contact <span class="text-danger">*</span></b></p>
		<input type="number" class="form-control" required="" value="{{$user->contact_number}}" name="contact_number">
	</div>
</div>

<div class="col-md-4 col-12">
	<div class="form-group">
		<p><b>Password <span class="text-danger">*</span></b></p>
		<input type="password" class="form-control" required="" value="{{$user->password}}" name="password">
	</div>
</div>
<div class="col-md-4 col-12">
	<div class="form-group">
		<p><b>Confirm Password <span class="text-danger">*</span></b></p>
		<input type="password" class="form-control" required="" value="{{$user->password}}" name="password_confirmation">
	</div>
</div>

</div>

					
				</div>
					<div class="d-flex justify-content-between border-top mt-0 pt-10 pb-10">

						<div>
							<a href="{{route('schools.index')}}" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4">Back To List</a>
							
						</div>
					</div>

				</form>
											

										</div>

									</div>
									
								</div>

							</div>

						
@endsection