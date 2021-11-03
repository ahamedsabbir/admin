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
	if(isset($upadet_post)){
		foreach($upadet_post as $post_key => $post_value){
?>
	<div class="container">	
		<h1 class="text-center">Update post</h1>
<script>
$(document).ready(function(){
	$('#show_date').datepicker();
});
</script>
	<form role="form" action="<?php echo BASE_URL."admin_blog_controller_class/update_post_function/".$post_value['blog_id'];?>" method="POST" enctype="multipart/form-data">
		
		
		<div class="form-group mb-3">
			<label for="">Upload Icon</label>
			<input type="file" class="form-control" name="blog_icon">
		</div>   
		<div class="form-group mb-3">
			<label for="">Select Category</label>

			<select class="form-control" name="category_id" value="<?php echo $post_value['category_id']; ?>">
<?php
if(isset($post_cat_name)){
    foreach($post_cat_name as $cat_key => $cat_value){
		if($cat_value['category_id'] == $post_value['category_id']){
			$selected = 'selected';
		}else{
			$selected = null;
		}
        echo "<option name='' value='{$cat_value['category_id']}' $selected>{$cat_value['category_name']}</option>";
    }
}            
?>
			</select>
		</div>
		<div class="form-group mb-3">
			<label for="">Post Title</label>
			<input type="text" class="form-control" name="blog_title" value="<?php echo $post_value['blog_title']; ?>" placeholder="<?php echo $post_value['blog_title']; ?>">
		</div>
		<div class="form-group mb-3">
			<label for="">Job Content</label>
			<textarea name="blog_content" id="content" class="form-control editor"><?php echo $post_value['blog_content']; ?></textarea>
		</div>
			<button type="submit" class="btn btn-primary btn-lg form-control" name="submit">Update</button>   
	</form>
<script>	
 CKEDITOR.replace( 'content', {
  height: 300,
  filebrowserUploadUrl: "<?php echo UPLOAD_FOLDER; ?>"
 });
</script>
	</div>
<?php
	}
}
?>
</section>
	<?php include('app/view/admin/page_part/footer.php');?>
	<?php include('app/view/admin/page_part/script.php');?>
</body>
</html>