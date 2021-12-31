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
        $data = $result -> fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function getLastId() {
        global $conn;

        $sql = "SELECT MAX(id) from `event_comments`";
        $result = $conn -> prepare($sql);
        $result -> execute();
        $data = $result -> fetch(PDO::FETCH_ASSOC);
        return $data['MAX(id)'];

    }
    function addEventComment($event_id, $avatar, $content) {
        global $conn;

        $content = addslashes($content);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO `event_comments` VALUES(NULL, '$event_id', '$avatar', '$content', '$date', '$date')";
        $result = $conn -> prepare($sql);
        $result -> execute();
        return $result;
    }

    function editEventComment($event_id, $comment_id, $avatar, $content) {
        global $conn;
        
        $content = addslashes($content);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d H:i:s');
        $sql = "UPDATE `event_comments` SET avatar = '$avatar', content = '$content', updated = '$date' WHERE event_id = '$event_id' and id = '$comment_id'";
        $result = $conn -> prepare($sql);
        $result -> execute();
        return $result;
    }

?>