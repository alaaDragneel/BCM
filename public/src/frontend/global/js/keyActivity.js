
/*start run key activity modal*/
  $('#saveKeyActivity').on('click', function () {
      var id = $('#bizcanvas').data('id');
      var title = $(this).parents().siblings('.modal-body').children().children().siblings('#keyActivityTitle');
      var description = $(this).parents().siblings('.modal-body').children('#content').children().siblings('#keyActivityContent');
      $.ajax({
        method:'post',
        url: KAurl,
        data:{id: id, title: title.val(), description: description.val(), _token: token},
        success: function(msg){ //success
          //show the succewss div
          $('#success').slideDown(300);
          // put the success message
          $('#success').append(msg['success']);
          // hide the success div
          $('#success').delay(2500).slideUp();
          // show the activity div
          $('.activities').slideDown(600);
          // put the key activity in the activity
          $('.activities').append(msg['outPut']);
          // hide the modal
          $('#addActivityModal').modal('hide');
          //empty the title field
          title.val('');
          //empty the description field
          description.val('');

          // view the key-activity option
          $('.options').on('mouseenter', function() {
            // show the card option
            $(this).children('.card-option').slideDown(500);
            // hide the key-activity option
         }).on('mouseleave', function() {
           // hide the card option
            $(this).children('.card-option').slideUp(500);
         });

         // delete request
          $('.deleteKA').on('click', function() {
            //id
            var keyActivityIdDelete = $(this).parents().parents().data('ka');
            $.ajax({ //ajax call
              method:'get',
              url: KAurlDelete,
              data:{id: keyActivityIdDelete, _token: token},
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
          $('.editKA').on('click', function(){
            // id
            keyActivityIdEdit = $(this).parents().parents().data('ka');
            //get the title
            editTitle = $(this).parents().siblings('.ka_title');
            //get the decription
            editDescription = $(this).parents().siblings('.ka_desc');
            //gwet the title field
            updateTitleKA = $('#editKeyActivityTitle');
            // get the description field
            updateDescKA = $('#editKeyActivityContent');
            // put the title value
            updateTitleKA.val(editTitle.text());
            // put the description value
            updateDescKA.val(editDescription.text());
            //show the modal
            $('#editActivityModal').modal();

          });

           $('#updateKeyActivity').on('click', function(){
             $.ajax({
               method: 'post',
               url: KAurlUpdate,
               data:{id: keyActivityIdEdit, title: updateTitleKA.val(), description: updateDescKA.val(), _token: token},
               success: function(msg) {//success
                 // show the success delete div
                 $('#success').slideDown(300);
                 // put the outPut
                 $('#success').append(msg['successUpdate']);
                 //hide the success delete div
                 $('#success').delay(2000).slideUp();
                 editTitle.text(updateTitleKA.val());
                 editDescription.text(updateDescKA.val());
                 $('#editActivityModal').modal('hide');
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
        error: function(xhr){
          var errors = xhr.responseJSON;
          $('#errors').slideDown(300);
           titleError = errors.title[0];
           $('#errors ul').append('<li>'+ titleError +'</li>');
           if(errors.description){
             descError = errors.description[0];
             $('#errors ul').append('<li>'+ descError +'</li>');
           }
           $('#errors').delay(2000).slideUp(500);
        },
      });
 });
   // view the key-activity option
  $('.options').on('mouseenter', function() {
  // show the card option
  $(this).children('.card-option').slideDown(500);
  // hide the key-activity option
  }).on('mouseleave', function() {
   // hide the card option
  $(this).children('.card-option').slideUp(500);
  });

 // delete request
 $('.deleteKA').on('click', function() {
   //id
   var keyActivityIdDelete = $(this).parents().parents().data('ka');

   $.ajax({ //ajax call
     method:'get',
     url: KAurlDelete,
     data:{id: keyActivityIdDelete, _token: token},
     success: function(msg){//success
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
     },
   });
 });

 $('.editKA').on('click', function(){
   // id
   keyActivityIdEdit = $(this).parents().parents().data('ka');
   //get the title
   editTitle = $(this).parents().siblings('.ka_title');
   //get the decription
   editDescription = $(this).parents().siblings('.ka_desc');
   //gwet the title field
   updateTitleKA = $('#editKeyActivityTitle');
   // get the description field
   updateDescKA = $('#editKeyActivityContent');
   // put the title value
   updateTitleKA.val(editTitle.text());
   // put the description value
   updateDescKA.val(editDescription.text());
   //show the modal
   $('#editActivityModal').modal();

 });

  $('#updateKeyActivity').on('click', function(){
    $.ajax({
      method: 'post',
      url: KAurlUpdate,
      data:{id: keyActivityIdEdit, title: updateTitleKA.val(), description: updateDescKA.val(), _token: token},
      success: function(msg) {//success
        // show the success delete div
        $('#success').slideDown(300);
        // put the outPut
        $('#success').append(msg['successUpdate']);
        //hide the success delete div
        $('#success').delay(2000).slideUp();
        editTitle.text(updateTitleKA.val());
        editDescription.text(updateDescKA.val());
        $('#editActivityModal').modal('hide');
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
/*end run key activity modal*/
