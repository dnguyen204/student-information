<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="outter-wp">
	<form role="form">
		<div class="top-menu">
			<h1 class="text-center">Phân công giảng dạy</h1>
		</div>
		<div class="row">
			<div class="col-xs-3 col-md-3">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Phân đoàn</h3>
					</div>
					<div class="panel-body">
						<table class="table table-user-information">

							<tbody>		
							<?php foreach ($class_list as $class){?>					
								<tr class="class_select">
									<td id="<?= $class['MaLop'] ?>"><a><?= $class['TenPhanDoan'] ?></a></td>
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
										<td><a title="Xóa phân đoàn trưởng"><i class="glyphicon glyphicon-remove-sign"></i></a></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="panel-body" id="peopleinclass">
							<table class="table table-user-information">
								<tbody>
									<tr>
										<th>STT</th>
										<th>Tên Thánh</th>
										<th>Họ và Đệm</th>
										<th>Tên</th>
									</tr>																	
								</tbody>
							</table>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>	
</div>

<script type='text/javascript'
	src="<?php echo base_url();?>public/backend/template/admin/custom_js/division.js"></script>
<script type="text/javascript">var site = "<?php echo site_url(); ?>";</script>