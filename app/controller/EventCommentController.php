<?php

    require_once "./app/model/EventsModel.php";
    require_once "./app/model/EventCommentModel.php";

    function editComment($event_id, $comment_id) {
        $eventName = getEventName($event_id);
        $listComments = getComments($event_id);
        
        require_once "./app/view/editComment.php";
    }
?>