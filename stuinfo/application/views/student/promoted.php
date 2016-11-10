<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="outter-wp">
	<div class="top-menu">
		<h1 class="text-center">Xét lớp cuối năm</h1>
	</div>
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Danh sách đoàn sinh trong Phân đoàn</h3>
		</div>
		<div class="panel-body">
			<table class="table table-user-information">
				<tbody>
					<?php foreach ($count as $c){?>
					<tr data-toggle='collapse' data-target='#<?=$c['MaChiDoan']?>'>
						<td>Chi đoàn <?= $c['MaChiDoan'] ?></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td colspan='4' class='hiddenRow' style='padding: 0px !important;'><div
								id='<?=$c['MaChiDoan']?>' class='accordian-body collapse'>
								<table class='table table-user-information'>
									<tbody>
									<?php
        for ($i = 1; $i <= $c['result']; $i ++) {
            $child = $c['MaChiDoan'] . '-' . $i;
            $stt = 1;
            ?>
										<tr data-toggle='collapse' data-target='#<?=$child?>'>
											<td>Đội <?=$i?></td>
										</tr>
										<tr>
											<td colspan='2' class='hiddenRow'
												style='padding: 0px !important;'><div id='<?=$child?>'
													class='accordian-body collapse'>
													<table class='table table-user-information'>
														<thead>
															<tr>																
																<th>STT</th>
																<th>Mã Đoàn Sinh</th>
																<th>Tên Thánh</th>
																<th>Họ và Tên</th>
																<th>Trung bình</th>
																<th>Hạnh kiểm</th>
																<th>Nhận xét</th>
																<th>Kết quả</th>
															</tr>
														</thead>
														<tbody>
														<?php
            foreach ($doansinh as $ds) {
                if ($ds['MaDoi'] == $i && $ds['MaChiDoan'] == $c['MaChiDoan']) {
                    ?>
															<tr>																
																<td><?=$stt?></td>
																<td><?=$ds['MaDoanSinh']?></td>
																<td><?=$ds['TenThanh']?></td>
																<td><?=$ds['HovaDem'].' '.$ds['Ten']?></td>
																<td><?=$ds['TBCN']?></td>
																<td><?=$ds['HKCN']?></td>
																<td><?=$ds['NhanXetCN']?></td>
																<td></td>																
															</tr>
														<?php $stt++;}}?>
														</tbody>
													</table>
												</div></td>
										</tr>
									<?php }?>
									</tbody>
								</table>
							</div></td>
					</tr>
					<?php }?>
				</tbody>
			</table>
		</div>

	</div>
</div>