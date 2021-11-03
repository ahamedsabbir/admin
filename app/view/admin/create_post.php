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
		<h1 class="text-center">Create post</h1>
	<form role="form" action="<?php echo BASE_URL."admin_blog_controller_class/create_post_function";?>" method="POST" enctype="multipart/form-data">
		
		
		<div class="form-group mb-3">
			<label for="">Upload Icon</label>
			<input type="file" class="form-control" name="blog_icon">
		</div>   
		<div class="form-group mb-3">
			<label for="">Select Category</label>

			<select class="form-control" name="category_id">
<?php
if(isset($post_cat_name)){
    foreach($post_cat_name as $key => $value){
        echo "<option name='' value='{$value['category_id']}'>{$value['category_name']}</option>";
    }
}            
?>
			</select>
		</div>
		<div class="form-group mb-3">
			<label for="">Post Title</label>
			<input type="text" class="form-control" name="blog_title">
		</div>
		<div class="form-group mb-3">
			<label for="">Job Content</label>
			<textarea name="blog_content" id="content" class="form-control editor"></textarea>
		</div>
			<button type="submit" class="btn btn-primary btn-lg form-control" name="submit">Submit</button>   
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