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
<table id="table_id" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
    <thead>
        <tr>
			<th>SN</th>
            <th>Category</th>
			<th>Date</th>
            <th>Title</th>
            <th>Status</th>
            <th>Watch</th>
            <th>Like</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>		
<?php
	$i = 1;
	foreach($post_loop as $post_key => $post_value){
		foreach($post_cat as $cat_key => $cat_value){
			if($post_value["category_id"] == $cat_value["category_id"]){
?>

        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $cat_value['category_name']; ?></td>
			<td><?php echo format::only_date($post_value['blog_date']); ?></td>
            <td><?php echo $post_value['blog_title']; ?></td>
            <td><?php echo $post_value['blog_status']; ?></td>
            <td><?php echo $post_value['total_watch']; ?></td>
            <td><?php echo $post_value['total_like']; ?></td>
            <td>
				<a href="<?php echo BASE_URL.'admin_blog_controller_class/update_post_page_function/'.$post_value['blog_id']; ?>">Update</a> ||
				<a href="">Delete</a>
			</td>
        </tr>		
<?php
			}
	}	
}		
?>
    </tbody>
</table>

			</div>
		</section>







	<?php include('app/view/admin/page_part/footer.php');?>
	<?php include('app/view/admin/page_part/script.php');?>
<script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
</body>
</html>