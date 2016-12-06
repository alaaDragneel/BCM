@extends('frontend.layouts.adminMaster')

@section('title')
	Projects
@endsection
@section('content')
	<div class="content">
		<div class="container-fluid">
			@if (Session::has('success'))
				<div class="alert alert-info">{{ Session::get('success') }}</div>
			@endif
			<div class="alert alert-info" id="success" style="display: none;"></div>
			<div class="alert alert-danger" id="errors" style="display: none;">
        <ul class="list-unstyled">

        </ul>
      </div>
			<div class="row">
				@foreach ($projects as $canvas)
					<div class="col-lg-3 col-sm-6 optionsCanvas" data-canvas="{{ $canvas->id }}">
						<div class="card-option">
							<span><i class="fa fa-edit editCanvas" data-target="#editModal" data-toggle="modal"></i></span>
							<span><i class="fa fa-close deleteCanvas"></i></span>
							<span><i class="fa fa-info moreDetails" data-target="#viewModal" data-toggle="modal"></i></span>
						</div>
						<div class="card">
							<div class="content" style="min-height: 160px;">
								<div class="row">
									<div class="col-xs-5">
										<div class="icon-big icon-warning text-center">
											<i class="ti-server"></i>
										</div>
									</div>
									<div class="col-xs-7">
										<div class="numbers canvasName">
											<p data-id="{{ $canvas->id }}" style="word-break: break-all;">{{ $canvas->name }}</p>
											<textarea class="desc" style="display: none;">{{ $canvas->description }}</textarea>
											BMC
										</div>
									</div>
								</div>
								<div class="footer">
									<hr />
									<div class="stats">
										<a href="{{ route('view.canvas', ['canvas_id' => $canvas->id]) }}"><i class="ti-reload"></i> show Now</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
	{{-- update Canvas --}}
	<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Edit Canvas</h4>
				</div>
				<div class="modal-body">
					{{-- stat key Partner Title --}}
					<div class="form-group">
						<label for="keyActivityTitle">name</label>
						<input type="text" class="form-control border-input" id="editName" placeholder="wirte the title">
					</div>
					{{-- end key Partner name --}}

					{{-- stat key Partner content --}}
					<div class="form-group" id="content">
						<label for="keyPartnerContent">Description</label>
						<textarea class="form-control  border-input" id="editDesc" placeholder="wirte the description" rows="5"></textarea>
					</div>
					{{-- end key Partner content --}}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="save">Update the Canvas</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	{{-- update Canvas --}}

	{{-- view Canvas --}}
	<div class="modal fade" tabindex="-1" role="dialog" id="viewModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">View Canvas Information</h4>
				</div>
				<div class="modal-body">
					{{-- stat key Partner Title --}}
					<div class="form-group">
						<label for="keyActivityTitle">name</label>
						<input type="text" class="form-control border-input" id="viewName" placeholder="wirte the title" disabled="disabled">
					</div>
					{{-- end key Partner name --}}

					{{-- stat key Partner content --}}
					<div class="form-group" id="content">
						<label for="keyPartnerContent">Description</label>
						<textarea class="form-control  border-input" id="viewDesc" placeholder="wirte the description" rows="5" disabled="disabled"></textarea>
					</div>
					{{-- end key Partner content --}}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	{{-- view Canvas --}}
	<script type="text/javascript">
		var url = '{{ route('update.canvas') }}';
		var deleteUrl = '{{ route('delete.canvas') }}';
		var token = '{{ csrf_token() }}';
	</script>
@endsection
