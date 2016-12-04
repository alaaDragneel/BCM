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
            <div class="image">
              <img src="{{asset(Auth::user()->back_image)}}" alt="...">
            </div>
            <div class="content">
              <div class="author">
                <img class="avatar border-white" src="{{asset(Auth::user()->image)}}" alt="...">
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
                        <img src="{{asset('src/backend/dist/img//face-0.jpg')}}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
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
                        <img src="{{asset('src/backend/dist/img//face-1.jpg')}}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
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
                        <img src="{{asset('src/backend/dist/img//face-3.jpg')}}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
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
              <form>
                <div class="row">
                  @if (\Auth::user()->userType === 3)
                    {{-- check if company or startup --}}
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Company</label>
                        <input type="text" class="form-control " placeholder="Company" value="{{ Auth::user()->name !== '' ? Auth::user()->name : Auth::user()->firstName .' '. Auth::user()->lastName}}" id="name">
                      </div>
                    </div>
                  @endif
                  @if (\Auth::user()->userType === 2)
                    {{-- check if company or startup --}}
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control " placeholder="Username" value="{{ Auth::user()->name !== '' ? Auth::user()->name : Auth::user()->firstName .' '. Auth::user()->lastName}}" id="name">
                      </div>
                    </div>
                  @endif
                  {{-- check if company or startup --}}
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control " placeholder="Email" value="{{ Auth::user()->email !== '' ? Auth::user()->email : ''}}" id="email">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>First Name</label>
                      <input type="text" class="form-control " placeholder="First Name" value="{{ Auth::user()->firstName !== '' ? Auth::user()->firstName : ''}}" id="firstName">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Last Name</label>
                      <input type="text" class="form-control " placeholder="Last Name" value="{{ Auth::user()->lastName !== '' ? Auth::user()->lastName : ''}}" id="lastName">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Address</label>
                      <input type="text" class="form-control " placeholder="Home Address" value="{{ Auth::user()->address !== '' ? Auth::user()->address : ''}}" id="address">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Job</label>
                      <input type="text" class="form-control " placeholder="Job" value="{{ Auth::user()->job !== '' ? Auth::user()->job : ''}}" id="job">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Phone Number</label>
                      <input type="number" class="form-control " placeholder="Phone Number" value="{{ Auth::user()->phoneNo !== '' ? Auth::user()->phoneNo : ''}}" id="phoneNo">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Company Start Date</label>
                      <input type="number" class="form-control " placeholder="Company Start Date" value="{{ Auth::user()->companyStartFrom !== '' ? Auth::user()->companyStartFrom : ''}}" id="companyStartFrom">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Account Type</label>
                      <select class="form-control " name="userType">
                        <option value="2" @if (Auth::user()->userType === 2)
                          selected="selected"
                        @endif>Startup</option>
                        <option value="3" @if (Auth::user()->userType === 3)
                          selected="selected"
                        @endif>Company</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Personal Picture</label>
                      <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                        <div>
                          <span class="btn btn-default btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="...">
                          </span>
                          <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group pull-right">
                      <label>Background Picture</label>
                      <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                        <div>
                          <span class="btn btn-default btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="...">
                          </span>
                          <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>About Me</label>
                      <textarea rows="5" class="form-control " placeholder="Here can be your description">{{ Auth::user()->description !== '' ? Auth::user()->description : ''}}</textarea>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
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
