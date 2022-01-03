<?php
require_once "./app/model/UserEditModel.php";
$transfer_type = [0 => "Giáo viên", 1 => "Sinh viên", 2 => "Sinh viên cũ"];


function getUserDataController($id)
{
    $user = findUser($id);
    print $user["id"];
}

function updateUserController($id)
{
    $updateData = ["name" => "Nguyễn Tử Hoàng Minh"];
    updateUser($id, $updateData);
}

function getAllUserIds()
{
    $all_user_id_fromdb = getAllUserId();
    $all_user_id = array_map(function ($value) {
        return $value["user_id"];
    }, $all_user_id_fromdb);
    return $all_user_id;
}

function curUserValue($user)
{
    global $transfer_type;

    $return_value = $user;
    $return_value["type"] = $transfer_type[$return_value["type"]];
    return $return_value;
}

function userEditInput($id)
{
    global $transfer_type;

    $cur_user_value = findUser($id);

    require_once "app/view/UserEditInput.php";
}