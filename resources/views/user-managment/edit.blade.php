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
												<h3 class="card-title">User Form</h3>
												<div class="card-toolbar">
													<div class="example-tools justify-content-center">
														<span class="example-toggle" data-toggle="tooltip" title="View code"></span>
														<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
													</div>
												</div>
											</div>
											<form class="form  mt-12"  method="post" action="{{route('users.update',$user->id)}}" >
			                               @csrf
			                               @method('PUT')
			                               <div class="row" > 
									<div class="col-lg-6">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Name</label>

										
											<input type="text" id="form-field-1" placeholder="Username" name="name" value="{{$user->name}}" class="form-control"/>
										
									</div>
									<div class="col-lg-6">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email</label>

										
											<input type="text" id="form-field-1" placeholder="Username"  value="{{$user->email}}" name="email" class="form-control" />
										
									</div>
									</div>
									<div class="d-flex justify-content-between border-top mt-0 pt-10 pb-10">
						<!-- <div class="mr-2">
							<button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Back</button>
						</div> -->
						<div>
							<button type="submit" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4">Update</button>
							
						</div>
					</div>
								</form>
								</div>
								</div>
								</div>
								</div>
									@stop