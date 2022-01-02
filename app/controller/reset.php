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
            $sql_1 = "UPDATE admins SET admins.password = '$new_password' WHERE admins.login_id = '$i';
                                UPDATE admins SET admins.reset_password_token = '' WHERE admins.login_id = '$i';";
            $stmt_1 = $conn->prepare($sql_1);
            $stmt_1->execute();
        } catch (Exception $ex) {
            echo $sql_1 . "<br>" . $ex->getMessage();
        }
    }
    $k++;
}
?>
