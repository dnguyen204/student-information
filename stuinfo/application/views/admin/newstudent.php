<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Thêm đoàn sinh mới -->
<div class="outter-wp">
	<form class="form-horizontal" role="form" action="" method="post">
		<div class="top-menu">
			<h1 class="text-center">Thêm đoàn sinh mới</h1>
		</div>
		
		<!-- Row 1 -->
		<div class="row">
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Tên Thánh:</label>

					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control auto-TenThanh"
							autocomplete="on" name="stuTenThanh"/>
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
						<input type="text" class="form-control" name="stuLastName"/>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Tên:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" name="stuFirstName" />
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
							<label><input type="radio" name="stuSex" value="male">Nam</label> <label><input
								type="radio" name="stuSex" value="female">Nữ</label>
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
							<input class="form-control" type="text" readonly name="stuDOB"> <span
								class="input-group-addon"><i
								class="glyphicon glyphicon-calendar"></i></span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Row 5 -->
		<div class="row">
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Ngày rửa tội:</label>
					<div class="col-md-8 col-xs-8">
						<div class="input-group date datepicker"
							data-date-format="dd-mm-yyyy">
							<input class="form-control" type="text" readonly name="stuNgayRuaToi"> <span
								class="input-group-addon"><i
								class="glyphicon glyphicon-calendar"></i></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Tại Giáo Xứ:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" name="stuGXRuaToi"/>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Row 6 -->
		<div class="row">
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Ngày rước lễ:</label>
					<div class="col-md-8 col-xs-8">
						<div class="input-group date datepicker"
							data-date-format="dd-mm-yyyy">
							<input class="form-control" type="text" readonly name="stuNgayRuocLe"> <span
								class="input-group-addon"><i
								class="glyphicon glyphicon-calendar"></i></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Tại Giáo Xứ:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" name="stuGXRuocLe"/>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Row 7 -->
		<div class="row">
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Ngày thêm sức:</label>
					<div class="col-md-8 col-xs-8">
						<div class="input-group date datepicker"
							data-date-format="dd-mm-yyyy">
							<input class="form-control" type="text" readonly name="stuNgayThemSuc"> <span
								class="input-group-addon"><i
								class="glyphicon glyphicon-calendar"></i></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Tại Giáo Xứ:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" name="stuGXThemSuc"/>
					</div>
				</div>
			</div>
		</div>

		<!-- Row 8 -->
		<div class="row">
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Tên Thánh:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control auto-TenThanh"
							autocomplete="on" name="TenThanhCha"/>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Họ và Tên Cha:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" name="HoTenCha"/>
					</div>
				</div>
			</div>
		</div>

		<!-- Row 9 -->
		<div class="row">
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Số điện thoại cha:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" name="SDTCha"/>
					</div>
				</div>
			</div>
		</div>

		<!-- Row 10 -->
		<div class="row">
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Tên Thánh:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control auto-TenThanh"
							autocomplete="on" name="TenThanhMe"/>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Họ và Tên Mẹ:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" name="HoTenMe"/>
					</div>
				</div>
			</div>
		</div>

		<!-- Row 11 -->
		<div class="row">
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Số điện thoại mẹ:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" name="SDTMe"/>
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
					<button class="btn btn-primary">
						<i class="icon-user icon-white"></i>Quay lại
					</button>
					<button class="btn btn-primary">
						<i class="icon-user icon-white"></i>Xóa
					</button>
					<button type="submit" class="btn btn-primary">
						<i class="icon-user icon-white"></i>Thêm mới
					</button>
				</div>
			</div>
		</div>
	</form>
</div>