(function($, undefined) {

	$('#list_malop').change(function() {
		// gắn value ẩn
		$malop = $('#list_malop').find(':selected').val();
		$('#lop_selected').attr('value', $malop);

		// remove check validation
		$('#list_malop').css('border-color', '');
		$('.malop_warning').css('display', 'none');

		if ($malop === undefined || $malop == 0) {
			$('#list_malop').css('border-color', 'red');
			$('.malop_warning').css('display', '');

			$('#list_machidoan').empty();
			$('#list_madoi').empty();
			$('#list_stu_in_team').empty();
			$('#list_stu_in_class').empty();
			return false;
		}

		$('#list_machidoan').empty();

		$.ajax({
			type : 'POST',
			url : site + '/student/addTeamStudent/getChiDoanOfGLV',
			data : {
				'malop' : $malop
			},
			success : function(output) {
				$('#list_machidoan').html(output);
			},
			error : function(e) {
				alert(e.message);
			}
		});
	})

	$('#list_machidoan').change(function() {
		// gắn value ẩn
		$macd = $('#list_machidoan').find(':selected').val();
		$('#chidoan_selected').attr('value', $macd);

		// remove check validation
		$('#list_machidoan').css('border-color', '');
		$('.chidoan_warning').css('display', 'none');

		if ($macd === undefined || $macd == 0) {
			$('#list_machidoan').css('border-color', 'red');
			$('.chidoan_warning').css('display', '');

			$('#list_madoi').empty();
			$('#list_stu_in_team').empty();
			$('#list_stu_in_class').empty();
			return false;
		}
		$.ajax({
			type : 'POST',
			url : site + '/student/addTeamStudent/getlistdoi',
			data : {},
			success : function(output_string) {
				$('#list_madoi').html(output_string);
			},
			error : function(e) {
				alert(e.message);
			}
		});
	})

	$('#list_madoi').change(function() {
		// gắn value ẩn
		$madoi = $('#list_madoi').find(':selected').val();
		$('#doi_selected').attr('value', $madoi);

		// remove check validation
		$('#list_madoi').css('border-color', '');
		$('.doi_warning').css('display', 'none');

		if ($madoi === undefined || $madoi == 0) {
			$('#list_madoi').css('border-color', 'red');
			$('.doi_warning').css('display', '');

			$('#list_stu_in_team').empty();
			$('#list_stu_in_class').empty();
			return false;
		}
		$malop = $('#lop_selected').attr('value');
		$macd = $('#chidoan_selected').attr('value');
		
		$.ajax({
			type : 'POST',
			url : site + '/student/addTeamStudent/getListStudentOfClass',
			data : {
				'malop' : $malop,
				'machidoan' : $macd
			},
			success : function(result) {
				$('#list_stu_in_class').html(result);
				
				$.ajax({
					type : 'POST',
					url : site + '/student/addTeamStudent/getListStudentTeam',
					data : {
						'malop' : $malop,
						'machidoan' : $macd,
						'madoi' : $madoi
					},
					success : function(result) {
						$('#list_stu_in_team').html(result);
						
					},
					error : function(e) {
						alert(e.message);
					}
				});

			},
			error : function(e) {
				alert(e.message);
			}
		});

	})

}(window.jQuery));
