<?php
session_start();
if (isset($_GET['url'])) {
    if (!file_exists('web/avatar/user/tmp')) {
        mkdir('web/avatar/user/tmp', 0777);
    }
    if (!file_exists('web/avatar/event/tmp')) {
        mkdir('web/avatar/event/tmp', 0777);
    }
    $paths = explode("/", filter_var(trim($_GET["url"], "/")));

    if (isset($paths[1]) && $paths[1] == 'welcome' && (isset($_SESSION["check_user_pass"]) && $_SESSION["check_user_pass"] == true)) {
        header('Location:../Login/home');
    } else {
        require_once "./app/controller/" . $paths[0] . "Controller.php";
        $paths[1]($paths[2] ?? '', $paths[3] ?? '');
    }
} else {
    header('Location:Login/welcome');
}