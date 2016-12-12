@extends('frontend.layouts.adminMaster')

@section('title')
	TeamWorks
@endsection

@section('styles')
	{!! Html::style('src/frontend/usersFiles/css/teamwork.css') !!}
@endsection

@section('content')
	<?php $teamCounter = Auth::user()->TeamWorks()->count();?>

	<div class="col-md-12" style="margin-top: 1%;">
		<!-- USERS LIST -->
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">{{ $teamCounter }} Member/s</h3>

				<div class="box-tools pull-right">
					<span class="btn btn-info btn-sm addMember">Add New Member</span>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body no-padding">
				<ul class="users-list clearfix" id="team">
					@foreach ($members as $member)
					<li class="userContainer">
						<div class="patern">
							<i class="fa fa-close deleteMember"></i>
						</div>
						<img src="{{asset($member->image)}}" width="128" alt="User Image">
						<a class="users-list-name" href="#" data-id="{{ $member->id }}">{{ $member->name }}</a>
						<span class="users-list-date">{{ $member->job }}</span>
					</li>
				@endforeach
				</ul>
				<!-- /.users-list -->
			</div>
			<!-- /.box-body -->
			<div class="box-footer text-center">
				<a href="javascript:void(0)" class="uppercase">{{ $teamCounter }} Member/s</a>
			</div>
			<!-- /.box-footer -->
		</div>
		<!--/.box -->
	</div>
@endsection
@include('frontend.includes.teamWorksModels')
@section('scripts')
	{!! Html::script('src/frontend/usersFiles/js/teamwork.js') !!}
	<script>
		var url = '{{ route('create.member') }}';
		var deleteUrl = '{{route('delete.member')}}';
		var token = '{{ Session::token() }}';
	</script>
@endsection
