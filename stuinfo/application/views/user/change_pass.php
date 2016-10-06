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
						<input type="password" class="form-control" name="oldpass"
							required />
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
						<input type="password" data-minlength="6" class="form-control"
							name="newpass" required>
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
						<input type="password" class="form-control" required />
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<button id="changepass"
						class="btn btn-info col-md-offset-4 col-xs-offset-4">Đồng ý</button>
				</div>
			</div>
		</div>
	</form>
</div>