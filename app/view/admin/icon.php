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
		 <div class="text-center"><h1>Icon Change</h1></div>
		 <div class="row">
			 <div class="col-md-8">
				<form role="form py-5" action="<?php echo BASE_URL."admin_user_interface_controller_class/icon_update_function/"; ?>" method="post" enctype="multipart/form-data">
					<div class="form-group py-2">
						<label for="icon">Icon Size(100*100)</label>
						<input type="file" class="form-control" id="icon" name="icon">
					</div>
						<button type="submit" class="btn btn-primary">Save Changes</button> Sure to change     
				</form>			 
			 </div>
<?php
foreach($user_interface->user_interface as $user_interface){
?>
			 <div class="col-md-4">
			 	<img src="upload/<?php echo $user_interface->icon; ?>" style="width:100px"/>
			 </div>
<?php
}
?>
		 </div>
	</div>  
</section> 
	<?php include('app/view/admin/page_part/footer.php');?>
	<?php include('app/view/admin/page_part/script.php');?>
</body>
</html>