<!doctype html>
<html class="no-js" lang="">
<head>
	<?php include('app/view/admin/page_part/head.php');?>	
</head>
<body>
	<?php include('app/view/admin/page_part/header.php');?>
	<?php include('app/view/admin/page_part/side_nav.php');?>
	<section class="py-5">
		<div class="container">
			<h1 class="text-center">Add Admin</h1>
			<form action="<?php echo BASE_URL."add_admin_controller_class/add_admin_function/"; ?>" method="post" class="form">
				<div class="form-group">
					<label for="admin_name">Name</label>
					<input type="text" class="form-control" id="admin_name" name="admin_name">
				</div>
				<div class="form-group">
					<label for="admin_email">Email</label>
					<input type="eamil" class="form-control" id="admin_email" name="admin_email">
				</div>
				<div class="form-group">
					<label for="admin_mobile">Mobile</label>
					<input type="number" class="form-control" id="admin_mobile" name="admin_mobile">
				</div>
				<div class="form-group">
					<label for="admin_password">Password</label>
					<input type="password" class="form-control" id="admin_password" name="admin_password">
				</div>
					<button type="submit" class="btn btn-default">Add</button>   
			</form>
		</div>
	</section>
	<?php include('app/view/admin/page_part/footer.php');?>
	<?php include('app/view/admin/page_part/script.php');?>
</body>
</html>