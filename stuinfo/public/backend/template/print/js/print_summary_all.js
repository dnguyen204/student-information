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
			getData('/student/summaryAll/countAcademics', 'malop=' + malop + '&macd=' + machidoan),
			getData('/student/summaryAll/getNamePhanDoan', 'malop=' + malop)).done(function(data1, data2, data3){

		data1[0] = data1[0].replace(/<h4>/g, " ");
		data1[0] = data1[0].replace("</h4>", ",");
		data2[0] = JSON.parse(data2[0]);
		data3[0] = JSON.parse(data3[0]);

		for( var i = 0 ; i < data2[0].length; i++ ){
			summary += '<tr>' + '<td>Đoàn sinh ' + data2[0][i].HLCN + '</td>' + '<td>: ' + data2[0][i].result + '</td></tr>'
		}

		printContent =
			'<div class="body">'+
			'<table class="table-header-left">' +
				'<tbody>' +
					'<tr>' + '<td>Phân đoàn' + '</td>' + '<td>: ' + data3[0][0].TenPhanDoan + '</td></tr>' +
					'<tr>' + '<td>Chi đoàn' + '</td>' + '<td>: ' + machidoan + '</td></tr>' +
					'<tr>' + '<td>Phụ trách' + '</td>' + '<td>: ' + data1[0] + '</td></tr>' +
				'</tbody>' +
			'</table>' +
			'<table class="table-header-right">' +
				'<tbody>' +
					'<tr>' +
							'<td><h4>Tổng kết cả năm</h4></td>' +
					'</tr>' +
				'</tbody>' +
			'</table>' +
			$(content).html() +
			'</div>' +
			'<div class="result-footer">' +
				'<table class="table-footer-right">' +
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
