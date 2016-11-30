@extends('layouts.registers')
@section('content')

  <div class="social-icons">
    <div class="row">
      {{-- facebook --}}
      <div class="col-md-6">
        <a href="{{ url('/redirect/facebook') }}" class="btn btn-block btn-lg btn-social btn-facebook">
          <span class="fa fa-facebook"></span> Sign in with Facebook
        </a>
      </div>
      {{-- twitter --}}
      <div class="col-md-6">
        <a href="{{ url('/redirect/twitter') }}" class="btn btn-block btn-lg btn-social btn-twitter">
          <span class="fa fa-twitter"></span> Sign in with Twitter
        </a>
      </div>
      <div style="height: 36px; clear: both;"></div>
      {{-- linkedin --}}
      <div class="col-md-6">
        <a href="{{ url('/redirect/linkedin') }}" class="btn btn-block btn-lg btn-social btn-linkedin">
          <span class="fa fa-linkedin"></span> Sign in with Linkedin
        </a>
      </div>
      {{-- google --}}
      <div class="col-md-6">
        <a href="{{ url('/redirect/google') }}" class="btn btn-block btn-lg btn-social btn-google">
          <span class="fa fa-google"></span> Sign in with Google
        </a>
      </div>


    <div class="clear"> </div>
  </div>

  <h2>Or Signin with gudi account</h2>

  <form method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}
    <div class="lable-2">
      <div>
      <input
        type="email"
        class="text{{ $errors->has('email') ? ' error' : '' }}"
        placeholder="your@email.com "
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
    </div>
    <div class="clear"></div>
    <div class="submit">
      <input type="submit" value="Login">
    </div>
    <h3>Don't Have An Accoutn<span class="term"> <a href="{{url('/register')}}">Create A Gudi Account For Free Now!</a></span></h3>
    <div class="clear"></div>
  </form>
@endsection
