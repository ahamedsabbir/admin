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
		 <div class="text-center"><h1>Settinges</h1></div>
<?php
foreach($user_interface->user_interface as $user_interface){
?>
		<form role="form py-5" action="<?php echo BASE_URL."admin_user_interface_controller_class/settinges_update_function/"; ?>" method="post">
			<div class="form-group py-2">
				<label for="page">Page Controller Class</label>
				<input type="text" class="form-control" id="page" value="<?php echo $user_interface->page; ?>" placeholder="<?php echo $user_interface->page; ?>" name="page">
			</div>
			<div class="form-group py-2">
				<label for="item">Post Loop Item</label><br/>
				<input type="number" class="form-control" id="item" value="<?php echo $user_interface->loop_item; ?>" placeholder="<?php echo $user_interface->loop_item; ?>" name="loop_item">
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