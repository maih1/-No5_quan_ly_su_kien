<?php

    require_once "./app/model/EventsModel.php";
    require_once "./app/model/EventCommentModel.php";
    $statusMsg = '';


    echo date('Y-m-d H:i:s');
    function editComment($event_id, $comment_id) {
        $commentContents = getChosenComment($event_id, $comment_id);

        if(isset($_POST['submit'])) {
            $filename = $_FILES["file"]['name'];
            $tempname = $_FILES["file"]['tmp_name'];
            $targetDir = $_SERVER['DOCUMENT_ROOT'] . '/No5_quan_ly_su_kien/web/avatar/' . $event_id . '/';
            $targetFilePath = $targetDir . $filename;
            $content = $_POST['comment'];

            if(move_uploaded_file($tempname, $targetFilePath)) {
                $result = editEventComment($event_id, $comment_id, $filename, $content);
                if($result) {
                    unlink($targetDir . $commentContents['avatar']);
                }
            }
    
        }
        $eventName = getEventName($event_id);
        $listComments = getComments($event_id);

        
        require_once "./app/view/editComment.php";
    }
?>