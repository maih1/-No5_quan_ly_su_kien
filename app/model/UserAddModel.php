<?php
    require_once "./app/common/db.php";

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
        $stmt = $conn -> prepare("SELECT `id` FROM `users` ORDER BY `users`.`id` ASC");
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

    function userSearch($key) {
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

    function userSearchExact($phanloai) {
        global $conn, $_classify;
        $phanloai = $_GET['phanloai'];
        $query = "SELECT * FROM users WHERE type = :classify ";
        $_query = $conn->prepare($query);
        $_query -> bindParam(":classify", $_classify[$phanloai]);
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
