@extends('frontend.layouts.adminMaster')

@section('title')
	Profile Information
@endsection
@section('content')
  <div class="content">
      <div class="container-fluid">
          <div class="row">
            <div class="card">
              <div class="header">
                  <h4 class="title">Profile Main information</h4>
              </div>
              <div class="content">
                <div class="row">
                    <form action="{{ route('register.info.update') }}" method="post">
                      {{ csrf_field() }}
											@if (empty(Auth::user()->email))
												<div class="col-md-6">
													<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
														<label>Email</label>
														<input type="email" class="form-control " placeholder="Email" name="email" value="{{ Request::old('email') }}">
														@if ($errors->has('email'))
															<span class="help-block">
																<strong style="color:#a94442;">{{ $errors->first('email') }}</strong>
															</span>
														@endif
													</div>
												</div>
											@endif
											@if (empty(Auth::user()->userType))
												<div class="col-md-6">
													<div class="form-group">
														<label>Account Type</label>
														<select class="form-control{{ $errors->has('userType') ? ' has-error' : '' }}" name="userType">
															<option>Choose</option>
															<option value="2">Startup</option>
															<option value="3">Company</option>
														</select>
														@if ($errors->has('userType'))
															<span class="help-block">
																<strong style="color:#a94442;">{{ $errors->first('userType') }}</strong>
															</span>
														@endif
													</div>
												</div>
											@endif
											@if (empty(Auth::user()->phoneNo))
											@if (empty(Auth::user()->email))
                      	<div class="col-md-6 col-md-offset-3">
											@else
												<div class="col-md-6">
											@endif
                        <div class="form-group{{ $errors->has('phoneNo') ? ' has-error' : '' }}">
                          <label>Phone Number</label>
                          <input type="number" class="form-control" placeholder="Phone Number" name="phoneNo" value="{{ Request::old('phoneNo') }}">
                          @if ($errors->has('phoneNo'))
                              <span class="help-block">
                                  <strong style="color:#a94442;">{{ $errors->first('phoneNo') }}</strong>
                              </span>
                          @endif
                        </div>
                      </div>
											@endif
										</div>
                      <div class="form-group">
                          <div class="col-md-6">
                              <button type="submit" class="btn btn-info">
                                  <i class="fa fa-plus" aria-hidden="true"></i> Add Information
                              </button>
                          </div>
                      </div>
                    </form>
                </div>
            </div>
          </div>
      </div>
</div>
@endsection
