@extends('frontend.layouts.adminMaster')

@section('title')
	TeamWorks
@endsection

@section('styles')
	{!! Html::style('src/frontend/usersFiles/css/teamwork.css') !!}
	{!! Html::style('https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css') !!}
@endsection

@section('content')
	    <!-- Content -->
	<div class="content" style="overflow: hidden">
		<div class="information"></div>
		<div class="panel panel-default" style="overflow:scroll">
		  <div class="panel-heading">
		    <h3 class="panel-title pull-left">TeamWorks</h3>
		    <span class="btn btn-info pull-right" id="addMember">Add Member</span>
		    <div class="clearfix"></div>
		  </div>
		  <div class="panel-body">
			  <table id="myTableData" class="table table-responsive table-bordered table-striped">
      		<thead>
      			<tr role="row">
							<th>#ID</th>
							<th >Name</th>
							<th >Email</th>
							<th >phoneNo</th>
							<th >job</th>
							<th >image</th>
							<th >Created At</th>
							<th >Actions</th>
						</tr>
      		</thead>
	            <tbody>
								@foreach ($members as $member)
									<tr role="row">
										<td data-id="{{ $member->id }}">{{ $member->id }}</td>
										<td data-name="{{ $member->name }}">{{ $member->name }}</td>
										<td data-email="{{ $member->email }}">{{ $member->email }}</td>
										<td data-phoneNo="{{ $member->phoneNo }}">{{ $member->phoneNo }}</td>
										<td data-job="{{ $member->job }}">{{ $member->job }}</td>
										<td>{!! Html::image($member->image) !!}</td>
										<td>{{ $member->created_at->format('Y.m.d') }}</td>
										<td>
											<span class="btn btn-info btn-block editTeam"><i class="fa fa-edit"></i>Edit</span>
											<span class="btn btn-danger btn-block deleteMember"><i class="fa fa-close"></i>delete</span>
										</td>
									</tr>
								@endforeach
					    {{-- dataTable --}}
			    		</tbody>

    			</table>
		  </div>
		</div>
	</div>
@endsection
@include('frontend.includes.teamWorksModels')
@section('scripts')
	{!! Html::script('src/frontend/usersFiles/js/teamwork.js') !!}
	{!! Html::script('https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js') !!}
	<script>
	var url = '{{ route('create.member') }}';
	var editUrl = '{{route('edit.member')}}';
	var deleteUrl = '{{route('delete.member')}}';
	var token = '{{ Session::token() }}';
	</script>
@endsection
