(function($, undefined) {
	$('.add-score')
			.click(
					function(e) {
						e.preventDefault();
						$('tr').children('td').removeClass('active');
						$(this).children('td').addClass('active');

						$mads = $(this).attr('id');

						$('#mads').attr('value', $mads);
						$('#mads_display').text($mads);
						$('#tt_display')
								.text(
										$('.add-score').closest('tr').find(
												'.active')[2].textContent);
						$('#ten_display')
								.text(
										$('.add-score').closest('tr').find(
												'.active')[3].textContent);

						$hk = $('#hk').attr('value');
						$malop = $('#lop_selected').attr('value');

						$('.panel-footer').removeClass('hidden');

						getAbsentDiLe($malop, $mads, $hk);
						getAbsentDiHoc($malop, $mads, $hk);
					})
	function getAbsentDiHoc($malop, $mads, $hk) {
		$.ajax({
			type : 'POST',
			url : site + '/student/checkAbsent/getAbsentHoc',
			data : {
				'malop' : $malop,
				'mads' : $mads,
				'hk' : $hk
			},
			success : function(output) {
				$('#list-nghi-hoc').html(output);
			},
			error : function(e) {
				alert(e.message);
			}
		});
	}

	function getAbsentDiLe($malop, $mads, $hk) {
		$.ajax({
			type : 'POST',
			url : site + '/student/checkAbsent/getAbsentLe',
			data : {
				'malop' : $malop,
				'mads' : $mads,
				'hk' : $hk
			},
			success : function(output) {
				$('#list-nghi-le').html(output);
			},
			error : function(e) {
				alert(e.message);
			}
		});
	}

	$('#add-absent').click(function() {
		$data = $('#absent-form').serialize();

		$hk = $('#hk').attr('value');
		$malop = $('#lop_selected').attr('value');
		$mads = $('#mads_display').text();

		$.ajax({
			type : 'POST',
			url : site + '/student/checkAbsent/addAbsent',
			data : $data,
			success : function() {
				getAbsentDiLe($malop, $mads, $hk);
				getAbsentDiHoc($malop, $mads, $hk);
				$('#absent-form')[0].reset()
			},
			error : function(e) {
				alert(e.message);
			}
		});
	})
}(window.jQuery));
