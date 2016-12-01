@extends('frontend.layouts.adminMaster')

@section('title')
	Projects
@endsection
@section('content')
<div class="content">
  <div class="container-fluid">
    @if (Session::has('success'))
      <div class="alert alert-info">{{ Session::get('success') }}</div>
    @endif
    <div class="row">
        @foreach ($projects as $canvas)
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
                                  <p>{{ $canvas->name }}</p>
                                  BMC
                              </div>
                          </div>
                      </div>
                      <div class="footer">
                          <hr />
                          <div class="stats">
                              <a href="{{ route('view.canvas', ['canvas_id' => $canvas->id]) }}"><i class="ti-reload"></i> show Now</a>
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
