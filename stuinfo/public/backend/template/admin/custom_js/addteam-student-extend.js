(function($, undefined) {
	$('.add-to-team')
			.click(
					function() {
						$malop = $('#lop_selected').attr('value');
						$macd = $('#chidoan_selected').attr('value');
						$madoi = $('#doi_selected').attr('value');
						$mads = $(this).closest("tr").attr("id");

						$
								.ajax({
									type : 'POST',
									url : site
											+ '/student/addTeamStudent/addToTeam',
									data : {
										'malop' : $malop,
										'machidoan' : $macd,
										'madoi' : $madoi,
										'madoansinh' : $mads
									},
									success : function(result) {
										$
												.ajax({
													type : 'POST',
													url : site
															+ '/student/addTeamStudent/getListStudentOfClass',
													data : {
														'malop' : $malop,
														'machidoan' : $macd
													},
													success : function(output) {
														$('#list_stu_in_class')
																.html(output);
														$('#list_stu_in_team')
																.html(result);
													},
													error : function(e) {
														alert(e.message);
													}
												});

									},
									error : function(e) {
										alert(e.message);
									}
								});
					})

	$('.remove-in-team')
			.click(
					function() {
						$malop = $('#lop_selected').attr('value');
						$macd = $('#chidoan_selected').attr('value');
						$mads = $(this).closest("tr").attr("id");
						$madoi = $('#doi_selected').attr('value');
						
						$
								.ajax({
									type : 'POST',
									url : site
											+ '/student/addTeamStudent/removeInTeam',
									data : {
										'malop' : $malop,
										'machidoan' : $macd,
										'madoansinh' : $mads,
										'madoi': $madoi
									},
									success : function(result) {
										$
												.ajax({
													type : 'POST',
													url : site
															+ '/student/addTeamStudent/getListStudentOfClass',
													data : {
														'malop' : $malop,
														'machidoan' : $macd
													},
													success : function(output) {
														$('#list_stu_in_class')
																.html(output);
														$('#list_stu_in_team')
																.html(result);
													},
													error : function(e) {
														alert(e.message);
													}
												});

									},
									error : function(e) {
										alert(e.message);
									}
								});
					})

}(window.jQuery));
