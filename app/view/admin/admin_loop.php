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
					<th>Name</th>
					<th>Email</th>
					<th>Mobile</th>
					<th>Level</th>
					<th>Code</th>
					<th></th>
				</tr>
<?php
if(isset($admin_loop)){
	foreach($admin_loop as $admin_key => $admin_value){
?>
		
				<tr>
					<td><?php echo $admin_value["admin_name"]; ?></td>
					<td><?php echo $admin_value["admin_email"]; ?></td>
					<td><?php echo $admin_value["admin_mobile"]; ?></td>
					<td><?php echo $admin_value["admin_level"]; ?></td>
					<td><?php echo $admin_value["admin_code"]; ?></td>
					<td>
						<a href="<?php echo BASE_URL."add_admin_controller_class/admin_asign_page_function/".$admin_value["admin_id"]; ?>">Profile</a> || 
						<a href="">Delete</a>
						</td>
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