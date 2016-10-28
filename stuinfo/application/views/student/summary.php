<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="outter-wp">
<?php $hk = htmlspecialchars($_GET["hk"]);?>
<input type="hidden" id="hk" value="<?=$hk?>" name="hk"> <input
		type="hidden" id="mads" name="mads">
	<div class="top-menu">
		<h1 class="text-center">Tổng kết <?= ($hk == 1)? ' Học Kì 1' : ' Học Kì 2'?></h1>
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

				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Tổng kết</h3>
					</div>
					<div class="panel-body">
						<table class="table table-user-information">
							<thead>
								<tr>
									<th></th>
									<th>Có phép</th>
									<th>Không phép</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Nghỉ lễ:</td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>Nghỉ học:</td>
									<td></td>
									<td></td>
								</tr>
							</tbody>
						</table>
						<div class="row">
							<label class="control-label col-xs-4 col-md-4">Điểm trung bình:</label>
							<label class="control-label col-xs-2 col-md-2" id="dtb"></label>
							<label class="control-label col-xs-4 col-md-4">Học lực:</label> <label
								class="control-label col-xs-2 col-md-2" id="hocluc"></label>
						</div>
						<div class="row">
							<label class="control-label col-xs-4 col-md-4">Hạnh kiểm:</label>
							<div class="col-md-6 col-xs-6">
								<select class="selectpicker form-control" name="hanhkiem">
									<option>Tốt</option>
									<option>Khá</option>
									<option>Trung bình</option>
									<option>Yếu</option>
									<option>Kém</option>
								</select>
							</div>
						</div>
						<div class="row">
							<label class="control-label col-xs-4 col-md-4">Nhận xét:</label>
							<div class="col-md-8 col-xs-8">
								<textarea class="form-control" name="nhanxet"></textarea>
							</div>
						</div>
						<div class="row">
							<input type="button" class="btn btn-danger col-xs-offset-2 col-md-offset-2" value="Lưu lại">
						</div>
					</div>
				</div>

			</div>
		</div>
	</form>
</div>



<script type='text/javascript'
	src="<?php echo base_url();?>public/backend/template/student/custom_js/summary.js"></script>