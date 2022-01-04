<?php
    require_once './app/model/LoginModel.php';

    function welcome() {

        function getUrl() {
            $urls = explode("/", filter_var(trim($_SERVER['PHP_SELF'], "/")));
            $url = "/";
            for($i = 0; $i < count($urls)-1; $i++){
                $url = $url . $urls[$i] . "/";
            }
            return $url;
        }

        if(isset($_POST['login'])) {
            
            $login_id = $_POST['login_id'];
            $password = $_POST['password'];

            $login_id = strip_tags($login_id);
            $login_id = addslashes($login_id);
            $password = strip_tags($password);
            $password = addslashes($password);
            
            $accounts = listAccs();
            
            $validate = [];
            $validate['login_id_empty'] = empty($login_id) ? 'Hãy nhập login id' : '';
            $validate['pw_empty'] = empty($password) ? 'Hãy nhập password' : '';
            $validate['login_id_len'] = ($validate['login_id_empty'] == '' && strlen($login_id) < 4) ? 'Hãy nhập username tối thiểu 4 kí tự' : '';
            $validate['pw_len'] = ($validate['pw_empty'] == '' && strlen($password) < 6) ? 'Hãy nhập password tối thiểu 6 kí tự' : '';
            
            $checkValidate = 1;
            foreach($validate as $key => $value) {
                if($value != '') {
                    $checkValidate = 0;
                    break;
                }
            }
            if($checkValidate) {
                foreach($accounts as $row) {
                    if(strcmp($login_id, $row['login_id']) == 0 && strcmp($password, $row['password']) == 0) {
                        $_SESSION["check_user_pass"] = true;
                        $_SESSION['login_id'] = $login_id;
                        header('Location:' . getUrl() . 'Login/home');
    
                    } else {
                        $bad_credentials = 'login id và password không đúng';
                    }
                }
            }
        }
        require_once './app/view/login.php';
    }

    function home() {
        require_once './app/common/CheckLogin.php';
        require_once './app/view/home.php';
    }

    function logout() {
        require_once './app/common/CheckLogin.php';
        session_destroy();
        header('Location:' . getUrl() . 'Login/welcome');
    }
?>