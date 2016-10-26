<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>The Business Model Canvas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('src/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('src/frontend/css/bootstrap-responsive.css')}}" rel="stylesheet">
    <link href="{{asset('src/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('src/frontend/css/canvas.css')}}" rel="stylesheet">
    <meta name="description" content="Business Model Canvas Template">
    <meta name="author" content="Zeljko Dakic">
    <link href='http://fonts.googleapis.com/css?family=Headland+One' rel='stylesheet' type='text/css'>
  </head>
  <body>
    <div class="container">
	    @yield('content')

      <script>
      var url = '{{ route('results') }}';
      var urlBtn = '{{ route('request') }}';
      var urlCustomer = '{{ route('Companies') }}';
      var token = '{{ csrf_field() }}';
      </script>

    </div>
<!-- Javascript loading -->
	<script src="{{asset('src/frontend/js/jquery.min.js')}}"></script>
	<script src="{{asset('src/frontend/js/bootstrap.js')}}"></script>
	<script src="{{asset('src/frontend/js/jquery.nicescroll.min.js')}}"></script>
	<script src="{{asset('src/frontend/js/canvas.js')}}"></script>
	<script src="{{asset('src/frontend/js/AjaxSearch.js')}}"></script>
  </body>
</html>
