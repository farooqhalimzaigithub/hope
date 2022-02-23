@extends('layouts.main')
@section('content')
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
											<form class="form"  method="post" action="{{route('schools.store')}}" >
												<input type="hidden" name="district_id" value="{{ Auth::user()->district_id; }}">
			@csrf
				<div class="container">

					<div class="row">
						<div class="col-xl-12">
							<div class="form-group">
								<label>School name</label>
								<input type="text" class="form-control" name="name"  required="" />		
								<!-- <span class="form-text text-danger">Please enter Name</span> -->
							</div>
							
						</div>
					</div>

					<div class="row">
						<div class="col-xl-6">
							<div class="form-group">
								<label>Latitude</label>
								<input type="text" class="form-control" name="lat"  required="" />
							</div>
							
						</div>

						<div class="col-xl-6">
							<div class="form-group">
								<label>Longitude</label>
								<input type="text" class="form-control" name="lng"  required="" />
							</div>
							
						</div>
					</div>

					<div class="row">
						<div class="col-xl-6">
							<div class="form-group">
								<label>Address</label>
								<input type="text" class="form-control" name="address"  required="" />
							</div>
							
						</div>

						<div class="col-xl-6">
							<div class="form-group">
								<label>Land Mark</label>
								<input type="text" class="form-control" name="land_mark"  required="" />
							</div>
							
						</div>
					</div>

					<div class="row">

					<div class="col-xl-2"><b>CS Type</b></div>
						<div class="col-xl-2">
							<label class="">
								<input type="radio" class="" name="school_type" checked value="GCS"> GCS
							</label>
						</div>
						
						<div class="col-xl-2">
							<label class="">
								<input type="radio" class="" name="school_type" value="CFS"> CFS
							</label>
						</div>


						<div class="col-xl-2">
							<label class="">
								<input type="radio" class="" name="school_type" value="CBEC"> CBEC
							</label>
						</div>


						<div class="col-xl-2">
							<label class="">
								<input type="radio" class="" name="school_type" value="BECS"> BECS
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
							<input type="radio" class="" name="status" checked value="functional"> Functional
						</label>
					</div>
					
					<div class="col-xl-2">
						<label class="">
							<input type="radio" class="" name="status" value="non-functional"> Non-functional
						</label>
					</div>
				</div>


				<div class="row mt-2">

					<div class="col-xl-2"><b>Building Ownership</b></div>
						<div class="col-xl-2">
							<label class="">
								<input type="radio" class="" name="building_ownership" checked value="Govt"> Govt
							</label>
						</div>
						
						<div class="col-xl-2">
							<label class="">
								<input type="radio" class="" name="building_ownership" value="VEC"> VEC
							</label>
						</div>


						<div class="col-xl-2">
							<label class="">
								<input type="radio" class="" name="building_ownership" value="Communal"> Communal
							</label>
						</div>


						<div class="col-xl-2">
							<label class="">
								<input type="radio" class="" name="building_ownership" value="Personal"> Personal
							</label>
						</div>
				</div>

				<div class="row mt-2">
					<div class="col-xl-2"><b>Gender</b></div>
					<div class="col-xl-2">
						<label class="">
							<input type="radio" class="" name="gender" checked value="Boys"> Boys
						</label>
					</div>
					<div class="col-xl-2">
						<label class="">
							<input type="radio" class="" name="gender" value="Girls"> Girls
						</label>
					</div>
					<div class="col-xl-2">
						<label class="">
							<input type="radio" class="" name="gender" value="Co-education"> Co-education
						</label>
					</div>
				</div>

				<div class="row mt-2">
					<div class="col-xl-2"><b>Building Structure</b></div>
					<div class="col-xl-2">
						<label class="">
							<input type="radio" class="" name="building_structure" checked value="Pakka"> Pakka
						</label>
					</div>
					<div class="col-xl-2">
						<label class="">
							<input type="radio" class="" name="building_structure" value="Kacha"> Kacha
						</label>
					</div>
					<div class="col-xl-2">
						<label class="">
							<input type="radio" class="" name="building_structure" value="Mixed"> Mixed
						</label>
					</div>
					<div class="col-xl-2">
						<label class="">
							<input type="radio" class="" name="building_structure" value="Open-air-partial"> Open air (Partial)
						</label>
					</div>

					<div class="col-xl-2">
						<label class="">
							<input type="radio" class="" name="building_structure" value="Open-air-complete"> Open air (Complete)
						</label>
					</div>
				</div>
				<div class="d-flex justify-content-between border-top mt-5 mb-5"></div>

				<div class="row mb-2 mt-2">


<div class="col-md-4 col-12">
	<div class="form-group">
		<p><b>Email address *</b></p>
		<label for="GCS" class="sr-only">GCS</label>
		<input type="text" class="form-control" required="" name="email">
	</div>
</div>


<div class="col-md-4 col-12">
	<div class="form-group">
		<p><b>Responsible Persosn</b></p>
		<input type="text" class="form-control" required="" name="responsible_person">
	</div>
</div>

<div class="col-md-4 col-12">
	<div class="form-group">
		<p><b>Contact #</b></p>
		<input type="number" class="form-control" required="" name="contact_number">
	</div>
</div>

<div class="col-md-4 col-12">
	<div class="form-group">
		<p><b>Password</b></p>
		<input type="password" class="form-control" required="" name="password">
	</div>
</div>
<div class="col-md-4 col-12">
	<div class="form-group">
		<p><b>Confirm Password</b></p>
		<input type="password" class="form-control" required="" name="password_confirmation">
	</div>
</div>

</div>

					
				</div>
					<div class="d-flex justify-content-between border-top mt-0 pt-10 pb-10">

						<div>
							<button type="submit" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4">submit</button>
							
						</div>
					</div>

				</form>
											

										</div>

									</div>
									
								</div>

							</div>

						
@endsection