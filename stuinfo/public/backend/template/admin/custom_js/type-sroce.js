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
			$('#diem_mieng').val('')
			$('#diem_15phut').val('')
			$('#diem_1tiet').val('')
			$('#diem_hocki').val('')
			$('#diem_tb').val('')
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
			url : site + '/student/typeSroce/getListStudent',
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
	// check change
	$('input').change(
			function() {
				$heso1 = ($('#diem_mieng').val() ? parseFloat($('#diem_mieng')
						.val()) : 0)
						+ ($('#diem_15phut').val() ? parseFloat($(
								'#diem_15phut').val()) : 0)
				$heso2 = ($('#diem_1tiet').val()) ? parseFloat($('#diem_1tiet')
						.val()) * 2 : 0
				$heso3 = ($('#diem_hocki').val()) ? parseFloat($('#diem_hocki')
						.val()) * 3 : 0

				$tb = parseFloat(($heso1 + $heso2 + $heso3) / 7).toFixed(1)

				$('#diem_tb').val($tb)
			})

	// add sroce student
	$('#save_sroce').click(function() {
		$malop = $('#lop_selected').attr('value')
		$mads = $('#mads').attr('value')
		$data = $('#form').serialize()

		if ($malop == 0 || $mads == undefined) {
			alert("Chọn thông tin trước khi thêm điểm")
			return false
		}

		$.ajax({
			type : 'POST',
			url : site + '/student/typeSroce/addSroce',
			data : $data ,
			success : function() {
				alert('Lưu điểm thành công!')
				
				$('#diem_mieng').val('')
				$('#diem_15phut').val('')
				$('#diem_1tiet').val('')
				$('#diem_hocki').val('')
				$('#diem_tb').val('')				
			},
			error : function(e) {
				alert(e.message);
			}
		});

	})

}(window.jQuery));
