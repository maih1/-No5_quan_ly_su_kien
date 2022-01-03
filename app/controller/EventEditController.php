<?php

require_once "./app/common/ErrorValidate.php";
require_once "./app/model/EventEditModel.php";

function eventEditInput($event_id){
    $event = getEventbyId($event_id);
    $event_name = $event['name'];
    $event_slogan = $event['slogan'];
    $event_leader = $event['leader'];
    $event_description = $event['description'];
    $event_avatar = '../../web/avatar/event/'. $event_id .'/' .$event['avatar'];

    if( isset($_SESSION["name"]) ){
        $event_name = $_SESSION["name"];
    }

    if( isset($_SESSION["slogan"]) ){
        $event_slogan = $_SESSION["slogan"];
    }
    if( isset($_SESSION["leader"]) ){
        $event_leader = $_SESSION["leader"];
    }

    if( isset($_SESSION["new_avatar"]) ){
        $event_avatar = $_SESSION["new_avatar"];
    }

    if( isset($_SESSION["desciption"]) ){
        $event_description = $_SESSION["description"];
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){  

        $event_name= test_input($_POST["event_name"]);
        $event_slogan= test_input($_POST["event_slogan"]);
        $event_leader= test_input($_POST["event_leader"]);
        $event_description= test_input($_POST["event_description"]);
         
        if(file_exists($_FILES["upload-file"]["tmp_name"] )) {
            $file_name =$_FILES["upload-file"]["name"]; // avatar mới
            $temp_name = $_FILES["upload-file"]["tmp_name"];// khi upload file len file luu lai vi tri tam thoi, khi đủ điều kiện sẽ chuyển file từ vị trí tạm thời vào target_dir
            $new_avatar = 1; // True, có avatar mới
        } else {
            $event_avatar = $event['avatar'];
            $new_avatar = 0; // False, không có avatar mới, dùng lại avatar cũ
        }

        $validate = [];
        $validate['name'] = empty($event_name) ? 'Hãy nhập tên sự kiện' : '';
        $validate['name_length'] = strlen($event_name) > 100 ? 'Không nhập quá 100 ký tự. ' : '';
        $validate['slogan'] = empty($event_slogan) ? 'Hãy nhập slogan ' : '' ;
        $validate['slogan_length'] = strlen($event_slogan) > 250 ? 'Không nhập quá 250 ký tự.' : '';
        $validate['leader'] = empty($event_leader) ? 'Hãy nhập leader sự kiện.' : '';
        $validate['leader_length'] = strlen($event_leader) > 250 ? 'Không nhập quá 250 ký tự.' : '';
        $validate['description'] = empty($event_description) ? 'Hãy nhập mô tả sự kiện.' : '';
        $validate['description_length'] = strlen($event_description) > 1000 ? 'Không nhập quá 1000 ký tự.' : '' ; 
        
        $checkValidate = 1;
        foreach ($validate as $key => $value) {
            if($value != '') {
                $checkValidate = 0;
                break;
            }
        }

        if(!is_dir('../web/avatar/event_tmp')) {
            mkdir('../web/avatar/event_tmp', 0777, true);
        }
        // upload file
        if($new_avatar){
            $target_dir = "web/avatar/event_tmp/";
            $target_file = $target_dir . $file_name;
            move_uploaded_file($temp_name, $target_file);
            $_SESSION['new_avatar'] = "../../". $target_file;
        }else if(!isset($_SESSION['new_avatar'])){
            $_SESSION['new_avatar'] = "../../web/avatar/event/" . $event_id ."/". $event_avatar;
        }


        if($checkValidate){
            $_SESSION['name'] = $event_name;
            $_SESSION['slogan'] = $event_slogan;
            $_SESSION['leader'] = $event_leader;
            $_SESSION['avatar'] = $event_avatar;
            $_SESSION['description'] = $event_description;
            // $_SESSION['new_avatar'] = $new_avatar;
            header('Location:' . getUrl(). 'EventEdit/eventEditConfirm/'. $event_id);
        }

    }

    require_once "./app/view/eventedit/EventEditInput.php";
}

function eventEditConfirm($event_id){
    
    require_once "./app/view/eventedit/EventEditConfirm.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST' ) {
        if(isset($_POST['back-page'])) {
            header ('Location:' .getUrl() .'EventEdit/EventEditInput/'.$event_id  );
        }

        if(isset($_POST['submit-confirm'])) {
            updateEventById($event_id, $_SESSION['name'],$_SESSION['slogan'],$_SESSION['leader'],$_SESSION['avatar'],$_SESSION['description']);
            unset($_SESSION['name']);
            unset($_SESSION['slogan']);
            unset($_SESSION['leader']);
            unset($_SESSION['avatar']);
            unset($_SESSION['description']);
            header('Location:' . getUrl(). 'EventEdit/EventEditComplete/'. $event_id);
        }
    }

}

function eventEditComplete($event_id){
    require_once "./app/view/eventedit/EventEditComplete.php";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
function getUrl() {
    $urls = explode("/", filter_var(trim($_SERVER['PHP_SELF'], "/")));
    $url = "/";
    for($i = 0; $i < count($urls)-1; $i++){
        $url = $url . $urls[$i] . "/";
    }
    return $url;
    }
?>