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

  // view the key-activity option
  $('.moreDetails').on('click', function() {
    id = $(this).parents().parents().parents().data('ka');
          $(this).parents().parents().siblings('.memberInfoTag').children('.details').slideToggle(500);
  });
});
/*end run key activity modal*/
