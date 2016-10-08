(function($, undefined) {
	// Lấy thông tin GLV theo sự phân công
	$('.class_select').click(function(e) {
		e.preventDefault();
		$('tr').children('td').removeClass('active');
		$(this).children('td').addClass('active');
		// remove warning
		$('.tbl-phandoan').css('border-color', '');
		$('.phandoan-warning').css('display','none');
		

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
	
	$('#list_glv').change(function(){
		var $maht = $('#list_glv').find(':selected').val();		
		$('#glv_selected').attr('value', $maht);
		
		$('#list_glv').css('border-color', '');
		$('.glv-warning').css('display','none');
	})
	// Thêm anh chị vào lớp
	$('#add_glv_to_class').click(function(){
		$malop = $('#class_selected').attr('value');
		$maht = $('#glv_selected').attr('value');
		
		if($malop == undefined){
			$('.tbl-phandoan').css('border-color', 'red');
			$('.phandoan-warning').css('display','');
		}else if($maht == 0 || $maht == undefined){
			$('#list_glv').css('border-color', 'red');
			$('.glv-warning').css('display','');
		}else{
			$.ajax({
				type : 'POST',
				url : site + '/admin/division/addGLVToClass',
				data : {
					'malop' : $malop,
					'mahuynhtruong' : $maht
				},
				success : function(output) {

				},
				error : function(e) {
					alert(e.message);
				}
			});
		}
		
	})

	// Xóa Huynh Trưởng đã phân công
	$('.glyphicon-remove').click(function() {
		var $maht = $(this).closest("tr").attr('id');
		var $malop = $('#class_selected').attr('value');

		$.ajax({
			type : 'POST',
			url : site + '/admin/division/removePeopleInClass',
			data : {
				'malop' : $malop,
				'mahuynhtruong' : $maht
			},
			success : function(output_string) {

			},
			error : function(e) {
				alert(e.message);
			}
		});
	})

}(window.jQuery));
