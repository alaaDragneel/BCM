$(document).ready(function() {
	// show the add member model
	$('#addMember').on('click', function () {
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
			$('.information').slideDown();
			$('.information').html(msg['success']);
			$('#addMemberModal').modal('hide');
			$('.information').delay(2000).slideUp();
			$('#AddNotyMember').remove();
			memberEdition();
		}).fail(function (xhr){
			var errors = xhr.responseJSON;
			$.each(errors ,function(key, value) {
				$('#' + key).closest('.form-group').addClass('has-error').append('<span class="help-block"><strong>' + value + '</strong></span>');
			});
		});
	});
	function memberEdition(){
		$('.deleteMember').on('click', function() {
			id = $(this).parents().parents().children('td[data-id]').data('id');
			$(this).parents().parents('tr').hide(500, function() {
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

		$('.editTeam').on('click', function () {
			$('#editMemberModal').modal();
		});

		$('.editTeam').on('click', function() {
			id = $(this).parents().siblings('td[data-id]').data('id');
			var name = $(this).parents().siblings('td[data-name]');
			var email = $(this).parents().siblings('td[data-email]');
			var phoneNo = $(this).parents().parents().children().eq(3);
			var job = $(this).parents().parents().children().eq(4);

			nameView = $(this).parents().siblings('td[data-name]');
			emailView = $(this).parents().siblings('td[data-email]');
			phoneNoView = $(this).parents().parents().children().eq(3);
			jobView = $(this).parents().parents().children().eq(4);

			newName = $('#nameEdit').val(name.text())
			newEmail = $('#emailEdit').val(email.text())
			newPhone = $('#phoneNoEdit').val(phoneNo.text())
			newJob = $('#jobEdit').val(job.text())


		});
		newpass = $('#passwordEdit');
		$('#editMemberBtn').on('click', function() {
			if(newpass.val() !== ''){
				newpass.val()
			}
			$.ajax({
				method:'post',
				url: editUrl ,
				data:{id: id, name: newName.val(), phoneNo: newPhone.val(), job: newJob.val(), email: newEmail.val(), password: newpass.val(), _token: token },
			}).done(function(msg) {
				nameView.text(newName.val());
				emailView.text(newEmail.val());
				phoneNoView.text(newPhone.val());
				jobView.text(newJob.val());
				$('.information').slideDown();
				if(msg['successEdit']){
					$('.information').html(msg['successEdit']);
				}
				if(msg['fail']){
					$('.information').html(msg['fail']);
				}
				$('#editMemberModal').modal('hide');
				$('.information').delay(2000).slideUp();

			});

		});

	}
	memberEdition();

});
