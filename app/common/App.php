<?php
class App{

    protected $controller="EventAddController";
    protected $action="display";
    protected $params=[];

    function __construct(){
 
        $arr = $this->UrlProcess();
        // unset($arr[0]);

        // print_r($arr);
        // print($arr[1]);
        // Controller
        if( file_exists("./app/controller/".$arr[0]."controller.php") ){
            $this->controller = $arr[0] . 'controller';
            unset($arr[0]);
        }

        require_once "./app/controller/". $this->controller .".php";
        $this->controller = new $this->controller;
        // print_r($arr);

        // Action
        if(isset($arr[1])){
            if( method_exists( $this->controller , $arr[1]) ){
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }

        // Params
        $this->params = $arr?array_values($arr):[];
        // print_r($arr);
        call_user_func_array([$this->controller, $this->action], $this->params );
        // var_dump($params);
    }

    function UrlProcess(){
        if( isset($_SERVER['REQUEST_URI']) ){
    //         print_r($_SERVER['REQUEST_URI']);

    //         if( isset($_GET["url"]) ){
    //             return explode("/", filter_var(trim($_GET["url"], "/")));
    //         // return explode("/", filter_var(trim($_GET["url"], "/")));
            return explode("/", filter_var(trim($_SERVER['REQUEST_URI'], "/")));
        }
    }

    // function UrlProcess(){
    //     if( isset($_GET["url"]) ){
    //         return explode("/", filter_var(trim($_GET["url"], "/")));
    //     }
    // }


}
?>