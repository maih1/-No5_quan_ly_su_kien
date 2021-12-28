<?php

include '../common/db.php';

$query = 'SELECT * FROM users';
$sql = $conn->prepare($query);
$sql->setFetchMode(PDO::FETCH_ASSOC);
$sql->execute();
$result = $sql->fetchAll();

if (isset($_POST['submit_button'])) {
    $res = "";
    if (isset($_POST['user_request'])) {
        $request = $_POST['user_request'];
        if (strlen($request) < 4) {
            echo "Hãy nhập login id tối thiểu 4 kí tự </br>";
            echo "<html><a href='../view/request_input.php'>Nhập lại</a></html>";
        } else {
            foreach ($result as $row) {
                if ($row['user_id'] != $request) {
                    $res = "false";
                } else {
                    $res = "true";
                    break;
                }
            }

            if ($res == "true") {
                try {
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $key = $_POST['user_request'];
                    $query_1 = "UPDATE admins SET admins.reset_password_token = UNIX_TIMESTAMP(now(6)) WHERE admins.login_id = '$key'";
                    $stmt = $conn->prepare($query_1);
                    $stmt->execute();
                    header('Location: ../view/login.php');
                    exit();
                } catch (Exception $ex) {
                    echo $query_1 . "<br>" . $ex->getMessage();
                }
            } else {
                echo "Login id không tồn tại trong hệ thống </br>";
                echo "<html><a href='../view/request_input.php'>Nhập lại</a></html>";
            }
        }
    }
}
?>