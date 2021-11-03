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
		<h1 class="text-center py-3">Category list</h1>
		<table class="table table-bordered table-hover table-striped table-condensed">
			<tr>
				<th>SN</th>
				<th>Name</th>
				<th>Title</th>
				<th>Font</th>
				<th>Icon</th>
				<th>Action</th>
			<tr>
<?php
if(isset($post_cat)){
	foreach($post_cat as $cat_key => $cat_value){
?>
<form action="<?php echo BASE_URL."admin_blog_controller_class/update_category_function/".$cat_value["category_id"]; ?>" method="post" class="form" enctype="multipart/form-data">
	<tr>
		<td><input class="form-control" type="text" value="<?php echo $cat_value['category_sn']; ?>" placeholder="<?php echo $cat_value['category_sn']; ?>" name="category_sn" style="max-width:50px;"/></td>
		<td><input class="form-control" type="text" value="<?php echo $cat_value['category_name']; ?>" placeholder="<?php echo $cat_value['category_name']; ?>" name="category_name" style="max-width:200px;"/></td>
		<td><input class="form-control" type="text" value="<?php echo $cat_value['category_title']; ?>" placeholder="<?php echo $cat_value['category_title']; ?>" name="category_title" style="max-width:200px;"/></td>
		<td><input class="form-control" type="text" value="<?php echo $cat_value['category_font_awesome']; ?>" placeholder="<?php echo $cat_value['category_font_awesome']; ?>" name="category_font_awesome" style="max-width:200px;"/></td>
		<td>
			<img src="upload/<?php echo $cat_value['category_icon']; ?>" style="width:25px;"/>
			<label for="file-upload" class="custom-file-upload" title="file">
			<input id="file-upload" class="form-control" type="file" value="" placeholder="" name="category_icon" style="max-width:100px;"/></label>
		</td>
		<td>
			<span>
				<button type="submit" class="btn btn-success"><i class="fas fa-edit"></i></button>
				<a href="<?php echo BASE_URL.'admin_blog_controller_class/delete_cat_function/'.$cat_value['category_id']; ?>" class="btn btn-danger" ><i class="fas fa-trash"></i></a>
			</span>
		</td>
	</tr>
</form>
<?php
	}
}
?>
		</table>
	<div>
</section>

	<?php include('app/view/admin/page_part/footer.php');?>
	<?php include('app/view/admin/page_part/script.php');?>
</body>
</html>