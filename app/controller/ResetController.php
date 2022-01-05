<?php



// Làm hết trong function reset
// Sửa lại phần validate, dùng php, thêm css
// đường dẫn header với require_once các file view để hiển thị từ controller ra view hỏi Lưu và Nam.

require_once './app/model/Query.php';
function resets()
{
    $result = take_Name_ID();
    //

    $k = 1;
    foreach ($result as $row) {
        if (isset($_POST["button_reset$k"])) {

            $i = $row["login_id"];
            $new_password = $_POST["input_reset$k"];

            $validate = [];
            $validate['pw_empty'] = empty($new_password) ? 'Hãy nhập mật khẩu mới' : '';
            $validate['pw_length'] = ($validate['pw_empty'] == '' && strlen($new_password) < 6) ? 'Hãy nhập username tối thiểu 6 kí tự' : '';

            resetPassWord($new_password, $i);
            header('Location: ../view/Reset.php');

         }
        $k++;
    }
    require_once './app/view/Reset_View.php';
}
