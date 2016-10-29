@extends('frontend.layouts.userMaster')

@section('title')
	TeamWorks
@endsection

@section('styles')
	{!! Html::style('src/frontend/usersFiles/css/teamwork.css') !!}
@endsection

@section('content')
	    <!-- Content -->
	<div class="content">
		<div class="info"></div>
		<div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title pull-left">TeamWorks</h3>
		    <span class="btn btn-info pull-right" id="addMember">Add Member</span>
		    <div class="clearfix"></div>
		  </div>
		  <div class="panel-body">
			  <table id="myTableData" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      				<thead>
      					<tr role="row">
							<th>#ID</th>
							<th >Name</th>
							<th >Email</th>
							<th >User Type</th>
							<th >Created At</th>
							<th >Actions</th>
						</tr>
      				</thead>
	                   <tbody>
					    <tr role="row">
						    <td>#1</td>
						    <td>alaa</td>
						    <td>test</td>
						    <td>test</td>
						    <td>Created At</td>
						    <td>Actions</td>
					    </tr>
					    {{-- dataTable --}}
			    		</tbody>
					<tfoot>
      					<tr role="row">
							<th>#ID</th>
							<th >Name</th>
							<th >Email</th>
							<th >User Type</th>
							<th colspan="2">More Information</th>
						</tr>
      				</tfoot>
    			</table>
		  </div>
		</div>
	</div>
@endsection
@include('frontend.includes.teamWorksModels')
@section('scripts')
	<script>
		var url = '{{ route('create.member') }}';
		var token = '{{ Session::token() }}'
	</script>
	{!! Html::script('src/frontend/usersFiles/js/teamwork.js') !!}
@endsection
