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
			url : site + '/student/summaryAll/getListStudent',
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

}(window.jQuery));

function saveSummary(form, mads) {
	$malop = "&malop=" + $('#list_malop').val();
	$mads = "&mads=" + mads;
	$data = $(form).serialize();
	$.ajax({
		type : 'POST',
		url : site + '/student/summaryAll/insertSummaryAll',
		data : $data + $malop + $mads,
		success : function() {
			alert('Lưu thành công !!!');
		},
		error : function(e) {
			alert(e.message);
		}
	});
}

function getTongKet($id) {
	$tag = "'" + "#" + $id + "'"
	$()
	console.log($tag)
}