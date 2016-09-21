<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="outter-wp">
	<!-- Search Form -->
	<div class="top-menu">
		<h1 class="text-center">Thông tin <?php echo htmlspecialchars($_GET["id"]); ?></h1>
	</div>
	<form role="form">
		<div class="row">
	<?php foreach ($result as $row){?>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"><?php echo $row['TenThanh'].' '.$row['HovaDem'].' '.$row['Ten']?></h3>
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
											<td>Mã đoàn sinh:</td>
											<td><?php echo $row['MaDoanSinh']?></td>

											<td>Ngày sinh:</td>
											<td><?php echo date('d-m-Y', strtotime($row['NgaySinh']));?></td>
										</tr>
										<tr>
											<td>Giới tính:</td>
											<td><?php echo ($row['GioiTinh'])? 'Nam': 'Nữ' ?></td>

											<td></td>
											<td></td>
										</tr>
									
									<?php if($row['NgayRuaToi'] !== null){?>
									<tr>
											<td>Ngày rửa tội:<br />Rửa tội tại:
											</td>
											<td><?php echo date('d-m-Y', strtotime($row['NgayRuaToi']))?><br />
										<?php echo 'GX '.$row['GXRuaToi'];?></td>
										
										<?php if($row['NgayRuocLe'] !== null){?>									
											<td>Ngày rước lễ:<br />Rước lễ tại:
											</td>
											<td><?php echo date('d-m-Y', strtotime($row['NgayRuocLe']))?><br />
											<?php echo 'GX '.$row['GXRuocLe'];?></td>																		
										<?php }?>										
										</tr>
									<?php }?>
									
									
									
									<?php if($row['NgayThemSuc'] !== null){?>
									<tr>
											<td>Ngày thêm sức:<br />Thêm sức tại:
											</td>
											<td><?php echo date('d-m-Y', strtotime($row['NgayThemSuc']))?><br />
										<?php echo 'GX '.$row['GXThemSuc'];?></td>
											<td></td>
											<td></td>
										</tr>									
									<?php }?>
									
										<tr>
											<td>Tên Thánh:<br />Họ tên Cha:<br />SĐT:
											</td>
											<td><?php echo $row['TenThanhCha'].'<br/>'.$row['HoTenCha'].'<br/>'.$row['SDTCha']?></td>

											<td>Tên Thánh:<br />Họ tên Mẹ:<br />SĐT:
											</td>
											<td><?php echo $row['TenThanhMe'].'<br/>'.$row['HoTenMe'].'<br/>'.$row['SDTMe']?></td>
										</tr>
										<tr>
											<td>Địa chỉ:</td>
											<td><?php echo $row['DiaChi']?></td>

											<td>Ghi chú:</td>
											<td><?php echo $row['GhiChu']?></td>
										</tr>
										<tr>
											<td>Tình trạng:</td>
											<td><?php echo $row['TrangThai']?></td>
											<td></td>
											<td></td>
										</tr>

									</tbody>
								</table>

							</div>

						</div>
					</div>
					<div class="panel-footer">
						<a data-original-title="Broadcast Message" data-toggle="tooltip"
							type="button" class="btn btn-sm btn-primary"><i
							class="glyphicon glyphicon-envelope"></i></a> <span
							class="pull-right"> <a href="#"
							title="Chỉnh sửa thông tin đoàn sinh" data-toggle="tooltip"
							type="button" class="btn btn-sm btn-warning"><i
								class="glyphicon glyphicon-edit"></i></a> <a
							title="Xóa đoàn sinh" data-toggle="tooltip" type="button"
							class="btn btn-sm btn-danger"><i
								class="glyphicon glyphicon-remove"></i></a>
						</span>
					</div>

				</div>
			</div>
	<?php }?>
	
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Quá trình học tập</h3>
					</div>
					<div class="panel-body"></div>
				</div>
			</div>


		</div>
	</form>
</div>