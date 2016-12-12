$(document).ready(function() {
  $('.Noty').on('click', function () {
    elm = $(this);
    var id = $(this).children().children('.notyInfo').data('id'); // get the id
    var url = $(this).children().children('.notyInfo').data('url'); // get the id
    var from = $(this).children().children('.notyInfo'); // get the sender
    var date = $(this).children().children('.notyInfo').children('.notyDate'); // get the date
    var action = $(this).children().children('.notyAction'); // get the action
    $('#notifyTitle').text('From ' + from.children('.notiyFrom').text()); // put the values in the modal
    $('#notyDate').text('on ' + date.text()); // put the values in the modal
    $('#notifyAction').text(action.text()); // put the values in the modal
    $('#notifyAction').after('<a href='+url+' class="btn btn-primary btn-sm">Go Now</a>');
    $('#notifyModal').modal(); // open the modal
    // update the read status
    $.ajax({
      method: 'POST',
      url: notyUpdateUrl,
      data:{id: id, _token: token},
    }).done(function(msg) {
      if (elm.hasClass('unReadNoty')) {
          elm.removeClass('unReadNoty').addClass(msg['readNoty']);
      }
      // check on the notification status for the action
      if(action.hasClass('unReadNotyAction')) {
        action.removeClass('unReadNotyAction').addClass(msg['readAction']);
      }
      // check on the notification status for the seender
      if(from.hasClass('notyUnReadInfo')) {
        from.removeClass('notyUnReadInfo').addClass(msg['readFrom']);
      }

      $('#countLable').html('');
      $('#countHeader').html('');
      $('#countLable').html(msg['counterUpdate']);
      $('#countHeader').html('You have ' + msg['counterUpdate'] + ' notifications unreaded');

    });

  });
});
