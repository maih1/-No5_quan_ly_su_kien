<?php
require_once "./app/common/DB.php";

// Find One User By Id
function findUser($id)
{
    global $conn;

    $get_user_query = $conn->prepare("SELECT * FROM `users` WHERE `users`.`id` = $id");
    $get_user_query->setFetchMode(PDO::FETCH_ASSOC);
    $get_user_query->execute();
    $user_from_db = $get_user_query->fetch();

    return $user_from_db;
}

// Get All User Id
function getAllUserId()
{
    global $conn;
    $get_all_user_id_query = $conn->prepare("SELECT `users`.`user_id` FROM `users`");
    $get_all_user_id_query->setFetchMode(PDO::FETCH_ASSOC);
    $get_all_user_id_query->execute();
    $all_users_id_from_db = $get_all_user_id_query->fetchAll();
    return $all_users_id_from_db;
}

// Count The Number Of User
function countUser()
{
    global $conn;
    $get_number_of_record = $conn->prepare("SELECT COUNT(*) AS `count_users` FROM `users`");
    $get_number_of_record->setFetchMode(PDO::FETCH_ASSOC);
    $get_number_of_record->execute();
    $get_count_user = $get_number_of_record->fetch();
    return $get_count_user;
}

// Update User, Need To Pass Id And Edited Data Of User
function updateUser($id, $payload)
{
    global $conn;

    try {
        $name = $payload["name"];
        $type = $payload["type"] ?? "";

        $udpate_user_query = $conn->prepare("UPDATE `users` SET `name` = '$name' WHERE `id` = $id");
        $udpate_user_query->execute();
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}