<?php
    require_once './app/common/db.php';
    
    function userSeach($key) {
        global $conn;
        //$key = isset($_GET['key']) ? $_GET['key'] : '';
        $key = "%".$_GET['key']."%";
        $query = "SELECT * FROM users WHERE name LIKE :key OR description LIKE :key";
        $_query = $conn->prepare($query);
        $_query->bindParam(':key', $key);
        $_query->execute();
        $result = $_query->fetchAll();

        return $result;
    }

    function user_seach_exact() {
        global $conn;
        $key = "%".$_GET['key']."%";
        $query = "SELECT * FROM users WHERE CONCAT(type) LIKE :key ";
        $_query = $conn->prepare($query);
        $_query->bindParam(':key', $key);
        $_query->execute();
        $count = $_query->fetchAll();

        return $count;
    }
    
    function userDel($id) {
        global $conn;
        $sql = "DELETE FROM users WHERE id = :id";
        $del = $conn->prepare($sql);
        $del->bindParam(':id', $id);
        $del->execute();
    }
    
    
?>