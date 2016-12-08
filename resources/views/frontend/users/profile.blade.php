@extends('frontend.layouts.adminMaster')

@section('title')
  TeamWorks
@endsection
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-5">
          <div class="card card-user">
            <div class="image" id="back_imageDiv">
              <img src="{{asset(Auth::user()->back_image)}}" alt="{{Auth::user()->name}} background image" >
            </div>
            <div class="content">
              <div class="author" id="imageDiv">

                <img class="avatar border-white" src="{{asset(Auth::user()->image)}}" alt="{{Auth::user()->name}} profile image">

                <h4 class="title">{{ Auth::user()->name }}<br>
                </h4>
              </div>
              <p class="description text-center">
                <?php
                  // truncate string
                  $strDesc = substr(Auth::user()->description, 0, 70);
                  // make sure it ends in a word so assassinate doesn't become ass...
                  $string = substr($strDesc, 0, strrpos($strDesc, ' ')).'...';
                ?>
                "{{ $string }}"
              </p>
            </div>
            <hr>
            <div class="text-center">
              <div class="row">
                <div class="col-md-3 col-md-offset-1">
                  <h5>12<br><small>Files</small></h5>
                </div>
                <div class="col-md-4">
                  <h5>2GB<br><small>Used</small></h5>
                </div>
                <div class="col-md-3">
                  <h5>24,6$<br><small>Spent</small></h5>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="header">
              <h4 class="title">Team Members</h4>
            </div>
            <div class="content">
              <ul class="list-unstyled team-members">
                <li>
                  <div class="row">
                    <div class="col-xs-3">
                      <div class="avatar">
                        <img src="{{asset('src/frontend/dist/img//face-0.jpg')}}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                      </div>
                    </div>
                    <div class="col-xs-6">
                      DJ Khaled
                      <br>
                      <span class="text-muted"><small>Offline</small></span>
                    </div>

                    <div class="col-xs-3 text-right">
                      <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="row">
                    <div class="col-xs-3">
                      <div class="avatar">
                        <img src="{{asset('src/frontend/dist/img//face-1.jpg')}}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                      </div>
                    </div>
                    <div class="col-xs-6">
                      Creative Tim
                      <br>
                      <span class="text-success"><small>Available</small></span>
                    </div>

                    <div class="col-xs-3 text-right">
                      <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="row">
                    <div class="col-xs-3">
                      <div class="avatar">
                        <img src="{{asset('src/frontend/dist/img//face-3.jpg')}}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                      </div>
                    </div>
                    <div class="col-xs-6">
                      Flume
                      <br>
                      <span class="text-danger"><small>Busy</small></span>
                    </div>

                    <div class="col-xs-3 text-right">
                      <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-md-7">
          <div class="card">
            <div class="header">
              <h4 class="title">Edit Profile</h4>
            </div>
            <div class="content">
              <form enctype="multipart/form-data" action="{{route('profile.update')}}" method="post">
                {{ csrf_field() }}
                <div class="row">
                  @if (\Auth::user()->userType === 3)
                    {{-- check if company or startup --}}
                    <div class="col-md-6">
                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label>Company</label>
                        <input type="text" class="form-control " placeholder="Company" value="{{ Auth::user()->name !== '' ? Auth::user()->name : Auth::user()->firstName .' '. Auth::user()->lastName}}" name="name">
                        @if ($errors->has('name'))
                          <span class="help-block">
                            <strong style="color:#a94442;">{{ $errors->first('name') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>
                  @endif
                  @if (\Auth::user()->userType === 2)
                    {{-- check if company or startup --}}
                    <div class="col-md-6">
                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label>Username</label>
                        <input type="text" class="form-control " placeholder="Username" value="{{ Auth::user()->name !== '' ? Auth::user()->name : Auth::user()->firstName .' '. Auth::user()->lastName}}" name="name">
                        @if ($errors->has('name'))
                          <span class="help-block">
                            <strong style="color:#a94442;">{{ $errors->first('name') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>
                  @endif
                  {{-- check if company or startup --}}
                  <div class="col-md-6">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control " placeholder="Email" value="{{ Auth::user()->email !== '' ? Auth::user()->email : ''}}" name="email">
                      @if ($errors->has('email'))
                        <span class="help-block">
                          <strong style="color:#a94442;">{{ $errors->first('email') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                      <label>First Name</label>
                      <input type="text" class="form-control " placeholder="First Name" value="{{ Auth::user()->firstName !== '' ? Auth::user()->firstName : ''}}" name="firstName">
                      @if ($errors->has('firstName'))
                        <span class="help-block">
                          <strong style="color:#a94442;">{{ $errors->first('firstName') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                      <label>Last Name</label>
                      <input type="text" class="form-control " placeholder="Last Name" value="{{ Auth::user()->lastName !== '' ? Auth::user()->lastName : ''}}" name="lastName">
                      @if ($errors->has('lastName'))
                        <span class="help-block">
                          <strong style="color:#a94442;">{{ $errors->first('lastName') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <label>password</label>
                      <input type="password" class="form-control" placeholder="password" name="password">
                      @if ($errors->has('password'))
                        <span class="help-block">
                          <strong style="color:#a94442;">{{ $errors->first('password') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                      <label>Address</label>
                      <input type="text" class="form-control " placeholder="Home Address" value="{{ Auth::user()->address !== '' ? Auth::user()->address : ''}}" name="address">
                      @if ($errors->has('address'))
                        <span class="help-block">
                          <strong style="color:#a94442;">{{ $errors->first('address') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group{{ $errors->has('job') ? ' has-error' : '' }}">
                      <label>Job</label>
                      <input type="text" class="form-control " placeholder="Job" value="{{ Auth::user()->job !== '' ? Auth::user()->job : ''}}" name="job">
                      @if ($errors->has('job'))
                        <span class="help-block">
                          <strong style="color:#a94442;">{{ $errors->first('job') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group{{ $errors->has('phoneNo') ? ' has-error' : '' }}">
                      <label>Phone Number</label>
                      <input type="number" class="form-control " placeholder="Phone Number" value="{{ Auth::user()->phoneNo !== '' ? Auth::user()->phoneNo : ''}}" name="phoneNo">
                      @if ($errors->has('phoneNo'))
                        <span class="help-block">
                          <strong style="color:#a94442;">{{ $errors->first('phoneNo') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group{{ $errors->has('companyStartFrom') ? ' has-error' : '' }}">
                      <label>Company Start Date</label>
                      <input type="date" class="form-control " placeholder="Company Start Date" value="{{ Auth::user()->companyStartFrom !== '' ? Auth::user()->companyStartFrom : ''}}" name="companyStartFrom">
                      @if ($errors->has('companyStartFrom'))
                        <span class="help-block">
                          <strong style="color:#a94442;">{{ $errors->first('companyStartFrom') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group{{ $errors->has('userType') ? ' has-error' : '' }}">
                      <label>Account Type</label>
                      <select class="form-control " name="userType" name="userType">
                        <option value="2" @if (Auth::user()->userType === 2)
                          selected="selected"
                        @endif>Startup</option>
                        <option value="3" @if (Auth::user()->userType === 3)
                          selected="selected"
                        @endif>Company</option>
                      </select>
                      @if ($errors->has('userType'))
                        <span class="help-block">
                          <strong style="color:#a94442;">{{ $errors->first('userType') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                      <label>Personal Picture</label>
                      <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                        <div>
                          <span class="btn btn-default btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="image">
                          </span>
                          <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                      </div>
                      @if ($errors->has('image'))
                        <span class="help-block">
                          <strong style="color:#a94442;">{{ $errors->first('image') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group pull-right{{ $errors->has('back_image') ? ' has-error' : '' }}">
                      <label>Background Picture</label>
                      <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                        <div>
                          <span class="btn btn-default btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="back_image">
                          </span>
                          <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                      </div>
                      @if ($errors->has('back_image'))
                        <span class="help-block">
                          <strong style="color:#a94442;">{{ $errors->first('back_image') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>About Me</label>
                      <textarea rows="5" class="form-control{{ $errors->has('description') ? ' has-error' : '' }}" placeholder="Here can be your description" name="description">{{ Auth::user()->description !== '' ? Auth::user()->description : ''}}</textarea>
                      @if ($errors->has('description'))
                        <span class="help-block">
                          <strong style="color:#a94442;">{{ $errors->first('description') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-info btn-fill btn-wd" name="updateUser">Update Profile</button>
                </div>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
