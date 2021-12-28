<?php
    require_once "./app/common/DB.php";

    function getAll(){
        global $conn;

        $stmt = $conn -> prepare("SELECT * FROM `events`");
        $stmt->execute();
        $data = [];
        $result = $stmt->fetchAll();
        // print_r($_result);
        // echo $_SESSION['avatar'];
        return $result;
    }

    function getIdEnd(){
        global $conn;
        $stmt = $conn -> prepare("SELECT `id` FROM `events`;");
        $stmt->execute();
        // $data = [];
        $data = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $length = count($data) - 1;
        $result = $data[$length];
        return $result;
    }

    function add(){
        global $conn;
        try{
            $stmt = $conn->prepare("INSERT INTO `events`(`name`, `slogan`, `leader`, `avatar`, `description`) 
                VALUES (:name, :slogan, :leader, :avatar, :description)");

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':slogan', $slogan);
            $stmt->bindParam(':leader', $leader);
            $stmt->bindParam(':avatar', $avatar);
            $stmt->bindParam(':description', $description);

            $name = $_SESSION['name'];
            $slogan = $_SESSION['slogan'];
            $leader = $_SESSION['leader'];
            $avatar = $_SESSION['avatar'];
            $description = $_SESSION['description'];

            $stmt->execute();
        } catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }
?>