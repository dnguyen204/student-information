<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- CSS -->
<link rel="stylesheet" type="text/css"
	href="<?php echo base_url(); ?>public/backend/template/admin/css/style.css" />
<link rel="stylesheet"
	href="<?php echo base_url();?>public/backend/template/admin/css/bootstrap-theme.min.css"
	type='text/css' />
<link rel="stylesheet"
	href="<?php echo base_url();?>public/backend/template/admin/css/bootstrap.min.css" />
<link rel="stylesheet"
	href="<?php echo base_url();?>public/backend/template/user/css/login.css"
	type='text/css' />
<!-- JS -->
<script type='text/javascript'
	src="<?php echo base_url();?>public/backend/template/admin/js/jquery-1.11.1.min.js"></script>
<script type='text/javascript'
	src="<?php echo base_url();?>public/backend/template/admin/js/jquery-ui.js"></script>

</head>
<body>
	<button class="btn btn-primary" data-toggle="modal"
		data-target="#myModal">Đăng nhập</button>

	<!-- Login Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="form" role="form" method="post"
					action="<?php echo base_url();?>index.php/user/login/">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true" title="Đóng cửa sổ">x</button>
						<h4 class="modal-title" id="myModalLabel">ĐĂNG NHẬP QUẢN LÝ</h4>
					</div>
					<!-- /.modal-header -->

					<div class="modal-body">
						<div class="row">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><i
										class="glyphicon glyphicon-user"></i> </span><input
										type="text" class="form-control" id="uLogin"
										placeholder="Tên đăng nhập" name="user" required/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><i
										class="glyphicon glyphicon-lock"></i> </span><input
										type="password" class="form-control" id="uPassword"
										placeholder="Mật khẩu" name="password" required />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<label class="control-label col-md-4 col-xs-4">Năm học:</label>
								<div class="col-md-8 col-xs-8">
									<select class="selectpicker form-control" name="manamhoc">
									<?php foreach ($namhoc as $nh){?>
										<option value="<?php echo $nh['MaNamHoc']?>"><?php echo $nh['NamBatDau'].' - '.$nh['NamKetThuc']?></option>
									<?php }?>
									</select>
								</div>
							</div>
						</div>

					</div>
					<!-- /.modal-body -->
					<div class="modal-footer">
						<div class="row">
							<div class="col-md-12 col-xs-12">
								<input type="submit" class="btn btn-danger"
									title="Đăng nhập hệ thống" value="Đăng nhập" />
							</div>
						</div>
					</div>
				</form>
				<!-- /.modal-footer -->

			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<script
		src="<?php echo base_url();?>public/backend/template/user/js/login.js"></script>
	<script
		src="<?php echo base_url();?>public/backend/template/admin/js/bootstrap.min.js"></script>
</body>
</html>
