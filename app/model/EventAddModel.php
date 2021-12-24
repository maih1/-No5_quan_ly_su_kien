<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/".$paths[0]."/".$paths[1]."/app/common/DB.php";

    function getAdd(){
        global $conn;
        $sql = "SELECT * FROM `events`";
        $result = $conn -> prepare($sql);
        $result->execute();
        $data = [];
        $_result = $result->fetchAll();
        // print_r($_result);
        return $_result;
    }
?>