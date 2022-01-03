<?php
    require_once "./app/common/DB.php";
    function getEventSearchResult($term){
        global $conn;
        $term = "%".$_GET['term']."%";
		$stmt = $conn -> prepare("SELECT id,name,slogan,leader FROM events WHERE name LIKE :term OR description LIKE :term OR leader LIKE :term OR slogan LIKE :term");
		$stmt->bindParam(':term', $term);
		$stmt->execute();
		$result = $stmt->fetchAll();
        return $result;
    }
	function getAll($id, $type){
        global $conn;
		$stmt = $conn -> prepare("SELECT * FROM events WHERE id=:id");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$result = $stmt->fetchAll();
        return $result;
    }
	function eventDelete($id){
        global $conn;
		$stmt = $conn -> prepare("DELETE FROM events WHERE id=:id");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$result = $stmt->fetchAll();
        return $result;
    }
?>