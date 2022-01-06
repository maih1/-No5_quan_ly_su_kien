<?php
    function getUrl() {
        $urls = explode("/", filter_var(trim($_SERVER['PHP_SELF'], "/")));
        $url = "/";
        for($i = 0; $i < count($urls)-1; $i++){
            $url = $url . $urls[$i] . "/";
        }
        return $url;
    }

    if(!(isset($_SESSION["check_user_pass"]) && $_SESSION["check_user_pass"] == true)) {
        header('Location:' . getUrl() . 'Login/welcome');
        exit;
    }
?>
