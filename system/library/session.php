<?php
class session{ 
    public function __construct(){}
	
    public static function init(){
        session_start();
    }
	
    public static function set($key,$value){
        $_SESSION[$key] = $value;
    }
	
    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return false;
        }
    }
	
    public static function session_check(){
        //self::init();
        if(self::get("admin_login") == false){
            self::destroy();
        }
    }
	
    public static function login_chack(){
        //self::init();
        if(self::get("admin_login") == true){
            header("Location:".BASE_URL."admin_home_page_controller_class");
        }
    }
	
	public static function id(){
       //self::init();
		return session_id();
    }
	
    public static function destroy(){
		//self::init();
        session_destroy();
        header("Location:".BASE_URL."admin_login_controller_class");
    }
}
?>