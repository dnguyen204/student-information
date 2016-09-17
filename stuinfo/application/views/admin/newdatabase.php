<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="outter-wp">
	<form class="form-horizontal" role="form" method="post" action="<?php echo base_url();?>index.php/admin/newdatabase/addDatabase">
		<div class="top-menu">
			<h1 class="text-center">Nhập dữ liệu database</h1>
		</div>
		<div class="btn-group">
		<button type="button" class="btn btn-info" id="add_tenthanh">Thêm Tên
			Thánh</button>
		<button type="button" class="btn btn-info" id="xetquyen">Xét quyền</button>		
	</div>

	<div id="add_data"></div>
	
	</form>	
</div>

<script type='text/javascript'
	src="<?php echo base_url();?>public/backend/template/admin/js/adddatabase.js"></script>