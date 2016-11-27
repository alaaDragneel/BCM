
$(document).ready(function() {
     /*start run key activity modal*/
     var name = $('#keyActivityName');
     var resultsMember = $('.resultsMember');
     var label = $('#label');
     if (resultsMember.html() === '') {
          label.addClass('hidden');
     }
     name.on('keyup', function () {
          $.ajax({
               method: 'get',
               url: KAurlAjax,
               data: {word: $(this).val(), _token: token},
          }).done(function(msg) {
               label.removeClass('hidden');
               resultsMember.html(msg['membersName']);
               $('.memberInfo').on('click', function() {
                    id = $(this).children('input').val();
                    memberName = $(this).children('h4').text();
                    job = $(this).children('p').text();
                    bmc_id = $('#bizcanvas').data('id');
                    $('#keyActivityName').val(memberName);
                    $('#memebrJobInfo').val(job);
                    label.addClass('hidden');
                    resultsMember.html('');
               });
          });
     });
     // add the key activity
     $('#addKeyActivity').on('click', function () {
          ka_title = $('#ka_title').val();
          ka_desc = $('#ka_desc').val();
          $.ajax({
               method: 'post',
               url: KAurl,
               data:{
                    id: id,
                    memberName: memberName,
                    job: job,
                    bmc_id: bmc_id,
                    ka_title: ka_title,
                    ka_desc: ka_desc,
                    _token: token
               },
          }).done(function(msg) {
               $('.activities').append(msg['outPut']);
               $('#addActivityModal').modal('hide');
               // view the key-activity option
               $('.optionsKA').on('mouseenter', function() {
                    // show the card option
                    $(this).children('.card-option').slideDown(500);
                    // hide the key-activity option
               }).on('mouseleave', function() {
                    // hide the card option
                    $(this).children('.card-option').slideUp(500);
               });

               // view the key-activity information
               $('.moreDetails').on('click', function() {
                    $(this).parents().parents().siblings('.memberInfoTag').children('.details').slideToggle(500);
               });
               var editName = $('#editKeyActivityName');
               editName.on('keyup', function () {
                    console.log('clickr');
                    $.ajax({
                         method: 'get',
                         url: KAurlAjax,
                         data: {word: $(this).val(), _token: token},
                    }).done(function(msg) {
                         label.removeClass('hidden');
                         resultsMember.html(msg['membersName']);
                         $('.memberInfo').on('click', function() {
                              idMember = $(this).children('input').val();
                              memberNameEdit = $(this).children('h4').text();
                              jobEdit = $(this).children('p').text();
                              $('#editKeyActivityName').val(memberNameEdit);
                              $('#editMemebrJobInfo').val(jobEdit);
                              label.addClass('hidden');
                              resultsMember.html('');
                         });
                    });
               });
               // edit the KA
               $('.editKA').on('click', function() {
                    id = $(this).parents().parents().parents().data('ka'); // id of card
                    bmc_id = $('#bizcanvas').data('id');
                    name = $(this).parents().parents().siblings('.memberInfoTag').children('.name');
                    job = $(this).parents().parents().siblings('.memberInfoTag').children('.details').children('.job');
                    ka_title = $(this).parents().parents().siblings('.memberInfoTag').children('.details').children('.ka_title');
                    ka_desc = $(this).parents().parents().siblings('.memberInfoTag').children('.details').children('.ka_desc');

                    inputName = $('#editKeyActivityName').val(name.text());
                    inputJob = $('#editMemebrJobInfo').val(job.text());
                    inputTitle = $('#editKa_title').val(ka_title.text());
                    inputDesc = $('#editKa_desc').val(ka_desc.text());
               });
               //update the KA
               $('#editKeyActivity').on('click', function() {
                    $.ajax({
                         method: 'post',
                         url: KAurlUpdate,
                         data:{
                              id: id,
                              memberName: inputName.val(),
                              job: inputJob.val(),
                              ka_title: inputTitle.val(),
                              ka_desc: inputDesc.val(),
                              member_id: idMember,
                              _token: token
                         },
                    }).done(function(msg) {
                         name.text(inputName.val());
                         job.text(inputJob.val());
                         ka_title.text(inputTitle.val());
                         ka_desc.text(inputDesc.val());
                         $('#editActivityModal').modal('hide');
                    });
               });
               // delete the KA
               $('.deleteKA').on('click', function() {
                    var id = $(this).parents().parents().parents().data('ka'); // id of card
                    $(this).parents('.optionsKA').slideUp(500, function() {
                         $(this).remove();
                    });
                    $.ajax({
                         method: 'get',
                         url: KAurlDelete,
                         data:{id: id, _token: token},
                         success: function () {
                              $('#successDelete').html(msg['successDelete']);
                         },
                    });
               });
          });
     });
     // view the key-activity option
     $('.optionsKA').on('mouseenter', function() {
          // show the card option
          $(this).children('.card-option').slideDown(500);
          // hide the key-activity option
     }).on('mouseleave', function() {
          // hide the card option
          $(this).children('.card-option').slideUp(500);
     });

     // view the key-activity information
     $('.moreDetails').on('click', function() {
          $(this).parents().parents().siblings('.memberInfoTag').children('.details').slideToggle(500);
     });
     var editName = $('#editKeyActivityName');
     editName.on('keyup', function () {
          console.log('clickr');
          $.ajax({
               method: 'get',
               url: KAurlAjax,
               data: {word: $(this).val(), _token: token},
          }).done(function(msg) {
               label.removeClass('hidden');
               resultsMember.html(msg['membersName']);
               $('.memberInfo').on('click', function() {
                    idMember = $(this).children('input').val();
                    memberNameEdit = $(this).children('h4').text();
                    jobEdit = $(this).children('p').text();
                    $('#editKeyActivityName').val(memberNameEdit);
                    $('#editMemebrJobInfo').val(jobEdit);
                    label.addClass('hidden');
                    resultsMember.html('');
               });
          });
     });
     // edit the KA
     $('.editKA').on('click', function() {
          id = $(this).parents().parents().parents().data('ka'); // id of card
          bmc_id = $('#bizcanvas').data('id');
          name = $(this).parents().parents().siblings('.memberInfoTag').children('.name');
          job = $(this).parents().parents().siblings('.memberInfoTag').children('.details').children('.job');
          ka_title = $(this).parents().parents().siblings('.memberInfoTag').children('.details').children('.ka_title');
          ka_desc = $(this).parents().parents().siblings('.memberInfoTag').children('.details').children('.ka_desc');

          inputName = $('#editKeyActivityName').val(name.text());
          inputJob = $('#editMemebrJobInfo').val(job.text());
          inputTitle = $('#editKa_title').val(ka_title.text());
          inputDesc = $('#editKa_desc').val(ka_desc.text());
     });
     //update the KA
     $('#editKeyActivity').on('click', function() {
          $.ajax({
               method: 'post',
               url: KAurlUpdate,
               data:{
                    id: id,
                    memberName: inputName.val(),
                    job: inputJob.val(),
                    ka_title: inputTitle.val(),
                    ka_desc: inputDesc.val(),
                    member_id: idMember,
                    _token: token
               },
          }).done(function(msg) {
               name.text(inputName.val());
               job.text(inputJob.val());
               ka_title.text(inputTitle.val());
               ka_desc.text(inputDesc.val());
               $('#editActivityModal').modal('hide');
          });
     });
     // delete the KA
     $('.deleteKA').on('click', function() {
          var id = $(this).parents().parents().parents().data('ka'); // id of card
          $(this).parents('.optionsKA').slideUp(500, function() {
               $(this).remove();
          });
          $.ajax({
               method: 'get',
               url: KAurlDelete,
               data:{id: id, _token: token},
               success: function () {
                    $('#successDelete').html(msg['successDelete']);
               },
          });
     });
});
/*end run key activity modal*/
