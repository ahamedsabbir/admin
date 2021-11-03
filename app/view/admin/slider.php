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
		 <div class="text-center"><h1>Slider Change</h1></div>
			 <div class="row">
			 <div class="col-md-8">
				<form role="form py-5" action="<?php echo BASE_URL."admin_user_interface_controller_class/slider_update_function/"; ?>" method="post" enctype="multipart/form-data">
					<div class="form-group py-5">
						<label for="icon">Image Size(960*280)</label>
						<input type="file" class="form-control" id="icon" name="slider_one">
						
					</div>
					<div class="form-group py-3">
						<label for="icon">Image Size(960*280)</label>
						<input type="file" class="form-control" id="icon" name="slider_two">
					</div>
					<div class="form-group py-5">
						<label for="icon">Image Size(960*280)</label>
						<input type="file" class="form-control" id="icon" name="slider_three">
					</div>
						<button type="submit" class="btn btn-primary">Save Changes</button> Sure to change     
				</form> 
			 </div>
<?php
foreach($user_interface->user_interface as $user_interface){
?>
			 <div class="col-md-4">
			 Image 01
				<img src="upload/<?php echo $user_interface->slider_one; ?>" style="width:300px; height:150px;"/><br />
			Image 02
				<img src="upload/<?php echo $user_interface->slider_two; ?>" style="width:300px; height:150px;"/><br />
			Image 03
				<img src="upload/<?php echo $user_interface->slider_three; ?>" style="width:300px; height:150px;"/><br />
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