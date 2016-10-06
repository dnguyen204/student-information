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
				data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i
				class="glyphicon glyphicon-edit"></i></a>
		</div>
	</div>
	<?php }?>
</div>