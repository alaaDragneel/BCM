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
			$('.information').slideDown();
			$('.information').html(msg['success']);
			$('#addMemberModal').modal('hide');
			$('.information').delay(2000).slideUp();
			setTimeout(function(){
	    	location.reload();
			}, 2500);
		});
	});

		$('.deleteMember').on('click', function() {

			id = $(this).parents().parents().children('td[data-id]').data('id');
			$.ajax({
	      method:'get',
	      url: deleteUrl ,
				data:{id: id, _token: token },
			}).done(function(msg) {
				$('.information').slideDown();
				if(msg['successDelete']){
					$('.information').html(msg['successDelete']);
				}
				if(msg['fail']){
					$('.information').html(msg['fail']);
				}
				$('#addMemberModal').modal('hide');
				$('.information').delay(2000).slideUp();
				setTimeout(function(){
		    	location.reload();
				}, 2500);
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

			newName = $('#nameEdit').val(name.data('name'))
			newEmail = $('#emailEdit').val(email.data('email'))
 			newPhone = $('#phoneNoEdit').val(phoneNo.text())
 			 newJob = $('#jobEdit').val(job.text())


		});
		newpass = $('#passwordEdit');
		$('#editMemberBtn').on('click', function() {
			if(newpass.val() !== ''){
				newpass.val()
			}
			// console.log(newName.val()+"<br>"+newEmail.val()+"<br>"+newName.val()+"<br>"+newName.val()+"<br>"+);
			$.ajax({
	      method:'post',
	      url: editUrl ,
				data:{id: id, name: newName.val(), phoneNo: newPhone.val(), job: newJob.val(), email: newEmail.val(), password: newpass.val(), _token: token },
			}).done(function(msg) {
				$('.information').slideDown();
				if(msg['successEdit']){
					$('.information').html(msg['successEdit']);
				}
				if(msg['fail']){
					$('.information').html(msg['fail']);
				}
				$('#addMemberModal').modal('hide');
				$('.information').delay(2000).slideUp();
				setTimeout(function(){
		    	location.reload();
				}, 2500);
			});
			// // console.log(newpass.val());
		});

});
