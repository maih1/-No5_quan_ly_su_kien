<?php
    require_once '../common/db.php';
    
    $key = isset($_GET['key']) ? $_GET['key'] : '';
    $query = "SELECT * FROM users WHERE CONCAT(name, user_id, description) LIKE '%".$key."%'";
    $_query = $conn->prepare($query);
    $_query->execute();
    $count = $query->fetchAll();


    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $sql = "DELETE FROM users WHERE id ='$id'";
    $del = $conn->prepare($sql);
    $del->execute();

    $d_count = $del->rowCount();
    
?>