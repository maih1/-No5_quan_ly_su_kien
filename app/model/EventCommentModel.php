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

    function editEventComment($event_id, $comment_id, $avatar, $content) {
        global $conn;
        
        $sql_check_conflict = "SELECT avatar FROM `event_comments` WHERE event_id = '$event_id'";
        $check_conflict = $conn -> prepare($sql_check_conflict);
        $check_conflict -> execute();
        $check_conflict_array = $check_conflict -> fetch(PDO::FETCH_ASSOC);
        
        foreach($check_conflict_array as $key => $value) {
            if(strcmp($value, $avatar) == 0) {
                $avatar = uniqid() . $avatar;
            }
        }
        
        $content = addslashes($content);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d H:i:s');
        $sql = "UPDATE `event_comments` SET avatar = '$avatar', content = '$content', updated = '$date' WHERE event_id = '$event_id' and id = '$comment_id'";
        $result = $conn -> prepare($sql);
        $result -> execute();
        return $result;
    }

?>