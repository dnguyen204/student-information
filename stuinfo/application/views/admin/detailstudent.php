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
	<?php foreach ($result_stuinfo as $row){?>
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
					<div class="panel-footer footer-student-detail">
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
					<div class="panel-body">
						<table class="table table-user-information"
							style="border-collapse: collapse;">
							<thead>
								<tr>
									<th>&nbsp;</th>
									<th>Năm học</th>
									<th>Ngành</th>
									<th>Phân đoàn</th>
									<th>Chi đoàn</th>
									<th>Đội</th>
									<th>HT phụ trách</th>
								</tr>
							</thead>
							<tbody>
							<?php if(count($result_process) > 0){ ?>
								<?php foreach ($result_process as $pro){?>
								<tr>
									<td><a class="btn btn-md" data-toggle="collapse"
										data-target="#<?php echo $pro['MaDoanSinh']?>"
										class="accordion-toggle" id="detail-process"> <i
											class="glyphicon glyphicon-chevron-right"></i></a></td>
									<td><?php echo $pro['NamBatDau'].' - '.$pro['NamKetThuc']?></td>
									<td><?php echo $pro['TenNganh']?></td>
									<td><?php echo $pro['TenPhanDoan']?></td>
									<td><?php echo $pro['TenChiDoan']?></td>
									<td><?php echo $pro['TenDoi']?></td>
									<td></td>
								</tr>
								<tr>
									<td colspan="12" class="hiddenRow"><div
											class="accordian-body collapse"
											id="<?php echo $pro['MaDoanSinh']?>">
											<table class="table table-user-information">
												<tbody>
													<tr>
														<td></td>
														<td>Miệng</td>
														<td>15 phút</td>
														<td>1 tiết</td>
														<td>Học kì</td>
														<td>Trung bình</td>
													</tr>
													<tr>
														<td>Điểm HKI</td>
														<td><?php echo $pro['MiengHKI']?></td>
														<td><?php echo $pro['KT15PhutHKI']?></td>
														<td><?php echo $pro['KT1TietHKI']?></td>
														<td><?php echo $pro['KTHK1']?></td>
														<td><?php echo $pro['TBHK1']?></td>
													</tr>
													<tr>
														<td>Điểm HKII</td>
														<td><?php echo $pro['MiengHKII']?></td>
														<td><?php echo $pro['KT15PhutHKII']?></td>
														<td><?php echo $pro['KT1TietHKII']?></td>
														<td><?php echo $pro['KTHK2']?></td>
														<td><?php echo $pro['TBHK2']?></td>
													</tr>
													<tr>
														<td>Cả năm</td>
														<td>Trung bình: <?php echo $pro['TBCN']?></td>
														<td>Học lực: <?php echo $pro['HLCN']?></td>
														<td>Hạnh kiểm: <?php echo $pro['HKCN']?></td>
														<td></td>
														<td><a href="#" title="In bảng điểm" data-toggle="tooltip"
															type="button" class="btn btn-sm btn-primary"><i
																class="glyphicon glyphicon-print"></i></a></td>
													</tr>
												</tbody>
											</table>
										</div></td>
								</tr>
								<?php }?>							
							<?php }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>


		</div>
	</form>
</div>