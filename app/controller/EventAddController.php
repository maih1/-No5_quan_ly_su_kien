<?php
    require_once './app/common/CheckLogin.php';
    require_once "./app/common/ErrorValidate.php";
    require_once "./app/model/EventsModel.php";
    
    $name = $slogan = $leader = $description = $avatar = null;
    $check = 0;

    // Check validate
    // add data to session
    function eventAddInput() {
        global $name, $slogan, $leader, $description, $avatar;
        global $check;
        unset($_SESSION['check-event-add-complete']);
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            load($_POST); 
            backhome();

            if(empty($name)) {
                $_SESSION['ev_add_name'] = null;
                addError('name', 'Hãy nhập tên sự kiện');
            } elseif(mb_strlen($name) > 100) {
                addError('name', 'Không nhập quá 100 ký tự');
            } else {
                $_SESSION['ev_add_name'] = $name;
                $check++;
            }

            if(empty($slogan)) {
                $_SESSION['ev_add_slogan'] = null;
                addError('slogan', 'Hãy nhập slogan');
            } elseif(mb_strlen($slogan) > 250) {
                addError('slogan', 'Không nhập quá 250 ký tự');
            } else {
                $_SESSION['ev_add_slogan'] = $slogan;
                $check++;
            }

            if(empty($leader)) {
                $_SESSION['ev_add_leader'] = null;
                addError('leader', 'Hãy nhập tên leader');
            } elseif(mb_strlen($leader) > 250) {
                addError('leader', 'Không nhập quá 250 ký tự');
            } else {
                $_SESSION['ev_add_leader'] = $leader;
                $check++;
            }

            if(empty($description)) {
                $_SESSION['ev_add_des'] = null;
                addError('description', 'Hãy nhập mô tả chi tiết');
            } elseif(mb_strlen($description) > 1000) {
                addError('description', 'Không nhập quá 1000 ký tự');
            } else {
                $_SESSION['ev_add_des'] = $description;
                $check++;
            }
            
            if(empty($avatar)) {
                $_SESSION['ev_add_name_avatar'] = null;
                addError('avatar', 'Hãy chọn avatar');
            } else {
                uploadAvatar();                  
            }
        }
        
        require_once "./app/view/event_add/EventAddInput.php";
    }


    // Check enough data for comfirm page
    // Check condition add to db
    function eventAddConfirm(){
        require_once "./app/view/event_add/EventAddConfirm.php";

        if(empty($_SESSION['ev_add_name']) && empty($_SESSION['ev_add_slogan']) 
        && empty($_SESSION['ev_add_leader']) && empty($_SESSION['ev_add_des'])
        && empty($_SESSION['ev_add_name_avatar']) && empty($_SESSION['ev_add_avatar'])) {
            header('Location:' . getUrl(). 'EventAdd/eventAddInput');
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
       
            if(isset($_POST['back-page'])) {                
                header('Location:' . getUrl(). 'EventAdd/eventAddInput');
            }

            if(isset($_POST['submit-confirm'])) {
                if(isset($_SESSION['ev_add_name']) && isset($_SESSION['ev_add_slogan']) 
                && isset($_SESSION['ev_add_leader']) && isset($_SESSION['ev_add_des'])
                && isset($_SESSION['ev_add_name_avatar']) && isset($_SESSION['ev_add_avatar'])) {
                    $check_add = add();
                    
                    $id = getIdEnd();
                    $target_dir = "web/avatar/event/".$id;
                    if(!file_exists($target_dir)){
                        mkdir($target_dir, 0777);
                    }
                    $tmp_file = $_SESSION['ev_add_avatar'];
                    $target_file = $target_dir."/".basename($_SESSION['ev_add_name_avatar']);
                    rename($tmp_file, $target_file);
                    chmod($target_file, 666);
                    $_SESSION['ev_add_avatar'] = $target_file;
                }
                
                $_SESSION['check-event-add-complete'] = $check_add;

                if($check_add){
                    unset($_SESSION['ev_add_name']);
                    unset($_SESSION['ev_add_slogan']);
                    unset($_SESSION['ev_add_leader']);
                    unset($_SESSION['ev_add_avatar']);
                    unset($_SESSION['ev_add_name_avatar']);
                    unset($_SESSION['ev_add_des']);
                    unset($_SESSION['check-event-add-confirm']);
                    header('Location:' . getUrl(). 'EventAdd/EventAddComplete');
        }
            }
        }        
    }


    // Complete add data
    function eventAddComplete(){
        require_once "./app/view/event_add/EventAddComplete.php";
        
        if (!$_SESSION['check-event-add-complete']) {
            header('Location:' . getUrl(). 'EventAdd/eventAddInput');
        } 
    }

    
    // Get data
    function load($data) {
        global $name, $slogan, $leader, $description, $avatar;
        $name = testInput($data['name']);
        $slogan = testInput($data['slogan']);
        $leader = testInput($data['leader']);
        $description = testInput($data['description']);
        $avatar = testInput($data['avatar']);
    }


    // Input data normalization
    function testInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    // Check the conditions to switch to the confirm  page
    function isConfirm(){
        global $check;
        if ($check == 5 && isset($_POST['submit'])){
            $_SESSION['check-event-add-confirm'] = $check;
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                header('Location:' . getUrl(). 'EventAdd/eventAddConfirm');
            }
        }
    }

    
    // Return data for input.value
    function getValue($value, $nameValue){
        $res = null;
        if(!empty($value)){
            $res = $value;
        } elseif((isset($_SESSION['check-event-add-confirm']) && $_SESSION['check-event-add-confirm'] == 5) && isset($_SESSION[$nameValue])){
            $res =  $_SESSION[$nameValue]; 
        }

        echo $res;
    }


    // Upload avatar
    function uploadAvatar(){
        global $avatar, $check;
        if(checkFileUpload()){
            if(isset($_SESSION['ev_add_avatar']) && isset($_SESSION['ev_add_name_avatar'])){
                if(!empty($_FILES["upload-file"]["name"]) &&
                $_SESSION['ev_add_name_avatar'] != basename($_FILES["upload-file"]["name"])){
                    unlink($_SESSION['ev_add_avatar']);
                }
            } 
    
            $target_dir = "web/avatar/event/tmp/";
            $target_file   = $target_dir . basename($_FILES["upload-file"]["name"]);
            chmod($target_dir, 666);
            
            move_uploaded_file($_FILES["upload-file"]["tmp_name"], $target_file);
            $_SESSION['ev_add_avatar'] =  $target_dir . $avatar;
            $_SESSION['ev_add_name_avatar'] = $avatar;
            
            $check++; 
        }
    }


    // Check conditions upload avatar
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

    
    // Back home page
    function backhome(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['back-home'])){
                header('Location:' . getUrl(). 'Login/home');
            }
        }
    }
?>