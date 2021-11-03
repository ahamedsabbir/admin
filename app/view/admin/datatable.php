<!doctype html>
<html class="no-js" lang="">
<head>
	<?php include('app/view/admin/page_part/head.php');?>	
</head>
<body>
	<?php include('app/view/admin/page_part/header.php');?>
	<?php include('app/view/admin/page_part/side_nav.php');?>
	
	<section class="py-2">
		<div class="container">
			<h3 class="py-1">sql Example</h3>
			<ul>
				<li>CREATE TABLE `user_login_info_table` ( `user_id` INT NOT NULL AUTO_INCREMENT , `user_name` VARCHAR(255) NOT NULL , `user_email` VARCHAR(255) NOT NULL , `user_password` VARCHAR(255) NOT NULL , `user_code` VARCHAR(255) NOT NULL , `user_status` INT NOT NULL DEFAULT '0' , `user_image` VARCHAR(255) NOT NULL DEFAULT 'logo.png' , `user_mobile` INT NOT NULL , PRIMARY KEY (`user_id`)) ENGINE = InnoDB;</li>
				<li>DROP TABLE `admin_login_info_table`, `user_login_info_table`;</li>
				<li>DROP TABLE user_login_info_table;</li>
				<li>DROP DATABASE mvc_style;</li>
				<li>ALTER TABLE `admin_login_info_table` ADD `assa` VARCHAR(255) NOT NULL AFTER `admin_level`;</li>
				<li>TRUNCATE admin_login_info_table;</li>
			</ul>
		</div>
	</section>
	
	<section class="py-2">
		<div class="container">
			<h3 class="py-1">Enter your sql
				<a href="<?php echo BASE_URL."database_controller_class/reset_all_table_method/"; ?>">
					<button class="btn btn-danger" onclick="confirm('It finish all data.')">Reset All Table</button>
				</a>
			</h3>
			<div class="row">
				<div class="col-md-12">
					<form class="form-horizontal" role="form" action="<?php echo BASE_URL."database_controller_class/sql_method/"; ?>" method="post">
					  <div class="form-group">
						  <textarea class="form-control" rows="5" name="sql"></textarea>
					  </div>
					  <div class="form-group">
						<div class="py-2">
						  <button type="submit" class="btn btn-info" onclick="confirm('Careful.')">Submit sql</button>
						  <b style="color:red;"> warning!!!</b>
						</div>
					  </div>
					</form>
				</div>
			</div>
		</div>
	</section>
	
	<?php include('app/view/admin/page_part/footer.php');?>
	<?php include('app/view/admin/page_part/script.php');?>
</body>
</html>