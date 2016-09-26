<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="outter-wp">
	<!-- Search Form -->
	<form role="form" action="" method="get">
		<!-- Search Field -->
		<div class="top-menu">
			<h1 class="text-center">Tìm kiếm thông tin <?php echo htmlspecialchars($_GET["id"]); ?></h1>
		</div>
		<div class="row">
			<div class="form-group">
				<div class="col-md-10 col-xs-10 col-md-offset-1 col-xs-offset-1">
					<div class="btn-group btn-group-sm" role="group">
						<label><input type="radio" id="search-all" class="btn btn-default"
							name="type" checked value="1" />Tất cả</label> <label><input
							type="radio" id="search-id" class="btn btn-default" name="type"
							value="2" />Mã <?php echo htmlspecialchars($_GET["id"]); ?></label>
						<label><input type="radio" id="search-name"
							class="btn btn-default" name="type" value="3" />Họ và Tên</label>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-1 col-sm-1 col-md-1"></div>
			<div class="col-md-9 col-xs-9">
				<div id="custom-search-input">
					<div class="input-group">
						<input type="text" class="search-query form-control"
							placeholder="Search" name="key" /> <span class="input-group-btn">
							<button class="btn btn-danger" type="button" name="search">
								<span class=" glyphicon glyphicon-search"></span>
							</button>
						</span>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!-- End of Search Form -->
	<?php if(count($result) > 0 ){?>
	<section class="search-result">
		<div class="row">
			<div class="col-xs-11 col-sm-11 col-md-11">
				<table class=" table table-responsive table-striped table-bordered">
					<thead>
						<tr>
							<th>Mã <?php echo htmlspecialchars($_GET["id"]); ?></th>
							<th>Họ và tên đệm</th>
							<th>Tên</th>
							<th>Ngày sinh</th>
							<th>Địa chỉ</th>
							<th>Tình trạng</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($result as $r){?>
						<tr>
							<td><?php echo $r['MaDoanSinh'];?></td>
							<td><?php echo $r['HovaDem'];?></td>
							<td><?php echo $r['Ten'];?></td>
							<td><?php echo date('d-m-Y', strtotime($r['NgaySinh']));?></td>
							<td><?php echo $r['DiaChi'];?></td>
							<td><?php echo $r['TrangThai'];?></td>
							<td><a
								href="detailstudent?id=đoàn sinh&code=<?php echo $r['MaDoanSinh'];?>"
								title="Quá trình học"><i class="glyphicon glyphicon-education"></i></a></td>
							<td><a href="editstudent?code=<?php echo $r['MaDoanSinh'];?>" title="Chỉnh sửa"><i class="glyphicon glyphicon-edit"></i></a></td>
						</tr>						
					<?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
	<?php }?>
</div>

