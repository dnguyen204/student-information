(function($, undefined) {
	// Xóa Huynh Trưởng đã phân công
	$('.glyphicon-remove').click(function() {
		var $maht = $(this).closest("tr").attr('id');
		var $malop = $('#class_selected').attr('value');
		

		$.ajax({
			type : 'POST',
			url : site + '/admin/division/removeGLVFromClass',
			data : {
				'malop' : $malop,
				'mahuynhtruong' : $maht
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
