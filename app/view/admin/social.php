<!doctype html>
<html class="no-js" lang="">
<head>
	<?php include('app/view/admin/page_part/head.php');?>	
</head>
<body>
	<?php include('app/view/admin/page_part/header.php');?>
	<?php include('app/view/admin/page_part/side_nav.php');?>
 <section class="py-5">
	 <div class="container emp-profile">
		 <div class="text-center"><h1>Social Link</h1></div>
<?php
foreach($user_interface->user_interface as $user_interface){
?>
		<form role="form py-5" action="<?php echo BASE_URL."admin_user_interface_controller_class/social_update_function/"; ?>" method="post">
			<div class="form-group py-2">
				<label for="facebook">Facebook Link</label>
				<input type="text" class="form-control" id="facebook" placeholder="<?php echo $user_interface->facebook; ?>" name="facebook" value="<?php echo $user_interface->facebook; ?>">
			</div>
			<div class="form-group py-2">
				<label for="twitter">Twitter Link</label>
				<input type="text" class="form-control" id="twitter" placeholder="<?php echo $user_interface->twitter; ?>" name="twitter" value="<?php echo $user_interface->twitter; ?>">
			</div>
			<div class="form-group py-2">
				<label for="linkedin">Linkedin Link</label>
				<input type="text" class="form-control" id="linkedin" placeholder="<?php echo $user_interface->linkedin; ?>" name="linkedin" value="<?php echo $user_interface->linkedin; ?>">
			</div>
			<div class="form-group py-2">
				<label for="youtube">Youtube Link</label>
				<input type="text" class="form-control" id="youtube" placeholder="<?php echo $user_interface->youtube; ?>" name="youtube" value="<?php echo $user_interface->youtube; ?>">
			</div>
			<div class="form-group py-2">
				<label for="instagram">Instagram Link</label>
				<input type="text" class="form-control" id="instagram" placeholder="<?php echo $user_interface->instagram; ?>" name="instagram" value="<?php echo $user_interface->instagram; ?>">
			</div>
				<button type="submit" class="btn btn-primary">Save Changes</button> Sure to change   
		</form>  
<?php
}
?>
	</div>  
</section> 
	<?php include('app/view/admin/page_part/footer.php');?>
	<?php include('app/view/admin/page_part/script.php');?>
</body>
</html>