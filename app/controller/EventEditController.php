<?php
require_once './app/common/CheckLogin.php';
require_once "./app/model/EventsModel.php";

function eventEditInput($event_id){

    $event = getEventbyId($event_id);
    $event_name = $event['name'];
    $event_slogan = $event['slogan'];
    $event_leader = $event['leader'];
    $event_description = $event['description'];
    $event_avatar = '../../web/avatar/event/'. $event_id .'/' .$event['avatar'];

    $_SESSION['cur_name_avatar'] = $event['avatar']; // tên ảnh cũ trong db
    $_SESSION['check_input'] = true;

    if( isset($_SESSION["event_name"]) ){
        $event_name = $_SESSION["event_name"];
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

        backhome();
        $new_avatar = 0;

        if(file_exists($_FILES["upload-file"]["tmp_name"] )) {
            $file_name =$_FILES["upload-file"]["name"]; // avatar mới
            $temp_name = $_FILES["upload-file"]["tmp_name"];// khi upload file len file luu lai vi tri tam thoi, khi đủ điều kiện sẽ chuyển file từ vị trí tạm thời vào target_dir
            $new_avatar = 1; // True, có avatar mới

            $_SESSION['new_name_avatar'] = $file_name;
        } else if(!isset($_SESSION['new_avatar'])){
            $event_avatar ='../../web/avatar/event/'. $event_id .'/' . $event['avatar'];
            // False, không có avatar mới, dùng lại avatar cũ
        }

        $validate = [];
        $validate['name'] = empty($event_name) ? 'Hãy nhập tên sự kiện' : '';
        $validate['name_length'] = mb_strlen($event_name) > 100 ? 'Không nhập quá 100 ký tự. ' : '';
        $validate['slogan'] = empty($event_slogan) ? 'Hãy nhập slogan ' : '' ;
        $validate['slogan_length'] = strlen($event_slogan) > 250 ? 'Không nhập quá 250 ký tự.' : '';
        $validate['leader'] = empty($event_leader) ? 'Hãy nhập tên Leader.' : '';
        $validate['leader_length'] = strlen($event_leader) > 250 ? 'Không nhập quá 250 ký tự.' : '';
        $validate['description'] = empty($event_description) ? 'Hãy nhập mô tả chi tiết.' : '';
        $validate['description_length'] = strlen($event_description) > 1000 ? 'Không nhập quá 1000 ký tự.' : '' ; 
        
        $checkValidate = 1;
        foreach ($validate as $key => $value) {
            if($value != '') {
                $checkValidate = 0;
                break;
            }
        }

        if(!file_exists('web/avatar/event/tmp')) {
            mkdir('web/avatar/event/tmp', 0777, true);
        }
        // upload file
        if($new_avatar && checkFileUpload()){
            $target_dir = "web/avatar/event/tmp/";
            $target_file = $target_dir . $file_name;
            move_uploaded_file($temp_name, $target_file);
            $_SESSION['new_avatar'] = "../../". $target_file;
            $_SESSION['target_file'] = $target_file;
            $event_avatar = "../../". $target_file;

        }else if(!isset($_SESSION['new_avatar'])){
            $_SESSION['new_avatar'] = $event_avatar;
        }


        if($checkValidate && isset($_POST['submit']) ){
            $_SESSION['event_name'] = $event_name;
            $_SESSION['slogan'] = $event_slogan;
            $_SESSION['leader'] = $event_leader;
            $_SESSION['description'] = $event_description;

            header('Location:' . getUrl(). 'EventEdit/eventEditConfirm/'. $event_id);
        }

    }

    require_once "./app/view/event_edit/EventEditInput.php";
}

function eventEditConfirm($event_id){
    
    require_once "./app/view/event_edit/EventEditConfirm.php";
    if(!isset($_SESSION['check_input']))
    {
        header('Location:' . getUrl(). 'EventEdit/EventEditInput/'. $event_id);
        
    }
    $_SESSION['check_confirm'] = true;
    if($_SERVER['REQUEST_METHOD'] == 'POST' ) {
        if(isset($_POST['back-page'])) {
            header ('Location:' .getUrl() .'EventEdit/EventEditInput/'.$event_id  );
        }

        if(isset($_POST['submit-confirm'])) {
            /* Nếu tồn tại ảnh mới thì update tên ảnh mới 
            *  Nếu không tồn tại thì update tên ảnh cũ
            */
            if(isset($_SESSION['new_name_avatar'])){
                $avatar = $_SESSION['new_name_avatar'];
            }else {
                $avatar = $_SESSION['cur_name_avatar'];
            }
            updateEventById($event_id, $_SESSION['event_name'],$_SESSION['slogan'],$_SESSION['leader'],$avatar,$_SESSION['description']);

            if(isset($_SESSION['new_name_avatar'])){
                $event_avatar = 'web/avatar/event/'. $event_id .'/'. $_SESSION['new_name_avatar'] ;
                unlink( 'web/avatar/event/'. $event_id .'/' .$_SESSION['cur_name_avatar']);
                rename($_SESSION['target_file'],  $event_avatar);
                

            }
            unset($_SESSION['event_name']);
            unset($_SESSION['slogan']);
            unset($_SESSION['leader']);
            unset($_SESSION['description']);
            unset($_SESSION['cur_name_avatar']);
            unset($_SESSION['new_name_avatar']);
            unset($_SESSION['new_avatar']);
            header('Location:' . getUrl(). 'EventEdit/EventEditComplete/'. $event_id);
        }
    }

}

function eventEditComplete($event_id){
    if(!isset($_SESSION['check_confirm']) )
    {
        header('Location:' . getUrl(). 'EventEdit/EventEditInput/'. $event_id);
        
    }
    require_once "./app/view/event_edit/EventEditComplete.php";

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  function backhome(){
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        if(isset($_POST['back-home'])){
            header('Location:' . getUrl(). 'EventSearch/eventSearch');
            unset($_SESSION['event_name']);
            unset($_SESSION['slogan']);
            unset($_SESSION['leader']);
            unset($_SESSION['description']);
            unset($_SESSION['cur_name_avatar']);
            unset($_SESSION['new_name_avatar']);
            unset($_SESSION['new_avatar']);
        }
        
    }
}
function checkFileUpload(){
    $check_file = true;
    $maxfilesize = 524288000;

    $allowtypes = array('image/jpg', 'image/jpeg', 'image/jfif', 'image/pjpeg', 'image/pjp', 'image/webp', 
                        'image/png', 'image/svg', 'image/ico', 'image/cur', 'image/gif', 'image/apng');
    
    if(file_exists($_FILES["upload-file"]["tmp_name"])){
        if($_FILES["upload-file"]['error'] != 0) {
            $check_file = false;
        }
        if ($_FILES["upload-file"]["size"] > $maxfilesize){
            $check_file = false;
        }
        if (!in_array($_FILES["upload-file"]["type"],$allowtypes )){
            $check_file = false;
        }
    }

    return $check_file;
}