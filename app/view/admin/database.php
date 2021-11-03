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
		 <div class="text-center"><h1>Database Management</h1></div>
		 <div class="row">
			 <div class="col-md-3"></div>
			 <div class="col-md-6">
<?php
foreach($database->database as $database){
?>
				<form role="form py-5" action="<?php echo BASE_URL."database_controller_class/database_update_after_login_function/"; ?>" method="post">
					<div class="form-group py-2">
						<label for="icon">DB_NAME</label>
						<input type="text" class="form-control" id="icon" name="db_name" value="<?php echo $database->db_name; ?>">

					</div>
					<div class="form-group py-2">
						<label for="icon">DB_HOST</label>
						<input type="text" class="form-control" id="icon" name="db_host" value="<?php echo $database->db_host; ?>">
					</div>
					<div class="form-group py-2">
						<label for="icon">DB_USER</label>
						<input type="text" class="form-control" id="icon" name="db_user" value="<?php echo $database->db_user; ?>">
					</div>
					<div class="form-group py-2">
						<label for="icon">DB_PASSWORD</label>
						<input type="text" class="form-control" id="icon" name="db_password" value="<?php echo $database->db_password; ?>">
					</div>
						<button type="submit" class="btn btn-primary">Save Changes</button><span style="color:red;"> Be sure to change</span>     
				</form>
<?php
}
?>
			 </div>
			 <div class="col-md-3"></div>
		</div>
	 </div>
</section>  
	<?php include('app/view/admin/page_part/footer.php');?>
	<?php include('app/view/admin/page_part/script.php');?>
</body>
</html>