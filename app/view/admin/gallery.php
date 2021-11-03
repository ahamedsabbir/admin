<!doctype html>
<html class="no-js" lang="">
<head>
	<?php include('app/view/admin/page_part/head.php');?>	
</head>
<body>
	<?php include('app/view/admin/page_part/header.php');?>
	<?php include('app/view/admin/page_part/side_nav.php');?>
	<section>
<style>
.image_gallery {
    width: 100%;
    height: 200px;
    padding: 0;
    overflow: hidden;
}

.frame {
    width: 1000px;
    height: 800px;
    border: 1;
    -ms-transform: scale(0.25);
    -moz-transform: scale(0.25);
    -o-transform: scale(0.25);
    -webkit-transform: scale(0.25);
    transform: scale(0.25);

    -ms-transform-origin: 0 0;
    -moz-transform-origin: 0 0;
    -o-transform-origin: 0 0;
    -webkit-transform-origin: 0 0;
    transform-origin: 0 0;
}
</style>
		<div class="container text-center" style="min-height:500px;">
			<h1 class="py-5">Admin Image Gallery</h1>
				<div class="row">
<?php
$file_list = glob("upload/*.*");
	foreach($file_list as $file_name){
?>		
		<div class='col-md-3 py-2'>
			<div class="card">
			  <img src="<?php echo $file_name; ?>" class="card-img-top" alt="..." style="width:100%; height:200px;">
			  <div class="card-body">
				<a href="<?php echo BASE_URL.'admin_gallery_controller_class/image_delete_function/&image='.$file_name; ?>" class="btn btn-primary">Open</a>
				<a href="<?php echo BASE_URL.'admin_gallery_controller_class/image_delete_function/&image='.$file_name; ?>" class="btn btn-warning">Delete</a>
			  </div>
			</div>
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