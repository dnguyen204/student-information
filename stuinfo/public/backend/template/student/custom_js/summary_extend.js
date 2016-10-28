(function($, undefined) {
	$('.show-summary')
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
										$('.show-summary').closest('tr').find(
												'.active')[2].textContent);
						$('#ten_display')
								.text(
										$('.show-summary').closest('tr').find(
												'.active')[3].textContent);

						$hk = $('#hk').attr('value');
						$malop = $('#lop_selected').attr('value');

						$('.panel-footer').removeClass('hidden');
					})
}(window.jQuery));
