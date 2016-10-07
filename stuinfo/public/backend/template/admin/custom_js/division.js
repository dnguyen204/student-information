(function($, undefined) {	
	$('.class_select').click(function() {
		$('tr').children('td').removeClass('active');
		$(this).children('td').addClass('active');
		
		var $classId = $(this).children("td") // Finds the closest row <tr>
		.attr('id'); // Gets a descendent with class="nr"
		
		$('#class_selected').attr('value', $classId);
		var data = {
				'malop': $classId
		}
		
		$.ajax({
			type : 'POST',
			url : site + '/admin/division/getPeopleInClass',
			data : data,
			success : function($data) {
				console.log($data);
			},
			error : function(e) {
				alert(e.message);
			}
		});

		return false;
		
	})

}(window.jQuery));
