@extends('frontend.layouts.userMaster')
@section('content')
  <div class="content">
      <div class="container-fluid">
          <div class="row">
            <div class="card">
              <div class="header">
                  <h4 class="title">Edit Profile</h4>
              </div>
              <div class="content">
                <div class="row">
                    <form class="" action="index.html" method="post">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Company Name</label>
                          <input type="text" class="form-control border-input" disabled placeholder="Company" value="{{ Auth::user()->name }}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>BMC Name</label>
                          <input type="text" name="bmcName" class="form-control border-input" placeholder="Username">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>start Date</label>
                          <input type="date" name="startDate" class="form-control border-input" placeholder="start Date">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>end Date</label>
                          <input type="date" name="endDate" class="form-control border-input" placeholder="end Date" >
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
            </div>
          </div>
      </div>
</div>
@endsection
