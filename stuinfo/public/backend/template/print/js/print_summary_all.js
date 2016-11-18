(function($, undefined) {

}(window.jQuery));

function getData(controllerurl, data){
	return $.ajax({
		cache: false,
		type : 'POST',
		url : site + controllerurl,
		data : data		
	});
}

function summary(contentId, malop, machidoan, baseurl) {
	var print = document.createElement('div');
	var content = $('#' + contentId.substr(0,1)).clone();
	//$(content).find('[data-toggle="collapse"]').attr('aria-expanded', 'true');
	
	var phutrach, printContent, summary = '';
	$.when(getData('/student/typeSroce/getListGLV', 'malop=' + malop + '&machidoan=' + machidoan), 
			getData('/student/summaryAll/countAcademics', 'malop=' + malop + '&macd=' + machidoan)).done(function(data1, data2){
		
		data1[0] = data1[0].replace(/<h4>/g, " ");
		data1[0] = data1[0].replace("</h4>", ",");
		data2[0] = JSON.parse(data2[0]);
				
		for( var i = 0 ; i < data2[0].length; i++ ){
			summary += '<tr>' + '<td>Đoàn sinh ' + data2[0][i].HLCN + '</td>' + '<td>: ' + data2[0][i].result + '</td></tr>'
		}
		
		printContent = 
			'<div class="body">'+
			'<h3>Tổng kết cả năm</h3>'+
			'<table class="table-header">' + 
				'<tbody>' + 
					'<tr>' + '<td>Chi đoàn' + '</td>' + '<td>: ' + machidoan + '</td></tr>' + 
					'<tr>' + '<td>Phụ trách' + '</td>' + '<td>: ' + data1[0] + '</td></tr>' + 
				'</tbody>' + 
			'</table>' +
			$(content).html() +
			'</div>' +
			'<div class="result-footer">' +
				'<table align="center">' + 
					'<tbody>' +
					summary
					'</tbody>' +
				'</table>'+			
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


