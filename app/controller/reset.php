<?php

include '../common/db.php';
include '../view/Reset_view.php';
$k = 1;
foreach ($result as $row) {
    if (isset($_POST["button_reset$k"])) {
        try {
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $i = $row["user_id"];
            $new_password = $_POST["input_reset$k"];
            $new_password = trim($new_password);
            if (strlen($new_password) >= 6) {
                $sql_1 = "UPDATE admins SET admins.password = '$new_password' WHERE admins.login_id = '$i';
                                UPDATE admins SET admins.reset_password_token = '' WHERE admins.login_id = '$i';";
                $stmt_1 = $conn->prepare($sql_1);
                $stmt_1->execute();
            } else {
                echo '<script>alert("Mật khẩu phải tối thiểu 6 kí tự")</script>';
            }
        } catch (Exception $ex) {
            echo $sql_1 . "<br>" . $ex->getMessage();
        }
    }
    $k++;
}
?>
