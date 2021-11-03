<?php
/*
*Cash clear
*/
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache"); 
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
header("Cache-Control: max-age=2592000");
/*
*main path
*/
define("BASE_URL", "index.php?url=");
define("BASE_PATH", "app/view/");
/*
*database conncetion
*/
$database = simplexml_load_file("app/view/admin/xml/database.xml");
foreach($database->database as $database){
	define("DB_NAME", "{$database->db_name};charset=utf8");
	define("DB_HOST", "{$database->db_host}");
	define("DB_USER", "{$database->db_user}");
	define("DB_PASSWORD", "{$database->db_password}");
}
/*
*Page Info
*/
define("TITLE", "Admin Page Blog Site. ");
define("DESCRIPTION", "sabbir Blog Site. ");
define("KEYWORDS", "Blog Site, java tutorial, css tutorial, php tutorial, ");
define("AUTHOR", "Israt Ahamed Sabbir");
define("COPYRIGHT", "Israt Ahamed Sabbir");
define("LOGO", "logo.png");
/*
*Set Home page
*/
define("HOME_PAGE", "admin_home_page_controller_class");
define("LOOP_ITEM", 5);
define("ADMIN_CODE", "61b4a64be663682e8cb037d9719ad8cd");


















define('UPLOAD_FOLDER', BASE_URL."upload_controller_class/image_upload_method");
?>