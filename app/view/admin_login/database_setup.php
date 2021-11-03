<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
</head>
<?php
if(isset($_POST['submit'])){
	$xml = simplexml_load_file("../admin/xml/database.xml");
	$db_name = $_POST['db_name'];
	$db_host = $_POST['db_host'];
	$db_user = $_POST['db_user'];
	$db_password = $_POST['db_password'];
	foreach($xml->database as $database){
		if($database["id"]=="admin"){
			$database->db_name = $db_name;
			$database->db_host = $db_host;
			$database->db_user = $db_user;
			$database->db_password = $db_password;
			break;
		}
	}
	file_put_contents("../admin/xml/database.xml", $xml->asXML());
	$db_con = new mysqli($db_host, $db_user, $db_password, $db_name);
	if(!$db_con->connect_errno){
		$index = str_replace("/app/view/admin_login/database_setup.php", "", $_SERVER["SCRIPT_NAME"]);
		header("location:".$index);
	}
}
?>
    <body>
        <div class="container">
            <section id="content">
                <form action="" method="post">
                    <h1>Database</h1>
                    <div>
						<h3>DB_NAME</h3>
                        <input type="text" value="" required="" name="db_name" placeholder=""/>
                    </div><br/>
                    <div>
						<h3>DB_HOST</h3>
                        <input type="text" value="" required="" name="db_host" placeholder=""/>
                    </div><br/>
                    <div>
						<h3>DB_USER</h3>
                        <input type="text" value="" required="" name="db_user" placeholder=""/>
                    </div><br/>
                    <div>
						<h3>DB_PASSWORD</h3>
                        <input type="text" value="" name="db_password" placeholder=""/>
                    </div><br/>
                    <div>
                        <input type="submit" value="submit" name="submit"/>
                    </div>
				</form>
            </section>
        </div>
    </body>
</html>