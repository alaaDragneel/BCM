@extends('frontend.layouts.master')

@section('styles')
{!! Html::style('src/frontend/global/css/customStyle.css') !!}
@endsection

@section('content')
<div class="row">
   <div class="col-md-8 col-md-offset-2">
     <div class="row logsHead">
       <div class="col-md-6">
         <div class="badge Text"><a href="{{url('/login')}}">LogIn</a></div>
       </div>
       <div class="col-md-6">
         <div class="badge registerText">register</div>
       </div>
     </div>
       <div class="panel panel-success register">
           <div class="panel-heading">Register</div>
           <div class="panel-body">
               <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                   {{ csrf_field() }}

                   <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                       <label for="name" class="col-md-4 control-label">Name</label>

                       <div class="col-md-6">
                           <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                           @if ($errors->has('name'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('name') }}</strong>
                               </span>
                           @endif
                       </div>
                   </div>

                   <div class="form-group{{ $errors->has('phoneNo') ? ' has-error' : '' }}">
                       <label for="phoneNo" class="col-md-4 control-label">phoneNo</label>

                       <div class="col-md-6">
                           <input id="phoneNo" type="text" class="form-control" name="phoneNo" value="{{ old('phoneNo') }}">

                           @if ($errors->has('phoneNo'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('phoneNo') }}</strong>
                               </span>
                           @endif
                       </div>
                   </div>

                   <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                       <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                       <div class="col-md-6">
                           <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                           @if ($errors->has('email'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('email') }}</strong>
                               </span>
                           @endif
                       </div>
                   </div>

                   <div class="form-group{{ $errors->has('userType') ? ' has-error' : '' }}">
                     <label for="userType" class="col-md-4 control-label">Type</label>
                       <div class="col-md-6">
                           <select class="form-control" name="userType" id="userType">
                             <option value="2">individual</option>
                             <option value="3">company</option>
                           </select>
                           @if ($errors->has('userType'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('userType') }}</strong>
                               </span>
                           @endif
                       </div>
                   </div>

                   <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                       <label for="password" class="col-md-4 control-label">Password</label>

                       <div class="col-md-6">
                           <input id="password" type="password" class="form-control" name="password">

                           @if ($errors->has('password'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('password') }}</strong>
                               </span>
                           @endif
                       </div>
                   </div>

                   <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                       <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                       <div class="col-md-6">
                           <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                           @if ($errors->has('password_confirmation'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('password_confirmation') }}</strong>
                               </span>
                           @endif
                       </div>
                   </div>

                   <div class="form-group">
                       <div class="col-md-6 col-md-offset-4">
                           <button type="submit" class="btn btn-success">
                               <i class="fa fa-btn fa-user"></i> Register
                           </button>
                       </div>
                   </div>
               </form>
           </div>
       </div>
   </div>
</div>
@endsection
