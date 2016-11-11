(function($, undefined) {
	var printInvoice = function() {
		var print = document.createElement('div');
		var content = $('#summary-all').clone();
		// $.each($(productContent).find('tr'), function(i, e) {
		// $(e).find('td:last').remove();
		// });

		var printContent = '<h4>Tổng kết cuối năm</h4>'

		$(print).append(printContent);
		$(print).printThis(
				{
					loadCSS : '<?php echo base_url(); ?>'
							+ 'public/backend/template/print/css/print.css',
					callback : function() {

					}
				});
	}
	
	$('#printAll').click(function(){
		printInvoice();
	})
}(window.jQuery));
