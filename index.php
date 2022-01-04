<?php
session_start();

$paths = explode("/", filter_var(trim($_GET["url"], "/")));
require_once "./app/controller/". $paths[0] ."Controller.php";
$paths[1]($paths[2] ?? '', $paths[3] ?? '');
?>