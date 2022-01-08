<?php
    require_once './app/common/db.php';
    
    function userSearch($key, $phanloai) {
        global $conn, $classify;
        
        $key = "%".$key."%";
        if ($phanloai=="")
            $query = "SELECT * FROM users WHERE name LIKE :key OR description LIKE :key";
        else
            $query = "SELECT * FROM users WHERE (name LIKE :key OR description LIKE :key) AND type = :phanloai";
        $_query = $conn->prepare($query);
        $_query->bindParam(':phanloai', $phanloai);
        $_query->bindParam(':key', $key);
        $_query->execute();
        $result = $_query->fetchAll();
        
        return $result;
    }
    
    function userDel($id) {
        global $conn;
        $sql = "DELETE FROM users WHERE id = :id";
        $del = $conn->prepare($sql);
        $del->bindParam(':id', $id);
        $del->execute();
    }
    
    
?>