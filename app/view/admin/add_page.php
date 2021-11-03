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
			<h1 class="text-center">Page Add</h1>
			<form action="<?php echo BASE_URL."page_controller_class/insert_page_function/"; ?>" method="post" class="form" enctype="multipart/form-data">
				<div class="form-group">
					<label for="page_icon">Page Icon</label>
					<input type="file" class="form-control" id="page_icon" name="page_icon">
				</div>
				<div class="form-group">
					<label for="page_name">name</label>
					<input type="text" class="form-control" id="page_name" name="page_name">
				</div>
				<div class="form-group">
					<label for="page_font_awesome">Page Font Awesome</label>
					<input type="text" class="form-control" id="page_font_awesome" name="page_font_awesome">
				</div>
				<div class="form-group">
					<label for="page_title">Page Title</label>
					<input type="text" class="form-control" id="page_title" name="page_title">
				</div>
				<div class="form-group">
					<label for="page_content">Page Content</label>
					<textarea name="page_content" id="content" class="form-control editor"></textarea>
				</div>
					<button type="submit" class="btn btn-default">Submit</button>   
			</form>
		</div>
<script>	
 CKEDITOR.replace( 'content', {
  height: 300,
  filebrowserUploadUrl: "<?php echo UPLOAD_FOLDER; ?>"
 });
</script>
	</section>
	<?php include('app/view/admin/page_part/footer.php');?>
	<?php include('app/view/admin/page_part/script.php');?>
</body>
</html>