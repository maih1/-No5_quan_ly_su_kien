<?php
session_start();
if(isset($_GET['url'])){
    $paths = explode("/", filter_var(trim($_GET["url"], "/")));
    $controller = $paths[0];
    $function = $paths[1]  ?? '';
} else {
    $controller = 'Login';
    $function = 'welcom';
}
require_once "./app/controller/". $controller ."Controller.php";

$function($paths[2] ?? '', $paths[3] ?? '');
?>