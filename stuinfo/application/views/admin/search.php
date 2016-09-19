<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="outter-wp">
	<!-- Search Form -->
	<form role="form" action="search/search" method="post">
		<!-- Search Field -->
		<div class="top-menu">
			<h1 class="text-center">Tìm kiếm thông tin <?php echo htmlspecialchars($_GET["id"]); ?></h1>
		</div>
		<div class="row">
			<div class="form-group">
				<div class="col-md-10 col-xs-10 col-md-offset-1 col-xs-offset-1">
					<div class="btn-group btn-group-sm" role="group">
						<label><input type="radio" id="search-all" class="btn btn-default" name="search-type" checked value="1"/>Tất cả</label>
						<label><input type="radio" id="search-id" class="btn btn-default" name="search-type" value="2"/>Mã <?php echo htmlspecialchars($_GET["id"]); ?></label>
						<label><input type="radio" id="search-name" class="btn btn-default" name="search-type" value="3"/>Họ và Tên</label>
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
							placeholder="Search" name="search-key" /> <span class="input-group-btn">
							<button class="btn btn-danger" type="button">
								<span class=" glyphicon glyphicon-search"></span>
							</button>
						</span>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!-- End of Search Form -->
	<?php if($result !== null){?>
	<section class="search-result">
		<div class="row">
			<div class="col-xs-1 col-sm-1 col-md-1"></div>
			<div class="col-xs-9 col-sm-9 col-md-9">
				<table class=" table table-responsive table-striped table-bordered">
					<thead>
						<tr>
							<th>Mã Đoàn Sinh</th>
							<th>Họ và tên đệm</th>
							<th>Tên</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($result as $row){?>
						<tr>
							<td><?php echo $row['MaDoanSinh'];?></td>
							<td><?php echo $row['HovaDem'];?></td>
							<td><?php echo $row['Ten'];?></td>
							<td><a title="Chi tiết"><i class="glyphicon glyphicon-education"></i></a></td>
						</tr>						
					<?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
	<?php }?>
</div>

