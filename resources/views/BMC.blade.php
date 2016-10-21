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
            <h4>Key Resources <i class="fa fa-plus" id="keyActivity" data-toggle="modal" data-target="#addResourceModal"></i></h4>
            <div id="resources">

            </div>
          </td>
          <td colspan="2">
            <h4>Channels <i class="fa fa-plus" id="keyActivity" data-toggle="modal" data-target="#addChaneelModal"></i></h4>
            <div id="chaneels">

            </div>

          </td>
        </tr>
        <tr>
          <td colspan="5">
            <h4>Cost Structure <i class="fa fa-plus" id="keyActivity" data-toggle="modal" data-target="#addCostModal"></i></h4>
            <div id="costs">

            </div>
          </td>
          <td colspan="5">
            <h4>Revenue Streams <i class="fa fa-plus" id="keyActivity" data-toggle="modal" data-target="#addRevModal"></i></h4>
            <div id="revs">

            </div>
          </td>
        </tr>
      </table>
      <!-- /Canvas -->
      @include('includes.modals')
@endsection
