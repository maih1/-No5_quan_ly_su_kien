<?php
    require_once './app/common/db.php';

    function listAccs() {
        global $conn;
        $sql = "SELECT * FROM admins";
        $result = $conn -> prepare($sql);
        $result -> execute();
        return $result;
    }
?>