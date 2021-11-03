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

<?php 
if(isset($admin_asign_profile)){
	foreach($admin_asign_profile as $admin_key => $admin_value){
?>
<form class="form" action="<?php echo BASE_URL.'add_admin_controller_class/admin_asign_function/'.$admin_value["admin_id"]; ?>" method="post">
	<table class="table table-striped table-condensed">
		<tr>
			<td colspan="4" align="center"><h3>User Level Assign</h3></td>
		</tr>
		<tr>
			<td align="center">Icon</td>
			<td align="center">Name</td>
			<td align="center"></td>
			<td align="center"></td>
		</tr>
		<tr>
			<td align="center"><img src="upload/<?php echo $admin_value['admin_image']; ?>" alt="" style="width:40px;"/></td>
			<td align="center"><?php echo $admin_value['admin_name']; ?></td>
			<td align="center">
				<select class="form-control"  name="admin_level">
<?php 
if(isset($admin_level_name)){
	foreach($admin_level_name as $level_key => $level_value){
		if($level_value['admin_level'] == $admin_value['admin_level']){
			$selected = "selected";
		}else{
			$selected = null;
		}
?>
				
					<option value="<?php echo $level_value['admin_level']; ?>" <?php echo $selected; ?> ><?php echo $level_value['admin_level_name']; ?></option>
<?php		
	}
}
?>
				</select>
			</td>
			<td align="center"><button type="submit" class="btn btn-default">Submit Level</button></td>
		</tr>
	</table>
</form>
<?php		
	}
}
?>
	
			
			
			
			
			
			
		</div>
	</section>
	<?php include('app/view/admin/page_part/footer.php');?>
	<?php include('app/view/admin/page_part/script.php');?>
</body>
</html>