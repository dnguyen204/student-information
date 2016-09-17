<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Thêm đoàn sinh mới -->
<div class="outter-wp">
	<form id="form" class="form-horizontal" role="form"
		action="<?php echo base_url();?>index.php/admin/newglv/addNewGLV"
		method="post">
		<div class="top-menu">
			<h1 class="text-center">Thêm Giáo Lý Viên mới</h1>
		</div>

		<!-- Row 1 -->
		<div class="row">
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Tên Thánh:</label>

					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control auto-TenThanh"
							autocomplete="on" name="glvTenThanh" />
					</div>
				</div>
			</div>
		</div>

		<!-- Row 2 -->
		<div class="row">
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Họ và tên đệm:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" name="glvLastName" />
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Tên:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" name="glvFirstName" />
					</div>
				</div>
			</div>
		</div>

		<!-- Row 3 -->
		<div class="row">
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Giới tính:</label>
					<div class="col-md-8 col-xs-8">
						<div class="radio">
							<label><input type="radio" name="glvSex" value="TRUE">Nam</label>
							<label><input type="radio" name="glvSex" value="FALSE">Nữ</label>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Row 4 -->
		<div class="row">
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Ngày sinh:</label>
					<div class="col-md-8 col-xs-8">
						<div class="input-group date datepicker"
							data-date-format="dd-mm-yyyy">
							<input class="form-control" type="text" readonly name="glvDOB"> <span
								class="input-group-addon"><i
								class="glyphicon glyphicon-calendar"></i></span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Row 9 -->
		<div class="row">
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Số điện thoại:</label>
					<div class="col-md-8 col-xs-8">
						<input type="number" class="form-control" name="SDT" />
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Email:</label>
					<div class="col-md-8 col-xs-8">
						<input type="email" class="form-control" name="Email" />
					</div>
				</div>
			</div>
		</div>

		<!-- Row 12 -->
		<div class="row">
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Địa chỉ:</label>
					<div class="col-md-8 col-xs-8">
						<textarea class="form-control" name="stuAddress"></textarea>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Ghi chú:</label>
					<div class="col-md-8 col-xs-8">
						<textarea class="form-control" name="stuNote"></textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- Row 13 -->
		<div class="row">
			<div class="col-sm-6 col-xs-6"></div>
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<input id="btn-back" type="button" class="btn btn-primary"
						value="Quay lại" />
					<input id="btn-reset" type="button" class="btn btn-primary"
						value="Xóa" />
					<button type="submit" class="btn btn-primary">Thêm mới</button>
				</div>
			</div>
		</div>
	</form>
</div>