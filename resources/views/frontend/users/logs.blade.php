@extends('frontend.layouts.adminMaster')

@section('title')
	logs
@endsection

@section('content')
	<!-- Content -->
	<div class="content" style="overflow-y: hidden">
		<div class="information"></div>
		<div class="panel panel-primary"	>
			<div class="panel-heading">
				<h3 class="panel-title">logs</h3>
			</div>
			<div class="panel-body">
				<table id="myTableData" class="table table-responsive table-bordered table-striped">
					<thead>
						<tr role="row">
							<th >Login</th>
							<th >LogOut</th>
							<th >hours</th>
							<th >at</th>
						</tr>
					</thead>
					<tbody>
						{{-- users loop --}}
						@foreach ($userLogs as $userLog)
							{{-- logs loop --}}
							@foreach ($userLog->log as $log)
								<tr role="row">
									<td>{{ $log->login_at }}</td>
									@if (empty($log->logout_at))

										<td class="stillCalc" colspan="3">
											<div class="progress">
												<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar"
												aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
												The calculated Information Will Appear after next time you log in again
											</div>
										</div>
										</td>
									@else
										<td class="stillCalc">{{ $log->logout_at }}</td>
									@endif
									{{-- hours loop --}}
									@foreach ($log->hours as $hour)
											<td class="hour">{{ $hour->hours }}</td>
											<td class="at">{{ $hour->created_at }}</td>
									@endforeach{{-- hours loop --}}
								</tr>
							@endforeach{{-- logs loop --}}
						@endforeach{{-- users loop --}}
						{{-- dataTable --}}
					</tbody>

				</table>
			</div>
		</div>
	</div>
@endsection
