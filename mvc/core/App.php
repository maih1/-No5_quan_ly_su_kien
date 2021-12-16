<?php
class App{

    protected $controller="Home";
    protected $action="show";
    protected $params=[];

    function __construct(){
 
        $arr = $this->UrlProcess();
        unset($arr[0]);
        unset($arr[1]);
        // print_r($arr);

        // Controller
        if( file_exists("./mvc/controllers/".$arr[2]."Controller.php") ){
            $this->controller = $arr[2] . 'Controller';
            unset($arr[2]);
        }
        require_once "./mvc/controllers/". $this->controller .".php";
        $this->controller = new $this->controller;

        // Action
        if(isset($arr[3])){
            if( method_exists( $this->controller , $arr[3]) ){
                $this->action = $arr[3];
            }
            unset($arr[3]);
        }

        // Params
        $this->params = $arr?array_values($arr):[];
        call_user_func_array([$this->controller, $this->action], $this->params );
        // var_dump($params);
    }

    function UrlProcess(){
        if( isset($_SERVER['REQUEST_URI']) ){
            // return explode("/", filter_var(trim($_GET["url"], "/")));
            return explode("/", filter_var(trim($_SERVER['REQUEST_URI'], "/")));
        }
    }

}
?>