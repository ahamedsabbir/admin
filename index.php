<?php
ob_start();
include_once "system/config.php";
spl_autoload_register(function($class_name){ 
    include_once "system/library/".$class_name.'.php';
});
$url_object = new url_class();
ob_end_flush();
?>