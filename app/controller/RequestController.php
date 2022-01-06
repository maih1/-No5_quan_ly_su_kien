<?php

require_once './app/model/AdminsModel.php';

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
    $res = "1";
    $result = take_Users();
    $validate = [];
    if (isset($_POST['submit_button'])) {
        $login_id = trim($_POST['user_request']);

        if (empty($login_id)) {
            $validate['login_id_empty'] = 'Hãy nhập login id';
        } elseif (strlen($login_id) < 4) {
            $validate['login_id_length'] = 'Hãy nhập login id tối thiểu 4 kí tự';
        } else {
            foreach ($result as $row) {
                if ($row['login_id'] != $login_id) {
                    $res = "false";
                    $validate['login_id'] = 'Login id không tồn tại trong hệ thống';
                } else {
                    $res = "true";
                    tick_RestPW_token($_POST['user_request']);
                    header('Location: ../Request/request');
                    exit();
                }
            }
        }
    }

    require_once './app/view/RequestInput.php';
}
