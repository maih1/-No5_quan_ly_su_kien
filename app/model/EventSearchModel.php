<?php
    require_once "./app/common/db.php";
    function getEventSearchResult($keyword){
        global $conn;
        $keyword = "%".$_GET['keyword']."%";
		$stmt = $conn -> prepare("SELECT id,name,slogan,leader FROM events WHERE name LIKE :keyword OR description LIKE :keyword OR leader LIKE :keyword OR slogan LIKE :keyword");
		$stmt->bindParam(':keyword', $keyword);
		$stmt->execute();
		$result = $stmt->fetchAll();
        return $result;
    }
	function eventDeleteSQL($id){
        global $conn;
		$stmt = $conn -> prepare("DELETE FROM event_comments WHERE event_id=:id");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		
		$stmt = $conn -> prepare("DELETE FROM event_timelines WHERE event_id=:id");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		
		$stmt = $conn -> prepare("DELETE FROM events WHERE id=:id");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
    }
?>