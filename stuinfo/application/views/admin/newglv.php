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
		<!-- Row 0 -->
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Mã GLV:</label>

					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" readonly name="maglv"
							value="<?php echo $newcode; ?>" />
					</div>
				</div>
			</div>
		</div>

		<!-- Row 1 -->
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Tên Thánh:</label>

					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control auto-TenThanh"
							autocomplete="on" name="glvTenThanh" required="required" />
					</div>
				</div>
			</div>
		</div>

		<!-- Row 2 -->
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Họ và tên đệm:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" name="glvLastName"
							required="required" />
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Tên:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" name="glvFirstName"
							required="required" />
					</div>
				</div>
			</div>
		</div>

		<!-- Row 3 -->
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Giới tính:</label>
					<div class="col-md-8 col-xs-8">
						<div class="radio">
							<label><input type="radio" name="glvSex" value="1"
								required="required">Nam</label> <label><input type="radio"
								name="glvSex" value="0" required="required">Nữ</label>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Row 4 -->
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Ngày sinh:</label>
					<div class="col-md-8 col-xs-8">
						<div class="input-group date datepicker"
							data-date-format="dd-mm-yyyy">
							<input class="form-control" type="text" readonly name="glvDOB"
								required="required"> <span class="input-group-addon"><i
								class="glyphicon glyphicon-calendar"></i></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Ngày bổn mạng:</label>
					<div class="col-md-8 col-xs-8">
						<input class="form-control" type="text" name="glvBonMang" placeholder="ngày-tháng. EX: 01-05">
					</div>
				</div>
			</div>
		</div>

		<!-- Row 9 -->
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Số điện thoại:</label>
					<div class="col-md-8 col-xs-8">
						<input type="number" class="form-control" name="SDT"
							required="required" />
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-12">
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
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Địa chỉ:</label>
					<div class="col-md-8 col-xs-8">
						<textarea class="form-control" name="glvAddress"></textarea>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Ghi chú:</label>
					<div class="col-md-8 col-xs-8">
						<textarea class="form-control" name="glvNote"></textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- Row 13 -->
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Cấp bậc:</label>
					<div class="col-md-8 col-xs-8">
						<select class="selectpicker form-control" name="maquyen">
						<?php foreach ($role as $r){?>
							<option value="<?php echo $r['MaQuyen']?>"><?php echo $r['TenQuyen']?></option>
						<?php }?>										
						</select>
					</div>
				</div>
			</div>
		</div>

		<!-- Row 13 -->
		<div class="row">
			<div class="col-sm-6 col-xs-6"></div>
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<input id="btn-reset" type="button" class="btn btn-primary"
						value="Xóa" />
					<button type="submit" class="btn btn-primary">Thêm mới</button>
				</div>
			</div>
		</div>
	</form>
</div>