@extends('frontend.layouts.userMaster')
@section('content')
  <div class="content">
      <div class="container-fluid">
          <div class="row">
            <div class="card">
              <div class="header">
                  <h4 class="title">Canvas Main information</h4>
              </div>
              <div class="content">
                <div class="row">
                    <form action="{{ route('store.canvas') }}" method="post">
                      {{ csrf_field() }}
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Company Name</label>
                          <input type="text" class="form-control border-input" disabled placeholder="Company" value="{{ Auth::user()->name }}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          <label>BMC Name</label>
                          <input type="text" name="name" class="form-control border-input" placeholder="Username">
                          @if ($errors->has('name'))
                              <span class="help-block">
                                  <strong style="color:#a94442;">{{ $errors->first('name') }}</strong>
                              </span>
                          @endif
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                          <label>Description</label>
                          <textarea name="description" class="form-control border-input" rows="5" placeholder="canvas Description"></textarea>
                          @if ($errors->has('description'))
                              <span class="help-block">
                                  <strong style="color:#a94442;">{{ $errors->first('description') }}</strong>
                              </span>
                          @endif
                        </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-6">
                              <button type="submit" class="btn btn-info">
                                  <i class="fa fa-plus" aria-hidden="true"></i> Add Canvas
                              </button>
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
