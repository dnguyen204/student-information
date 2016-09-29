(function($, undefined) {
	// Thêm Tên Thánh mới html
	$('#add_tenthanh')
			.click(
					function(event) {
						var div = document.createElement('div');
						div.innerHTML = '<div class="row">'
								+ '<div class="col-sm-6 col-xs-6">'
								+ '<div class="form-group">'
								+ '<label class="control-label col-md-4 col-xs-4">Tên Thánh mới:</label>'
								+ '<div class="col-md-8 col-xs-8">'
								+ '<input type="text" class="form-control" required name="TenThanhMoi" />'
								+ '</div>'
								+ '</div>'
								+ '</div>'
								+ '</div>'
								+ '<div class="row">'
								+ '<div class="col-sm-6 col-xs-6">'
								+ '<div class="form-group">'
								+ '<div class="col-md-1 col-xs-1">'
								+ '<button type="submit" name="newTenThanh" class="btn btn-sm btn-danger">Thêm mới</button>'
								+ '</div>' + '</div>' + '</div>' + '</div>';
						$('#add_data').html(div);
					});

	// add new class
	$('#addclass').click(function(event) {
		event.preventDefault();
		
		var data = $("#classform").serialize();
		$.ajax({
			type : 'POST',
			url : site + '/admin/newclass/addNew',
			data : data,
			success : function() {
				alert("Thêm lớp thành công");
			},
			error : function(e) {
				alert(e.message);
			}
		});

		return false;
	});
}(window.jQuery));
