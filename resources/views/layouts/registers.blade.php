<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  {!! Html::style('src/frontend/global/css/bootstrap.min.css') !!}
  {!! Html::style('src/frontend/global/css/font-awesome.min.css') !!}
  {!! Html::style('src/frontend/global/css/bootstrap-social.css') !!}
  <link href="{{ asset('src/frontend/global/css/register.css') }}" rel='stylesheet' type='text/css' />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <!--webfonts-->
  <link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
  <!--//webfonts-->
  <title>@yield('title')</title>
</head>
<body>
  <div class="main">
       @include('frontend.includes.boxs')
    @yield('content')
  </div>  <!---//end-main---->
  <script src="{{asset('src/frontend/global/js/jquery.min.js')}}"></script>
  <script src="{{asset('src/frontend/global/js/bootstrap.js')}}"></script>
  <script src="{{ asset('src/frontend/global/js/register.js') }}"></script>
</body>
</html>
