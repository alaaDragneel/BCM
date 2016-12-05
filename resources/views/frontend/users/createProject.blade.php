@extends('frontend.layouts.adminMaster')

@section('title')
	TeamWorks
@endsection
@section('styles')
	<!--  Paper Dashboard core CSS    -->
{!! Html::style('src/frontend/usersFiles/css/themify-icons.css') !!}
@endsection
@section('content')
	<div class="content">
	  <div class="container-fluid">
	    <div class="row">
	      <div class="alert alert-success">Welcome to Create projects Section</div>
	      <div class="alert alert-info">Choose What Type Of Canvas Do You Need</div>
	        <div class="col-lg-3 col-sm-6">
	            <div class="card">
	                <div class="content" style="min-height: 160px;">
	                    <div class="row">
	                        <div class="col-xs-5">
	                            <div class="icon-big icon-warning text-center">
	                                <i class="ti-server"></i>
	                            </div>
	                        </div>
	                        <div class="col-xs-7">
	                            <div class="numbers">
	                                <p>BMC</p>
	                                105GB
	                            </div>
	                        </div>
	                    </div>
	                    <div class="footer">
	                        <hr />
	                        <div class="stats">
	                          <a href="{{ route('createInfo.projects') }}"><i class="ti-reload"></i> Create Now</a>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	  </div>
	</div>
@endsection
