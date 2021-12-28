<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../web/css/AddSchedule.css"/>
    <title>Add Schedule</title>
</head>
<body>
    <div id="mainform">
        <div>
            <h3>Tên sự kiện: <?php echo $nameSchedule[0]['name']; ?></h3>
        </div>
        <br>
        <div>
            <label id="section-name"> &#9650; Lịch trình</label>
            <table>
                <tbody>
                    <?php 
                        $count = 1;
                        foreach($listEventsSchedule as $row){
                            echo '<tr>
                                <td>No'.$count.'</td>
                                <td>'.$row['from'].' - '.$row['to'].'</td>
                                <td>'.$row['name'].'</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>'.$row['detail'].'</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>Chịu trách nhiệm: '.$row['PoC'].'</td>
                                <td><button class="edit">sửa</button></td>
                            </tr>';
                            $count++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <br>
        <label id="section-name">&#9650; Thêm mới</label>
        <form id="avatarform" method="POST" <?php echo 'action="../addSchedule/' . $event_id . '"'?>">
            <div class="data">
                <label class="input-form">Thời gian</label>
                <input type="time" name="from" <?php echo 'value="' . $dataInput['0'] . '"';?> id="input-time">
                <label>đến</label>
                <input type="time" name="to" <?php echo 'value="' . $dataInput['1'] . '"'; ?> id="input-time">
            </div>
            <?php if(isset($validate)) {
                if(array_key_exists('time', $validate)){
                    echo "<div class='error'>". $validate['time'] ."</div>";
                }
            } ?>
            <div class="data">
                <label class="input-form">Tên lịch trình</label>
                <input type="text" name="name" <?php echo 'value="' . $dataInput['2'] . '"';?> id="custom-text">
            </div>
            <?php if(isset($validate)) {
                    if(array_key_exists('name', $validate)){
                        echo "<div class='error'>". $validate['name'] ."</div>";
                    }
                    if(array_key_exists('nameLen', $validate)){
                        echo "<div class='error'>". $validate['nameLen'] ."</div>";
                    }
            } ?>
            <div class="data">
                <label class="input-form">Nội dung</label>
                <textarea form="avatarform" name="detail" id="text-area" cols="60" rows="10" wrap="hard" maxlength="1000"><?php echo $dataInput['3']; ?></textarea>
            </div>
            <?php if(isset($validate)) {
                    if(array_key_exists('detail', $validate)){
                        echo "<div class='error'>". $validate['detail'] ."</div>";
                    }
                    if(array_key_exists('detailLen', $validate)){
                        echo "<div class='error'>". $validate['detailLen'] ."</div>";
                    }
            } ?>
            <div class="data">
                <label class="input-form">Người chịu trách nhiệm</label>
                <input type="text" name="PoC" <?php echo 'value="' . $dataInput['4'] . '"'; ?> id="custom-text">
            </div>
            <?php if(isset($validate)) {
                    if(array_key_exists('PoC', $validate)){
                        echo "<div class='error'>". $validate['PoC'] ."</div>";
                    }
                    if(array_key_exists('PoCLen', $validate)){
                        echo "<div class='error'>". $validate['PoCLen'] ."</div>";
                    }
            }?>
            <div>
                <button class="center-block" type="submit" name="submit">Submit</button>
            </div>
        </form>
        
    </div>
</body>
</html>