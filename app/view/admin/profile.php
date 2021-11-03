<!doctype html>
<html class="no-js" lang="">
<head>
	<?php include('app/view/admin/page_part/head.php');?>	
</head>
<?php
if(isset($admin_info)){
	foreach($admin_info as $admin_key => $admin_value){
?>
<body>
	<?php include('app/view/admin/page_part/header.php');?>
	<?php include('app/view/admin/page_part/side_nav.php');?>
	
	
 <section class="py-5">
	<div class="container emp-profile">
	
                <div class="row">
                    <div class="col-md-3">
                        <div class="profile-img">
                            <img src="upload/<?php echo $admin_value['admin_image']; ?>" alt="" style="width:200px; height:200px;"/>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo session::get('admin_name'); ?>
                                    </h5>
                                    <h6>
                                        Web Developer and Designer
                                    </h6>
                                    <p class="proile-rating">Warning : Be care full for any change if you not know you consernet who know about it.Be care full for any chanBe care full for any change if you not know you consernet who know about itge if you not know you consernet who know about it</p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo BASE_URL; ?>admin_profile_controller_class/edite_profile_function"><button class="profile-edit-btn" >Edit Profile</button></a>
                    </div>
                </div>
				
                <div class="row">
                    <div class="col-md-3">
						<form role="form" action="<?php echo BASE_URL."admin_profile_controller_class/image_update_method/"; ?>" enctype="multipart/form-data" method="post">
							<input type="file" name="admin_image" class="py-1"/>
							<input type="submit" name="submit" value="Update" class="btn py-1"/>
						</form>
					</div>
                    <div class="col-md-9">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<div class="row">
									<div class="col-md-6">
										<label>User Id</label>
									</div>
									<div class="col-md-6">
										<p><?php echo $admin_value['admin_id']; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>Name</label>
									</div>
									<div class="col-md-6">
										<p><?php echo $admin_value['admin_name']; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>Email</label>
									</div>
									<div class="col-md-6">
										<p><?php echo $admin_value['admin_email']; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>Phone</label>
									</div>
									<div class="col-md-6">
										<p><?php echo $admin_value['admin_mobile']; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>Level</label>
									</div>
									<div class="col-md-6">
										<p><?php echo $admin_value['admin_level']; ?></p>
									</div>
								</div>
                            </div>
                        </div>
                    </div>
                </div>          
        </div>  
</section> 

	<?php include('app/view/admin/page_part/footer.php');?>
	<?php include('app/view/admin/page_part/script.php');?>
</body>
<?php
	}
}
?>
</html>