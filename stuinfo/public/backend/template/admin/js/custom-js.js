(function($, undefined) {
	$(function() {
		$(".datepicker").datepicker({
			autoclose : true,
			todayHighlight : true
		}).datepicker();
	});

	$(".auto-TenThanh").autocomplete({
		source : "newstudent/get_list" // path to the get_birds method
	});

	var toggle = true;

	$(".sidebar-icon").click(
			function() {
				if (toggle) {
					$(".page-container").addClass("sidebar-collapsed")
							.removeClass("sidebar-collapsed-back");
					$("#menu span").css({
						"position" : "absolute"
					});
				} else {
					$(".page-container").removeClass("sidebar-collapsed")
							.addClass("sidebar-collapsed-back");
					setTimeout(function() {
						$("#menu span").css({
							"position" : "relative"
						});
					}, 400);
				}

				toggle = !toggle;
			});
}(window.jQuery));
