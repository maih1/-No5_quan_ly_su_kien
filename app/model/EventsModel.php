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
?>