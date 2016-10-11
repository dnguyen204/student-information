<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="outter-wp">
	<form role="form" id="form">
		<div class="top-menu">
			<h1 class="text-center">Xếp lớp Đoàn Sinh mới</h1>
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-6">
				<div class="col-xs-12 col-md-12">
					<div class="col-xs-5 col-md-5">
						<select class="form-control">
							<option>- Chọn lớp -</option>
						</select>
					</div>
					<div class="col-xs-5 col-md-5">
						<select class="form-control">
							<option>- Chọn chi đoàn -</option>
						</select>
					</div>
					<div class="col-xs-2 col-md-2">
						<input type="button" class="btn btn-warning" value="Xem">
					</div>					
				</div>
				
				<div class="col-xs-12 col-md-12">
					<div class="panel panel-info" style="margin-top: 10px">
						<div class="panel-heading">
							<h3 class="panel-title">Đoàn sinh mới</h3>
						</div>
						<div class="panel-body tbl-phandoan">
							<table class="table table-user-information">
								<tbody>
								</tbody>
							</table>

						</div>
					</div>
				</div>
			</div>
		</div>

	</form>
</div>