<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>The Business Model Canvas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {!! Html::style('src/frontend/global/css/bootstrap.min.css') !!}
    {!! Html::style('src/frontend/global/css/bootstrap-responsive.css') !!}
    {!! Html::style('src/frontend/global/css/font-awesome.min.css') !!}
    {!! Html::style('src/frontend/global/css/canvas.css') !!}
    {{-- mainStyle --}}
    @yield('styles')
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
	<script src="{{asset('src/frontend/global/js/jquery.min.js')}}"></script>
	<script src="{{asset('src/frontend/global/js/bootstrap.js')}}"></script>
	<script src="{{asset('src/frontend/global/js/jquery.nicescroll.min.js')}}"></script>
	<script src="{{asset('src/frontend/global/js/canvas.js')}}"></script>
  <script src="{{asset('src/frontend/global/js/AjaxSearch.js')}}"></script>
  @yield('scripts')
  </body>
</html>
