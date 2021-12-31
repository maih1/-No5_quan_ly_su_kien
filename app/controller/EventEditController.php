<?php

require_once "./app/common/ErrorValidate.php";
require_once "./app/model/EventEditModel.php";


function eventEditInput(){
    require_once "./app/view/eventedit/EventEditInput.php";
}

function eventEditConfirm(){
    require_once "./app/view/eventedit/EventEditConfirm.php";
}

function eventEditComplete(){
    require_once "./app/view/eventedit/EventEditComplete.php";
}

function getUrl() {
    $urls = explode("/", filter_var(trim($_SERVER['PHP_SELF'], "/")));
    $url = "/";
    for($i = 0; $i < count($urls)-1; $i++){
        $url = $url . $urls[$i] . "/";
    }
    return $url;
}

function isComfirm(){
    global $check;
    if ($check == 5 && isset($_POST['submit'])){
        $_SESSION["checkEventAdd"] = $check;
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            header('Location:' . getUrl(). 'EventAdd/eventAddComfirm');
        }
    }
}

function uploadAvatar(){
    global $avatar, $check;
    if(checkFileUpload()){
        if(isset($_SESSION['avatar']) && isset($_SESSION['nameAvatar'])){
            if(!empty($_FILES["upload-file"]["name"]) &&
            $_SESSION['nameAvatar'] != basename($_FILES["upload-file"]["name"])){
                unlink($_SESSION['avatar']);
            }
        } 

        $target_dir = "web/avatar/tmp/";
        $target_file   = $target_dir . basename($_FILES["upload-file"]["name"]);
        
        move_uploaded_file($_FILES["upload-file"]["tmp_name"], $target_file);
        $_SESSION['avatar'] =  $target_dir . $avatar;
        $_SESSION['nameAvatar'] = $avatar;
        
        $check++; 
    }
}

function checkFileUpload(){
    $check_file = true;
    $maxfilesize = 524288000;

    $allowtypes = array('image/jpg', 'image/jpeg', 'image/jfif', 'image/pjpeg', 'image/pjp', 
                        'image/png', 'image/svg', 'image/ico', 'image/cur', 'image/gif', 'image/apng');
    
    if(file_exists($_FILES["upload-file"]["tmp_name"])){
        if($_FILES["upload-file"]['error'] != 0) {
            $check_file = false;
        }
        if ($_FILES["upload-file"]["size"] > $maxfilesize){
            $check_file = false;
        }
        if (!in_array($_FILES["upload-file"]["type"],$allowtypes )){
            $check_file = false;
        }
    }

    return $check_file;
}

?>