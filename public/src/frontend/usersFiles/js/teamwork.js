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
		var job = $("#job");//
		var phoneNo = $("#phoneNo");
		var email = $("#email");
		var password = $("#password");

		$.ajax({
               method:'post',
               url: url ,
			data:{name: name.val(), phoneNo: phoneNo.val(), job: job.val(), email: email.val(), password: password.val(), _token: token },
		}).done(function(msg) {
			$('.info').html(msg['success']);
			$('#addMemberModal').modal('hide');
			// location.reload();
		});
	});
});
