(function($, undefined) {

	$('#list_malop').change(function() {
		// gắn value ẩn
		$malop = $('#list_malop').find(':selected').val();
		$('#malop_selected').attr('value', $malop);

		// remove check validation
		$('#list_malop').css('border-color', '');
		$('.malop_warning').css('display', 'none');

		if ($malop === undefined || $malop == 0) {
			$('#list_malop').css('border-color', 'red');
			$('.malop_warning').css('display', '');

			$('#list_machidoan').empty();
			$('#list_new_stu').empty();
			$('#list_stu_in_class').empty();
			return false;
		}
		
		$('#list_machidoan').empty();
		$('#list_new_stu').empty();
		$('#list_stu_in_class').empty();
		$.ajax({
			type : 'POST',
			url : site + '/student/addClassStudent/getlistchidoan',
			data : {},
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

		$malop = $('#malop_selected').attr('value');

		if ($macd === undefined || $macd == 0) {
			$('#list_machidoan').css('border-color', 'red');
			$('.machidoan_warning').css('display', '');
			return false;
		}
		$.ajax({
			type : 'POST',
			url : site + '/student/addClassStudent/getnewstudent',
			data : {},
			success : function(output_string) {				
				$('#list_new_stu').html(output_string);
				$.ajax({
					type : 'POST',
					url : site + '/student/addClassStudent/getstudentinclass',
					data : {
						'malop' : $malop,
						'machidoan' : $macd
					},
					success : function(output_string) {				
						$('#list_stu_in_class').html(output_string);
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
