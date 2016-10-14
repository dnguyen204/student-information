<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Sửa thông tin đoàn sinh -->
<div class="outter-wp">
	<form id="form" class="form-horizontal" role="form"
		action="<?php echo base_url();?>index.php/admin/editstudent/updatestu"
		method="post">
		<div class="top-menu">
			<h1 class="text-center">Sửa thông tin đoàn sinh</h1>
		</div>

		<!-- Row 0 -->
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Ảnh Đoàn Sinh:</label>
					<div class="col-md-8 col-xs-8">
						<img id="Image"
							src="<?=base_url().$result_stuinfo[0]['HinhDoanSinh']?>" /> <input
							type="button" class="btn" value="Chọn" onclick="BrowseServer();" />
						<input type="hidden" id="stuImage" name="stuImage">
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Mã Đoàn Sinh:</label>

					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" readonly name="stuMa"
							value="<?php echo $result_stuinfo[0]['MaDoanSinh']?>" />
					</div>
				</div>
			</div>
		</div>

		<!-- Row 1 -->
		<div class="row">
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Tên Thánh:</label>

					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control auto-TenThanh"
							autocomplete="on" name="stuTenThanh"
							value="<?php echo $result_stuinfo[0]['TenThanh']?>" />
					</div>
				</div>
			</div>
		</div>

		<!-- Row 2 -->
		<div class="row">
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Họ và tên đệm:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" required
							name="stuLastName"
							value="<?php echo $result_stuinfo[0]['HovaDem']?>" />
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Tên:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" required
							name="stuFirstName"
							value="<?php echo $result_stuinfo[0]['Ten']?>" />
					</div>
				</div>
			</div>
		</div>

		<!-- Row 3 -->
		<div class="row">
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Giới tính:</label>
					<div class="col-md-8 col-xs-8">
						<div class="radio">
						<?php if ($result_stuinfo[0]['TenThanh']){ ?>
							<label><input type="radio" name="stuSex" value="1"
								checked="checked">Nam</label> <label><input type="radio"
								name="stuSex" value="0">Nữ</label>
						<?php }else{?>
							<label><input type="radio" name="stuSex" value="1">Nam</label> <label><input
								type="radio" name="stuSex" value="0" checked="checked">Nữ</label>
						<?php }?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Row 4 -->
		<div class="row">
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Ngày sinh:</label>
					<div class="col-md-8 col-xs-8">
						<div class="input-group date datepicker"
							data-date-format="dd-mm-yyyy">
							<input class="form-control" type="text" readonly name="stuDOB"
								value="<?php echo date('d-m-Y', strtotime($result_stuinfo[0]['NgaySinh']))?>">
							<span class="input-group-addon"><i
								class="glyphicon glyphicon-calendar"></i></span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Row 5 -->
		<div class="row">
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Ngày rửa tội:</label>
					<div class="col-md-8 col-xs-8">
						<div class="input-group date datepicker"
							data-date-format="dd-mm-yyyy">
							<input class="form-control" type="text" readonly
								name="stuNgayRuaToi"
								value="<?php echo date('d-m-Y', strtotime($result_stuinfo[0]['NgayRuaToi']))?>">
							<span class="input-group-addon"><i
								class="glyphicon glyphicon-calendar"></i></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Tại Giáo Xứ:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" name="stuGXRuaToi"
							value="<?php echo $result_stuinfo[0]['GXRuaToi']?>" />
					</div>
				</div>
			</div>
		</div>

		<!-- Row 6 -->
		<div class="row">
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Ngày rước lễ:</label>
					<div class="col-md-8 col-xs-8">
						<div class="input-group date datepicker"
							data-date-format="dd-mm-yyyy">
							<input class="form-control" type="text" readonly
								name="stuNgayRuocLe"
								value="<?php echo date('d-m-Y', strtotime($result_stuinfo[0]['NgayRuocLe']))?>">
							<span class="input-group-addon"><i
								class="glyphicon glyphicon-calendar"></i></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Tại Giáo Xứ:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" name="stuGXRuocLe"
							value="<?php echo $result_stuinfo[0]['GXRuocLe']?>" />
					</div>
				</div>
			</div>
		</div>

		<!-- Row 7 -->
		<div class="row">
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Ngày thêm sức:</label>
					<div class="col-md-8 col-xs-8">
						<div class="input-group date datepicker"
							data-date-format="dd-mm-yyyy">
							<input class="form-control" type="text" readonly
								name="stuNgayThemSuc"
								value="<?php echo date('d-m-Y', strtotime($result_stuinfo[0]['NgayThemSuc']))?>">
							<span class="input-group-addon"><i
								class="glyphicon glyphicon-calendar"></i></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Tại Giáo Xứ:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" name="stuGXThemSuc"
							value="<?php echo $result_stuinfo[0]['GXThemSuc']?>" />
					</div>
				</div>
			</div>
		</div>

		<!-- Row 8 -->
		<div class="row">
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Tên Thánh:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control auto-TenThanh"
							autocomplete="on" name="TenThanhCha"
							value="<?php echo $result_stuinfo[0]['TenThanhCha']?>" />
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Họ và Tên Cha:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" name="HoTenCha"
							value="<?php echo $result_stuinfo[0]['HoTenCha']?>" />
					</div>
				</div>
			</div>
		</div>

		<!-- Row 9 -->
		<div class="row">
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Số điện thoại cha:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" name="SDTCha"
							value="<?php echo $result_stuinfo[0]['SDTCha']?>" />
					</div>
				</div>
			</div>
		</div>

		<!-- Row 10 -->
		<div class="row">
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Tên Thánh:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control auto-TenThanh"
							autocomplete="on" name="TenThanhMe"
							value="<?php echo $result_stuinfo[0]['TenThanhMe']?>" />
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Họ và Tên Mẹ:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" name="HoTenMe"
							value="<?php echo $result_stuinfo[0]['HoTenMe']?>" />
					</div>
				</div>
			</div>
		</div>

		<!-- Row 11 -->
		<div class="row">
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Số điện thoại mẹ:</label>
					<div class="col-md-8 col-xs-8">
						<input type="text" class="form-control" name="SDTMe"
							value="<?php echo $result_stuinfo[0]['SDTMe']?>" />
					</div>
				</div>
			</div>
		</div>

		<!-- Row 12 -->
		<div class="row">
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Địa chỉ:</label>
					<div class="col-md-8 col-xs-8">
						<textarea class="form-control" name="stuAddress"><?php echo $result_stuinfo[0]['DiaChi']?></textarea>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<label class="control-label col-md-4 col-xs-4">Ghi chú:</label>
					<div class="col-md-8 col-xs-8">
						<textarea class="form-control" name="stuNote"><?php echo $result_stuinfo[0]['GhiChu']?></textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- Row 13 -->
		<div class="row">
			<div class="col-sm-6 col-xs-6"></div>
			<div class="col-sm-6 col-xs-6">
				<div class="form-group">
					<div class="col-md-offset-2 col-xs-offset-2">
						<input id="btn-close" type="button" class="btn btn-primary"
							value="Đóng" />
						<button type="submit" class="btn btn-primary">Cập nhật</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
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