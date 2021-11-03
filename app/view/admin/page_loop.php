<!doctype html>
<html class="no-js" lang="">
<head>
	<?php include('app/view/admin/page_part/head.php');?>	
</head>
<body>
	<?php include('app/view/admin/page_part/header.php');?>
	<?php include('app/view/admin/page_part/side_nav.php');?>
	<section>
		<div class="container">
			<table class="table">
				<tr>
					<th>Icon</th>
					<th>name</th>
					<th>Font</th>
					<th>Title</th>
					<th></th>
				</tr>
<?php
if(isset($page_loop)){
	foreach($page_loop as $page_key => $page_value){
?>
		
				<tr>
					<td><img src="upload/<?php echo $page_value["page_icon"]; ?>" alt="" style="width:30px;"/></td>
					<td><?php echo $page_value["page_name"]; ?></td>
					<td><?php echo $page_value["page_font_awesome"]; ?></td>
					<td><?php echo $page_value["page_title"]; ?></td>
					<td>
						<a href="<?php echo BASE_URL."page_controller_class/update_page_function/".$page_value["page_id"]; ?>">Update</a>
					
					
					|| Delete</td>
				</tr>
		
		
<?php
	}
}
?>		
		
			</table>
		</div>
	</section>
	<?php include('app/view/admin/page_part/footer.php');?>
	<?php include('app/view/admin/page_part/script.php');?>
</body>
</html>