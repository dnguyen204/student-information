(function($, undefined) {
	$('#editProfile').click(function() {
		$('html, body').animate({
			scrollTop : $(document).height()
		}, 'slow');
	})

	$('#update-info').click(function() {
		$data = $('#form-edit').serialize();
		
		$.ajax({
			type : 'POST',
			url : site + '/admin/viewProfile/updateInfo',
			data : $data,
			success : function() {
				alert("Cập nhật thông tin thành công");
				location.reload();
			},
			error : function(e) {
				alert(e.message);
			}
		});
	})

}(window.jQuery));
