<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="outter-wp">
	<form role="form" id="form">
		<div class="top-menu">
			<h1 class="text-center">Phân công giảng dạy</h1>
		</div>
		<div class="row">
			<div class="col-xs-3 col-md-3">
				<div class="panel panel-info">
					<label class="control-label phandoan-warning"
						style="color: red; display: none">Hãy chọn phân đoàn</label>
					<div class="panel-heading">
						<h3 class="panel-title">Phân đoàn</h3>
					</div>
					<div class="panel-body tbl-phandoan">
						<table class="table table-user-information">
							<tbody>		
							<?php foreach ($class_list as $class){?>					
								<tr class="class_select">
									<td id="<?= $class['MaLop'] ?>"><?= $class['TenPhanDoan'] ?></td>
								</tr>	
							<?php }?>						
							</tbody>
						</table>
						<input type="hidden" id="class_selected" name="classSelected" />
					</div>
				</div>
			</div>
			<div class="col-xs-9 col-md-9">
				<div class="row">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title">Thông tin phân công</h3>
						</div>
						<div class="panel-body">
							<table class="table table-user-information">
								<tbody>
									<tr>
										<td>Phân đoàn trưởng:</td>
										<td id="lead_class"></td>
										<td></td>
									</tr>
								</tbody>
							</table>
						</div>
						<!-- Show data -->
						<div class="panel-body" id="peopleinclass"></div>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-6 col-xs-6">
									<div class="form-group">
										<label class="control-label col-md-4 col-xs-4">Cấp:</label>
										<div class="col-md-8 col-xs-8">
											<select id="role" class="form-control">
												<option value="0">Chọn . . .</option>
												<?php foreach ($role as $r){?>
												<option value="<?= $r['MaQuyen'] ?>"><?= $r['TenQuyen'] ?></option>
												<?php }?>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-xs-6">
									<div class="form-group">
										<label class="control-label col-md-4 col-xs-4">Chi đoàn:</label>
										<div class="col-md-8 col-xs-8">
											<select id="list_chidoan"" class="form-control">
												<option value="0">Chọn . . .</option>
												<?php foreach ($chidoan as $r){?>
												<option value="<?= $r['MaChiDoan'] ?>"><?= $r['TenChiDoan'] ?></option>
												<?php }?>
											</select> <input type="hidden" id="chidoan_selected"> <label
												class="control-label chidoan-warning"
												style="display: none; color: red">Chọn chi đoàn</label>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-10 col-xs-10">
									<div class="form-group">
										<label class="control-label col-md-4 col-xs-4">Anh chị phụ
											trách:</label>
										<!-- Danh sách glv -->
										<div class="col-md-8 col-xs-8">
											<select id="list_glv" class="form-control">
											</select> <input type="hidden" id="glv_selected"> <label
												class="control-label glv-warning"
												style="display: none; color: red">Chọn giáo lý viên</label>
										</div>
									</div>
								</div>
								<div class="col-sm-2 col-xs-2">
									<div class="form-group">
										<input id="add_glv_to_class" style="margin-top: -1px;"
											type="button" class="btn btn-info" value="Thêm" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

<script id="division_js" type='text/javascript'
	src="<?php echo base_url();?>public/backend/template/admin/custom_js/division.js"></script>
<script type="text/javascript">var site = "<?php echo site_url(); ?>";</script>