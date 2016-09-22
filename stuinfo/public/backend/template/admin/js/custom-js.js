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

	// Cuộn trang lên với scrollTop
	$(function() {
		$('#go_top').click(function() {
			$('body,html').animate({
				scrollTop : 0
			}, 600);
			return false;
		});
	});

	// Ẩn hiện icon go-top
	$(function() {
		if ($(window).scrollTop() <= 5) {
			$('#go_top').stop(false, true).fadeOut(1);
		} else {
			$('#go_top').stop(false, true).fadeIn(1);
		}
		$(window).scroll(function() {
			if ($(window).scrollTop() <= 5) {
				$('#go_top').stop(false, true).fadeOut(600);
			} else {
				$('#go_top').stop(false, true).fadeIn(600);
			}
		});
	});

	// Xóa field
	$(function() {
		$('#btn-reset').click(function() {
			$("#form")[0].reset();
		});
	});
	$('#detail-process').click(
			function() {
				var currentNode = $('#detail-process >i');
				var currentClass = currentNode.attr('class');
				if (currentClass == 'glyphicon glyphicon-chevron-right') {
					currentNode.removeClass().addClass(
							'glyphicon glyphicon-chevron-down')
					var scrolled = scrolled + 200;
					$(".accordian-body").animate({
						scrollBottom : scrolled
					});
				} else {
					currentNode.removeClass().addClass(
							'glyphicon glyphicon-chevron-right')
				}
			});

}(window.jQuery));
