<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="outter-wp">
	<div class="top-menu">
		<h1 class="text-center">Nhập điểm</h1>
	</div>

	<div class="row">
		<div class="col-xs-12 col-md-6">
			<div class="form-group">
				<div class="col-xs-6 col-md-6">
					<select id="list_malop" class="form-control" name="malop">
						<option value="0">Chọn lớp. .</option>
                        <?php
                        
                        foreach ($list_class as $key => $class) {
                            if ($key > 0 && $list_class[-- $key]['MaLop'] === $class['MaLop'])
                                continue;
                            ?>                        
                        <option value="<?=$class['MaLop']?>"><?=$class['TenPhanDoan']?></option>
                        <?php }?>
					</select> <input id="lop_selected" type="hidden"><label
						class="malop_warning" style="color: red; display: none">Hãy chọn
						lớp</label>
				</div>
				<div class="col-xs-6 col-md-6">
					<select id="list_machidoan" class="form-control">
						<!-- show list chi đoàn -->
					</select><input id="chidoan_selected" type="hidden"><label
						class="chidoan_warning" style="color: red; display: none">Hãy chọn
						chi đoàn</label>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6">
			<div class="form-group">				
				<label class="control-label col-xs-5 col-md-5">Huynh trưởng phụ
					trách:</label>
				<div class="col-xs-7 col-md-7 list-lead-class">
					<!-- danh sách huynh trưởng phụ trách lớp -->
				</div>

			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-md-6">
			<div class="panel panel-info" style="margin-top: 10px">
				<div class="panel-heading">
					<h3 class="panel-title">Đoàn sinh trong chi đoàn</h3>
				</div>
				<div class="panel-body" id="list_stu_in_class">
					<!-- danh sách đoàn sinh trong chi đoàn -->
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6">
		
		</div>
	</div>
</div>

<script type='text/javascript'
	src="<?php echo base_url();?>public/backend/template/admin/js/jquery.dataTables.min.js"></script>
<script type='text/javascript'
	src="<?php echo base_url();?>public/backend/template/admin/custom_js/type-sroce.js"></script>