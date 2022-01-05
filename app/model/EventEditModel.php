<?php 
    require_once "./app/common/db.php";

    /* Lấy dữ liệu từ bảng event
    * Kết nối db, trả về dữ liệu
    */
    function getEventbyId($id){
        global $conn;

        $sql = "SELECT *
                FROM events
                WHERE id = '$id'
                ";
        
        $event = $conn -> prepare($sql);
        $event->execute();
        return $event->fetch(PDO::FETCH_ASSOC);
    }

    /* Update dữ liệu lên db
    * 
    */
    function updateEventById($id, $name, $slogan, $leader, $avatar, $description){
        global $conn;
        $sql= " UPDATE events SET
                name = '$name',
                slogan = '$slogan',
                leader = '$leader',
                avatar = '$avatar',
                description = '$description'
                WHERE id = '$id' ";
        $event = $conn ->prepare($sql);
        return $event->execute();

        
    }
?>