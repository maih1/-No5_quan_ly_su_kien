<?php
    $sql = 'SELECT ec.id, events.name AS event_id_name, ec.avatar, ec.content FROM event_comments ec JOIN events ON ec.event_id = events.id where ec.event_id = 1';
    $result = $conn -> query($sql);
    $data = [];
    while($row = $result -> fetch_assoc()) {
        array_push($data, $row);
    }
    return $data;
?>