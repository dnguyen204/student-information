<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="outter-wp">
	<div class="top-menu">
		<h1 class="text-center">Xếp đội cho Đoàn Sinh</h1>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-6">
			<div class="panel panel-info" style="margin-top: 50px">
				<div class="panel-heading">
					<h3 class="panel-title">Đoàn sinh trong chi đoàn</h3>
				</div>
				<div class="panel-body" id="list_stu_in_class">
					<!-- list student in Class -->
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6">
			<div class="col-xs-4 col-md-4">
				<select id="list_malop" class="form-control" name="malop">
					<option value="0">Chọn lớp. .</option>
					<?php foreach($list_class as $class){?>
					<option value="<?=$class['MaLop']?>"><?=$class['TenPhanDoan']?></option>
					<?php }?>					
				</select> <input id="lop_selected" type="hidden"><label
					class="malop_warning" style="color: red; display: none">Hãy chọn
					lớp</label>
			</div>
			<div class="col-xs-4 col-md-4">
				<select id="list_machidoan" class="form-control" name="machidoan">
					<!-- show list chi đoàn -->
				</select><input id="chidoan_selected" type="hidden"><label
					class="chidoan_warning" style="color: red; display: none">Hãy chọn
					chi đoàn</label>
			</div>

			<div class="col-xs-4 col-md-4">
				<select id="list_madoi" class="form-control" name="madoi">
					<!-- show list đội -->
				</select><input id="doi_selected" type="hidden"><label
					class="doi_warning" style="color: red; display: none">Hãy chọn
					đội</label>
			</div>

			<div class="panel panel-info" style="margin-top: 50px">
				<div class="panel-heading">
					<h3 class="panel-title">Danh sách trong đội</h3>
				</div>
				<div class="panel-body" id="list_stu_in_team">
					<!-- List Student in Class -->
				</div>
			</div>

		</div>
	</div>

</div>

<script type='text/javascript'
	src="<?php echo base_url();?>public/backend/template/admin/custom_js/addteam-student.js"></script>