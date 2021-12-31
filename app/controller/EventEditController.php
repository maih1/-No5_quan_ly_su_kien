<?php   
    require_once "./app/common/ErrorValidate.php";
    require_once "./app/model/EventEditModel.php";

    $name = $slogan = $leader = $description = $avatar = null;
    $check = 0;

    function getUrl() {
        $urls = explode("/", filter_var(trim($_SERVER['PHP_SELF'], "/")));
        $url = "/";
        for($i = 0; $i < count($urls)-1; $i++){
            $url = $url . $urls[$i] . "/";
        }
        return $url;
    }

    function eventEditInput(){
        global $name, $slogan, $leader, $description, $avatar;
        global $check;
        unset($_SESSION['check_add']) ;
    }

    function eventEditConfirm(){

    }

    function eventEditComplete(){

    }

    //giữ biểu mẫu sạch sẽ
    function load($data) {
        global $name, $slogan, $leader, $description, $avatar;
        $name = testInput($data['name']);
        $slogan = testInput($data['slogan']);
        $leader = testInput($data['leader']);
        $description = testInput($data['description']);
        $avatar = testInput($data['avatar']);
    }


    // giữ các dòng input sạch sẽ
    function testInput($data) {
        // xóa khoảng trắng
        $data = trim($data);
        // xóa dấu '/' 
        $data = stripslashes($data);
        // chuyển kí tự đặc biệt
        $data = htmlspecialchars($data);
        return $data;
       }

?>