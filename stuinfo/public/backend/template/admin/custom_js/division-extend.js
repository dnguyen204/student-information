(function($, undefined) {
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
