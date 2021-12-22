<?php
class App{

    protected $controller="Home";
    protected $action="show";
    protected $params=[];

    function __construct(){
 
        $arr = $this->UrlProcess();
        // unset($arr[0]);

        // print_r($arr);

        // Controller
        if( file_exists("./app/controller/".$arr[0]."Controller.php") ){
            $this->controller = $arr[0] . 'Controller';
            unset($arr[0]);
        }
        require_once "./app/controller/". $this->controller .".php";
        $this->controller = new $this->controller;

        // Action
        if(isset($arr[1])){
            if( method_exists( $this->controller , $arr[1]) ){
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }

        // Params
        $this->params = $arr?array_values($arr):[];
        call_user_func_array([$this->controller, $this->action], $this->params );

        // echo "</br>" . $this->controller;
        // echo "</br>" . $this->action;
        // echo "</br>";
        // print_r($this->params);
    }

    function UrlProcess(){
        // if( isset($_SERVER['REQUEST_URI']) ){
        if( isset($_GET["url"]) ){
            return explode("/", filter_var(trim($_GET["url"], "/")));
            // return explode("/", filter_var(trim($_SERVER['REQUEST_URI'], "/")));
        }
    }

}
?>