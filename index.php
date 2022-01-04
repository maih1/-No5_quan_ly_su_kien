<?php
<<<<<<< HEAD
    session_start();

    $paths = explode("/", filter_var(trim($_GET["url"], "/")));
    require_once "./app/controller/". $paths[0] ."Controller.php";
    $paths[1]($paths[2] ?? '');
=======
session_start();

$paths = explode("/", filter_var(trim($_GET["url"], "/")));
require_once "./app/controller/". $paths[0] ."Controller.php";
$paths[1]($paths[2] ?? '');
>>>>>>> 95abc06530d83d1339c813e414c29c3a51a002b0
?>