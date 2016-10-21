@extends('layouts.master')
@section('content')

      <h1>The Business Model Canvas</h1>
      <!-- Canvas -->
      <table id="bizcanvas" border="1">
        <tr>
          <td colspan="2" rowspan="2">
            <h4>Key Partners</h4>
            <p>more details
            <a class=""
              data-original-title="More details"
              data-content="And here's some amazing content. It's very engaging. right?"
              data-placement="bottom"
              rel="popover" href="#">...</a>
            </p>
          </td>
          <td colspan="2" id="keyActivities">
               <h4 data-original-title="More details"
                 data-content="And here's some amazing content. It's very engaging. right?"
                 data-placement="bottom"
                 rel="popover">Key Activities
                 <i class="fa fa-plus" id="keyActivity" data-toggle="modal" data-target="#addActivityModal"></i>
               </h4>
               <div class="activities">

               </div>
          </td>
          <td colspan="2" rowspan="2">
            <h4>Value Proposition <i class="fa fa-plus" id="keyActivity" data-toggle="modal" data-target="#addValueModal"></i></h4>
            <div id="Values">

            </div>
          </td>
          <td colspan="2">
            <h4>Customer Relationship <i class="fa fa-plus" id="keyActivity" data-toggle="modal" data-target="#addRelationModal"></i></h4>
            <div id="relations">

            </div>
          </td>
          <td colspan="2" rowspan="2">
            <h4>Customer Segments</h4>
            <p>...</p>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <h4>Key Resources</h4>
            <p>...</p>
          </td>
          <td colspan="2">
            <h4>Channels</h4>
            <p>...</p>
          </td>
        </tr>
        <tr>
          <td colspan="5">
            <h4>Cost Structure</h4>
            <p>...</p>
          </td>
          <td colspan="5">
            <h4>Revenue Streams</h4>
            <p>...</p>
          </td>
        </tr>
      </table>
      <!-- /Canvas -->
      @include('includes.modals')
@endsection
