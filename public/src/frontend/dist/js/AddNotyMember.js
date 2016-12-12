$(document).ready(function () {
  var ajax_call = function() {
    //jQuery ajax code
    var action = 'Hallo ' + AuthName + ' we see that you didn\'t add any team Work  Try Now It Is Very Easy';
    var type = 'users';
    $.ajax({
      method: 'POST',
      url: notyInsertUrl,
      data:{action: action, type: type, urlLink: urlLinkTeamWork, AuthId: AuthId, _token: token},
    }).done(function(msg) {

      $('.menu').prepend(msg['noty']);

      $.playSound(notificationNoty); // play notification

      $('#countLable').html('');
      $('#countHeader').html('');

      $('#countLable').html(msg['counter']);
      $('#countHeader').html('You have ' + msg['counter'] + ' notifications unreaded');

      $('#boxAlertTitle').html(msg['boxTitle']);
      $('#boxAlertDesc').html(msg['boxDesc']);
      
      $('#infoBox').attr('href', msg['url']);

      $('#infoBox').slideDown(500);
      $('#infoBox').delay(5000).slideUp(500);

      noty();
    });

  };
  var times = 60 * 24 * 7; // weak converter
  var interval = 1000 * 60 * times; // where times is every minutes

  setTimeout(ajax_call, 10000); // fire after 1 min

  setInterval(ajax_call, interval); // repeat every weak

  function noty(){
    $('.Noty').on('click', function () {
      elm = $(this);
      var id = $(this).children().children('.notyInfo').data('id'); // get the id
      var from = $(this).children().children('.notyInfo'); // get the sender
      var date = $(this).children().children('.notyInfo').children('.notyDate'); // get the date
      var action = $(this).children().children('.notyAction'); // get the action
      $('#notifyTitle').text('From ' + from.children('.notiyFrom').text()); // put the values in the modal
      $('#notyDate').text('on ' + date.text()); // put the values in the modal
      $('#notifyAction').text(action.text()); // put the values in the modal
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
  }
});
