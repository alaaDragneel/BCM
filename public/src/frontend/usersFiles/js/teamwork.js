$(document).ready(function() {

	// show the add member model
	$('.addMember').on('click', function () {
		$('#addMemberModal').modal();
	});

	$('.close').click(function() {
		$('.alert').remove();
	});

	$('#addMemberBtn').on('click', function () {
		var name = $("#name");
		var job = $("#job");
		var phoneNo = $("#phoneNo");
		var email = $("#email");
		var password = $("#password");

		$.ajax({
			method:'post',
			url: url ,
			data:{name: name.val(), phoneNo: phoneNo.val(), job: job.val(), email: email.val(), password: password.val(), _token: token },
		}).done(function(msg) {
			name.val('');
			phoneNo.val('');
			job.val('');
			email.val('');
			password.val('');
			$('#team').prepend(msg['user']);
			$('#addMemberModal').modal('hide');
			$('#AddNotyMember').remove();
			memberEdition();
			/*start notification section*/

		    var action = 'Hallo ' + AuthName + ' You add A new Member To your Team Work';
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

			/*end notification section*/
		}).fail(function (xhr){
			var errors = xhr.responseJSON;
			$.each(errors ,function(key, value) {
				$('#' + key).closest('.form-group').addClass('has-error').append('<span class="help-block"><strong>' + value + '</strong></span>');
			});
		});
	});
	function memberEdition(){
		$('.userContainer').on('mouseenter mouseleave', function() {
			$(this).children('.patern').fadeToggle(500);
		});

		$('.deleteMember').on('click', function() {
			id = $(this).parents('.patern').siblings('.users-list-name').data('id');
			$(this).parents('.patern').parents('.userContainer').slideUp(500, function() {
				$(this).remove();
			});
			$.ajax({
				method:'get',
				url: deleteUrl ,
				data:{id: id, _token: token },
			}).done(function(msg) {
				$('.information').slideDown(500);
				if(msg['successDelete']){
					$('.information').html(msg['success']);
				}
				if(msg['fail']){
					$('.information').html(msg['fail']);
				}

				$('.information').delay(2000).slideUp(500);
			});
		});
	}
	memberEdition();

});
