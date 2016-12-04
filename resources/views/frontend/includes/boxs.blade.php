@if (!empty($warning))
  <div class="alert alert-warning">{{$warning}}</div>
@endif
@if (Session::has('msg'))
  <div class="alert alert-success">{{Session::get('msg')}}</div>
@endif
