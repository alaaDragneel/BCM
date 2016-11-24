$(document).ready(function() {
     /*start run key activity modal*/
     var name = $('#keyActivityName');
     name.on('keyup', function () {
          var description = $('#tagMembers');
          $.ajax({
               method: 'get',
               url: KAurlAjax,
               data: {word: $(this).val(), _token: token},
          }).done(function(msg) {
               $('.resultsMember').html(msg['membersName']);

               $('.memberInfo').on('click', function() {
                    var id = $(this).children('input').val();
                    var name = $(this).children('h4').text();
                    var job = $(this).children('p').text();
                    var bmc_id = $('#bizcanvas').data('id');
                    $.ajax({
                         method: 'post',
                         url: KAurl,
                         data: {id: id, name: name, job: job, bmc_id: bmc_id, _token: token},
                    }).done(function (msg) {

                         $('.tagMembers').append(msg['outPut']);
                         // info key
                         $('.addKAInfo').on('click', function() {
                           ka_id = $(this).parents().siblings('.memberInfoTag').data('ka-id');
                           BMC_id = $(this).parents().siblings('.memberInfoTag').data('bmc-id');
                            var name = $(this).parents().siblings('.memberInfoTag').children('.name').text(); // maber name
                            var job = $(this).parents().siblings('.memberInfoTag').children('.details').children('.job').text();// maber job
                            $('#addActivityModalInfo #memebrNameInfo').val(name); // assain the name input value
                            $('#addActivityModalInfo #memebrjobInfo').val(job); // assain the description input value
                         });

                         $('.moreDetails').on('click', function() {
                           $(this).parents().siblings('.memberInfoTag').children('.details').slideToggle(500);
                         });
                    });
               });
          });
     });
     // info key
     $('.addKAInfo').on('click', function() {
       ka_id = $(this).parents().siblings('.memberInfoTag').data('ka-id');
       BMC_id = $(this).parents().siblings('.memberInfoTag').data('bmc-id');
        var name = $(this).parents().siblings('.memberInfoTag').children('.name').text(); // maber name
        var job = $(this).parents().siblings('.memberInfoTag').children('.details').children('.job').text();// maber job
        $('#addActivityModalInfo #memebrNameInfo').val(name); // assain the name input value
        $('#addActivityModalInfo #memebrjobInfo').val(job); // assain the description input value
     });
     // info of ka add the full detaols of the key activity
     $('#addKeyActivity').on('click', function() {
       var title =  $('#ka_title').val();
       var desc = $('#ka_desc').val();
       $.ajax({
         method: 'POST',
         url: KAurlTag,
         data: {BMC_id: BMC_id, ka_id: ka_id, title: title, desc: desc, _token: token},
       }).done(function(){
         //show the succewss div
         $('#success').slideDown(300);
         // put the success message
         $('#success').append(msg['done']);
         // hide the success div
         $('#success').delay(2500).slideUp();
       });
     });

     $('.moreDetails').on('click', function() {
       $(this).parents().siblings('.memberInfoTag').children('.details').slideToggle(500);
     });
});
/*end run key activity modal*/
