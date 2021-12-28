<?php
    require_once "./app/common/db.php";

    function getComments($event_id) {
        global $conn;
        $sql = "SELECT * FROM `event_comments` WHERE event_id = '$event_id' ORDER BY `id`";
        $result = $conn -> prepare($sql);
        $result -> execute();
        $data = $result -> fetchAll();
        return $data;
    }

    function getChosenComment($event_id, $comment_id) {
        global $conn;
        $sql = "SELECT * FROM `event_comments` WHERE event_id = '$event_id' and id = '$comment_id'";
        $result = $conn -> prepare($sql);
        $result -> execute();
        $data = $result -> fetchAll();
        return $data;
    }

    
?>