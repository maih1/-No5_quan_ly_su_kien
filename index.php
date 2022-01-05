<?php
session_start();
if(isset($_GET['url'])){
    
    $paths = explode("/", filter_var(trim($_GET["url"], "/")));
    require_once "./app/controller/". $paths[0] ."Controller.php";
    $paths[1]($paths[2] ?? '', $paths[3] ?? '');
    
} else {
    header('Location:Login/welcome');
}
?>