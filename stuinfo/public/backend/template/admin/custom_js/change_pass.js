(function($, undefined) {
	// Lấy thông tin GLV theo sự phân công
	$('#changepass').click(function() {
		$oldpass = $('#oldpass').val();
		if ($oldpass == '') {
			$('.oldpass').css('display', '')
			$('#oldpass').css('border-color', 'red')
			return false
		}

		$newpass = $('#newpass').val();
		if ($newpass == '') {
			$('.newpass').css('display', '')
			$('#newpass').css('border-color', 'red')
			return false
		}

		$repass = $('#re_pass').val();
		if ($repass == '') {
			$('.re_pass').css('display', '')
			$('#re_pass').css('border-color', 'red')
			return false
		}

		if ($newpass != $repass) {
			$('.pass_warning').css('display', '')
			$('#re_pass').val('');
			return false
		}

		$.ajax({
			type : 'POST',
			url : site + '/admin/changepass/checkPass',
			data : {
				'mk' : $oldpass
			},
			success : function(result) {
				if (result == 1) {
					$.ajax({
						type : 'POST',
						url : site + '/admin/changepass/updatePass',
						data : {
							'newmk' : $newpass
						},
						success : function() {
							$('#form')[0].reset()
							alert('Thay đổi mật khẩu thành công!')							
						}
					});
				} else {
					$('.oldpass_warning').css('display', '')
				}
			},
			error : function(e) {
				alert(e.message);
			}
		});
	})

	$('#oldpass').keydown(function() {
		$('.oldpass').css('display', 'none')
		$('#oldpass').css('border-color', '')
		$('.oldpass_warning').css('display', 'none')
	});

	$('#newpass').keydown(function() {
		$('.newpass').css('display', 'none')
		$('#newpass').css('border-color', '')
	});

	$('#re_pass').keydown(function() {
		$('.re_pass').css('display', 'none')
		$('#re_pass').css('border-color', '')
		$('.pass_warning').css('display', 'none')
	});

}(window.jQuery));
