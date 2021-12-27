<?php
session_start();
// require_once "./app/Bridge.php";
// $myApp = new App();
// // echo $_SERVER['REQUEST_URI'];
// require_once "./app/controller/EventAddController.php";
// main();
$controllerName = ucfirst((($_REQUEST['controller']) ?? 'home'));
// echo $controllerName;
$actionName = $_REQUEST['action'] ?? 'main';
// echo $actionName;
require_once "./app/controller/${controllerName}.php";
$actionName();


// main();
        // echo $check;
        // eventComfirm();

?>