@extends('frontend.layouts.adminMaster')

@section('content')


  <!-- Main content -->
  <section class="content">

    <!-- row -->
    <div class="row">
      <div class="col-md-12">
        <!-- The time line -->
        <ul class="timeline">
          @foreach ($userNoty as $noty)
          <!-- timeline time label -->
          <li class="time-label">
            <span class="bg-blue">
              {{ $noty->created_at->format('d M.Y') }}
            </span>
          </li>
          <!-- /.timeline-label -->
          <!-- timeline item -->
          <li>
            <i class="fa fa-{{ $noty->type }} bg-blue"></i>

            <div class="timeline-item">
              <span class="time"><i class="fa fa-clock-o"></i> {{ $noty->created_at->format('h:i A') }}</span>

              <h3 class="timeline-header"><a href="#">{{ $noty->added_by }}</a></h3>

              <div class="timeline-body">
              {{ $noty->action }} <a href="{{ $noty->url }}" class="btn btn-primary btn-sm">Go Now</a>
              </div>
            </div>
          </li>
          <!-- END timeline item -->
          @endforeach
        </ul>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>

</section>
<!-- /.content -->


@endsection
