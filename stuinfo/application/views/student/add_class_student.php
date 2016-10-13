<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="outter-wp">
	<div class="top-menu">
		<h1 class="text-center">Xếp lớp Đoàn Sinh mới</h1>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-6">
			<div class="panel panel-info" style="margin-top: 10px">
				<div class="panel-heading">
					<h3 class="panel-title">Đoàn sinh mới</h3>
				</div>
				<div class="panel-body" id="list_new_stu">
					<!-- list new student -->
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6">
			<div class="col-xs-6 col-md-6">
				<select id="list_malop" class="form-control" name="malop">
					<option value="0">- Chọn lớp -</option>
					<?php foreach($lop as $l){?>
					<option value="<?=$l['MaLop']?>"><?=$l['TenPhanDoan']?></option>
					<?php }?>
					</select> <input id="malop_selected" type="hidden"> <label
					class="malop_warning" style="color: red; display: none">Hãy chọn
					lớp trước</label>
			</div>
			<div class="col-xs-6 col-md-6">
				<select id="list_machidoan" class="form-control" name="machidoan">
					<!-- show list chi đoàn -->
				</select><input id="chidoan_selected" type="hidden">
			</div>

			<div class="panel panel-info" style="margin-top: 50px">
				<div class="panel-heading">
					<h3 class="panel-title">Danh sách trong lớp</h3>
				</div>
				<div class="panel-body" id="list_stu_in_class">
					<!-- List Student in Class -->
				</div>
			</div>

		</div>
	</div>

</div>

<script type='text/javascript'
	src="<?php echo base_url();?>public/backend/template/admin/custom_js/addclass-student.js"></script>