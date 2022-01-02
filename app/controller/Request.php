<?php

include '../model/Query.php';

$result = take_Users();

if (isset($_POST['submit_button'])) {
    $res = "";
    if (isset($_POST['user_request'])) {
        $request = $_POST['user_request'];
        if (strlen($request) < 4) {
            echo'<script>alert("Hãy nhập login id tối thiểu 4 kí tự")</script>';
            include '../view/request_input.php';
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
                    tick_RestPW_token($_POST['user_request']);
                    header('Location: ../view/login.php');
                    exit();
                } catch (Exception $ex) {
                    echo $query_1 . "<br>" . $ex->getMessage();
                }
            } else {
                echo'<script>alert("Login id không tồn tại trong hệ thống")</script>';
                include '../view/request_input.php';
            }
        }
    }
}
?>