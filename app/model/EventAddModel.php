<?php
class EventAddModel extends DB{

    public function getAdd(){
        $sql = "SELECT * FROM `events`";
        $result = $this -> con -> query($sql);
        $data = [];
        while($row = $result -> fetch_assoc()) {
            array_push($data, $row);
        }
        // print_r($data);
        return $data;
    }
}
?>