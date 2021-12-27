<?php
    // echo $_SERVER['REQUEST_URI'];
    $paths = explode("/", filter_var(trim($_SERVER['REQUEST_URI'], "/")));
    $actual_link = $_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'];
    // $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    // echo $actual_link;
    // echo $_SERVER['REQUEST_URI'];
    // echo $_SERVER['HTTP_REFERER'];
    // printf($_SERVER['DOCUMENT_ROOT'].$paths[0].$paths[1]."/app/common/ErrorValidate.php");
    // require_once $_SERVER['DOCUMENT_ROOT']."/".$paths[0]."/".$paths[1]."/app/common/ErrorValidate.php";
    // require_once "../common/ErrorValidate.php";
    // require_once $_SERVER['DOCUMENT_ROOT']."/".$paths[0]."/".$paths[1]."/app/model/EventAddModel.php";
    require_once "./app/common/ErrorValidate.php";
    require_once "./app/model/EventAddModel.php";
    // require_once "../view/EventAddConfirm.php"
    $add;
    $name = $slogan = $leader = $description = $avatar = null;
    $check = 0;
    // $check_avatar = false;
    
    // print_r($errors);
    function main() {
        global $name, $slogan, $leader, $description, $avatar, $paths;
        global $errors, $check;

        $list_add = getAdd();
        // print_r($list_add);
        // echo 'sd';
        // eventInput();

        // require_once "./app/view/EventAddInput.php";

        // echo $check;
        // eventComfirm();
        // exit;
        // isComfirm($check, $name, $slogan, $leader, $description, $avatar);

        // print_r($errors);
        // print_r(getError('name'));
        // require_once $_SERVER['DOCUMENT_ROOT']."/".$paths[0]."/".$paths[1]."/app/view/EventAddInput.php";
        // require_once "./app/view/EventAddInput.php";
        // echo "<script type='text/javascript'>location.href = 'app/view/EventAddInput.php';</script>";
        // isComfirm($check, $name, $slogan, $leader, $description, $avatar);

    }

    function eventInput() {
        global $name, $slogan, $leader, $description, $avatar,$paths;
        global $errors, $check, $cou, $actual_link;

        // getValue($name);
        // echo $_SESSION['name'];
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            load($_POST); 

            if(empty($name)) {
                addError('name', 'Hãy nhập tên sự kiện');
            } elseif(strlen($name) == 100) {
                addError('name', 'Không nhập quá 100 ký tự');
            } else {
                $_SESSION['name'] = $name;
                $check++;
            }

            if(empty($slogan)) {
                addError('slogan', 'Hãy nhập slogan');
            } elseif(strlen($slogan) == 250) {
                addError('slogan', 'Không nhập quá 250 ký tự');
            } else {
                $_SESSION['slogan'] = $slogan;
                $check++;
            }

            if(empty($leader)) {
                addError('leader', 'Hãy nhập tên leader');
            } elseif(strlen($leader) == 250) {
                addError('leader', 'Không nhập quá 250 ký tự');
            } else {
                $_SESSION['leader'] = $leader;
                $check++;
            }

            if(empty($description)) {
                addError('description', 'Hãy nhập mô tả chi tiết');
            } elseif(strlen($description) == 1000) {
                addError('description', 'Không nhập quá 1000 ký tự');
            } else {
                $_SESSION['description'] = $description;
                $check++;
            }
            
            if(empty($avatar)) {
            // if(!file_exists($_FILES['avatar']['tmp_name']) || !is_uploaded_file($_FILES['avatar']['tmp_name'])) {
                addError('avatar', 'Hãy chọn avatar');
            } else {
                // print_r($_SESSION['avatar']) ;
                // print_r($_FILES["upload-file"]);
                $target_dir = "web/avatar/tmp/";
                $target_file   = $target_dir . basename($_FILES["upload-file"]["name"]);
                move_uploaded_file($_FILES["upload-file"]["tmp_name"], $target_file);
                $_SESSION['avatar'] =  $target_dir . $avatar;
                $_SESSION['nameAvatar'] = $avatar;
                // echo $_SESSION['avatar'];
                $check++;    
            }
        // getValue($name);
            echo (isset($_SESSION['name']));
            echo $_SESSION['nameAvatar'];
            // eventComfirm();
            // isComfirm($check);
            // echo "sffffffff";
            // isBackPage();
        }
        
        // header('Location: ./app/view/EventAddInput.php');
        require_once "./app/view/eventadd/EventAddInput.php";


        // exit;
        // return $check;

    }


    function eventComfirm(){
        global $name, $slogan, $leader, $description, $avatar,$paths;
        global $errors, $check, $cou, $actual_link;
        require_once "./app/view/eventadd/EventAddConfirm.php";
        // echo $_SERVER['HTTP_REFERER'];
        echo $_SESSION['leader'];
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // getValue($name);
        echo $_SESSION['leader'];
            if(isset($_POST['back-page'])) {
                
                header('Location: /web/No5_quan_ly_su_kien/?controller=EventAdd&action=eventInput');
            }
        }
        echo $_SESSION['leader'];
        
    }

    function load($data) {
        global $name, $slogan, $leader, $description, $avatar;
        $name = testInput($data['name']);
        $slogan = testInput($data['slogan']);
        $leader = testInput($data['leader']);
        $description = testInput($data['description']);
        $avatar = testInput($data['avatar']);
        // $avatar = testInput($_FILES['avatar']['name']);
    }

    function testInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    function isComfirm($check){
        if($check == 5) {
            // exit;
            // echo "<script type='text/javascript'>location.href = 'app/view/EventAddConfirm.php';</script>";
            // echo "<script type='text/javascript'>location.href = 'app/view/EventAddConfirm.php';</script>";
            // require_once "./app/view/EventAddConfirm.php";
            header('Location: ./app/view/eventadd/EventAddConfirm.php');
            // exit;
            // exit;
            // isBackPage();

        }
    }

    function isComfirms(){
        global $check;
        if ($check == 5 && isset($_POST['submit'])){
            $_SESSION["checkEventAdd"] = $check;
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                header('Location: /web/No5_quan_ly_su_kien/?controller=EventAdd&action=eventComfirm');
            }
        }
    }

    function isBackPage($name, $slogan, $leader, $description, $avatar){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            header('Location: /web/No5_quan_ly_su_kien/?controller=EventAdd&action=eventComfirm');

        }

    }

    function getValue($value, $nameValue){
        // global $name, $slogan, $leader, $description, $avatar;
        
        if(!empty($value)){
            echo $value;
            // echo 'tt';
        } elseif((isset($_SESSION['checkEventAdd']) && $_SESSION['checkEventAdd'] == 5) && isset($_SESSION[$nameValue])){
            // echo 'sada';
            echo $_SESSION[$nameValue]; 
        }
    }
    
?>