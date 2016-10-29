@extends('frontend.layouts.userMaster')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="alert alert-success">welcome to the project page</div>
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-warning text-center">
                                <i class="ti-server"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>BMCName</p>
                                6
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                            <i class="ti-reload"></i> Status
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($projects as $project)

          <div class="col-lg-3 col-sm-6">
              <div class="card">
                  <div class="content">
                      <div class="row">
                          <div class="col-xs-5">
                              <div class="icon-big icon-warning text-center">
                                  <i class="ti-server"></i>
                              </div>
                          </div>
                          <div class="col-xs-7">
                              <div class="numbers">
                                  <p>{{ $project->name }}</p>
                                  5
                              </div>
                          </div>
                      </div>
                      <div class="footer">
                          <hr />
                          <div class="stats">
                              <i class="ti-reload"></i> Done
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
