<?php
    require_once "./app/common/ErrorValidate.php";
    require_once "./app/model/EventAddModel.php";
    // $add;
    $name = $slogan = $leader = $description = $avatar = null;
    $check = 0;
    
    function main() {
        global $name, $slogan, $leader, $description, $avatar, $paths;
        global $errors, $check;

        $list_add = getAll();
    }

    function eventAddInput() {
        global $name, $slogan, $leader, $description, $avatar,$paths;
        global $errors, $check, $cou, $actual_link;
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            load($_POST); 
 
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
        
        require_once "./app/view/eventadd/EventAddInput.php";
        // require_once "./app/view/EventAddInput.php";
    }


    function eventAddComfirm(){
        global $name, $slogan, $leader, $description, $avatar,$paths;
        global $errors, $check, $cou, $actual_link;
        require_once "./app/view/eventadd/EventAddConfirm.php";

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
       
            if(isset($_POST['back-page'])) {                
                header('Location: /web/No5_quan_ly_su_kien/EventAdd/eventAddInput');
            }

            if(isset($_POST['submit-comfirm'])) {
                $id = getIdEnd() + 1;
                $target_dir = "web/avatar/".$id;
                if(!file_exists($target_dir)){
                    mkdir($target_dir, 0777);
                }
                $tmp_file = $_SESSION['avatar'];
                $target_file = $target_dir."/".basename($_SESSION['nameAvatar']);
                rename($tmp_file, $target_file);
                $_SESSION['avatar'] = $target_file;
                // getAll();
                add();
            }
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
    
    function isComfirm($check){
        if($check == 5) {
            header('Location: ./app/view/eventadd/EventAddConfirm.php');
        }
    }

    function isComfirms(){
        global $check;
        if ($check == 5 && isset($_POST['submit'])){
            $_SESSION["checkEventAdd"] = $check;
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                header('Location: /web/No5_quan_ly_su_kien/EventAdd/eventAddComfirm');
            }
        }
    }

    function isBackPage($name, $slogan, $leader, $description, $avatar){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            header('Location: /web/No5_quan_ly_su_kien/EventAdd/eventAddComfirm');
        }

    }

    function getValue($value, $nameValue){
        $res = null;
        if(!empty($value)){
            $res = $value;
        } elseif((isset($_SESSION['checkEventAdd']) && $_SESSION['checkEventAdd'] == 5) && isset($_SESSION[$nameValue])){
            $res =  $_SESSION[$nameValue]; 
        }

        echo $res;
    }

    function uploadAvatar(){
        global $avatar, $check;

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
    
?>