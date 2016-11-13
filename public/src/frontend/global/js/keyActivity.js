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
                    });
               });
          });
     });
});
/*end run key activity modal*/
