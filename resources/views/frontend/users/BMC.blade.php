@extends('frontend.layouts.userMaster')
@section('title')
  BMC
@endsection
@section('styles')
  {!! Html::style('src/frontend/global/css/font-awesome.min.css') !!}
  {!! Html::style('src/frontend/global/css/canvas.css') !!}
  <style media="screen">
  .wrapper {
    height: auto;
  }
  </style>
@endsection
@include('frontend.includes.modals')
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="alert alert-success" id="success"></div>
      <div class="alert alert-info" id="successDelete"></div>
      <div class="alert alert-danger" id="errors">
        <ul class="list-unstyled">

        </ul>
      </div>
      <h1>BMC</h1>
      <!-- Canvas -->

        <table id="bizcanvas" class="table table-responsive table-bordered" data-id="{{ $canvas->id }}">

        <tr>
          <td colspan="2" rowspan="2">
               <h4
                class="Info"
                data-original-title="More details"
                 data-content="this is the Key Partners search on the Partner that you don't have here"
                 data-placement="right"
                 rel="popover">Key Partners ?</h4>
                 <div class="clearfix"></div>
               {{-- @include('frontend.includes.proSearch.searchForm') --}}
               <div id="Partner" class="companies">
                  <div class="callout callout-info">
                    <h4>I am an info callout!</h4>

                    <p>Follow the steps to continue to payment.</p>
                  </div>
               </div>
          </td>
          {{--  --}}
          <td colspan="2" id="keyActivities">
               <h4 class="Info"
                 data-original-title="More details"
                 data-content="this is the Key Activities write the Activity of your Project"
                 data-placement="right"
                 rel="popover" >Key Activities
                 <i class="fa fa-plus" id="keyActivity" data-toggle="modal" data-target="#addActivityModal"></i>
               </h4>
               <div class="clearfix"></div>
               <div class="activities">
                 @if ($KA && count($KA) > 0)
                   @foreach ($KA as $ka)
                     <div class="callout callout-info options" data-ka="{{ $ka->id }}">
                       <div class="card-option optionsKA">
                         <span class="pull-right deleteKA"><i class="fa fa-close"></i></span>
                         <span class="pull-right editKA"><i class="fa fa-edit"></i></span>
                       </div>
                       <div class="clearfix"></div>
                       <h4 class="ka_title">{{ $ka->ka_title }}</h4>
                       <p class="ka_desc">{{ $ka->ka_desc }}</p>
                     </div>
                   @endforeach
                 @endif
               </div>
          </td>
          {{--  --}}
          <td colspan="2" rowspan="2">
            <h4 class="Info"
              data-original-title="More details"
              data-content="this is the value Porposition write the value Porposition of your Project"
              data-placement="right"
              rel="popover" >Value Proposition <i class="fa fa-plus" id="keyActivity" data-toggle="modal" data-target="#addValueModal"></i></h4>
              <div class="clearfix"></div>
            <div id="Values">
              @if ($VP && count($VP) > 0)
                @foreach ($VP as $vp)
                  <div class="callout callout-warning optionsVP" data-vp="{{ $vp->id }}">
                    <div class="card-optionVP">
                      <span class="pull-right deleteVP"><i class="fa fa-close"></i></span>
                      <span class="pull-right editVP"><i class="fa fa-edit"></i></span>
                    </div>
                    <div class="clearfix"></div>
                    <h4 class="vp_title">{{ $vp->vp_title }}</h4>
                    <p class="vp_desc">{{ $vp->vp_desc }}</p>
                  </div>
                @endforeach
              @endif
            </div>
          </td>
          <td colspan="2">
            <h4 class="Info"
              data-original-title="More details"
              data-content="this is the Customer Relationship write the Customer Relationship of your Project"
              data-placement="right"
              rel="popover" >Customer Relationship <i class="fa fa-plus" id="keyActivity" data-toggle="modal" data-target="#addRelationModal"></i></h4>
              <div class="clearfix"></div>
            <div id="relations"></div>
          </td>
          <td colspan="2" rowspan="2">
            <h4 class="Info"
              data-original-title="More details"
              data-content="this is the Customer Segments write the Customer Segments of your Project"
              data-placement="bottom"
                rel="popover" >Customer Segments <i class="fa fa-plus" id="keyActivity" data-toggle="modal" data-target="#addSegmentsModal"></i></h4>
              <div class="clearfix"></div>
              <div id="Segments" class="companies"></div>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <h4 class="Info"
              data-original-title="More details"
              data-content="this is the Key Resources write the Key Resources of your Project"
              data-placement="right"
              rel="popover" >Key Resources <i class="fa fa-plus" id="keyActivity" data-toggle="modal" data-target="#addResourceModal"></i></h4>
              <div class="clearfix"></div>
            <div id="resources">

            </div>
          </td>
          <td colspan="2">
            <h4 class="Info"
              data-original-title="More details"
              data-content="this is the Channels write the Channels of your Project"
              data-placement="right"
              rel="popover" >Channels <i class="fa fa-plus" id="keyActivity" data-toggle="modal" data-target="#addChaneelModal"></i></h4>
              <div class="clearfix"></div>
            <div id="chaneels">

            </div>

          </td>
        </tr>
        <tr>
          <td colspan="5" class="costs">
            <h4 class="Info"
              data-original-title="More details"
              data-content="this is the Cost Structure write the Cost Structure of your Project"
              data-placement="right"
              rel="popover" >Cost Structure <i class="fa fa-plus" id="keyActivity" data-toggle="modal" data-target="#addCostModal"></i></h4>
              <div class="clearfix"></div>
            <div id="costs">

            </div>
          </td>
          <td colspan="5" class="revs">
            <h4 class="Info"
              data-original-title="More details"
              data-content="this is the Revenue Streams write the Revenue Streams of your Project"
              data-placement="right"
              rel="popover" >Revenue Streams <i class="fa fa-plus" id="keyActivity" data-toggle="modal" data-target="#addRevModal"></i></h4>
              <div class="clearfix"></div>
            <div id="revs"></div>
          </td>
        </tr>
      </table>
      <!-- /Canvas -->
    </div>
  </div>
  <script>
  var url = '{{ route('results') }}';
  var urlBtn = '{{ route('request') }}';
  var urlCustomer = '{{ route('Companies') }}';
  var KAurl = '{{ route('KA.store') }}';
  var KAurlDelete = '{{ route('KA.delete') }}';
  var KAurlUpdate = '{{ route('KA.update') }}';
  var VPurl = '{{ route('VP.store') }}';
  var VPurlDelete = '{{ route('VP.delete') }}';
  var VPurlUpdate = '{{ route('VP.update') }}';
  var token = '{{ csrf_token() }}';
  </script>
@endsection
@section('scripts')
  <script src="{{asset('src/frontend/global/js/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('src/frontend/global/js/canvas.js')}}"></script>
  <script src="{{asset('src/frontend/global/js/AjaxSearch.js')}}"></script>
  <script src="{{asset('src/frontend/global/js/keyActivity.js')}}"></script>
  <script src="{{asset('src/frontend/global/js/valuePorposition.js')}}"></script>
@endsection
