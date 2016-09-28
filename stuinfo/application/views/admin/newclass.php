<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="outter-wp">
	<form class="form-horizontal" role="form">
		<div class="top-menu">
			<h1 class="text-center">Quản lý lớp</h1>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Thông tin lớp học</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-6 col-xs-6">
							<div class="form-group">
								<label class="control-label col-md-4 col-xs-4">Mã lớp:</label>
								<div class="col-md-8 col-xs-8">
									<input type="text" class="form-control" name="malop" />
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6 col-xs-6">
							<div class="form-group">
								<label class="control-label col-md-4 col-xs-4">Ngành:</label>
								<div class="col-md-8 col-xs-8">
									<select class="selectpicker form-control">
									<?php foreach ($nganh as $pd){?>
										<option name="maphandoan"
											value="<?php echo $pd['MaNganh']?>"><?php echo $pd['TenNganh']?></option>
									<?php }?>										
									</select>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6 col-xs-6">
							<div class="form-group">
								<label class="control-label col-md-4 col-xs-4">Phân đoàn:</label>
								<div class="col-md-8 col-xs-8">
									<select class="selectpicker form-control">
									<?php foreach ($phandoan as $pd){?>
										<option name="maphandoan"
											value="<?php echo $pd['MaPhanDoan']?>"><?php echo $pd['TenPhanDoan']?></option>
									<?php }?>
									</select>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-sm-6 col-xs-6">
							<div class="form-group">
								<label class="control-label col-md-4 col-xs-4">Chi đoàn:</label>
								<div class="col-md-8 col-xs-8">
									<select class="selectpicker form-control">
									<?php foreach ($chidoan as $pd){?>
										<option name="maphandoan"
											value="<?php echo $pd['MaChiDoan']?>"><?php echo $pd['TenChiDoan']?></option>
									<?php }?>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-heading">
					<h3 class="panel-title">Danh sách lớp</h3>
				</div>
			</div>
		</div>
	</form>
</div>
