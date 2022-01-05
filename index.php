<?php
session_start();
if(isset($_GET['url'])){
    $paths = explode("/", filter_var(trim($_GET["url"], "/")));
    $controller = $paths[0];
   // echo $controller;
    $function = $paths[1]  ?? '';
    require_once "./app/controller/". $controller ."Controller.php";
    $function($paths[2] ?? '', $paths[3] ?? '');
} else {
    header('Location:Login/login');   
}

?>