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
			$('#list_stu_in_class').empty();			
			$('#mads_display').empty();
			$('#tt_display').empty();
			$('#ten_display').empty();			
			$('.list-lead-class').empty()
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

			$('#list_stu_in_class').empty();
			return false;
		}

		$malop = $('#lop_selected').attr('value');
		$.ajax({
			type : 'POST',
			url : site + '/student/checkAbsent/getListForCheckAbsent',
			data : {
				'malop' : $malop,
				'machidoan' : $macd
			},
			success : function(result) {
				$('#list_stu_in_class').html(result);
				$.ajax({
					type : 'POST',
					url : site + '/student/typeSroce/getListGLV',
					data : {
						'malop' : $malop,
						'machidoan' : $macd
					},
					success : function(output) {
						$('.list-lead-class').html(output);

					}
				});

			},
			error : function(e) {
				alert(e.message);
			}
		});
	})
	
	$('#add-nghi-le').click(function(){		
		$('#btn-select').attr('value', 'L')
	})
	
	$('#add-nghi-hoc').click(function(){		
		$('#btn-select').attr('value', 'H')
	})
		
}(window.jQuery));
