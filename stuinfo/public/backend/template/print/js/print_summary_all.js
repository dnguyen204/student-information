(function($, undefined) {

}(window.jQuery));

function getData(controllerurl, data){
	return $.ajax({
		cache: false,
		type : 'POST',
		url : site + controllerurl,
		data : data,
		success : function(output) {			
		},
		error : function(e) {
			alert(e.message);
		}
	});
}

function summary(contentId, malop, machidoan, baseurl) {
	var print = document.createElement('div');
	var content = $('#' + contentId.substr(0,1)).clone();
	//$(content).find('[data-toggle="collapse"]').attr('aria-expanded', 'true');
	
	var phutrach, printContent;
	getData('/student/typeSroce/getListGLV', 'malop=' + malop + '&machidoan=' + machidoan).done(function(data){
		
		data = data.replace(/<h4>/g, " ");
		data = data.replace("</h4>", ",");
		
		printContent = 
			'<div class="body">'+
			'<h3>Tổng kết cả năm</h3>'+
			'<table class="table-header">' + 
				'<tbody>' + 
					'<tr>' + '<td>Chi đoàn' + '</td>' + '<td>: ' + machidoan + '</td></tr>' + 
					'<tr>' + '<td>Phụ trách' + '</td>' + '<td>: ' + data + '</td></tr>' + 
				'</tbody>' + 
			'</table>' +
			$(content).html() +
			'</div>'
			
		
			
		$(print).append(printContent);
		$(print).printThis(
				{
					loadCSS : baseurl
							+ 'public/backend/template/print/css/print.css',
					callback : function() {
					}
				});
	})			
}

function printSummary(contentId, malop, machidoan, baseurl) {
	summary(contentId, malop, machidoan, baseurl)
}


