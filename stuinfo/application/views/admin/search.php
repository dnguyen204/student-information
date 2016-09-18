<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="outter-wp">
	<!-- Search Form -->
	<form role="form">
		<!-- Search Field -->
		<div class="top-menu">
			<h1 class="text-center">Tìm kiếm thông tin <?php echo htmlspecialchars($_GET["id"]); ?></h1>
		</div>
		<div class="row">
			<div class="form-group">
				<div class="col-md-10 col-xs-10 col-md-offset-1 col-xs-offset-1">
					<div class="btn-group btn-group-sm" role="group">
						<div class="btn btn-default active">All</div>
						<div class="btn btn-default">Mã <?php echo htmlspecialchars($_GET["id"]); ?></div>
						<div class="btn btn-default">Họ và Tên</div>
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
							placeholder="Search" /> <span class="input-group-btn">
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

	<section>
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
						<tr>
							<td>1</td>
							<td>John</td>
							<td>Carter</td>
							<td><a><i class="glyphicon glyphicon-education"></i></a></td>
						</tr>						
					</tbody>
				</table>
			</div>
		</div>
	</section>
</div>

