<?php

include '../model/Query.php';
$result = take_Name_ID();
$k = 1;
foreach ($result as $row) {
    if (isset($_POST["button_reset$k"])) {
        try {
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $i = $row["user_id"];
            $new_password = $_POST["input_reset$k"];
            $new_password = trim($new_password);

            if (strlen($new_password) < 6) {
                echo '<script>alert("Mật khẩu phải tối thiểu 6 kí tự")</script>';
                echo '<script>window.location="../view/reset_view.php";</script>';
            } else {
                resetPassWord($new_password, $i);
                header('Location: ../view/reset_view.php');
            }
        } catch (Exception $ex) {
            echo $sql_1 . "<br>" . $ex->getMessage();
        }
    }
    $k++;
}
?>



