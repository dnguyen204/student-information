(function($, undefined) {
	// Lấy thông tin GLV theo sự phân công
	$('.class_select').click(function(e) {
		e.preventDefault();
		$('tr').children('td').removeClass('active');
		$(this).children('td').addClass('active');
		// remove warning
		$('.tbl-phandoan').css('border-color', '');
		$('.phandoan-warning').css('display', 'none');

		var $classId = $(this).children("td").attr('id');

		$('#class_selected').attr('value', $classId);

		
		
		$.ajax({
			type : 'POST',
			url : site + '/admin/division/getPeopleInClass',
			data : {
				'malop' : $classId
			},
			success : function(output_string) {
				var div = document.createElement('div');
				div.innerHTML = output_string;
				$('#peopleinclass').html(div);

			},
			error : function(e) {
				alert(e.message);
			}
		});
	})

	// Chọn cấp bậc
	$('#role').change(function() {
		var $roleid = $('#role').find(':selected').val();
		
		$('#glv_selected').attr('value', '');
		
		$.ajax({
			type : 'POST',
			url : site + '/admin/division/getListGLVByRole',
			data : {
				'maquyen' : $roleid
			},
			success : function(list_glv) {
				$('#list_glv').html(list_glv);
			},
			error : function(e) {
				alert(e.message);
			}
		});
	})

	$('#list_glv').change(function() {
		var $maht = $('#list_glv').find(':selected').val();
		$('#glv_selected').attr('value', $maht);

		$('#list_glv').css('border-color', '');
		$('.glv-warning').css('display', 'none');	
	})

	$('#list_chidoan').change(function() {
		var $maht = $('#list_chidoan').find(':selected').val();
		$('#chidoan_selected').attr('value', $maht);

		$('#list_chidoan').css('border-color', '');
		$('.chidoan-warning').css('display', 'none');
	})
	// Thêm anh chị vào lớp
	$('#add_glv_to_class').click(function(e) {
		e.preventDefault();
		$malop = $('#class_selected').attr('value');
		$maht = $('#glv_selected').attr('value');
		$macd = $('#chidoan_selected').attr('value');
		
		if ($malop == undefined) {
			$('.tbl-phandoan').css('border-color', 'red');
			$('.phandoan-warning').css('display', '');
			
			return false;
		} else if ($maht == 0 || $maht == undefined) {
			$('#list_glv').css('border-color', 'red');
			$('.glv-warning').css('display', '');
			
			return false;
		} else if ($macd == 0 || $macd == undefined) {
			$('#list_chidoan').css('border-color', 'red');
			$('.chidoan-warning').css('display', '');
			
			return false;
		} else {		
			
			$.ajax({
				type : 'POST',
				url : site + '/admin/division/addGLVToClass',
				data : {
					'malop' : $malop,
					'mahuynhtruong' : $maht,
					'machidoan' : $macd
				},
				success : function(output_string) {					
					var div = document.createElement('div');
					div.innerHTML = output_string;
					$('#peopleinclass').html(div);
				},
				error : function(e) {
					alert(e.message);
				}
			});
			
			return false;
		}		
	})	
}(window.jQuery));
