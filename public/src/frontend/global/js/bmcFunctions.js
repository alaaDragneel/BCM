 /*start run value modal*/////////////////////////////////////////////////////////////////////////////////////////////////
 /*
 ('#saveValue', '#valueTitle','#contentValue','#valueContent', postUrl, responseElement, modelHide, optionClass, optionCard, deleteBtn, deleteUrl, editBtn, titleTextClass, descTextClass, editModelTitleField,editModelDescField, editModel, updateBtn, updateUrl, editModel )

 //CanvasOptions('#saveValue', '#valueTitle', '#contentValue','#valueContent', VPurl, '#Values', '#addValueModal', '.optionsVP', '.card-optionVP', '.deleteVP' , VPurlDelete, '.editVP', '.vp_title',
'.vp_desc', '.editValueTitle', '.editValueContent','.editValueModal', '#updateValue', VPurlUpdate,'.editValueModal'

)
 */
 function CanvasOptions(saveBtn, titleId, descriptionDiv, descriptionID, postUrl, responseElement, modelHide, optionClass, optionCard, deleteBtn, deleteUrl, editBtn, titleTextClass, descTextClass, editModelTitleField, editModelDescField, editModel, updateBtn, updateUrl, editModel){

   $(saveBtn).on('click', function () {
      var id = $('#bizcanvas').data('id');
       var title = $(this).parents().siblings('.modal-body').children().children().siblings(titleId);
       var description = $(this).parents().siblings('.modal-body').children(descriptionDiv).children().siblings(descriptionID);
      //  console.log(title.val());
      //  return;
       $.ajax({
         method:'post',
         url: postUrl,
         data:{id: id, title: title.val(), description: description.val(), _token: token},
         success: function(msg){ //success
           //show the succewss div
           $('#success').slideDown(300);
           // put the success message
           $('#success').append(msg['success']);
           // hide the success div
           $('#success').delay(2500).slideUp();
           // show the activity div
           $(responseElement).slideDown(600);
           // put the key activity in the activity
           $(responseElement).append(msg['outPut']);
           // hide the modal
           $(modelHide).modal('hide');
           //empty the title field
           title.val('');
           //empty the description field
           description.val('');

           // view the key-activity option
           $(optionClass).on('mouseenter', function() {
             // show the card option
             $(this).children(optionCard).slideDown(500);
             // hide the key-activity option
          }).on('mouseleave', function() {
            // hide the card option
             $(this).children(optionCard).slideUp(500);
          });

          // delete request
           $(deleteBtn).on('click', function() {
             //id
             var IdDelete = $(this).parents().parents().data('vp');
             $.ajax({ //ajax call
               method:'get',
               url: deleteUrl,
               data:{id: IdDelete, _token: token},
               success: function(msg){ //success
                 // show the success delete div
                 $('#successDelete').slideDown(300);
                 // put the outPut
                 $('#successDelete').append(msg['successDelete']);
                 //hide the success delete div
                 $('#successDelete').delay(2000).slideUp();
                 //reload the page after ....s
                 setTimeout(function(){
                   location.reload()
                 }, 2500);
               }, //success
             });
           });

           $(editBtn).on('click', function(){
             // id
             IdEdit = $(this).parents().parents().data('vp');
             //get the title
             editTitle = $(this).parents().siblings(titleTextClass);
             //get the decription
             editDescription = $(this).parents().siblings(descTextClass);
             //gwet the title field
             updateTitleFiled = $(editModelTitleField);
             // get the description field
             updateDescFiled = $(editModelDescField);
             // put the title value
             updateTitleFiled.val(editTitle.text());
             // put the description value
             updateDescFiled.val(editDescription.text());
             //show the modal
             $(editModel).modal();

           });

            $(updateBtn).on('click', function(){
              $.ajax({
                method: 'post',
                url: updateUrl,
                data:{id: IdEdit, title: updateTitleFiled.val(), description: updateDescFiled.val(), _token: token},
                success: function(msg) {//success
                  // show the success delete div
                  $('#success').slideDown(300);
                  // put the outPut
                  $('#success').append(msg['successUpdate']);
                  //hide the success delete div
                  $('#success').delay(2000).slideUp();
                  editTitle.text(updateTitleFiled.val());
                  editDescription.text(updateDescFiled.val());
                  $(editModel).modal('hide');
                },
                error: function(xhr){
                  var errors = xhr.responseJSON;
                  $('#errors').slideDown(300);
                   titleError = errors.title[0];
                   $('#errors ul').append('<li>'+ titleError +'</li>');
                   if(errors.description){
                     descError = errors.description[0];
                     $('#errors ul').append('<li>'+ descError +'</li>');
                   }
                   $('#errors').delay(2000).html('').slideUp(500);
                },
              });
            });
        },
     });
   });

    // view the key-activity option
    $(optionClass).on('mouseenter', function() {
      // show the card option
      $(this).children(optionCard).slideDown(500);
      // hide the key-activity option
   }).on('mouseleave', function() {
     // hide the card option
      $(this).children(optionCard).slideUp(500);
   });

   // delete request
    $(deleteBtn).on('click', function() {
      //id
      var IdDelete = $(this).parents().parents().data('vp');
      $.ajax({ //ajax call
        method:'get',
        url: deleteUrl,
        data:{id: IdDelete, _token: token},
        success: function(msg){ //success
          // show the success delete div
          $('#successDelete').slideDown(300);
          // put the outPut
          $('#successDelete').append(msg['successDelete']);
          //hide the success delete div
          $('#successDelete').delay(2000).slideUp();
          //reload the page after ....s
          setTimeout(function(){
            location.reload()
          }, 2500);
        }, //success
      });
    });

    $(editBtn).on('click', function(){
      // id
      IdEdit = $(this).parents().parents().data('vp');
      //get the title
      editTitle = $(this).parents().siblings(titleTextClass);
      //get the decription
      editDescription = $(this).parents().siblings(descTextClass);
      //gwet the title field
      updateTitleFiled = $(editModelTitleField);
      // get the description field
      updateDescFiled = $(editModelDescField);
      // put the title value
      updateTitleFiled.val(editTitle.text());
      // put the description value
      updateDescFiled.val(editDescription.text());
      //show the modal
      $(editModel).modal();

    });

     $(updateBtn).on('click', function(){

       $.ajax({
         method: 'post',
         url: updateUrl,
         data:{id: IdEdit, title: updateTitleFiled.val(), description: updateDescFiled.val(), _token: token},
         success: function(msg) {//success
           // show the success delete div
           $('#success').slideDown(300);
           // put the outPut
           $('#success').append(msg['successUpdate']);
           //hide the success delete div
           $('#success').delay(2000).slideUp();
           editTitle.text(updateTitleFiled.val());
           editDescription.text(updateDescFiled.val());
           $(editModel).modal('hide');
         },
         error: function(xhr){
           var errors = xhr.responseJSON;
           $('#errors').slideDown(300);
            titleError = errors.title[0];
            $('#errors ul').append('<li>'+ titleError +'</li>');
            if(errors.description){
              descError = errors.description[0];
              $('#errors ul').append('<li>'+ descError +'</li>');
            }
            $('#errors').delay(2000).html('').slideUp(500);
         },
       });
     });
   /*END run value modal*//////////////////////////////////////////////////////////////////////////////////////////////
 }

 // value porposition
 CanvasOptions('#saveValue', '#valueTitle', '#contentValue','#valueContent', VPurl, '#Values', '#addValueModal', '.optionsVP', '.card-optionVP', '.deleteVP' , VPurlDelete, '.editVP', '.vp_title',
 '.vp_desc', '#editValueTitle', '#editValueContent','#editValueModal', '#updateValue', VPurlUpdate,'#editValueModal');

 // customer relations
 CanvasOptions('#saveRelation', '#relationTitle', '#contentRelation','#relationContent', CRurl, '#relations', '#addRelationModal', '.optionsCR', '.card-optionCR', '.deleteCR' , CRurlDelete, '.editCR', '.cr_title', '.cr_desc', '#editRelationTitle', '#editRelationContent','#editRelationModal', '#updateRelation', CRurlUpdate,'#editRelationModal');

 // key resources
 CanvasOptions('#saveResources', '#resourceTitle', '#contentResource','#resourceContent', KRurl, '#resources', '#addResourceModal', '.optionsKR', '.card-optionKR', '.deleteKR' , KRurlDelete, '.editKR', '.kr_title', '.kr_desc', '#editResourceTitle', '#editResourceContent','#editResourceModal', '#updateResources', KRurlUpdate,'#editResourceModal');

 // chaneels
 CanvasOptions('#saveChaneel', '#chaneelTitle', '#contentChaneel','#chaneelContent', CHurl, '#chaneels', '#addChaneelModal', '.optionsCH', '.card-optionCH', '.deleteCH' , CHurlDelete, '.editCH', '.ch_title', '.ch_desc', '#editChaneelTitle', '#editChaneelContent','#editChaneelModal', '#updateChaneel', CHurlUpdate,'#editChaneelModal');

 // cost structure
 CanvasOptions('#saveCost', '#costTitle', '#contentCost','#costContent', CSTurl, '#costs', '#addCostModal', '.optionsCST', '.card-optionCST', '.deleteCST' , CSTurlDelete, '.editCST', '.cst_title', '.cst_desc', '#editCostTitle', '#editCostContent','#editCostModal', '#updateCost', CSTurlUpdate,'#editCostModal');

 // cost structure
 CanvasOptions('#saveRev', '#revTitle', '#contentRev','#revContent', RSurl, '#revs', '#addRevModal', '.optionsRS', '.card-optionRS', '.deleteRS' , RSurlDelete, '.editRS', '.rs_title', '.rs_desc', '#editRevTitle', '#editRevContent','#editRevModal', '#updateRev', RSurlUpdate,'#editRevModal');

 /*


*/
$('#saveKeyPartner').on('click', function()
{

   var bmc_id = $('#bizcanvas').data('id');
   var name = $('#keyPartnerTitle');
   var desc = $('#keyPartnerContent');

   $.ajax({
        method: 'post',
        url:KPurl,
        data:{bmc_id: bmc_id, name: name.val(), desc: desc.val(), _token: token},
       success: function(msg){ //success
         //show the succewss div
         $('#success').slideDown(300);
         // put the success message
         $('#success').append(msg['success']);
         // hide the success div
         $('#success').delay(2500).slideUp();
         // show the activity div
         $('#Partner').slideDown(600);
         // put the key activity in the activity
         $('#Partner').append(msg['outPut']);
         // hide the modal
         $('#addPartnerModal').modal('hide');
         //empty the title field
         name.val('');
         //empty the description field
         desc.val('');

         // view the key-activity option
         $('.optionsKP').on('mouseenter', function() {
            // show the card option
          $(this).children('.card-optionKP').slideDown(500);
         // hide the key-activity option
         }).on('mouseleave', function() {
              // hide the card option
            $(this).children('.card-optionKP').slideUp(500);
         });

         // delete request
         $('.deleteKP').on('click', function() {
          //id
          var IdDelete = $(this).parents().parents().data('kp');

          $.ajax({ //ajax call
              method:'get',
              url: KPurlBtnDelete,
              data:{id: IdDelete, _token: token},
              success: function(msg){ //success
               // show the success delete div
               $('#successDelete').slideDown(300);
               // put the outPut
               $('#successDelete').append(msg['successDelete']);
               //hide the success delete div
               $('#successDelete').delay(2000).slideUp();
               //reload the page after ....s
               setTimeout(function(){
                  location.reload()
               }, 2500);
              }, //success
          });
         });

     }
   });
});
