<section id="mySidenav" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><span class="closestyle">&times;</span></a>
	  <div class="flex-shrink-0 p-3 bg-white">
		<a href="#" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
		  <span class="fs-5 fw-semibold"><i class="fas fa-th"></i> Menu</span>
		</a>
		<ul class="list-unstyled ps-0">
			<li class="mb-1">
			<button class="mb-1 btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#user-collapse" aria-expanded="false">User Control</button>
			<div class="collapse" id="user-collapse">
			  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
				<li><a href="<?php echo BASE_URL."user_login_page_controller_class/xml_data_show_method"?>" class="link-dark rounded">None approve</a><span class="badge bg-danger"> 1</span></li>
				<li><a href="<?php echo BASE_URL."user_loop_controller_class/user_loop_page_function/"?>" class="link-dark rounded">All user list</a></li>
			  </ul>
			</div>
		  </li>
		  <li class="mb-1">
			<button class="mb-1 btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">Admin Control</button>
			<div class="collapse" id="home-collapse">
			  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
				<li><a href="<?php echo BASE_URL."add_admin_controller_class/add_admin_page_function"?>" class="link-dark rounded">Add new</a></li>
				<li><a href="<?php echo BASE_URL."add_admin_controller_class/"?>" class="link-dark rounded">Admin list</a></li>
				<li><a href="<?php echo BASE_URL."add_admin_controller_class/"?>" class="link-dark rounded">Add Level</a></li>
			  </ul>
			</div>
		  </li>
		  <li class="mb-1">
			<button class="mb-1 btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#page_control" aria-expanded="false">Page Control</button>
			<div class="collapse" id="page_control">
			  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
				<li><a href="<?php echo BASE_URL."page_controller_class/create_page_function"?>" class="link-dark rounded">Add page</a></li>
				<li><a href="<?php echo BASE_URL."page_controller_class"?>" class="link-dark rounded">All page</a></li>
			  </ul>
			</div>
		  </li>
		  	<li class="border-top my-3"></li>
			<li class="fs-5 my-3">Post Controller</li>
		  <li class="mb-1">
			<button class="mb-1 btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#job-collapse" aria-expanded="false">Blog</button>
			<div class="collapse" id="job-collapse">
			  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
				<li><a href="<?php echo BASE_URL."admin_blog_controller_class/create_page_function"?>" class="link-dark rounded">Create post</a></li>
				<li><a href="<?php echo BASE_URL."admin_blog_controller_class"?>" class="link-dark rounded">All post</a><span class="badge bg-danger"><?php if(isset($total_blog_post)){echo $total_blog_post;} ?></span></li>
				<li><a href="<?php echo BASE_URL."admin_blog_controller_class/unapprove_post_page_function"?>" class="link-dark rounded">None approve</a><span class="badge bg-danger"> <?php if(isset($unapprove_post)){echo $unapprove_post;} ?></span></li>
				<li><a href="<?php echo BASE_URL."admin_blog_controller_class/add_category_page_function"?>" class="link-dark rounded">Add category</a></li>
				<li><a href="<?php echo BASE_URL."admin_blog_controller_class/category_page_function/"?>" class="link-dark rounded">All category</a></li>
			  </ul>
			</div>
		  </li>
		</ul>
	  </div>
</section> 
