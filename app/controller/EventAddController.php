<?php
    require_once './app/common/CheckLogin.php';
    require_once "./app/common/ErrorValidate.php";
    require_once "./app/model/EventAddModel.php";
    
    $name = $slogan = $leader = $description = $avatar = null;
    $check = 0;

    function eventAddInput() {
        global $name, $slogan, $leader, $description, $avatar;
        global $check;
        unset($_SESSION['check-event-add-complete']);
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            load($_POST); 
            backhome();
            
            if(empty($name)) {
                $_SESSION['name'] = null;
                addError('name', 'Hãy nhập tên sự kiện');
            } elseif(strlen($name) == 100) {
                addError('name', 'Không nhập quá 100 ký tự');
            } else {
                $_SESSION['name'] = $name;
                $check++;
            }

            if(empty($slogan)) {
                $_SESSION['slogan'] = null;
                addError('slogan', 'Hãy nhập slogan');
            } elseif(strlen($slogan) == 250) {
                addError('slogan', 'Không nhập quá 250 ký tự');
            } else {
                $_SESSION['slogan'] = $slogan;
                $check++;
            }

            if(empty($leader)) {
                $_SESSION['leader'] = null;
                addError('leader', 'Hãy nhập tên leader');
            } elseif(strlen($leader) == 250) {
                addError('leader', 'Không nhập quá 250 ký tự');
            } else {
                $_SESSION['leader'] = $leader;
                $check++;
            }

            if(empty($description)) {
                $_SESSION['description'] = null;
                addError('description', 'Hãy nhập mô tả chi tiết');
            } elseif(strlen($description) == 1000) {
                addError('description', 'Không nhập quá 1000 ký tự');
            } else {
                $_SESSION['description'] = $description;
                $check++;
            }
            
            if(empty($avatar)) {
                $_SESSION['nameAvatar'] = null;
                addError('avatar', 'Hãy chọn avatar');
            } else {
                uploadAvatar();                  
            }
        }
        
        require_once "./app/view/event_add/EventAddInput.php";
    }


    function eventAddConfirm(){
        require_once "./app/view/event_add/EventAddConfirm.php";

        if(empty($_SESSION['name']) && empty($_SESSION['slogan']) 
        && empty($_SESSION['leader']) && empty($_SESSION['description'])
        && empty($_SESSION['nameAvatar']) && empty($_SESSION['avatar'])) {
            header('Location:' . getUrl(). 'EventAdd/eventAddInput');
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
       
            if(isset($_POST['back-page'])) {                
                header('Location:' . getUrl(). 'EventAdd/eventAddInput');
            }

            if(isset($_POST['submit-confirm'])) {
                if(isset($_SESSION['name']) && isset($_SESSION['slogan']) 
                && isset($_SESSION['leader']) && isset($_SESSION['description'])
                && isset($_SESSION['nameAvatar']) && isset($_SESSION['avatar'])) {
                    
                    $id = getIdEnd() + 1;
                    $target_dir = "web/avatar/event/".$id;
                    if(!file_exists($target_dir)){
                        mkdir($target_dir, 0777);
                    }
                    $tmp_file = $_SESSION['avatar'];
                    $target_file = $target_dir."/".basename($_SESSION['nameAvatar']);
                    rename($tmp_file, $target_file);
                    $_SESSION['avatar'] = $target_file;
                    $check_add = add();
                }
                
                $_SESSION['check-event-add-complete'] = $check_add;

                if($check_add){
                    unset($_SESSION['name']);
                    unset($_SESSION['slogan']);
                    unset($_SESSION['leader']);
                    unset($_SESSION['avatar']);
                    unset($_SESSION['nameAvatar']);
                    unset($_SESSION['description']);
                    unset($_SESSION['check-event-add-confirm']);
                    header('Location:' . getUrl(). 'EventAdd/EventAddComplete');
        }
            }
        }        
    }


    function eventAddComplete(){
        require_once "./app/view/event_add/EventAddComplete.php";
        
        if (!$_SESSION['check-event-add-complete']) {
            header('Location:' . getUrl(). 'EventAdd/eventAddInput');
        } 
    }


    function load($data) {
        global $name, $slogan, $leader, $description, $avatar;
        $name = testInput($data['name']);
        $slogan = testInput($data['slogan']);
        $leader = testInput($data['leader']);
        $description = testInput($data['description']);
        $avatar = testInput($data['avatar']);
    }


    function testInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    function isConfirm(){
        global $check;
        if ($check == 5 && isset($_POST['submit'])){
            $_SESSION['check-event-add-confirm'] = $check;
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                header('Location:' . getUrl(). 'EventAdd/eventAddConfirm');
            }
        }
    }


    function getValue($value, $nameValue){
        $res = null;
        if(!empty($value)){
            $res = $value;
        } elseif((isset($_SESSION['check-event-add-confirm']) && $_SESSION['check-event-add-confirm'] == 5) && isset($_SESSION[$nameValue])){
            $res =  $_SESSION[$nameValue]; 
        }

        echo $res;
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
    
            $target_dir = "web/avatar/event/tmp/";
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

        $allowtypes = array('image/jpg', 'image/jpeg', 'image/jfif', 'image/pjpeg', 'image/pjp', 'image/webp', 
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

    function backhome(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['back-home'])){
                header('Location:' . getUrl(). 'Login/home');
            }
        }
    }
?>