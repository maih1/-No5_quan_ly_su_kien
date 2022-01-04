<?php 
	require_once "./app/common/db.php";

	function getListSchedule($event_id) {
		global $conn;
		$sql = "SELECT * FROM `event_timelines` WHERE event_id = '$event_id' ORDER BY `from`";
        $result = $conn -> prepare($sql);
        $result->execute();
        $_result = $result->fetchAll();
        return $_result;
	}

	function addEventTimelines($event_id, $from, $to, $name, $detail, $PoC) {
		global $conn;
		date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d H:i:sa');
        $sql = "INSERT INTO `event_timelines` VALUES('','$event_id',' $from','$to','$name','$detail','$PoC','$date','$date')";
        $result = $conn -> prepare($sql);
        $result->execute();
        return $result;
	}

?>	