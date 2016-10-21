<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="outter-wp">
	<div class="top-menu">
		<h1 class="text-center">Thông tin cá nhân</h1>
	</div>
	<?php foreach ($profile as $pro){?>
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title"><?=$pro['TenThanh'].' '.$pro['HovaDem'].' '.$pro['Ten']?></h3>
		</div>

		<div class="panel-body">
			<div class="row">
				<div class="col-md-3 col-lg-3" align="center">
					<img alt="User Pic"
						src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png"
						class="img-circle img-responsive">
				</div>
				<div class="col-md-9 col-lg-9">
					<table class="table table-user-information">
						<tbody>
							<tr>
								<td>Mã huynh trưởng:</td>
								<td><?=$pro['MaHuynhTruong']?></td>

								<td>Ngày sinh:</td>
								<td><?=date('d-m-Y', strtotime($pro['NgaySinh']))?></td>
							</tr>
							<tr>
								<td>Giới tính:</td>
								<td><?=($pro['GioiTinh'])? 'Nam': 'Nữ' ?></td>

								<td>Ngày bổn mạng:</td>
								<td><?=$pro['NgayBonMang']?></td>
							</tr>
							<tr>
								<td>Điện thoại:</td>
								<td><?=$pro['DienThoai']?></td>

								<td>Email:</td>
								<td><?=$pro['Email']?></td>
							</tr>
							<tr>
								<td>Địa chỉ:</td>
								<td><?=$pro['DiaChi']?></td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="panel-footer footer-student-detail">
			<a id="editProfile" title="Chỉnh sửa thông tin cá nhân"
				data-toggle="collapse" data-target="#edit-info" type="button"
				class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
		</div>
	</div>
	<?php }?>
	<div id="edit-info" class="panel panel-info collapse">
		<form id="form-edit" role="form">
			<div class="row" style="margin-top: 10px">
				<div class="col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="control-label col-md-4 col-xs-4">Ảnh Huynh Trưởng:</label>
						<div class="col-md-8 col-xs-8">
							<img id="Image"
								src="<?=base_url().$profile[0]['HinhHuynhTruong']?>" /> <input
								type="button" class="btn" value="Chọn" onclick="BrowseServer();" />
							<input type="hidden" id="glvImage" name="glvImage">
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="control-label col-md-4 col-xs-4">Mã Huynh Trưởng:</label>

						<div class="col-md-8 col-xs-8">
							<input type="text" class="form-control" readonly name="glvcode"
								value="<?php echo $profile[0]['MaHuynhTruong']?>" />
						</div>
					</div>
				</div>
			</div>

			<!-- Row 1 -->
			<div class="row" style="margin-top: 10px">
				<div class="col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="control-label col-md-4 col-xs-4">Tên Thánh:</label>

						<div class="col-md-8 col-xs-8">
							<input type="text" class="form-control auto-TenThanh"
								autocomplete="on" name="glvTenThanh"
								value="<?php echo $profile[0]['TenThanh']?>" />
						</div>
					</div>
				</div>
			</div>

			<!-- Row 2 -->
			<div class="row" style="margin-top: 10px">
				<div class="col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="control-label col-md-4 col-xs-4">Họ và tên đệm:</label>
						<div class="col-md-8 col-xs-8">
							<input type="text" class="form-control" name="glvLastName"
								value="<?php echo $profile[0]['HovaDem']?>" />
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="control-label col-md-4 col-xs-4">Tên:</label>
						<div class="col-md-8 col-xs-8">
							<input type="text" class="form-control" name="glvFirstName"
								value="<?php echo $profile[0]['Ten']?>" />
						</div>
					</div>
				</div>
			</div>

			<!-- Row 3 -->
			<div class="row" style="margin-top: 10px">
				<div class="col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="control-label col-md-4 col-xs-4">Giới tính:</label>
						<div class="col-md-8 col-xs-8">
							<div class="radio">
						<?php if ($profile[0]['GioiTinh']){ ?>
							<label><input type="radio" name="stuSex" value="1"
									checked="checked">Nam</label> <label><input type="radio"
									name="glvSex" value="0">Nữ</label>
						<?php }else{?>
							<label><input type="radio" name="stuSex" value="1">Nam</label> <label><input
									type="radio" name="glvSex" value="0" checked="checked">Nữ</label>
						<?php }?>
						</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Row 4 -->
			<div class="row" style="margin-top: 10px">
				<div class="col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="control-label col-md-4 col-xs-4">Ngày sinh:</label>
						<div class="col-md-8 col-xs-8">
							<div class="input-group date datepicker"
								data-date-format="dd-mm-yyyy">
								<input class="form-control" type="text" readonly
									name="glvNgaySinh"
									value="<?php echo date('d-m-Y', strtotime($profile[0]['NgaySinh']))?>">
								<span class="input-group-addon"><i
									class="glyphicon glyphicon-calendar"></i></span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="control-label col-md-4 col-xs-4">Ngày bổn mạng:</label>
						<div class="col-md-8 col-xs-8">
							<input type="text" class="form-control" name="glvBonMang"
								value="<?php echo $profile[0]['NgayBonMang']?>" />
						</div>
					</div>
				</div>
			</div>
			<div class="row" style="margin-top: 10px">
				<div class="col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="control-label col-md-4 col-xs-4">Điện thoại:</label>
						<div class="col-md-8 col-xs-8">
							<input type="text" class="form-control" name="glvSDT"
								value="<?php echo $profile[0]['DienThoai']?>" />
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="control-label col-md-4 col-xs-4">Email:</label>
						<div class="col-md-8 col-xs-8">
							<input type="email" class="form-control" name="glvEmail"
								value="<?php echo $profile[0]['Email']?>" />
						</div>
					</div>
				</div>
			</div>
			<div class="row" style="margin-top: 10px">
				<div class="col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="control-label col-md-4 col-xs-4">Địa chỉ:</label>
						<div class="col-md-8 col-xs-8">
							<textarea class="form-control" name="glvDiaChi"><?php echo $profile[0]['DiaChi']?></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="row" style="margin-top: 10px">
				<input type="button"
					class="btn btn-danger col-sm-offset-8 col-xs-offset-8"
					id="update-info" value="Cập nhật thông tin">
			</div>
		</form>
	</div>
</div>

<script id="division_js" type='text/javascript'
	src="<?php echo base_url();?>public/backend/template/admin/custom_js/edit-profile.js"></script>
<script type='text/javascript'
	src="<?php echo base_url();?>public/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
    function BrowseServer() {
        var finder = new CKFinder();
        //finder.baseUrl = '/upload/stu_images/';
        finder.selectActionFunction = SetFileField;
        finder.popup();
    }
    function SetFileField(fileUrl) {
        document.getElementById('Image').src = fileUrl;
        document.getElementById('glvImage').value = fileUrl;
    }
</script>