<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
if (isset($this->session->userdata['logged_in'])) {
    $tenthanh = ($this->session->userdata['logged_in']['tenthanh']);
    $hovadem = ($this->session->userdata['logged_in']['hovadem']);
    $ten = ($this->session->userdata['logged_in']['ten']);
    $chucvu = ($this->session->userdata['logged_in']['chucvu']);
} else {
    $url = base_url();
    redirect($url);
}
?>

<head>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta http-equiv="Content-Type" content="text/html" />
<!-- CSS -->
<link rel="stylesheet" type="text/css"
	href="<?php echo base_url(); ?>public/backend/template/admin/css/style.css" />
<link
	href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400'
	rel='stylesheet' type='text/css' />
<link rel="stylesheet"
	href="<?php echo base_url();?>public/backend/template/admin/css/icon-font.min.css"
	type='text/css' />
<link rel="stylesheet"
	href="<?php echo base_url();?>public/backend/template/admin/css/font-awesome.css" />
<link rel="stylesheet"
	href="<?php echo base_url();?>public/backend/template/admin/css/bootstrap-markdown.min.css" />
<link rel="stylesheet"
	href="<?php echo base_url();?>public/backend/template/admin/css/datepicker.css" />
<link rel="stylesheet"
	href="<?php echo base_url();?>public/backend/template/admin/css/bootstrap-theme.min.css"
	type='text/css' />
<link rel="stylesheet"
	href="<?php echo base_url();?>public/backend/template/admin/css/bootstrap.min.css"
	type='text/css' />
<link rel="stylesheet"
	href="<?php echo base_url();?>public/backend/template/admin/css/style-fix.css" />
<!-- Bootstrap Core JavaScript -->
<script type='text/javascript'
	src="<?php echo base_url();?>public/backend/template/admin/js/jquery-1.11.1.min.js"></script>
<script type='text/javascript'
	src="<?php echo base_url();?>public/backend/template/admin/js/jquery-ui.js"></script>
<script type='text/javascript'
	src="<?php echo base_url();?>public/backend/template/admin/js/bootstrap-markdown.js"></script>
</head>
<body>
	<a id="go_top" title="Go Top"></a>
	<div class="page-container sidebar-collapsed-back">
		<!--/content-inner-->
		<div class="left-content">
			<div class="inner-content">
				<div class="header-section">
					<div class="top-menu">
						<p>TRANG QUẢN LÝ THÔNG TIN ĐOÀN SINH VÀ HUYNH TRƯỞNG</p>
					</div>
					<div class="clear-fix"></div>
				</div>
				<!-- Gắn Subview -->
				<div class="container">
					<?php $this->load->view($subview); ?>
				</div>
				<footer>
				<p>
					&copy;2016 Augment . All Rights Reserved | Design by <a
						href="https://w3layouts.com/" target="_blank">W3layouts.</a>
				</p>
				</footer>
				<!--footer section end-->
			</div>
		</div>
		<!--//content-inner-->
		<!--/sidebar-menu-->
		<div class="sidebar-menu">
			<header class="logo"> <a class="sidebar-icon"> <span
				class="fa fa-bars"></span></a> <span id="logo"><h1>QUẢN LÝ</h1></span>
			</header>
			<div style="border-top: 1px solid rgba(69, 74, 84, 0.7)"></div>
			<!--/down-->
			<div class="down">
				<a><img
					src="<?php echo base_url(); ?>public/backend/template/admin/images/admin.jpg" /></a>
				<span class="name-caret"><?=$tenthanh.'<br/>'.$hovadem.' '.$ten?></span>
				<p><?=$chucvu?></p>
				<ul>
					<li><a class="tooltips" href="viewProfile"><span>Cá nhân</span><i
							class="glyphicon glyphicon-user"></i></a></li>
					<li><a class="tooltips" href="changepass"><span>Đổi mật khẩu</span><i
							class="glyphicon glyphicon-cog"></i></a></li>
					<li><a class="tooltips" data-target="#logoutModal"
						data-toggle="modal" href=""><span>Đăng xuất</span><i
							class="glyphicon glyphicon-off"></i></a></li>
				</ul>
			</div>
			<!--//down-->
			<div class="menu">
				<ul id="menu">
					<li><a href="../admin/admin"><i class="fa fa-home"></i> <span>Trang
								chủ</span></a></li>
					<li id="menu-academico"><a href=""><i class="glyphicon glyphicon-cog"></i> <span>Hệ
								thống</span> <span class="fa fa-angle-right"
							style="float: right"></span></a>
						<ul id="menu-academico-sub">
							<li id="menu-academico-boletim"><a href="newDatabase">Chỉnh sửa
									DB</a></li>
						</ul></li>

					<li id="menu-academico"><a href=""><i
							class="glyphicon glyphicon-list-alt"></i> <span>Danh mục</span> <span
							class="fa fa-angle-right" style="float: right"></span></a>
						<ul id="menu-academico-sub">
							<li id="menu-academico-boletim"><a href="newStudent">Thêm đoàn
									sinh mới</a></li>
							<li id="menu-academico-avaliacoes"><a href="typeSroce">Nhập điểm</a></li>
							<li id="menu-academico-avaliacoes"><a href="">Xếp lớp</a></li>
							<li id="menu-academico-boletim"><a href="">Xét lên lớp</a></li>
						</ul></li>

					<li id="menu-academico"><a href=""><i class="fa fa-desktop"></i> <span>Quản
								lý</span> <span class="fa fa-angle-right" style="float: right"></span></a>
						<ul id="menu-academico-sub">
							<li id="menu-academico-avaliacoes"><a href="newGlv">Thêm GLV mới</a></li>
							<li id="menu-academico-boletim"><a href="newClass">Tạo lớp học</a></li>
							<li id="menu-academico-boletim"><a href="division">Phân công
									giảng dạy</a></li>
						</ul></li>

					<li id="menu-academico"><a href=""><i class="fa fa-search"></i> <span>Tìm
								kiếm</span> <span class="fa fa-angle-right" style="float: right"></span></a>
						<ul id="menu-academico-sub">
							<li id="menu-academico-avaliacoes"><a href="search?id=đoàn sinh">Đoàn
									sinh</a></li>
							<li id="menu-academico-avaliacoes"><a href="search?id=GLV">GLV/HT</a></li>
						</ul></li>

					<li id="menu-academico"><a href=""><i
							class="glyphicon glyphicon-book"></i> <span>Báo cáo</span> <span
							class="fa fa-angle-right" style="float: right"></span></a>
						<ul id="menu-academico-sub">
							<li id="menu-academico-avaliacoes"><a href="">Đoàn sinh xuất sắc</a></li>
							<li id="menu-academico-boletim"><a href="">Đoàn sinh giỏi</a></li>
						</ul></li>

					<li id="menu-academico"><a href=""><i
							class="glyphicon glyphicon-file"></i> <span>Biểu mẫu</span> <span
							class="fa fa-angle-right" style="float: right"></span></a>
						<ul id="menu-academico-sub">
							<li id="menu-academico-avaliacoes"><a href="">Giấy khen</a></li>
							<li id="menu-academico-boletim"><a href="">Thư báo</a></li>
							<li id="menu-academico-boletim"><a href="">Thư mời</a></li>
						</ul></li>
				</ul>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>

	<!-- Logout form -->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" style="width: 35%;">
			<div class="modal-content">
				<form id="form" role="form" method="post"
					action="<?php echo base_url();?>index.php/admin/admin/logout/">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true" title="Đóng cửa sổ">x</button>
						<h4 class="modal-title" id="myModalLabel">ĐĂNG XUẤT HỆ THỐNG</h4>
					</div>
					<div class="modal-body">
						<div>
							<h4>Bạn có chắc chắn muốn thoát không?</h4>
						</div>
					</div>
					<div class="modal-footer">
						<div class="row">
							<div class="col-md-12 col-xs-12">
								<input type="submit" class="btn btn-danger"
									title="Đăng nhập hệ thống" value="Đồng ý" />
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script
		src="<?php echo base_url();?>public/backend/template/admin/custom_js/custom-js.js"></script>
	<script
		src="<?php echo base_url();?>public/backend/template/admin/js/TweenLite.min.js"></script>
	<script
		src="<?php echo base_url();?>public/backend/template/admin/js/CSSPlugin.min.js"></script>
	<script
		src="<?php echo base_url();?>public/backend/template/admin/js/jquery.nicescroll.js"></script>
	<script
		src="<?php echo base_url();?>public/backend/template/admin/js/scripts.js"></script>
	<script
		src="<?php echo base_url();?>public/backend/template/admin/js/bootstrap.min.js"></script>
	<script
		src="<?php echo base_url();?>public/backend/template/admin/js/bootstrap-datepicker.js"></script>
</body>
</html>