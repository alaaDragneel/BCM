@extends('frontend.layouts.teamWorkMaster')

@section('title')
  profile
@endsection
@section('content')
     <?php
          $uName = strstr(Auth::guard('teamWork')->user()->email, '@', true);
          $uEmail = strstr(Auth::guard('teamWork')->user()->email, '@');
          ?>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-5">
          <div class="card card-user">
            <div class="image" id="back_imageDiv">
              <img src="{{asset(Auth::guard('teamWork')->user()->back_image)}}" alt="{{$uName}} background image" >
            </div>
            <div class="content">
              <div class="author" id="imageDiv">
                <img class="avatar border-white" src="{{asset(Auth::guard('teamWork')->user()->image)}}" alt="{{$uName}} profile image">

               <h4 class="title">{{$uName}}<br>
                 <a href="#"><small>{{ $uEmail }}</small></a>
               </h4>
              </div>
              <p class="description text-center">
                <?php
                  // truncate string
                  $strDesc = substr(Auth::guard('teamWork')->user()->description, 0, 70);
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
              <form enctype="multipart/form-data" action="{{route('team.profile.update')}}" method="post">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control " placeholder="your name here" value="{{ $uName !== '' ? $uName : ''}}" name="name">
                      @if ($errors->has('name'))
                        <span class="help-block">
                          <strong style="color:#a94442;">{{ $errors->first('name') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group{{ $errors->has('emailAddress') ? ' has-error' : '' }}">
                      <label for="exampleInputEmail1">email address</label>
                      <input type="email" class="form-control " placeholder="Email address" value="{{ Auth::guard('teamWork')->user()->emailAddress }}" name="emailAddress">
                      @if ($errors->has('emailAddress'))
                        <span class="help-block">
                          <strong style="color:#a94442;">{{ $errors->first('emailAddress') }}</strong>
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
                    <div class="form-group{{ $errors->has('job') ? ' has-error' : '' }}">
                      <label>Job</label>
                      <input type="text" class="form-control " placeholder="Job" value="{{ Auth::guard('teamWork')->user()->job !== '' ? Auth::guard('teamWork')->user()->job : ''}}" name="job">
                      @if ($errors->has('job'))
                        <span class="help-block">
                          <strong style="color:#a94442;">{{ $errors->first('job') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group{{ $errors->has('phoneNo') ? ' has-error' : '' }}">
                      <label>Phone Number</label>
                      <input type="number" class="form-control " placeholder="Phone Number" value="{{ Auth::guard('teamWork')->user()->phoneNo !== '' ? Auth::guard('teamWork')->user()->phoneNo : ''}}" name="phoneNo">
                      @if ($errors->has('phoneNo'))
                        <span class="help-block">
                          <strong style="color:#a94442;">{{ $errors->first('phoneNo') }}</strong>
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
                      <textarea rows="5" class="form-control{{ $errors->has('description') ? ' has-error' : '' }}" placeholder="Here can be your description" name="description">{{ Auth::guard('teamWork')->user()->description !== '' ? Auth::guard('teamWork')->user()->description : ''}}</textarea>
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
