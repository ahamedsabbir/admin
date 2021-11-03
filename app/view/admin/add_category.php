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
			<h1 class="text-center">Category Add</h1>
			<form action="<?php echo BASE_URL."admin_blog_controller_class/add_category_function/"; ?>" method="post" class="form" enctype="multipart/form-data">
				<div class="form-group">
					<label for="category_sn">Category Serial</label>
					<input type="number" class="form-control" id="category_sn" name="category_sn">
				</div>
				<div class="form-group">
					<label for="category_name">Category Name</label>
					<input type="text" class="form-control" id="category_name" name="category_name">
				</div>
				<div class="form-group">
					<label for="category_title">Category Title:</label>
					<input type="text" class="form-control" id="category_title" name="category_title">
				</div>
				<div class="form-group">
					<label for="category_icon">Category Icon</label>
					<input type="file" class="form-control" id="category_icon" name="category_icon">
				</div>
				<div class="form-group">
					<label for="category_font_awesome">Category Font Awesome</label>
					<input type="text" class="form-control" id="category_font_awesome" name="category_font_awesome">
				</div>
					<button type="submit" class="btn btn-default">Submit</button>   
			</form>
		</div>
	</section>
	<?php include('app/view/admin/page_part/footer.php');?>
	<?php include('app/view/admin/page_part/script.php');?>
</body>
</html>