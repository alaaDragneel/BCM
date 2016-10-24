@extends('layouts.master')
@section('content')

      <h1>BMC</h1>
      <!-- Canvas -->
      <table id="bizcanvas" class="table table-responsive table-bordered">
        <tr>
          <td colspan="2" rowspan="2">
               <h4
                class="Info"
                data-original-title="More details"
                 data-content="this is the Key Partners search on the Partner that you don't have here"
                 data-placement="right"
                 rel="popover">Key Partners ?</h4>
                 <div class="clearfix"></div>
               @include('includes.proSearch.searchForm')
               <div id="Partner" class="companies">

               </div>
          </td>
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

               </div>
          </td>
          <td colspan="2" rowspan="2">
            <h4 class="Info"
              data-original-title="More details"
              data-content="this is the value Porposition write the value Porposition of your Project"
              data-placement="right"
              rel="popover" >Value Proposition <i class="fa fa-plus" id="keyActivity" data-toggle="modal" data-target="#addValueModal"></i></h4>
              <div class="clearfix"></div>
            <div id="Values">

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

            </div>
          </td>
          <td colspan="2" rowspan="2">
            <h4 class="Info"
              data-original-title="More details"
              data-content="this is the Customer Segments write the Customer Segments of your Project"
              data-placement="bottom"
              rel="popover" >Customer Segments <i class="fa fa-plus" id="keyActivity" data-toggle="modal" data-target="#addSegmentsModal"></i></h4>
              <div class="clearfix"></div>
              <div id="Segments" class="companies">

              </div>
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
            <div id="revs">

            </div>
          </td>
        </tr>
      </table>
      <!-- /Canvas -->
      @include('includes.modals')
@endsection
