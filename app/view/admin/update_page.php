<!doctype html>
<html class="no-js" lang="">
<head>
	<?php include('app/view/admin/page_part/head.php');?>	
</head>
<body>
	<?php include('app/view/admin/page_part/header.php');?>
	<?php include('app/view/admin/page_part/side_nav.php');?>
	<section class="py-5">
<?php 
if(isset($update_page)){
	foreach($update_page as $page_key => $page_value){
?>
		<div class="container">
			<h1 class="text-center">Update Page</h1>
			<form action="<?php echo BASE_URL."page_controller_class/update_function/".$page_value['page_id']; ?>" method="post" class="form" enctype="multipart/form-data">
				<div class="form-group">
					<label for="page_icon">Page Icon</label>
					<input type="file" class="form-control" id="page_icon" name="page_icon">
				</div>
				<div class="form-group">
					<label for="page_name">name</label>
					<input type="text" class="form-control" id="page_name" name="page_name" value="<?php echo $page_value['page_name']; ?>" placeholder="<?php echo $page_value['page_name']; ?>">
				</div>
				<div class="form-group">
					<label for="page_font_awesome">Page Font Awesome</label>
					<input type="text" class="form-control" id="page_font_awesome" name="page_font_awesome" value="<?php echo $page_value['page_font_awesome']; ?>" placeholder="<?php echo $page_value['page_font_awesome']; ?>">
				</div>
				<div class="form-group">
					<label for="page_title">Page Title</label>
					<input type="text" class="form-control" id="page_title" name="page_title" value="<?php echo $page_value['page_title']; ?>" placeholder="<?php echo $page_value['page_title']; ?>">
				</div>
				<div class="form-group">
					<label for="page_content">Page Content</label>
					<textarea name="page_content" id="content" class="form-control editor"><?php echo $page_value['page_content']; ?></textarea>
				</div>
					<button type="submit" class="btn btn-default">Update</button>   
			</form>
		</div>
<script>	
 CKEDITOR.replace( 'content', {
  height: 300,
  filebrowserUploadUrl: "<?php echo UPLOAD_FOLDER; ?>"
 });
</script>
<?php
	}
}
?>
	</section>
	<?php include('app/view/admin/page_part/footer.php');?>
	<?php include('app/view/admin/page_part/script.php');?>
</body>
</html>