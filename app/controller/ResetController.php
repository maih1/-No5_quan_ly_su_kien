<?php

require_once './app/model/ResetModel.php';
function resets()
{
    $result = take_Name_ID();

    $k = 1;
    foreach ($result as $row) {
        if (isset($_POST["button_reset$k"])) {

            $i = $row["login_id"];
            $new_password = $_POST["input_reset$k"];

            $validate = [];
            if (empty($new_password)) {
                $validate['pw_empty'] = $k;
                echo ("1");
                
            } elseif (strlen($new_password) < 6) {
                $validate['pw_length'] = $k;
                echo ("1");
            
            } else {
                resetPassWord($new_password, $i);
                header('Location: ../Reset/resets');
                exit();
            }
        }
        $k++;
    }
    require_once './app/view/ResetView.php';
}
