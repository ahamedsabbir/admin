<header>
	<nav class="container navbar navbar-dark navbar-expand-lg">
	  <div class="container-fluid">
		<a class="navbar-brand" href="#"><span onclick="openNav()"><i class="fas fa-th"></i></span></a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
			<li class="nav-item">
			  <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL.'user_blog_controller_class'?>"><i class="fab fa-fort-awesome"></i> Blog</a>
			</li>
			<li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				<i class="fas fa-table"></i> User Interface
			  </a>
			  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
				<li><a class="dropdown-item" href="<?php echo BASE_URL.'admin_user_interface_controller_class/gelneral_page_function'; ?>">Greneral</a></li>
				<li><a class="dropdown-item" href="<?php echo BASE_URL.'admin_user_interface_controller_class/icon_page_function'; ?>">Icon Change</a></li>
				<li><a class="dropdown-item" href="<?php echo BASE_URL.'admin_user_interface_controller_class/banner_page_function'; ?>">Banner Image</a></li>
				<li><a class="dropdown-item" href="<?php echo BASE_URL.'admin_user_interface_controller_class/slider_page_function'; ?>">Slider Image</a></li>
				<li><a class="dropdown-item" href="<?php echo BASE_URL.'admin_user_interface_controller_class/social_page_function'; ?>">Social Link</a></li>
				<li><hr class="dropdown-divider"></li>
				<li><a class="dropdown-item" href="<?php echo BASE_URL.'admin_user_interface_controller_class/settinges_page_function'; ?>">Settinges</a></li>
			  </ul>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo BASE_URL.'admin_contact_controller_class'?>" tabindex="-1"><i class="fas fa-inbox"></i> Inbox
            	<span class="badge bg-danger">
                	
<?php
if(isset($new_inbox)){   
echo $new_inbox;
}
?>
                </span>
			  </a>
			</li>
			  <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL.'admin_live_chat_controller_class/'?>" tabindex="-1"><i class="fas fa-fire"></i> Live Chat</a></li>
			  <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL.'database_controller_class/'?>" tabindex="-1"><i class="fas fa-database"></i> Database</a></li>
			  <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL.'database_controller_class/data_table_page_method/'?>" tabindex="-1"><i class="fas fa-table"></i> sql</a></li>
			  <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL."admin_gallery_controller_class/"?>" tabindex="-1"><i class="fab fa-envira"></i> Gallery</a></li>
		  </ul>
			<div class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				<img src="upload/<?php echo session::get("admin_image"); ?>" class="profileimg" style="width:25px; border-radius:3px;"/>
			  </a>
			  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
				<li><a class="dropdown-item" href="<?php echo BASE_URL.'admin_profile_controller_class/'; ?>">Profile</a></li>
				<li><a class="dropdown-item" href="<?php echo BASE_URL; ?>admin_profile_controller_class/edite_profile_function">Edite profile</a></li>
				<li><hr class="dropdown-divider"></li>
				<li><a class="dropdown-item" href="<?php echo BASE_URL."admin_login_controller_class/logOut/"; ?>">LogOut</a></li>
			  </ul>
			</div>
		</div>
	  </div>
	</nav>
</header>
