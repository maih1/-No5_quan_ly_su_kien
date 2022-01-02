<?php

require_once "./app/common/ErrorValidate.php";
require_once "./app/model/EventEditModel.php";


function eventEditInput(){

    // $id = 2;
    // $_SESSION["event_id"] = $id;
    // $event = getEventbyId($id);

    // $event_name = $event['name'];
    // $event_slogan = $event['slogan'];
    // $event_leader = $event['leader'];
    // $event_description = $event['description'];
    // $cur_event_avatar = $event['avatar'];
    
    // $event_avatar = '';

    // $_SESSION["cur_event_avatar"] = $cur_event_avatar;

    // if( isset($_SESSION["event_name"]) ){
    //     $event_name = $_SESSION["event_name"];
    // }

    // if( isset($_SESSION["event_slogan"]) ){
    //     $event_name = $_SESSION["event_solagan"];
    // }
    // if( isset($_SESSION["leader"]) ){
    //     $event_name = $_SESSION["event_leader"];
    // }

    // if( isset($_SESSION["event_avatar"]) ){
    //     $event_name = $_SESSION["event_avatar"];
    // }

    // if( isset($_SESSION["event_desciption"]) ){
    //     $event_name = $_SESSION["event_description"];
    // }

    // // trả về   ssion_name_error nếu tồn và không null, mặt khác trả về ''
    // $event_name_error = $_SESSION["event_name_error"] ?? '';
    // $event_slogan_error = $_SESSION["event_slogan_error"] ?? '';
    // $event_leader_error = $_SESSION["event_leader_error"] ?? '';
    // $event_avatar_error = $_SESSION["event_avatar_error"] ?? '';
    // $event_description_error = $_SESSION["event_description_error"] ?? '';

    // if(isset($_POST['submit'])){
    //     // $filename = $_FILES["file"]['name'];
    //     // $tempname = $_FILES['file']['tmp_name'];
    //     // $targetDir = $_SERVER['DOCUMENT_ROOT'] . '/No5_quan_ly_su_kien/web/avatar/' . $event_id . '/';
    //     // $targetFilePath = $targetDir . $filename;

        
    // }
 

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_SESSION['event_id'];

        $_SESSION["event_name_error"]= '';
        $_SESSION["event_slogan_error"]='';
        $_SESSION["event_leader_error"]='';
        $_SESSION["event_avatar_error"]= '';
        $_SESSION["event_description_error"]='';

        $_SESSION['event_name']= test_input($_POST["event_name"]);
        $_SESSION['event_slogan']= test_input($_POST["event_slogan"]);
        $_SESSION['event_leader']= test_input($_POST["event_leader"]);
        $_SESSION['event_description']= test_input($_POST["event_description"]);

        if($_FILES["event_avatar"]["name"]){
            unset($_SESSION["had_avatar_tmp"]);
            if(
                isset($_SESSION["event_avatar"]) &&
                $_FILES["event_avatar"]["name"] != $_SESSION["event_avatar"]
            ) {
                unlink('../web/avatar/event_tmp');
            }
            $_SESSION["event_avatar"]= $_FILES["event_avatar"]["name"];
        }

        if(!$_SESSION["event_name"]){
            $_SESSION["event_name_error"]= "Hãy nhập tên sự kiện.";
        } else {
            if(mb_strlen($_SESSION["event_name"]) > 100) {
                $_SESSION["event_name_error"] = "Không nhập quá 100 ký tự.";
            }
        }

        if(!$_SESSION["event_slogan"]){
            $_SESSION["event_slogan_error"]= "Hãy nhập slogan sự kiện.";
        } else {
            if(mb_strlen($_SESSION["event_slogan"]) > 250) {
                $_SESSION["event_slogan_error"] = "Không nhập quá 250 ký tự.";
            }
        }

        if(!$_SESSION["event_leader"]){
            $_SESSION["event_leader_error"]= "Hãy nhập leader sự kiện.";
        } else {
            if(mb_strlen($_SESSION["event_leader"]) > 250) {
                $_SESSION["event_leader_error"] = "Không nhập quá 250 ký tự.";
            }
        }

        if(!$_SESSION["event_description"]){
            $_SESSION["event_description_error"]= "Hãy nhập mô tả sự kiện.";
        } else {
            if(mb_strlen($_SESSION["event_description"]) > 1000) {
                $_SESSION["event_description_error"] = "Không nhập quá 1000 ký tự.";
            }
        }

        if(!file_exists('../web/avatar/evemt_tmp')) {
            mkdir('../web/avatar/event_tmp', 0777, true);
        }
        
        if ( !isset($_SESSION['had_avatar_tmp'])) {
            if(
                isset($_SESSION["event_avatar"]) &&
                getimagesize($_FILES["event_avatar"]["tmp_name"]) == false
            ){
                $_SESSION["event_avatar_error"] = "avatar phải là file ảnh";
            }
            if(isset($_SESSION["event_avatar"])){
                $target_dir = "../web/avatar/event_tmp";
                $target_file = $target_dir . basename($_FILES["event_avatar"]["name"]);
                move_uploaded_file($_FILES["event_avatar"]["tmp_name"], $target_file);
                $_SESSION['had_avatar_tmp'] = true;
            }
        }

        if(
            !$_SESSION["event_name_error"] &&
            !$_SESSION["event_slogan_error"] &&
            !$_SESSION["event_leader_error"] &&
            !$_SESSION["event_avatar_error"] &&
            !$_SESSION["event_description_error"]
        ){
            header("Location : ./app/view/eventedit/EventEditConfirm.php") ;
        } else {
            header("Location: ./EventEditInput");
        }

    }
    
    // require_once "./app/view/eventedit/EventEditInput.php";
}

function eventEditConfirm(){
    require_once "./app/view/eventedit/EventEditConfirm.php";
}

function eventEditComplete(){
    require_once "./app/view/eventedit/EventEditComplete.php";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>