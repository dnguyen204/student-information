<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="outter-wp" id="summary-all">
	<div class="top-menu">
		<h1 class="text-center">Tổng kết cuối năm</h1>
	</div>
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Danh sách đoàn sinh</h3>
		</div>
		<div class="panel-body">
		<?php foreach ($count as $key=>$c){
		    $malop = '';
		?>
			<table class="table table-user-information"
				id="<?=$c['MaChiDoan'].$key?>">
				<tbody>
					<tr data-toggle='collapse' data-target='#<?=$c['MaChiDoan']?>'>
						<td>Chi đoàn <?= $c['MaChiDoan'] ?></td>
						<td colspan="8"></td>
					</tr>
					<tr>
						<td colspan='9' class='hiddenRow' style='padding: 0px !important;'><div
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
																<th>TB HKI</th>
																<th>TB HKII</th>
																<th>TB Cả Năm</th>
																<th>Hạnh kiểm</th>
																<th>Nhận xét</th>																
																<th>Kết quả</th>
															</tr>
														</thead>
														<tbody>
														<?php
        foreach ($doansinh as $ds) {
            $malop = $ds['MaLop'];
            if ($ds['MaDoi'] == $i && $ds['MaChiDoan'] == $c['MaChiDoan']) {
                ?>
															<tr>
																<td><?=$stt?></td>
																<td><?=$ds['MaDoanSinh']?></td>
																<td><?=$ds['TenThanh']?></td>
																<td><?=$ds['HovaDem'].' '.$ds['Ten']?></td>
																<td><?=$ds['TBHK1']?></td>
																<td><?=$ds['TBHK2']?></td>
																<td><?=$ds['TBCN']?></td>
																<td><?=$ds['HKCN']?></td>
																<td><?=$ds['NhanXetCN']?></td>
																<td><?=$ds['XetLop'] ? 'Lên lớp': 'Ở lại' ?></td>
															</tr>
															<!--<tr>
																<td colspan='8' class='hiddenRow'
																	style='padding: 0px !important;'><div
																		id='<?=$ds['MaDoanSinh']?>'
																		class='accordian-body collapse'>
																		<table class='table table-user-information'>
																			<thead>
																				<tr>
																					<th></th>
																					<th>Trung Bình</th>
																					<th>Học Lực</th>
																					<th>Hạnh Kiểm</th>
																					<th>Nhận xét</th>
																				</tr>
																			</thead>
																			<tbody>
																				<tr>
																					<td>Học Kỳ I</td>
																					<td><?=$ds['TBHK1']?></td>
																					<td><?=$ds['HLHK1']?></td>
																					<td><?=$ds['HKHK1']?></td>
																					<td><?=$ds['NhanXetHK1']?></td>
																				</tr>
																				<tr>
																					<td>Học Kỳ II</td>
																					<td><?=$ds['TBHK2']?></td>
																					<td><?=$ds['HLHK2']?></td>
																					<td><?=$ds['HKHK2']?></td>
																					<td><?=$ds['NhanXetHK2']?></td>
																				</tr>
																			</tbody>
																		</table>
																	</div></td>
															</tr>-->
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
					<tr style="border-top: none !important;">
						<td colspan="8"></td>
						<td align="right"><a
							title="In danh sách chi đoàn <?=$c['MaChiDoan']?>" type="button"
							class="btn btn-sm btn-info" onclick="printSummary('<?=$c['MaChiDoan'].$key?>','<?=$malop?>',<?=$c['MaChiDoan']?>,'<?=base_url()?>')"><i class="glyphicon glyphicon-print"></i></a></td>
					</tr>
				</tbody>
			</table>
			<?php }?>
		</div>
	</div>
</div>
<script type='text/javascript'
	src="<?php echo base_url();?>public/backend/template/print/js/printThis.js"></script>
<script type='text/javascript'
	src="<?php echo base_url();?>public/backend/template/print/js/print_summary_all.js"></script>
