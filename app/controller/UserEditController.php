<?php
require_once './app/common/CheckLogin.php';
require_once "./app/model/UserModel.php";
$transfer_type = [0 => "Sinh viên", 1 => "Giáo viên", 2 => "Sinh viên cũ"];
$id = $name = $userid = $type = $description = $avatar = null;
$cur_user_value = null;
$errors = ['name' => '', 'userid' => '', 'type' => '', 'avatar' => '', 'description' => ''];
$canSubmit = false;


// $pageRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && ($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' ||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache');
// if ($pageRefreshed == 1) {
//     unset($_SESSION['loaded']);
// }

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
}

if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
}

if (isset($_SESSION['type'])) {
    $type = $_SESSION['type'];
}

if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
}

if (isset($_SESSION['description'])) {
    $description = $_SESSION['description'];
}

if (isset($_SESSION['nameAvatar'])) {
    $avatar = $_SESSION['nameAvatar'];
}


// function updateUserController($id)
// {
//     $updateData = ["name" => "Nguyễn Tử Hoàng Minh"];
//     updateUser($id, $updateData);
// }


function getAllUserIds()
{
    $all_user_id_fromdb = getAllUserId();
    $all_user_id = array_map(function ($value) {
        return $value["user_id"];
    }, $all_user_id_fromdb);
    return $all_user_id;
}

// function curUserValue($user)
// {
//     global $transfer_type;

//     $return_value = $user;
//     $return_value["type"] = $transfer_type[$return_value["type"]];
//     return $return_value;
// }

function clearSession()
{
    session_unset();
}



function getDataFromForm($data)
{
    global $name, $userid, $type, $avatar, $description;
    $name = trim($data['name']);
    $userid = trim($data['userid']);
    $type = $data['type'];
    $description = $data['description'];
    $avatar = $data['avatar'];
}


function validateData()
{
    global $errors, $canSubmit;
    global $id, $name, $userid, $type, $avatar, $description;

    if (isset($name)) {
        if (strlen($name) == 0) {
            $errors['name'] = 'Hãy nhập họ và tên.';
        } else if (strlen($name) >= 100) {
            $errors['name'] = 'Không nhập quá 100 ký tự.';
        } else {
            $errors['name'] = '';
        }
    } else {
        $errors['name'] = 'Hãy nhập họ và tên';
    }


    if (isset($userid)) {
        if (strlen($userid) == 0) {
            $errors['userid'] = 'Hãy nhập id';
        } else if (!preg_match("/^[a-zA-Z0-9]{1,10}$/", $userid)) {
            $errors['userid'] = 'Chỉ nhập không quá 10 ký tự số hoặc tiếng Anh';
        } else if (in_array($userid, getAllUserIds()) && findUser($id)['user_id'] != $userid) {
            $errors['userid'] = 'User_Id này đã tồn tại trong db';
        } else {
            $errors['userid'] = '';
        }
    } else {
        $errors['userid'] = 'Hãy nhập id';
    }

    if (isset($type)) {
    } else {
        $errors['type'] = 'Hãy chọn phân loại';
    }

    if (isset($description)) {
        if (strlen($description) == 0) {
            $errors['description'] = 'Hãy nhập mô tả chi tiết';
        } else if (strlen($description) >= 1000) {
            $errors['description'] = 'Không nhập quá 1000 ký tự';
        } else {
            $errors['description'] = '';
        }
    } else {
        $errors['description'] = '';
    }
    if (isset($avatar)) {
        if (empty($avatar) || strlen($avatar) == 0) {
            $errors['avatar'] = 'Hãy chọn avatar';
        } else {
            uploadAvatar();
        }
    } else {
        $errors['avatar'] = 'Hãy chọn avatar';
    }

    foreach ($errors as $key => $value) {
        if ($value != '') {
            $canSubmit = false;
            break;
        } else {
            $canSubmit = true;
        }
    }
    $_SESSION['name'] = $name;
    $_SESSION['type'] = $type;
    $_SESSION['userid'] = $userid;
    $_SESSION['description'] = $description;

    if ($canSubmit) {
        header('Location: ' . getUrl() . "UserEdit/UserEditConfirm/$id");
    }
}

function checkFileUpload()
{
    $check_file = true;
    $maxfilesize = 524288000;

    $allowtypes = array(
        'image/jpg', 'image/jpeg', 'image/jfif', 'image/pjpeg', 'image/pjp',
        'image/png', 'image/svg', 'image/ico', 'image/cur', 'image/gif', 'image/apng'
    );

    if (file_exists($_FILES["upload-file"]["tmp_name"])) {
        if ($_FILES["upload-file"]['error'] != 0) {
            return false;
        }
        if ($_FILES["upload-file"]["size"] > $maxfilesize) {
            return false;
        }
        if (!in_array($_FILES["upload-file"]["type"], $allowtypes)) {
            return false;
        }
    }
    return true;
}


function checkExistAvatar()
{
    global $id, $avatar;
    $prefix = "../../";
    $ava_fromdb = "web/avatar/user/$id/" . checkRenderData($avatar, 'avatar');
    $ava_fromtmp = "web/avatar/user/tmp/" . checkRenderData($avatar, 'avatar');

    return file_exists($ava_fromdb) ? ($prefix . $ava_fromdb) : (file_exists($ava_fromtmp) ? ($prefix . $ava_fromtmp) : "");
}



function uploadAvatar()
{
    global $avatar, $errors;
    if (checkFileUpload()) {
        $errors['avatar'] = '';
        if (isset($_SESSION['avatar']) && isset($_SESSION['nameAvatar'])) {
            if (
                !empty($_FILES["upload-file"]["name"]) &&
                $_SESSION['nameAvatar'] != basename($_FILES["upload-file"]["name"])
            ) {
                unlink($_SESSION['avatar']);
            }
        }

        $target_dir = "web/avatar/user/tmp/";
        $target_file   = $target_dir . basename($_FILES["upload-file"]["name"]);

        move_uploaded_file($_FILES["upload-file"]["tmp_name"], $target_file);
        $_SESSION['avatar'] =  $target_dir . $avatar;
        // print $_SESSION['avatar'];
        $_SESSION['nameAvatar'] = $avatar;
    } else {
        $errors['avatar'] = 'Hình ảnh không hợp lệ';
    }
}

function checkRenderData($first, $type)
{
    global $cur_user_value;
    $check = $type == 'avatar' ? 'nameAvatar' : $type;
    return $first != null ? $first : ($cur_user_value != null ? $cur_user_value[$type] : (isset($_SESSION[$type]) ? $_SESSION[$type] : ""));
}

function userEditInput($inputid)
{
    global $transfer_type;
    global $cur_user_value;
    global $errors;
    global $id, $name, $type, $userid, $avatar, $description;

    if (!isset($_SESSION['loaded']) || !isset($_SESSION['id']) || $_SESSION['id'] != $inputid) {
        $_SESSION['id'] = $inputid;
        $id = $_SESSION['id'];
        $cur_user_value = findUser($inputid);
        $_SESSION['name'] = $cur_user_value['name'];
        $_SESSION['type'] = $cur_user_value['type'];
        $_SESSION['userid'] = $cur_user_value['user_id'];
        $_SESSION['description'] = $cur_user_value['description'];
        $_SESSION['nameAvatar'] = $cur_user_value['avatar'];

        $_SESSION['loaded'] = true;
        $name = $type = $userid = $description = null;
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['submit'])) {
            getDataFromForm($_POST);
            validateData();
        } else if (isset($_POST['edit-back'])) {
            header("Location: " . getUrl() . 'Login/home');
        }
    }

    require_once "app/view/user_edit/UserEditInput.php";
}

function userEditConfirm($id)
{
    global $transfer_type;
    global $avatar;
    if (!isset($_SESSION['name']) || !isset($_SESSION['type']) || !isset($_SESSION['userid']) || !isset($_SESSION['description'])) {
        header('Location: ' . getUrl() . "UserEdit/UserEditInput/$id");
    } else {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($_POST['submit'])) {
                $payload = ['name' => $_SESSION['name'], 'type' => $_SESSION['type'], 'userid' => $_SESSION['userid'], 'description' => $_SESSION['description'], 'avatar' => $_SESSION['nameAvatar']];
                $target_dir = "web/avatar/user/" . $id;
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777);
                }
                $tmp_file = $_SESSION['avatar'];
                $target_file = $target_dir . "/" . basename($_SESSION['nameAvatar']);
                rename($tmp_file, $target_file);
                $_SESSION['avatar'] = $target_file;

                updateUser($id, $payload);
                unset($_SESSION['name']);
                unset($_SESSION['type']);
                unset($_SESSION['userid']);
                unset($_SESSION['avatar']);
                unset($_SESSION['description']);
                unset($_SESSION['loaded']);
                header('Location: ' . getUrl() . "UserEdit/UserEditComplete");
            } else if (isset($_POST['back'])) {
                header('Location: ' . getUrl() . "UserEdit/UserEditInput/$id");
            }
        }
        require_once "app/view/user_edit/UserEditConfirm.php";
    }
}

function userEditComplete()
{
    $url = getUrl();
    require_once "app/view/user_edit/UserEditComplete.php";
}