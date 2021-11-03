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
?>
                <form action="<?php echo BASE_URL; ?>admin_login_controller_class/database_update_function" method="post">
                    <h1>Database</h1>
                    <div>
						<h3>DB_NAME</h3>
                        <input type="text" value="<?php echo $database->db_name; ?>" required="" name="db_name" placeholder="<?php echo $database->db_name; ?>"/>
                    </div><br/>
                    <div>
						<h3>DB_HOST</h3>
                        <input type="text" value="<?php echo $database->db_host; ?>" required="" name="db_host" placeholder="<?php echo $database->db_host; ?>"/>
                    </div><br/>
                    <div>
						<h3>DB_USER</h3>
                        <input type="text" value="<?php echo $database->db_user; ?>" required="" name="db_user" placeholder="<?php echo $database->db_user; ?>"/>
                    </div><br/>
                    <div>
						<h3>DB_PASSWORD</h3>
                        <input type="text" value="<?php echo $database->db_password; ?>" name="db_password" placeholder="<?php echo $database->db_password; ?>"/>
                    </div><br/>
                    <div>
                        <input type="submit" value="setup" name="setup"/>
                    </div>
				</form>
<?php
}
?>
            </section>
        </div>
    </body>
</html>