@extends('layouts.registers')
@section('content')

  <div class="social-icons">

    <div class="col_1_of_f span_1_of_f">
      <a href="#">
        <ul class='facebook'>
          <i class="fb" style="background:url({{ asset('src/frontend/global/img/fb.png') }});"></i>
          <li>Connect with Facebook</li>
          <div class='clear'> </div>
        </ul>
      </a>
    </div>

    <div class="col_1_of_f span_1_of_f">
      <a href="#">
        <ul class='twitter'>
          <i class="tw" style="background:url({{ asset('src/frontend/global/img/tw.png') }});"></i>
          <li>Connect with Twitter</li>
          <div class='clear'></div>
        </ul>
      </a>
    </div>

    <div class="clear"> </div>
  </div>

  <h2>Or Signup with</h2>

  <form method="POST" action="{{ url('/register') }}">
    {{ csrf_field() }}
    <div class="lable">
      <div class="col_1_of_2 span_1_of_2">
        <input
          type="text"
          class="text{{ $errors->has('firstName') ? ' error' : '' }}"
          name="firstName"
          placeholder="First Name"
          value="{{ old('firstName') }}"
          onfocus="this.placeholder = '';"
          onblur="if (this.placeholder == '')
          {this.placeholder = 'First Name';}">
          @if ($errors->has('firstName'))
              <span class="help-block error">
                  <strong>{{ $errors->first('firstName') }}</strong>
              </span>
          @endif
      </div>
      <div class="col_1_of_2 span_1_of_2">
        <input
          type="text"
          class="text{{ $errors->has('lastName') ? ' error' : '' }}"
          name="lastName"
          placeholder="Last Name"
          value="{{ old('lastName') }}"
          onfocus="this.placeholder = '';"
          onblur="if (this.placeholder == '')
          {this.placeholder = 'Last Name';}">
          @if ($errors->has('lastName'))
              <span class="help-block error">
                  <strong>{{ $errors->first('lastName') }}</strong>
              </span>
          @endif
      </div>
      <div class="clear"> </div>
    </div>
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
      <input
        type="password"
        class="text{{ $errors->has('password_confirmation') ? ' error' : '' }}"
        placeholder="password confirmation"
        name="password_confirmation"
        onfocus="this.placeholder = '';"
        onblur="if (this.placeholder == '')
        {this.placeholder = 'Password ';}">
        @if ($errors->has('password_confirmation'))
            <span class="help-block error">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
    </div>
    <div class="clear"></div>
    <h3>By creating an account, you agree to our <span class="term"><a href="#">Terms & Conditions</a></span></h3>
    <div class="submit">
      <input type="submit" value="Create account">
    </div>
    <div class="clear"></div>
  </form>
@endsection
