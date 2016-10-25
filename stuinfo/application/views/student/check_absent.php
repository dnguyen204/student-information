<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="outter-wp">
	<div class="top-menu">
		<h1 class="text-center">Điểm danh</h1>
	</div>
	<form class="form" id="form">
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
							class="chidoan_warning" style="color: red; display: none">Hãy
							chọn chi đoàn</label>
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
				<div class="panel panel-info" style="margin-top: 10px">
					<div class="panel-heading">
						<h3 class="panel-title">Thông tin đoàn sinh</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<label class="control-label col-xs-4 col-md-4">Mã đoàn sinh:</label>
							<label class="control-label col-xs-8 col-md-8" id="mads_display"></label>
						</div>
						<div class="row">
							<label class="control-label col-xs-4 col-md-4">Tên Thánh:</label>
							<label class="control-label col-xs-8 col-md-8" id="tt_display"></label>
						</div>
						<div class="row">
							<label class="control-label col-xs-4 col-md-4">Họ và tên:</label>
							<label class="control-label col-xs-8 col-md-8" id="ten_display"></label>
						</div>
					</div>
				</div>
			<?php $hk = htmlspecialchars($_GET["hk"]);?>
			<input type="hidden" id="hk" value="<?=$hk?>" name="hk"> <input
					type="hidden" id="mads" name="mads">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Thông tin nghỉ lễ</h3>
					</div>
					<div class="panel-body" id="list-nghi-le">
						<div class="row" style="margin-top: 20px">
							<div class="col-xs-6 col-md-6">
								<div class="form-group">
									<div class="col-md-3 col-xs-3">
										<input type="button" class="btn btn-info" id="save_sroce"
											value="Thêm mới" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Thông tin nghỉ học</h3>
					</div>
					<div class="panel-body" id="list-nghi-hoc">
					
						<div class="row" style="margin-top: 20px">
							<div class="col-xs-6 col-md-6">
								<div class="form-group">
									<div class="col-md-3 col-xs-3">
										<input type="button" class="btn btn-info" id="save_sroce"
											value="Lưu lại" />
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

<script type='text/javascript'
	src="<?php echo base_url();?>public/backend/template/student/custom_js/check_absent.js"></script>