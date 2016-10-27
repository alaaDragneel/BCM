<!DOCTYPE html>
<!--[if lte IE 9]><html class="no-js is-ie"><![endif]-->
<!--[if gt IE 8]><!--><html class=no-js><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta name="description" content="BlackTie Free Bootstrap Theme">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">



	<title>@yield('title')</title>
  <link href="{{asset('src/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('src/frontend/css/bootstrap-responsive.css')}}" rel="stylesheet">
  <link href="{{asset('src/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
	<link rel=stylesheet href="{{asset('src/frontend/css/main.css')}}">
	<!--[if lte IE 8]>
	<link rel=stylesheet href="css/ie.css">
	<![endif]-->
  @yield('stylies')
	<script src="{{asset('src/frontend/js/vendor/modernizr.js')}}"></script>
	<script src="{{asset('src/frontend/js/vendor/respond.min.js')}}"></script>
</head>
<body>

  @yield('content')

	<script src="{{asset('src/frontend/js/jquery.min.js')}}"></script>
	<script src="{{asset('src/frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('src/frontend/js/dropdown.js')}}"></script>
	<script src="{{asset('src/frontend/js/main.js')}}"></script>
  @yield('scripts')
	<!-- //-end- concat_js -->
</body>
</html>
