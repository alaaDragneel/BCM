

{{-- add new member --}}
<div class="modal fade" tabindex="-1" role="dialog" id="addMemberModal">
   <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="panel-heading">
	    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	    <h4 class="modal-title">Add member</h4>
	  </div>
	  <div class="panel-body">
		  <form method="post" action="{{ route('create.member') }}">
			{{ csrf_field() }}
		{{-- stat name --}}
	    <div class="form-group">
		 <label for="name">name</label>
		 <input type="text" name="name" class="form-control" id="name" placeholder="wirte the member name here">
	    </div>
	    	{{-- end name --}}
		{{-- stat phoneNo --}}
	    <div class="form-group">
		 <label for="phoneNo">phoneNo</label>
		 <input type="number" name="phoneNo" class="form-control" id="phoneNo" placeholder="wirte the member phone number">
	    </div>
	    	{{-- end phoneNo --}}
          {{-- stat job --}}
          <div class="form-group">
               <label for="job">job</label>
               <input type="text" name="job" class="form-control" id="job" placeholder="wirte the member job">
          </div>
          {{-- end job --}}
		{{-- stat email --}}
	    <div class="form-group">
		 <label for="email">email</label>
		 <input type="email" name="email" class="form-control" id="email" placeholder="wirte the member email">
	    </div>
	    	{{-- end email --}}
		{{-- stat password --}}
	    <div class="form-group">
		 <label for="password">password</label>
		 <input type="password" name="password" class="form-control" id="password" placeholder="wirte the password">
	    </div>
	    	{{-- end password --}}
	  </div>
	  <div class="panel-footer">
	    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	    <button type="button" class="btn btn-primary" id="addMemberBtn">Add Member</button>
	  </div>
  	</form>
	</div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
 </div><!-- /.modal -->
 {{-- add new member --}}
