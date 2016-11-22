@extends('frontend.layouts.userMaster')
@section('title')
  BMC
@endsection
@section('styles')
  {!! Html::style('src/frontend/global/css/font-awesome.min.css') !!}
  {!! Html::style('src/frontend/global/css/canvas.css') !!}
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
               <h4 class="Info"
                 data-original-title="More details"
                 data-content="this is the Cost Structure write the Cost Structure of your Project"
                 data-placement="right"
                 rel="popover" >Key Partener <i class="fa fa-plus" id="keyActivity" data-toggle="modal" data-target="#addPartnerModal"></i></h4>
                 <div class="clearfix"></div>
               @include('frontend.includes.proSearch.searchForm')
               <div id="Partner" class="companies">
                    @if ($KP && count($KP) > 0)
                     @foreach ($KP as $kp)
                       <div class="callout callout-info optionsKP" data-kp="{{ $kp->id }}">
                            <div class="card-optionKP">
                              <span class="pull-right deleteKP"><i class="fa fa-close"></i></span>
                            </div>
                            <h4 class="fullName"><i class="fa fa-user"></i>{{ $kp->kp_name }}</h4>
                            @if ($kp->kp_email)
                                 <h4 class="email"><i class="fa fa-envelope"></i>{{ $kp->kp_email }}</h4>
                            @endif
                            @if ($kp->kp_job)
                                 <h4 class="job"><i class="fa fa-briefcase"></i>{{ $kp->kp_job }}</h4>
                            @endif

                            <p class="Desc"><i class="fa fa-black-tie"></i>{{ $kp->kp_desc }}</p>
                       </div>
                     @endforeach
                   @endif
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
            <div id="relations">
              @if ($CR && count($CR) > 0)
                @foreach ($CR as $cr)
                  <div class="callout callout-success optionsCR" data-vp="{{ $cr->id }}">
                    <div class="card-optionCR">
                      <span class="pull-right deleteCR"><i class="fa fa-close"></i></span>
                      <span class="pull-right editCR"><i class="fa fa-edit"></i></span>
                    </div>
                    <div class="clearfix"></div>
                    <h4 class="cr_title">{{ $cr->cr_title }}</h4>
                    <p class="cr_desc">{{ $cr->cr_desc }}</p>
                  </div>
                @endforeach
              @endif
            </div>
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
              @if ($KR && count($KR) > 0)
                @foreach ($KR as $kr)
                  <div class="callout callout-danger optionsKR" data-vp="{{ $kr->id }}">
                    <div class="card-optionKR">
                      <span class="pull-right deleteKR"><i class="fa fa-close"></i></span>
                      <span class="pull-right editKR"><i class="fa fa-edit"></i></span>
                    </div>
                    <div class="clearfix"></div>
                    <h4 class="kr_title">{{ $kr->kr_title }}</h4>
                    <p class="kr_desc">{{ $kr->kr_desc }}</p>
                  </div>
                @endforeach
              @endif
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
              @if ($CH && count($CH) > 0)
                @foreach ($CH as $ch)
                  <div class="callout callout-danger optionsCH" data-vp="{{ $ch->id }}">
                    <div class="card-optionCH">
                      <span class="pull-right deleteCH"><i class="fa fa-close"></i></span>
                      <span class="pull-right editCH"><i class="fa fa-edit"></i></span>
                    </div>
                    <div class="clearfix"></div>
                    <h4 class="ch_title">{{ $ch->ch_title }}</h4>
                    <p class="ch_desc">{{ $ch->ch_desc }}</p>
                  </div>
                @endforeach
              @endif
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
              @if ($CST && count($CST) > 0)
                @foreach ($CST as $cst)
                  <div class="callout callout-success optionsCST" style="width: 465px;" data-vp="{{ $cst->id }}">
                    <div class="card-optionCST">
                      <span class="pull-right deleteCST"><i class="fa fa-close"></i></span>
                      <span class="pull-right editCST"><i class="fa fa-edit"></i></span>
                    </div>
                    <div class="clearfix"></div>
                    <h4 class="cst_title">{{ $cst->cst_title }}</h4>
                    <p class="cst_desc">{{ $cst->cst_desc }}</p>
                  </div>
                @endforeach
              @endif
            </div>
          </td>
          <td colspan="5" class="revs">
            <h4 class="Info"
              data-original-title="More details"
              data-content="this is the Revenue Streams write the Revenue Streams of your Project"
              data-placement="right"
              rel="popover" >Revenue Streams <i class="fa fa-plus" id="keyActivity" data-toggle="modal" data-target="#addRevModal"></i></h4>
              <div class="clearfix"></div>
            <div id="revs">
              @if ($RS && count($RS) > 0)
                @foreach ($RS as $rs)
                  <div class="callout callout-success optionsRS" style="width: 465px;" data-vp="{{ $rs->id }}">
                    <div class="card-optionRS">
                      <span class="pull-right deleteRS"><i class="fa fa-close"></i></span>
                      <span class="pull-right editRS"><i class="fa fa-edit"></i></span>
                    </div>
                    <div class="clearfix"></div>
                    <h4 class="rs_title">{{ $rs->rs_title }}</h4>
                    <p class="rs_desc">{{ $rs->rs_desc }}</p>
                  </div>
                @endforeach
              @endif
            </div>
          </td>
        </tr>
      </table>
      <!-- /Canvas -->
    </div>
  </div>
  <script>
  var url = '{{ route('results') }}';
  var urlBtn = '{{ route('request') }}';
  var KPurl = '{{ route('KP.store') }}';
  var KPurlBtnDelete = '{{ route('request.delete') }}';
  var urlCustomer = '{{ route('Companies') }}';
  // key activity
  var KAurlAjax = '{{ route('KA.response') }}';
  var KAurl = '{{ route('KA.store') }}';
  var KAurlTag = '{{ route('KA.storeTag') }}';
  var KAurlDelete = '{{ route('KA.delete') }}';
  var KAurlUpdate = '{{ route('KA.update') }}';
  // value porposition
  var VPurl = '{{ route('VP.store') }}';
  var VPurlDelete = '{{ route('VP.delete') }}';
  var VPurlUpdate = '{{ route('VP.update') }}';
  // customer relations
  var CRurl = '{{ route('CR.store') }}';
  var CRurlDelete = '{{ route('CR.delete') }}';
  var CRurlUpdate = '{{ route('CR.update') }}';
  // ker resource
  var KRurl = '{{ route('KR.store') }}';
  var KRurlDelete = '{{ route('KR.delete') }}';
  var KRurlUpdate = '{{ route('KR.update') }}';
  // ker resource
  var CHurl = '{{ route('CH.store') }}';
  var CHurlDelete = '{{ route('CH.delete') }}';
  var CHurlUpdate = '{{ route('CH.update') }}';
  // cost structure
  var CSTurl = '{{ route('CST.store') }}';
  var CSTurlDelete = '{{ route('CST.delete') }}';
  var CSTurlUpdate = '{{ route('CST.update') }}';
  // Revenue Streams
  var RSurl = '{{ route('RS.store') }}';
  var RSurlDelete = '{{ route('RS.delete') }}';
  var RSurlUpdate = '{{ route('RS.update') }}';
  //token
  var token = '{{ csrf_token() }}';
  </script>
@endsection
@section('scripts')
  <script src="{{asset('src/frontend/global/js/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('src/frontend/global/js/canvas.js')}}"></script>
  <script src="{{asset('src/frontend/global/js/AjaxSearch.js')}}"></script>
  <script src="{{asset('src/frontend/global/js/keyActivity.js')}}"></script>
  <script src="{{asset('src/frontend/global/js/bmcFunctions.js')}}"></script>
@endsection
