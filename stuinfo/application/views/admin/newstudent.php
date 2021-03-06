<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Thêm đoàn sinh mới -->
<div class="outter-wp">
	<form id="form" class="form-horizontal" role="form"
		action="<?php echo base_url();?>index.php/admin/newstudent/addNewStudent"
		method="post">
		<div class="top-menu">
			<h1 class="text-center">Thêm đoàn sinh mới</h1>
		</div>

		<!-- Row 0 -->
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Ảnh Đoàn Sinh:</label>
					<div class="col-md-8 col-xs-8">
						<img id="Image" /> <input type="button" class="btn" value="Chọn"
							onclick="BrowseServer();" /> <input type="hidden" id="stuImage"
							name="stuImage">
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Mã Đoàn Sinh:</label>

					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" readonly name="stuMa"
							value="<?php echo $newcode; ?>" />
					</div>
				</div>
			</div>
		</div>

		<!-- Row 1 -->
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Tên Thánh:</label>

					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control auto-TenThanh"
							autocomplete="on" name="stuTenThanh" />
					</div>
				</div>
			</div>
		</div>

		<!-- Row 2 -->
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Họ và tên đệm:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" required
							name="stuLastName" />
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Tên:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" required
							name="stuFirstName" />
					</div>
				</div>
			</div>
		</div>

		<!-- Row 3 -->
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Giới tính:</label>
					<div class="col-md-8 col-xs-8">
						<div class="radio">
							<label><input type="radio" name="stuSex" value="1">Nam</label> <label><input
								type="radio" name="stuSex" value="0">Nữ</label>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Row 4 -->
		<div class="row">
			<div class="col-sm-6 col-xs-12">
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
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Ngày rửa tội:</label>
					<div class="col-md-8 col-xs-8">
						<div class="input-group date datepicker"
							data-date-format="dd-mm-yyyy">
							<input class="form-control" type="text" readonly
								name="stuNgayRuaToi"> <span class="input-group-addon"><i
								class="glyphicon glyphicon-calendar"></i></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Tại Giáo Xứ:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" name="stuGXRuaToi" />
					</div>
				</div>
			</div>
		</div>

		<!-- Row 6 -->
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Ngày rước lễ:</label>
					<div class="col-md-8 col-xs-8">
						<div class="input-group date datepicker"
							data-date-format="dd-mm-yyyy">
							<input class="form-control" type="text" readonly
								name="stuNgayRuocLe"> <span class="input-group-addon"><i
								class="glyphicon glyphicon-calendar"></i></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Tại Giáo Xứ:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" name="stuGXRuocLe" />
					</div>
				</div>
			</div>
		</div>

		<!-- Row 7 -->
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Ngày thêm sức:</label>
					<div class="col-md-8 col-xs-8">
						<div class="input-group date datepicker"
							data-date-format="dd-mm-yyyy">
							<input class="form-control" type="text" readonly
								name="stuNgayThemSuc"> <span class="input-group-addon"><i
								class="glyphicon glyphicon-calendar"></i></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Tại Giáo Xứ:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" name="stuGXThemSuc" />
					</div>
				</div>
			</div>
		</div>

		<!-- Row 8 -->
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Tên Thánh:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control auto-TenThanh"
							autocomplete="on" name="TenThanhCha" />
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Họ và Tên Cha:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" name="HoTenCha" />
					</div>
				</div>
			</div>
		</div>

		<!-- Row 9 -->
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Số điện thoại cha:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" name="SDTCha" />
					</div>
				</div>
			</div>
		</div>

		<!-- Row 10 -->
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Tên Thánh:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control auto-TenThanh"
							autocomplete="on" name="TenThanhMe" />
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Họ và Tên Mẹ:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" name="HoTenMe" />
					</div>
				</div>
			</div>
		</div>

		<!-- Row 11 -->
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Số điện thoại mẹ:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" name="SDTMe" />
					</div>
				</div>
			</div>
		</div>

		<!-- Row 12 -->
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Địa chỉ:</label>
					<div class="col-md-8 col-xs-8">
						<textarea class="form-control" name="stuAddress"></textarea>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-12">
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
			<div class="col-sm-12 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-6 col-xs-6">Thêm đoàn sinh vào
						lớp <input type="checkbox" id="chkaddClass"><input type="hidden"
						id="valueHidden" name="isClass">
					</label>
				</div>
			</div>
		</div>

		<div id="addClass" style="display: none">
			<div class="row">
				<div class="col-sm-4 col-xs-6">
					<div class="form-group">
						<label class="control-label col-md-4 col-xs-4">Lớp:</label>
						<div class="col-md-8 col-xs-8">
							<select class="selectpicker form-control" name="malop">
							<?php foreach ($lop as $pd){?>
								<option value="<?php echo $pd['MaLop']?>"><?php echo $pd['MaLop']?></option>
							<?php }?>
							</select>
						</div>
					</div>
				</div>
				<div class="col-sm-4 col-xs-6">
					<div class="form-group">
						<label class="control-label col-md-4 col-xs-4">Chi đoàn:</label>
						<div class="col-md-8 col-xs-8">
							<select class="selectpicker form-control" name="machidoan">
							<?php foreach ($chidoan as $pd){?>
								<option value="<?php echo $pd['MaChiDoan']?>"><?php echo $pd['TenChiDoan']?></option>
							<?php }?>
							</select>
						</div>
					</div>
				</div>
				<div class="col-sm-4 col-xs-6">
					<div class="form-group">
						<label class="control-label col-md-4 col-xs-4">Đội:</label>
						<div class="col-md-8 col-xs-8">
							<select class="selectpicker form-control" name="madoi">
							<?php foreach ($doi as $pd){?>
								<option value="<?php echo $pd['MaDoi']?>"><?php echo $pd['TenDoi']?></option>
							<?php }?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6 col-xs-6"></div>
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<div class="col-md-offset-2 col-xs-offset-2">
						<input id="btn-reset" type="button" class="btn btn-primary"
							value="Xóa" />
						<button type="submit" class="btn btn-primary">Thêm mới</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

<script type='text/javascript'
	src="<?php echo base_url();?>public/backend/template/admin/js/custom-js.js"></script>
<script type='text/javascript'
	src="<?php echo base_url();?>public/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
    function BrowseServer() {
        var finder = new CKFinder();
        finder.baseUrl = '/upload/stu_images/';
        finder.selectActionFunction = SetFileField;
        finder.popup();
    }
    function SetFileField(fileUrl) {
        document.getElementById('Image').src = fileUrl;
        document.getElementById('stuImage').value = fileUrl;
    }
</script>