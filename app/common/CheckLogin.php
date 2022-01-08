<?php
    // Check login
    if(!(isset($_SESSION["check_user_pass"]) && $_SESSION["check_user_pass"] == true)) {
        header('Location:' . getUrl() . 'Login/welcome');
        exit;
    }

    delSessionEventAdd();
    
    // Get url 
    function getUrl() {
        $urls = explode("/", filter_var(trim($_SERVER['PHP_SELF'], "/")));
        $url = "/";
        for($i = 0; $i < count($urls)-1; $i++){
            $url = $url . $urls[$i] . "/";
        }
        return $url;
    }

    // Delete session of event add
    function delSessionEventAdd(){
        global $paths;

        if($paths[0] != "EventAdd" ){
            unset($_SESSION['ev_add_name']);
            unset($_SESSION['ev_add_slogan']);
            unset($_SESSION['ev_add_leader']);
            unset($_SESSION['ev_add_avatar']);
            unset($_SESSION['ev_add_name_avatar']);
            unset($_SESSION['ev_add_des']);
            unset($_SESSION['check-event-add-confirm']);
            unset($_SESSION['check-event-add-complete']);
        }
    }
?>
