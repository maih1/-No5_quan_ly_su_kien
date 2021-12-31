<?php
session_start();

// $paths = explode("/", filter_var(trim($_GET["url"], "/")));
// require_once "./app/controller/". $paths[0] ."Controller.php";
// $paths[1]($paths[2] ?? '');

$controllerName = ucfirst((($_REQUEST['controller']) ?? 'Home')."Controller");
// echo $controllerName;
$actionName = $_REQUEST['action'] ?? 'main';
// echo $actionName;
$id = $_REQUEST['id'] ?? '';

require_once "./app/controller/${controllerName}.php";
$actionName();

?>