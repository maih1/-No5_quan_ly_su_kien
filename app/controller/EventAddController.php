<?php
    // echo $_SERVER['REQUEST_URI'];
    $paths = explode("/", filter_var(trim($_SERVER['REQUEST_URI'], "/")));
    // printf($_SERVER['DOCUMENT_ROOT'].$paths[0].$paths[1]."/app/common/ErrorValidate.php");
    require_once $_SERVER['DOCUMENT_ROOT']."/".$paths[0]."/".$paths[1]."/app/common/ErrorValidate.php";
    // require_once "../common/ErrorValidate.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/".$paths[0]."/".$paths[1]."/app/model/EventAddModel.php";
    $add;
    $name = $slogan = $leader = $description = $avatar = null;
    // $check_avatar = false;
    
    // print_r($errors);
    function eventAddMain() {
        global $name, $slogan, $leader, $description, $avatar, $paths;
        global $errors, $check_avatar;

        $list_add = getAdd();
        // print_r($list_add);
        validate();
        // print_r($errors);
        // print_r(getError('name'));
        require_once $_SERVER['DOCUMENT_ROOT']."/".$paths[0]."/".$paths[1]."/app/view/EventAddInput.php";
    }

    function validate() {
        global $name, $slogan, $leader, $description, $avatar;
        global $errors, $check_avatar, $cou;

    $check_avatar = false;
    $cou = 0;
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            load($_POST); 

            if(empty($name)) {
                addError('name', 'Hãy nhập tên sự kiện');
            } elseif(strlen($name) == 100) {
                addError('name', 'Không nhập quá 100 ký tự');
            } else {
                $_SESSION['name'] = $name;
                // $cou += 1;

            }

            if(empty($slogan)) {
                addError('slogan', 'Hãy nhập slogan');
            } elseif(strlen($slogan) == 250) {
                addError('slogan', 'Không nhập quá 250 ký tự');
            } else {
                $_SESSION['slogan'] = $slogan;
            }

            if(empty($leader)) {
                addError('leader', 'Hãy nhập tên leader');
            } elseif(strlen($leader) == 250) {
                addError('leader', 'Không nhập quá 250 ký tự');
            } else {
                $_SESSION['leader'] = $leader;
            }

            if(empty($description)) {
                addError('description', 'Hãy nhập mô tả chi tiết');
            } elseif(strlen($description) == 1000) {
                addError('description', 'Không nhập quá 1000 ký tự');
            } else {
                $_SESSION['description'] = $description;
            }
            // print(!isset($_FILES["avatar"])); 
            if(empty($avatar) and $check_avatar == false) {
                addError('avatar', 'Hãy chọn avatar');
            } else {
                $_SESSION['avatar'] = $avatar;
                $check_avatar = true;
                $cou += 1;
                
            }
            // print_r($_FILES['avatar']['name']);
            // print_r($_FILES['avatar']);
            // print_r($check_avatar);
        // echo $check_avatar;
        echo $cou;

        }

    }

    function load($data) {
        global $name, $slogan, $leader, $description, $avatar;
        $name = test_input($data['name']);
        $slogan = test_input($data['slogan']);
        $leader = test_input($data['leader']);
        $description = test_input($data['description']);
        $avatar = test_input($_FILES['avatar']['name']);
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    // eventAddMain();
    
?>