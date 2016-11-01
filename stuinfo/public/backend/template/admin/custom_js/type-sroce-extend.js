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
						$.ajax({
							type : 'POST',
							url : site + '/student/typeSroce/getSroce',
							data : {
								'malop' : $malop,
								'mads' : $mads,
								'hk' : $hk
							},
							success : function(output) {
								var obj = JSON.parse(output);
								if ($hk == 1) {									
									$('#diem_mieng').val(obj[0].MiengHK1);
									$('#diem_15phut').val(obj[0].KT15PhutHK1);
									$('#diem_1tiet').val(obj[0].KT1TietHK1);
									$('#diem_hocki').val(obj[0].KTHK1);
									$('#diem_tb').val(obj[0].TBHK1);
								} else if ($hk == 2) {
									$('#diem_mieng').val(obj[0].MiengHK2);
									$('#diem_15phut').val(obj[0].KT15PhutHK2);
									$('#diem_1tiet').val(obj[0].KT1TietHK2);
									$('#diem_hocki').val(obj[0].KTHK2);
									$('#diem_tb').val(obj[0].TBHK2);
								}
							},
							error : function(e) {
								alert(e.message);
							}
						});

					})
}(window.jQuery));
