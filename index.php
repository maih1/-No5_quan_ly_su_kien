<?php
session_start();
// require_once "./app/Bridge.php";
// $myApp = new App();
// // echo $_SERVER['REQUEST_URI'];
require_once "./app/controller/EventAddController.php";
eventAddMain();
?>