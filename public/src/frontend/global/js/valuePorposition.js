 /*start run value modal*/////////////////////////////////////////////////////////////////////////////////////////////////
$('#saveValue').on('click', function () {
   var id = $('#bizcanvas').data('id');
    var title = $(this).parents().siblings('.modal-body').children().children().siblings('#valueTitle');
    var description = $(this).parents().siblings('.modal-body').children('#contentValue').children().siblings('#valueContent');
    // console.log(description.val());
    $.ajax({
      method:'post',
      url: VPurl,
      data:{id: id, title: title.val(), description: description.val(), _token: token},
      success: function(msg){ //success
        //show the succewss div
        $('#success').slideDown(300);
        // put the success message
        $('#success').append(msg['success']);
        // hide the success div
        $('#success').delay(2500).slideUp();
        // show the activity div
        $('#Values').slideDown(600);
        // put the key activity in the activity
        $('#Values').append(msg['outPut']);
        // hide the modal
        $('#addValueModal').modal('hide');
        //empty the title field
        title.val('');
        //empty the description field
        description.val('');

        // view the key-activity option
        $('.optionsVP').on('mouseenter', function() {
          // show the card option
          $(this).children('.card-optionVP').slideDown(500);
          // hide the key-activity option
       }).on('mouseleave', function() {
         // hide the card option
          $(this).children('.card-optionVP').slideUp(500);
       });

       // delete request
        $('.deleteVP').on('click', function() {
          //id
          var IdDelete = $(this).parents().parents().data('vp');
          $.ajax({ //ajax call
            method:'get',
            url: VPurlDelete,
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

        $('.editVP').on('click', function(){
          // id
          IdEdit = $(this).parents().parents().data('vp');
          //get the title
          editTitle = $(this).parents().siblings('.vp_title');
          //get the decription
          editDescription = $(this).parents().siblings('.vp_desc');
          //gwet the title field
          updateTitleVP = $('#editValueTitle');
          // get the description field
          updateDescVP = $('#editValueContent');
          // put the title value
          updateTitleVP.val(editTitle.text());
          // put the description value
          updateDescVP.val(editDescription.text());
          //show the modal
          $('#editValueModal').modal();

        });

         $('#updateValue').on('click', function(){
           $.ajax({
             method: 'post',
             url: VPurlUpdate,
             data:{id: IdEdit, title: updateTitleVP.val(), description: updateDescVP.val(), _token: token},
             success: function(msg) {//success
               // show the success delete div
               $('#success').slideDown(300);
               // put the outPut
               $('#success').append(msg['successUpdate']);
               //hide the success delete div
               $('#success').delay(2000).slideUp();
               editTitle.text(updateTitleVP.val());
               editDescription.text(updateDescVP.val());
               $('#editValueModal').modal('hide');
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
$('.optionsVP').on('mouseenter', function() {
  // show the card option
  $(this).children('.card-optionVP').slideDown(500);
  // hide the key-activity option
}).on('mouseleave', function() {
 // hide the card option
  $(this).children('.card-optionVP').slideUp(500);
});

// delete request
 $('.deleteVP').on('click', function() {
   //id
   var IdDelete = $(this).parents().parents().data('vp');
   $.ajax({ //ajax call
     method:'get',
     url: VPurlDelete,
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

   $('.editVP').on('click', function(){
     // id
     IdEdit = $(this).parents().parents().data('vp');
     //get the title
     editTitle = $(this).parents().siblings('.vp_title');
     //get the decription
     editDescription = $(this).parents().siblings('.vp_desc');
     //gwet the title field
     updateTitleVP = $('#editValueTitle');
     // get the description field
     updateDescVP = $('#editValueContent');
     // put the title value
     updateTitleVP.val(editTitle.text());
     // put the description value
     updateDescVP.val(editDescription.text());
     //show the modal
     $('#editValueModal').modal();

   });

    $('#updateValue').on('click', function(){
      $.ajax({
        method: 'post',
        url: VPurlUpdate,
        data:{id: IdEdit, title: updateTitleVP.val(), description: updateDescVP.val(), _token: token},
        success: function(msg) {//success
          // show the success delete div
          $('#success').slideDown(300);
          // put the outPut
          $('#success').append(msg['successUpdate']);
          //hide the success delete div
          $('#success').delay(2000).slideUp();
          editTitle.text(updateTitleVP.val());
          editDescription.text(updateDescVP.val());
          $('#editValueModal').modal('hide');
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
