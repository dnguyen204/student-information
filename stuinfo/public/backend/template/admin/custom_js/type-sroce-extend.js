(function($, undefined) {
	var table = $('#student')
			.DataTable(
					{
						 
						"columnDefs" : [ {
							"visible" : false,
							"targets" : 3,
							"responsive": true
						} ],
						"order" : [ [ 3, 'asc' ] ],
						"displayLength" : 10,
						"drawCallback" : function(settings) {
							var api = this.api();
							var rows = api.rows({
								page : 'current'
							}).nodes();
							var last = null;

							api.column(3, {
								page : 'current'
							}).data().each(
									function(group, i) {
										if (last !== group) {
											$(rows).eq(i).before(
													'<tr class="group"><td colspan="5"> Đội: '
															+ group
															+ '</td></tr>');

											last = group;
										}
									});
						}
						
					});

	// Order by the grouping
	// $('#student tbody').on('click', 'tr.group', function() {
	// var currentOrder = table.order()[0];
	// if (currentOrder[0] === 3 && currentOrder[1] === 'asc') {
	// table.order([ 3, 'desc' ]).draw();
	// } else {
	// table.order([ 3, 'asc' ]).draw();
	// }
	// });
	table.on( 'responsive-display', function ( e, datatable, row, showHide, update ) {	    
	} );
	
}(window.jQuery));
