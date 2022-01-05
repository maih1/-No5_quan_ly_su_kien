<?php
session_start();

$paths = explode("/", filter_var(trim($_GET["url"], "/")));
require_once "./app/controller/". $paths[0] ."Controller.php";
$paths[1]($paths[2] ?? '', $paths[3] ?? '');
//http://localhost/No5_quan_ly_su_kien-add-edit_schedule/EventTimelines/editSchedule/1/11
?>