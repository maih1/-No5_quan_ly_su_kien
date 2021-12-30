<?php
    require_once "./app/common/ErrorValidate.php";
    require_once "./app/model/UserAddModel.php";
    
    $name = $type = $user_id = $description = $avatar = null;
    $check = 0;
    
    function getUrl() {
        $urls = explode("/", filter_var(trim($_SERVER['PHP_SELF'], "/")));
        $url = "/";
        for($i = 0; $i < count($urls)-1; $i++){
            $url = $url . $urls[$i] . "/";
        }
        return $url;
    }


    function userAddInput() {
        global $name, $type, $user_id, $description, $avatar;
        global $check;
        unset($_SESSION['check_add']);
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            load($_POST); 
 
            if(empty($name)) {
                $_SESSION['name'] = null;
                addError('name', 'Hãy nhập họ và tên');
            } elseif(strlen($name) >= 100) {
                addError('name', 'Không nhập quá 100 ký tự');
            } else {
                $_SESSION['name'] = $name;
                $check++;
            }

            if(empty($type)) {
                $_SESSION['type'] = null;
                addError('type', 'Hãy nhập slogan');
            }  else {
                $_SESSION['type'] = $type;
                $check++;
            }

            if(empty($user_id)) {
                $_SESSION['user_id'] = null;
                addError('user_id', 'Hãy nhập ID');
            } elseif(strlen($user_id) >= 10) {
                addError('leader', 'Không nhập quá 10 ký tự chữ hoặc số tiếng Anh');
            } else {
                $_SESSION['user_id'] = $user_id;
                $check++;
            }

            if(empty($description)) {
                $_SESSION['description'] = null;
                addError('description', 'Hãy nhập mô tả chi tiết');
            } elseif(strlen($description) >= 1000) {
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
        
        require_once "./app/view/useradd/UserAddInput.php";
    }


    function userAddConfirm(){
        require_once "./app/view/useradd/UserAddInput.php";

        if(empty($_SESSION['name']) && empty($_SESSION['type']) 
        && empty($_SESSION['user_id']) && empty($_SESSION['description'])
        && empty($_SESSION['nameAvatar']) && empty($_SESSION['avatar'])) {
            header('Location:' . getUrl(). 'UserAdd/userAddInput');
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
       
            if(isset($_POST['back-page'])) {                
                header('Location:' . getUrl(). 'UserAdd/userAddInput');
            }

            if(isset($_POST['submit-confirm'])) {
                if(isset($_SESSION['name']) && isset($_SESSION['type']) 
                && isset($_SESSION['user_id']) && isset($_SESSION['description'])
                && isset($_SESSION['nameAvatar']) && isset($_SESSION['avatar'])) {
                    
                    $id = getIdEnd() + 1;
                    $target_dir = "web/avatar/".$id;
                    if(!file_exists($target_dir)){
                        mkdir($target_dir, 0777);
                    }
                    $tmp_file = $_SESSION['avatar'];
                    $target_file = $target_dir."/".basename($_SESSION['nameAvatar']);
                    rename($tmp_file, $target_file);
                    $_SESSION['avatar'] = $target_file;
                    $check_add = add();
                }
                
                $_SESSION['check_add'] = $check_add;

                if($check_add){
                    unset($_SESSION['name']);
                    unset($_SESSION['type']);
                    unset($_SESSION['user_id']);
                    unset($_SESSION['avatar']);
                    unset($_SESSION['nameAvatar']);
                    unset($_SESSION['description']);
                    header('Location:' . getUrl(). 'UserAdd/UserAddComplete');
                }
            }
        }        
    }


    function userAddComplete(){
        require_once "./app/view/useradd/UserAddComplete.php";
        
        if (!$_SESSION['check_add']) {
            header('Location:' . getUrl(). 'UserAdd/userAddInput');
        } 
    }


    function load($data) {
        global $name, $type, $user_id, $description, $avatar;
        $name = testInput($data['name']);
        $type = testInput($data['type']);
        $user_id = testInput($data['user_id']);
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
            $_SESSION["checkUserAdd"] = $check;
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                header('Location:' . getUrl(). 'UserAdd/userAddConfirm');
            }
        }
    }


    function getValue($value, $nameValue){
        $res = null;
        if(!empty($value)){
            $res = $value;
        } elseif((isset($_SESSION['checkUserAdd']) && $_SESSION['checkUserAdd'] == 5) && isset($_SESSION[$nameValue])){
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