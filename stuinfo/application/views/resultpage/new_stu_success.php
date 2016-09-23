<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<script type="text/javascript">
	var time = 10; // Thời gian đếm ngược
	var page = "<?php echo base_url()?>index.php/admin/newstudent"; // Trang bạn muốn chuyển đến
	function countDown(){
		time--;
		gett("timecount").innerHTML = time;
		gett("sr-only").innerHTML = time/100;
		$(".progress-bar").attr("aria-valuenow", time);	
		if(time == -1){
			window.location = page;
		}
	}
	
	function gett(id){
		if(document.getElementById) return document.getElementById(id);
		if(document.all) return document.all.id;
		if(document.layers) return document.layers.id;
		if(window.opera) return window.opera.id;
	}
	
	function init(){
		if(gett('timecount')){
		setInterval(countDown, 1000);
		gett("timecount").innerHTML = time;
		$(".progress-bar").attr("aria-valuemax", time);
		}
		else{
			setTimeout(init, 50);
		}
	}
	document.onload = init();
</script>

<head>
<link rel="stylesheet"
	href="<?php echo base_url();?>public/backend/template/admin/css/bootstrap.min.css"
	type='text/css' />
<script type='text/javascript'
	src="<?php echo base_url();?>public/backend/template/admin/js/jquery-1.11.1.min.js"></script>
<script type='text/javascript'
	src="<?php echo base_url();?>public/backend/template/admin/js/jquery-ui.js"></script>
</head>
<body>
	<div class="container">
		<form class="form-horizontal" style="border: 1px">
			<div class="top-menu">
				<h1 style="text-align: center;">Thêm đoàn sinh thành công</h1>
				<h3 style="text-align: center;">
					Trang sẽ tự chuyển sau <span id="timecount"></span> giây!
				</h3>
				<div class="progress">
					<div class="progress-bar progress-bar-danger progress-bar-striped"
						role="progressbar" aria-valuenow="" aria-valuemin="0"
						aria-valuemax="" style="width: 80%">
						<span class="sr-only"></span>
					</div>
				</div>
			</div>
		</form>
	</div>
</body>