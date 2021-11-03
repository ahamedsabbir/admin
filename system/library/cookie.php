<?php
class cookie{ 
    public function __construct(){}
    public static function set($key,$value){
        setcookie($key, $value, time()+86400, "/");
    }
    public static function get($key){
        if(isset($_COOKIE[$key])){
            return $_COOKIE[$key];
        }else{
            return false;
        }
    }
    public static function check_cookie(){
        if(self::get("login") == false){
            self::destroy();
        }
    }
    public static function check_login(){
        if(self::get("login") == true){
            header("Location:".BASE_URL."publish_home_page_controller_class");
        }
    }
    public static function destroy(){
        setcookie("login", null, time()-3600, "/");
        setcookie("email", null, time()-3600, "/");
        setcookie("id", null, time()-3600, "/");
        setcookie("status", null, time()-3600, "/");
        setcookie("image", null, time()-3600, "/");
        setcookie("name", null, time()-3600, "/");
        //header("Location:".BASE_URL."publish_home_page_controller_class");
    }
}
?>