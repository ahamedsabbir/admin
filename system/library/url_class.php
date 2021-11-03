<?php
class url_class{
    public $url;
    public $controller_path = 'app/controller/';
    public $controller_name = HOME_PAGE;
    public $controller_method_name = "main_page_function";
    public $controller_object;
    public function __construct(){
        $this->url = isset($_GET['url']) ? $_GET['url'] : NULL;
        if($this->url != NULL){
            $this->url = rtrim($this->url, '/');
            $this->url = explode('/', filter_var($this->url, FILTER_SANITIZE_URL));
        }else{
            unset($this->url);
        }        
      if(!isset($this->url[0])){
            include $this->controller_path.$this->controller_name.'.php';
            $this->controller_object = new $this->controller_name();
      }else{
            $this->controller_name = $this->url[0];
            $file_name = $this->controller_path.$this->controller_name.".php";
            if(file_exists($file_name)){
                include $file_name;
                if(class_exists($this->controller_name)){
                    $this->controller_object = new $this->controller_name();
                }else{
                    //header("Location: ".BASE_URL."page_404_controller_class");
                    echo "1";
                }
            }else{
                //header("Location: ".BASE_URL."page_404_controller_class");
                echo "2";
            }
        }
         if(isset($this->url[2])){
            $this->controller_method_name = $this->url[1];
             if(method_exists($this->controller_object, $this->controller_method_name)){
                $this->controller_object->{$this->controller_method_name}($this->url[2]);
             }else{
                //header("Location: ".BASE_URL."page_404_controller_class");
                 echo "3";
            }
         }else{
            if(isset($this->url[1])){
                $this->controller_method_name = $this->url[1];
                if(method_exists($this->controller_object, $this->controller_method_name)){
                   $this->controller_object->{$this->controller_method_name}();                                                               
                }else{
                    //header("Location: ".BASE_URL."page_404_controller_class");
                    echo "4";
                }
            }else{
                if(method_exists($this->controller_object, $this->controller_method_name)){
                   $this->controller_object->{$this->controller_method_name}();                   
                }else{
                    //header("Location: ".BASE_URL."page_404_controller_class");
                    echo "5";
                }
            }    
         }       
    }       
}
?>
    

        



