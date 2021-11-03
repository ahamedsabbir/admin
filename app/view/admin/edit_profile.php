<!doctype html>
<html class="no-js" lang="">
<head>
	<?php include('app/view/admin/page_part/head.php');?>	
</head>
<?php
if(isset($admin_info)){
	foreach($admin_info as $admin_key => $admin_value){
?>
<body>
	<?php include('app/view/admin/page_part/header.php');?>
	<?php include('app/view/admin/page_part/side_nav.php');?>
	<section>
		<div class="container py-5">
			<h2 class="text-center">Profile Edite</h2>
			<form role="form" action="<?php echo BASE_URL."admin_profile_controller_class/update_profile_function/"; ?>" method="post">
				<div class="form-group">
					<label for="admin_name">Name</label>
					<input type="text" class="form-control" name="admin_name" value="<?php echo $admin_value['admin_name']; ?>" placeholder="<?php echo $admin_value['admin_name']; ?>">
				</div>
				<div class="form-group py-2">
					<label for="admin_number">Mobile Number</label>
					<input type="text" class="form-control" name="admin_mobile" value="<?php echo $admin_value['admin_mobile']; ?>" placeholder="<?php echo $admin_value['admin_mobile']; ?>">
				</div>
					<button type="submit" class="btn btn-default" name="submit">Update</button>   
			</form>
		</div>
	</section>
	<?php include('app/view/admin/page_part/footer.php');?>
	<?php include('app/view/admin/page_part/script.php');?>
</body>
<?php
	}
}
?>
</html>