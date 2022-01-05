<?php

require_once './app/model/ResetModel.php';

function getUrl()
{
    $urls = explode("/", filter_var(trim($_SERVER['PHP_SELF'], "/")));
    $url = "/";
    for ($i = 0; $i < count($urls) - 1; $i++) {
        $url = $url . $urls[$i] . "/";
    }
    return $url;
}

function request()
{
    $result = take_Users();

    $login_id = $_POST['user_request'];

    if (isset($_POST['submit_button'])) {
        $res = "";

        $validate = [];
        $validate['login_id_empty'] = empty($login_id) ? 'Hãy nhập login id' : '';
        $validate['login_id_length'] = ($validate['login_id_empty'] == '' && strlen($login_id) < 4) ? 'Hãy nhập login id tối thiểu 4 kí tự' : '';

        foreach ($result as $row) {
            if ($row['user_id'] != $login_id) {
                $res = "false";
            } else {
                $res = "true";
                break;
            }
        }

        if ($res == "false") {
            $validate['login_id'] = 'Login id không tồn tại trong hệ thống';
        } else {
            tick_RestPW_token($_POST['user_request']);
            //header('Location: ../view/login.php');
            header('Location: ./app/view/Login.php');
            header('Location:' . getUrl() . 'Login.php'); //-> xem hộ xem trỏ tới đâu
        }

    }

}
