(function($, undefined) {
	$('.show-summary').click(
			function(e) {
				e.preventDefault();
				$('tr').children('td').removeClass('active');
				$(this).children('td').addClass('active');

				$mads = $(this).attr('id');

				$('#mads').attr('value', $mads);
				$('#mads_display').text($mads);
				$('#tt_display')
						.text(
								$('.show-summary').closest('tr')
										.find('.active')[3].textContent);
				$('#ten_display')
						.text(
								$('.show-summary').closest('tr')
										.find('.active')[4].textContent);

				$hk = $('#hk').attr('value');
				$malop = $('#lop_selected').attr('value');
				
				$('#save-summary').removeClass('hidden')

				countAbsentStudent($mads, $hk, $malop, 1);
				countAbsentStudent($mads, $hk, $malop, 2);
				getSummaryInHK($mads, $hk, $malop);
			})

	function countAbsentStudent($mads, $hk, $malop, $op) {
		$.ajax({
			type : 'POST',
			url : site + '/student/summary/countAbsentOfStudent',
			data : {
				'malop' : $malop,
				'mads' : $mads,
				'hk' : $hk,
				'option' : $op
			},
			success : function(output) {
				var obj = JSON.parse(output);

				if ($op == 1) {
					$('#le-CP').text(obj[0] ? obj[0].result : '0');
					$('#le-KP').text(obj[1] ? obj[1].result : '0');
				} else if ($op == 2) {
					$('#hoc-CP').text(obj[0] ? obj[0].result : '0');
					$('#hoc-KP').text(obj[1] ? obj[1].result : '0');
				}
			},
			error : function(e) {
				alert(e.message);
			}
		});
	}

	function getSummaryInHK($mads, $hk, $malop) {
		$.ajax({
			type : 'POST',
			url : site + '/student/summary/getSummaryInHK',
			data : {
				'malop' : $malop,
				'mads' : $mads,
				'hk' : $hk				
			},
			success : function(output) {
				var obj = JSON.parse(output);

				if ($hk == 1) {
					$('#dtb').text(obj[0].TBHK1);
					$('.selectpicker').val(obj[0].HKHK1);
					$('#hocluc').text(obj[0].HLHK1);
					$('#nhanxet').val(obj[0].NhanXetHK1);
				} else if ($hk == 2) {					
					$('#dtb').text(obj[0].TBHK2);
					$('.selectpicker').val(obj[0].HKHK2);
					$('#hocluc').text(obj[0].HLHK2);
					$('#nhanxet').val(obj[0].NhanXetHK2);
				}
			},
			error : function(e) {
				alert(e.message);
			}
		});
	}

}(window.jQuery));
