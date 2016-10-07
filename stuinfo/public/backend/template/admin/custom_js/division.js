(function($, undefined) {
	// Lấy thông tin GLV theo sự phân công
	$('.class_select').click(function(e) {
		e.preventDefault();
		$('tr').children('td').removeClass('active');
		$(this).children('td').addClass('active');

		var $classId = $(this).children("td") // Finds the closest row <tr>
		.attr('id'); // Gets a descendent with class="nr"

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
	// Xóa huynh trưởng trong lớp
	function deleteGLV() {
		alert('11111');
	}
	
	$('.remove-glv').click(function() {
		var $item = $(this).closest("tr") // Finds the closest row <tr>
		.find('.row_glv') // Gets a descendent with class="nr"
		.attr('id');
		alert($item);
	})

}(window.jQuery));
