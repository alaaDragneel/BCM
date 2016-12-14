@extends('layouts.registers')
@section('title')
teamwork login
@endsection
@section('content')
  <h2>Signin with gudi account</h2>

  <form method="POST" action="{{ url('teamwork/login') }}">
    {{ csrf_field() }}
    <div class="lable-2">
      <div>
      <input
        type="email"
        class="text{{ $errors->has('email') ? ' error' : '' }}"
        placeholder="your@companyname.gudi"
        name="email"
        value="{{ old('email') }}"
        onfocus="this.placeholder = '';"
        onblur="if (this.placeholder == '')
        {this.placeholder = 'your@email.com ';}">
        <div class="clear"> </div>

        @if ($errors->has('email'))
            <span class="help-block error">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
      <input
        type="password"
        class="text{{ $errors->has('password') ? ' error' : '' }}"
        placeholder="Password "
        name="password"
        onfocus="this.placeholder = '';"
        onblur="if (this.placeholder == '')
        {this.placeholder = 'Password ';}">
        <div class="clear"> </div>

        @if ($errors->has('password'))
            <span class="help-block error">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <input type="checkbox" name="remember"><span style="color: #fff;"> Remember Me</span>

    </div>
    <div class="clear"></div>
    <div class="submit">
      <input type="submit" value="Login">
      <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
    </div>
    <h3>Don't Have An Accoutn<span class="term"> <a href="{{url('/register')}}">Create A Gudi Account For Free Now!</a></span></h3>
    <div class="clear"></div>
  </form>
@endsection
