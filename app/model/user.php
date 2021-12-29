<?php
    require '../common/db.php';

    $key = isset($_GET['key']) ? $_GET['key'] : '';
    $query = "SELECT * FROM users WHERE CONCAT(name, user_id, description) LIKE '%".$key."%'";
    $_query = $conn->prepare($query);
    $_query->execute();
    
    $count = $_query->rowCount();
    
?>