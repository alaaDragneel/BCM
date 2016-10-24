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

 {{-- new Segments --}}
 <div class="modal fade" tabindex="-1" role="dialog" id="addSegmentsModal">
    <div class="modal-dialog" role="document">
 	<div class="modal-content">
 	  <div class="modal-header">
 	    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 	    <h4 class="modal-title">add Customer Segments
 </h4>
 	  </div>
 	  <div class="modal-body">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Choose the Information</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-6 col-md-offset-1 genders">
              <button type="button" class="btn btn-default gender" value="All" clicked>All</button>

              <button type="button" class="btn btn-default gender" value="Male">Male</button>

              <button type="button" class="btn btn-default gender" value="Female">Female</button>
            </div>
            <div class="hr"></div>
            <div class="col-md-6 col-md-offset-1 age">
              <div class="row">
                <div class="col-md-5 col-md-offset-1">
                  From: <select class='form-control from'>
                    @for ($i=16; $i <= 65 ; $i++)
                      <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                  </select>
                </div>
                <div class="col-md-5 col-md-offset-1 toCont">
                  To: <select class='form-control to'>
                    @for ($i=16; $i <= 65 ; $i++)
                      <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                  </select>
                </div>
              </div>
              <div class="hr2"></div>
            </div>
            <div class="col-md-6 col-md-offset-1 location">
              <select class='form-control'>
                <option value="Egypt">Egypt</option>
                <option value="cairo">cairo</option>
                <option value="Giza">Giza</option>
                <option value="Imbaba">Imbaba</option>
                <option value="Nasr City">Nasr City</option>
                <option value="Japan">Japan</option>
              </select>
            </div>
            <div class="hr"></div>
            <div class="col-md-6 col-md-offset-1 peoples">

            </div>
          </div>
        </div>
      </div>
 	  </div>
 	  <div class="modal-footer">
 	    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 	    <button type="button" class="btn btn-primary" id="saveSegments">Add Customer Segments</button>
 	  </div>
 	</div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  {{-- end Segments --}}

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


   {{-- new key resource --}}
   <div class="modal fade" tabindex="-1" role="dialog" id="addResourceModal">
      <div class="modal-dialog" role="document">
   	<div class="modal-content">
   	  <div class="modal-header">
   	    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   	    <h4 class="modal-title">add Key Resources</h4>
   	  </div>
   	  <div class="modal-body">
   		  {{-- stat key activity Title --}}
   	    <div class="form-group">
   	      <label for="resourceTitle">Title</label>
   	      <input type="text" class="form-control" id="resourceTitle" placeholder="wirte the Key Resource title">
   	    </div>
   	    {{-- end key activity name --}}

   	    {{-- stat key activity content --}}
   	 <div class="form-group" id="contentResource">
   	   <label for="resourceContent">Description</label>
   	   <textarea class="form-control" id="resourceContent" placeholder="wirte the Key Resource description" rows="5"></textarea>
   	 </div>
   	 {{-- end key activity content --}}
   	  </div>
   	  <div class="modal-footer">
   	    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   	    <button type="button" class="btn btn-primary" id="saveResources">Add Resource</button>
   	  </div>
   	</div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    {{-- add key resource --}}

   {{-- new key resource --}}
     <div class="modal fade" tabindex="-1" role="dialog" id="addChaneelModal">
        <div class="modal-dialog" role="document">
     	<div class="modal-content">
     	  <div class="modal-header">
     	    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     	    <h4 class="modal-title">add chaneel</h4>
     	  </div>
     	  <div class="modal-body">
     		  {{-- stat key activity Title --}}
     	    <div class="form-group">
     	      <label for="chaneelTitle">Title</label>
     	      <input type="text" class="form-control" id="chaneelTitle" placeholder="wirte the chaneel title">
     	    </div>
     	    {{-- end key activity name --}}

     	    {{-- stat key activity content --}}
     	 <div class="form-group" id="contentChaneel">
     	   <label for="chaneelContent">Description</label>
     	   <textarea class="form-control" id="chaneelContent" placeholder="wirte the Chaneel description" rows="5"></textarea>
     	 </div>
     	 {{-- end key activity content --}}
     	  </div>
     	  <div class="modal-footer">
     	    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     	    <button type="button" class="btn btn-primary" id="saveChaneel">Add Resource</button>
     	  </div>
     	</div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
      {{-- add key resource --}}

       {{-- new key resource --}}
       <div class="modal fade" tabindex="-1" role="dialog" id="addCostModal">
          <div class="modal-dialog" role="document">
       	<div class="modal-content">
       	  <div class="modal-header">
       	    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       	    <h4 class="modal-title">add Cost</h4>
       	  </div>
       	  <div class="modal-body">
       		  {{-- stat key activity Title --}}
       	    <div class="form-group">
       	      <label for="costTitle">Cost</label>
       	      <input type="text" class="form-control" id="costTitle" placeholder="wirte the cost title">
       	    </div>
       	    {{-- end key activity name --}}

       	    {{-- stat key activity content --}}
       	 <div class="form-group" id="contentCost">
       	   <label for="costContent">Description</label>
       	   <textarea class="form-control" id="costContent" placeholder="wirte the cost description" rows="5"></textarea>
       	 </div>
       	 {{-- end key activity content --}}
       	  </div>
       	  <div class="modal-footer">
       	    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       	    <button type="button" class="btn btn-primary" id="saveCost">Add cost</button>
       	  </div>
       	</div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        {{-- add key resource --}}

      {{-- new key resource --}}
      <div class="modal fade" tabindex="-1" role="dialog" id="addRevModal">
         <div class="modal-dialog" role="document">
      	<div class="modal-content">
      	  <div class="modal-header">
      	    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      	    <h4 class="modal-title">add Revenue </h4>
      	  </div>
      	  <div class="modal-body">
      		  {{-- stat key activity Title --}}
      	    <div class="form-group">
      	      <label for="revTitle">Revenue </label>
      	      <input type="text" class="form-control" id="revTitle" placeholder="wirte Revenue ">
      	    </div>
      	    {{-- end key activity name --}}

      	    {{-- stat key activity content --}}
      	 <div class="form-group" id="contentRev">
      	   <label for="revContent">Description</label>
      	   <textarea class="form-control" id="revContent" placeholder="wirte the description" rows="5"></textarea>
      	 </div>
      	 {{-- end key activity content --}}
      	  </div>
      	  <div class="modal-footer">
      	    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      	    <button type="button" class="btn btn-primary" id="saveRev">Add cost</button>
      	  </div>
      	</div><!-- /.modal-content -->
         </div><!-- /.modal-dialog -->
       </div><!-- /.modal -->
       {{-- add key resource --}}
