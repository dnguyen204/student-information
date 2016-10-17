(function($, undefined) {
	// Xóa Huynh Trưởng đã phân công
	$('.glyphicon-remove').click(function() {
		$maht = $(this).closest("tr").attr('id');
		$malop = $('#class_selected').attr('value');
		$macd = $(this).closest("tr").find('.id_cd').attr('id');
		
		$.ajax({
			type : 'POST',
			url : site + '/admin/division/removeGLVFromClass',
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
	})
}(window.jQuery));
