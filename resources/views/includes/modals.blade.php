{{-- add new key activity --}}
<div class="modal fade" tabindex="-1" role="dialog" id="addActivityModal">
   <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	    <h4 class="modal-title">key Activity</h4>
	  </div>
	  <div class="modal-body">
		  {{-- stat key activity Title --}}
	    <div class="form-group">
	      <label for="keyActivityTitle">Title</label>
	      <input type="text" class="form-control" id="keyActivityTitle" placeholder="wirte the key activity title">
	    </div>
	    {{-- end key activity name --}}
	    {{-- stat key activity content --}}
	 <div class="form-group" id="content">
	   <label for="keyActivityContent">Description</label>
	   <textarea class="form-control" id="keyActivityContent" placeholder="wirte the key activity description" rows="5"></textarea>
	 </div>
	 {{-- end key activity content --}}
	  </div>
	  <div class="modal-footer">
	    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	    <button type="button" class="btn btn-primary" id="saveKeyActivity">Add key Actvity</button>
	  </div>
	</div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
 </div><!-- /.modal -->
 {{-- add new key activity --}}

 {{-- new value key activity --}}
 <div class="modal fade" tabindex="-1" role="dialog" id="addValueModal">
    <div class="modal-dialog" role="document">
 	<div class="modal-content">
 	  <div class="modal-header">
 	    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 	    <h4 class="modal-title">add Proposition </h4>
 	  </div>
 	  <div class="modal-body">
 		  {{-- stat key activity Title --}}
 	    <div class="form-group">
 	      <label for="valueTitle">Title</label>
 	      <input type="text" class="form-control" id="valueTitle" placeholder="wirte the value title">
 	    </div>
 	    {{-- end key activity name --}}
 	    {{-- stat key activity content --}}
 	 <div class="form-group" id="contentValue">
 	   <label for="valueContent">Description</label>
 	   <textarea class="form-control" id="valueContent" placeholder="wirte the value description" rows="5"></textarea>
 	 </div>
 	 {{-- end key activity content --}}
 	  </div>
 	  <div class="modal-footer">
 	    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 	    <button type="button" class="btn btn-primary" id="saveValue">Add Value</button>
 	  </div>
 	</div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  {{-- end value proposition --}}

  {{-- new customer relation --}}
  <div class="modal fade" tabindex="-1" role="dialog" id="addRelationModal">
     <div class="modal-dialog" role="document">
  	<div class="modal-content">
  	  <div class="modal-header">
  	    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  	    <h4 class="modal-title">add Customer Relation</h4>
  	  </div>
  	  <div class="modal-body">
  		  {{-- stat key activity Title --}}
  	    <div class="form-group">
  	      <label for="relationTitle">Title</label>
  	      <input type="text" class="form-control" id="relationTitle" placeholder="wirte the relation title">
  	    </div>
  	    {{-- end key activity name --}}
  	    {{-- stat key activity content --}}
  	 <div class="form-group" id="contentRelation">
  	   <label for="relationContent">Description</label>
  	   <textarea class="form-control" id="relationContent" placeholder="wirte the relation description" rows="5"></textarea>
  	 </div>
  	 {{-- end key activity content --}}
  	  </div>
  	  <div class="modal-footer">
  	    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  	    <button type="button" class="btn btn-primary" id="saveRelation">Add Relation</button>
  	  </div>
  	</div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->
   {{-- edit key activity --}}
