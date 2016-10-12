(function($, undefined) {
	// Chọn đoàn sinh để thêm vào lớp
	$('.add-to-class').click(function(e) {
		$malop = $('#malop_selected').attr('value');
		$macd = $('#chidoan_selected').attr('value');
		$mads = $(this).closest("tr").attr("id");

		$.ajax({
			type : 'POST',
			url : site + '/admin/addclassstudent/addstudent',
			data : {
				'malop' : $malop,
				'machidoan' : $macd,
				'madoansinh' : $mads
			},
			success : function(result) {				
				$('#list_stu_in_class').html(result);
				
				$.ajax({
					type : 'POST',
					url : site + '/admin/addclassstudent/getNewStudent',
					data : {},
					success : function(output) {						
						$('#list_new_stu').html(output);
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
