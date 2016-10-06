<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="outter-wp">
	<form class="form-horizontal" role="form" id="classform" method="post">
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
									<select class="selectpicker form-control" name="manganh">
									<?php foreach ($nganh as $pd){?>
										<option value="<?php echo $pd['MaNganh']?>"><?php echo $pd['TenNganh']?></option>
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
									<select class="selectpicker form-control" name="maphandoan">
									<?php foreach ($phandoan as $pd){?>
										<option value="<?php echo $pd['MaPhanDoan']?>"><?php echo $pd['TenPhanDoan']?></option>
									<?php }?>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer footer-student-detail">
					<input type="button" id="addclass" class="btn btn-info"
						value="Thêm mới" title="Thêm mới lớp học" />
				</div>
				<div class="panel-heading">
					<h3 class="panel-title">Danh sách lớp</h3>
				</div>
				<table class="table table-user-information"
					style="border-collapse: collapse;">
					<thead>
						<tr>
							<th>Mã lớp</th>
							<th>Ngành</th>
							<th>Phân đoàn</th>							
							<th>Năm học</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($class as $c){?>
						<tr>
							<td class="classcode"><?= $c['MaLop']?></td>
							<td><?= $c['TenNganh']?></td>
							<td><?= $c['TenPhanDoan']?></td>
							<td><?= $c['NamBatDau'].' - '.$c['NamKetThuc']?></td>
							<td><a><i class="glyphicon glyphicon-pencil"
									title="Chỉnh sửa lớp"></i></a></td>
							<td><a><i class="glyphicon glyphicon-remove" title="Xóa lớp"></i></a></td>
						</tr>
					<?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</form>
</div>

<script type='text/javascript'
	src="<?php echo base_url();?>public/backend/template/admin/js/adddatabase.js"></script>
<script type="text/javascript">var site = "<?php echo site_url(); ?>";</script>
