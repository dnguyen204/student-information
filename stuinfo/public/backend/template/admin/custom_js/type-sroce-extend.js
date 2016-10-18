(function($, undefined) {
	$('.add-score').click(function(e) {
		e.preventDefault();
		$('tr').children('td').removeClass('active');
		$(this).children('td').addClass('active');

		$mads = $(this).attr('id');
		
		$('#mads_display').text($mads);
		$('#tt_display').text($('.add-score').closest('tr').find('.active')[2].textContent);
		$('#ten_display').text($('.add-score').closest('tr').find('.active')[3].textContent);
		
		$hk = $('#hk').attr('value');
		$malop = $('#lop_selected').attr('value');
		$.ajax({
			type : 'POST',
			url : site + '/student/typeSroce/getSroce',
			data : {
				'malop' : $malop,
				'mads' : $mads,
				'hk': $hk
			},
			success : function(output) {
				var data = $.parseJSON(output[0]);
				console.log(data['MaDoanSinh']);
			},
			error : function(e) {
				alert(e.message);
			}
		});
		
	})
}(window.jQuery));
