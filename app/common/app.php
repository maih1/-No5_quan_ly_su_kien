<?php
class App{

    protected $controller="ScheduleController";
    protected $action="show";
    protected $params=[];

    function __construct(){
 
        $arr = $this->UrlProcess();
        unset($arr[0]);

        // print_r($arr);

        // Controller
        if( file_exists("./app/controller/".$arr[1]."controller.php") ){
            $this->controller = $arr[1] . 'controller';
            unset($arr[1]);
        }
        require_once "./app/controller/". $this->controller .".php";
        $this->controller = new $this->controller;

        // Action
        if(isset($arr[2])){
            if( method_exists( $this->controller , $arr[2]) ){
                $this->action = $arr[2];
            }
            unset($arr[2]);
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