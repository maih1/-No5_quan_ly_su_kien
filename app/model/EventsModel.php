<?php 	
	require_once "./app/common/db.php";

	function getEventName($event_id) {
		global $conn;
		$sql = "SELECT * FROM `events` WHERE id = '$event_id'";
        $result = $conn -> prepare($sql);
        $result->execute();
        $_result = $result->fetchAll();
        return $_result;
	}

	/* Event Edit
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
    * Event Edit
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
	/* Event Add */
	function getAll(){
        global $conn;

        $stmt = $conn -> prepare("SELECT * FROM `events`");
        $stmt->execute();
        $data = [];
        $result = $stmt->fetchAll();
        return $result;
    }
	/* Event Add */
    function getIdEnd(){
        global $conn;
        $stmt = $conn -> prepare("SELECT `id` FROM `events` ORDER BY `events`.`id` ASC");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $length = count($data) - 1;
        $result = $data[$length];
        return $result;
    }
	/* Event Add */
    function add(){
        global $conn;
        $check_add = false;
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