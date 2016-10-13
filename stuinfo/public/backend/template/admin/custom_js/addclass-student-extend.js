(function($, undefined) {
	// Chọn đoàn sinh để thêm vào lớp
	$('.add-to-class').click(function() {
		$malop = $('#malop_selected').attr('value');
		$macd = $('#chidoan_selected').attr('value');
		$mads = $(this).closest("tr").attr("id");

		$.ajax({
			type : 'POST',
			url : site + '/student/addClassStudent/addstudent',
			data : {
				'malop' : $malop,
				'machidoan' : $macd,
				'madoansinh' : $mads
			},
			success : function(result) {
				$.ajax({
					type : 'POST',
					url : site + '/student/addClassStudent/getNewStudent',
					data : {},
					success : function(output) {
						$('#list_new_stu').html(output);
						$('#list_stu_in_class').html(result);
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

	$('.remove-in-class').click(function() {
		$malop = $('#malop_selected').attr('value');
		$macd = $('#chidoan_selected').attr('value');
		$mads = $(this).closest("tr").attr("id");

		$.ajax({
			type : 'POST',
			url : site + '/student/addClassStudent/removestudent',
			data : {
				'malop' : $malop,
				'machidoan' : $macd,
				'madoansinh' : $mads
			},
			success : function(result) {
				$.ajax({
					type : 'POST',
					url : site + '/student/addClassStudent/getNewStudent',
					data : {},
					success : function(output) {
						$('#list_new_stu').html(output);
						$('#list_stu_in_class').html(result);
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
