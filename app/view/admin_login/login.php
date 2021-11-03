<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="app/view/admin_login/css/style.css" media="screen" />
</head>
    <body>
        <div class="container">
            <section id="content">
<?php
$database = simplexml_load_file("app/view/admin/xml/database.xml");
foreach($database->database as $database){
	$db = mysqli_connect($database->db_host, $database->db_user, $database->db_password, $database->db_name);
	$sql = "SELECT * FROM admin_login_info_table";
	$result = mysqli_query($db, $sql);
	$row = mysqli_num_rows($result);
	if($row == 0){
?>
			<a href="<?php echo BASE_URL."admin_login_controller_class/database_update_page_function";?>">Database Setup</a>
<?php
	}
}
?>
					<form action="<?php echo BASE_URL; ?>admin_login_controller_class/login_authention_function" method="post">
						<h1>Admin Login</h1>
						<div>
							<input type="text" placeholder="username" required="" name="admin_name"/>
						</div>
						<div>
							<input type="password" placeholder="password" required="" name="admin_password"/>
						</div>
						<div>
							<input type="submit" value="Login" name="login"/>
						</div>
					</form>
					<div class="button">
						<a href="<?php echo BASE_URL."admin_login_controller_class/signup_page_function";?>">Sign Up</a>
						<a href="<?php echo BASE_URL."admin_login_controller_class/forget_password_page_function/";?>">Forget Password</a>
					</div>
            </section>
        </div>
    </body>
</html>