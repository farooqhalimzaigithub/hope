@extends('layouts.main')
@section('content')
                                  <form class="form-horizontal" role="form" method="post" action="{{route('users.update',$user->id)}}"> 
                                  	 {{ csrf_field() }}
		                             {{ method_field('PUT') }}
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Name</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="Username" name="name" value="{{$user->name}}" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="Username"  value="{{$user->email}}" name="email" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Update
											</button>

											&nbsp; &nbsp; &nbsp;
											<a class="btn" type="reset" href="{{url('users')}}">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Back
											</a>
										</div>
									</div>
								</form>
									@endsection