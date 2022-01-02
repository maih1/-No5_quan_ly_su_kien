<?php

include '../common/db.php';

function take_Name_ID() {
    global $conn;
    $query = 'SELECT users.name, users.user_id  FROM users INNER JOIN admins ON admins.login_id = users.user_id WHERE admins.login_id = users.user_id AND admins.reset_password_token <> ""';
    $sql = $conn->prepare($query);
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    $sql->execute();
    $result = $sql->fetchAll();
    return $result;
}

function resetPassWord($new_password, $i) {
    global $conn;
    $sql = "UPDATE admins SET admins.password = MD5('$new_password') WHERE admins.login_id = '$i';
            UPDATE admins SET admins.reset_password_token = '' WHERE admins.login_id = '$i';";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function take_Users() {
    global $conn;
    $query = 'SELECT * FROM users';
    $sql = $conn->prepare($query);
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    $sql->execute();
    $result = $sql->fetchAll();
    return $result;
}

function tick_RestPW_token($user_request) {
    global $conn;
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "UPDATE admins SET admins.reset_password_token = UNIX_TIMESTAMP(now(6)) WHERE admins.login_id = '$user_request'";
    $stmt = $conn->prepare($query);
    $stmt->execute();
}


?>