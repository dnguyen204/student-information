<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="outter-wp">
	<form id="form" role="form">
		<div class="top-menu">
			<h1 class="text-center">Thay đổi mật khẩu</h1>
		</div>
		<br>
		<!--  -->
		<div class="row">
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Mật khẩu cũ:</label>
					<div class="col-md-8 col-xs-8">
						<input id="oldpass" type="password" class="form-control"
							name="oldpass" required /> <label class="oldpass_warning"
							style="display: none; color: red">Mật khẩu cũ không hợp lệ</label>
						<label class="oldpass" style="display: none; color: red">Không
							được bỏ trống</label>
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Mật khẩu mới:</label>
					<div class="col-md-8 col-xs-8">
						<input id="newpass" type="password" data-minlength="6"
							class="form-control" name="newpass" required> <label
							class="newpass" style="display: none; color: red">Không được bỏ
							trống</label>
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Lập lại mật khẩu:</label>
					<div class="col-md-8 col-xs-8">
						<input id="re_pass" type="password" class="form-control"
							data-minlength="6" required /> <label class="pass_warning"
							style="display: none; color: red">Mật khẩu không khớp</label> <label
							class="re_pass" style="display: none; color: red">Không được bỏ
							trống</label>
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-offset-2 col-xs-offset-2">
				<input type="button" id="changepass" class="btn btn-info"
					value="Đồng ý">
			</div>
		</div>
	</form>
</div>
<script type='text/javascript'
	src="<?php echo base_url();?>public/backend/template/admin/custom_js/change_pass.js"></script>
