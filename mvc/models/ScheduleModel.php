<?php
class ScheduleModel extends DB{

    // public function Tong($n, $m){
    //     return $n + $m;
    // }

    // public function SinhVien(){
    //     $qr = "SELECT * FROM sinhvien";
    //     return mysqli_query($this->con, $qr);
    // }
    public function getSchedule(){
        $sql = "SELECT * FROM event_timelines";
        $stm = mysqli_query($this->con, $sql);
        $data = [];
        // $mang = array();
        while($row = mysqli_fetch_assoc($stm)){
        // while($row = mysqli_fetch_array($stm)){
            array_push($data, $row);
            // $mang[] = $row;
        }   
        return $data;
        // return json_encode($mang);
    }

    public function addSchedule($event_id, $from, $to, $name, $detail, $PoC) {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d H:i:sa');
        $sql = "INSERT INTO event_timelines VALUES('','$event_id',' $from','$to','$name','$detail','$PoC','$date','$date')";
        $result = false;
        if(mysqli_query($this->con, $sql)) {
            $result = true;
        }
        return $result;
    }
}
?>