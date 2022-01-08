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
        $userid = $payload["userid"];
        $description = $payload["description"];
        $avatar = $payload["avatar"];

        $udpate_user_query = $conn->prepare("UPDATE `users` SET `name` = '$name', `type` = '$type', `user_id` = '$userid', `avatar` = '$avatar', `description` = '$description', `updated` = NOW() WHERE `id` = $id");
        $udpate_user_query->execute();
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function getAll()
{
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM `users`");
    $stmt->execute();
    $data = [];
    $result = $stmt->fetchAll();
    return $result;
}

function getIdEnd()
{
    global $conn;
    $stmt = $conn->prepare("SELECT `id` FROM `users` ORDER BY `users`.`id` ASC");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_COLUMN);
    $length = count($data) - 1;
    $result = $data[$length];
    return $result;
}

function add()
{
    global $conn, $_type;
    $check_add = false;
    try {
        $stmt = $conn->prepare("INSERT INTO `users`(`type`, `name`, `user_id`, `avatar`, `description`)
            VALUES (:type, :name, :user_id, :avatar, :description)");

        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':avatar', $avatar);
        $stmt->bindParam(':description', $description);

        $type = $_type[$_SESSION['type']];
        $name = $_SESSION['name'];
        $user_id = $_SESSION['user_id'];
        $avatar = $_SESSION['nameAvatar'];
        $description = $_SESSION['description'];

        $stmt->execute();
        $check_add = true;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    return $check_add;
}

function userSearch($key, $phanloai) {
        global $conn, $classify;
        
        $key = "%".$key."%";
        if ($phanloai=="")
            $query = "SELECT * FROM users WHERE name LIKE :key OR description LIKE :key";
        else
            $query = "SELECT * FROM users WHERE (name LIKE :key OR description LIKE :key) AND type = :phanloai";
        $_query = $conn->prepare($query);
        $_query->bindParam(':phanloai', $phanloai);
        $_query->bindParam(':key', $key);
        $_query->execute();
        $result = $_query->fetchAll();
        
        return $result;
}

function userDel($id)
{
    global $conn;
    $sql = "DELETE FROM users WHERE id = :id";
    $del = $conn->prepare($sql);
    $del->bindParam(':id', $id);
    $del->execute();
}
