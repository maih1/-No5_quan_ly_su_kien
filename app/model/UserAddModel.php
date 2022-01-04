<?php
    require_once "./app/common/DB.php";

    function getAll(){
        global $conn;

        $stmt = $conn -> prepare("SELECT * FROM `users`");
        $stmt->execute();
        $data = [];
        $result = $stmt->fetchAll();
        return $result;
    }

    function getIdEnd(){
        global $conn;
        $stmt = $conn -> prepare("SELECT `id` FROM `users`;");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $length = count($data) - 1;
        $result = $data[$length];
        return $result;
    }

    function add(){
        global $conn, $_type;
        $check_add = false;
        try{
            $stmt = $conn->prepare("INSERT INTO `users`(`type`, `name`, `user_id`, `avatar`, `description`) 
                VALUES (:type, :name, :user_id, :avatar, :description)");

            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':avatar', $avatar);
            $stmt->bindParam(':description', $description);

            $type = $_type[$_SESSION['type']];
            $name = $_SESSION['name'];
            $user_id = $_SESSION['user_id'];
            $avatar = $_SESSION['nameAvatar'];
            $description = $_SESSION['description'];

            $stmt->execute();
            $check_add = true;
        } catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
        
        return $check_add;
    }
?>