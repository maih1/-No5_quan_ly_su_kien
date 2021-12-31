<?php 
    $rand = rand();
    $_SESSION['checkInsert'] = $rand;
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../web/css/AddSchedule.css"/>
    <link rel="stylesheet" type="text/css" href="../../web/css/jquery.datetimepicker.css"/>
    <script src="../../web/js/AddSchedule.js" type="text/javascript"></script>
    <title>Add Schedule</title>
</head>
<body>
    <div id="mainform">
        <div class="div-left">
            <h3>Tên sự kiện: <?php echo $nameSchedule[0]['name']; ?></h3>
            
        </div>
        <div class="div-right">
            <button class="btn-back" onclick="window.location.href='../test/14'">Quay lại</button>
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
                                <td><button class="edit" onclick="window.location.href=\'../test/'.$row['id'].'\'">sửa</button></td>
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
            <input type="hidden" value="<?php echo $rand; ?>" name="randCheck" />
            <div class="data">
                <label class="input-form">Thời gian</label>
                <input type="text" name="from" <?php echo 'value="' . ($dataInput['0'] ?? '') . '"';?> class="input-time" id="timeFrom">
                <label>đến</label>
                <input type="text" name="to" <?php echo 'value="' . ($dataInput['1'] ?? '') . '"'; ?> class="input-time" id="timeTo"> 
            </div>
            <?php if(isset($validate)) {
                if(array_key_exists('timefrom', $validate)){
                    echo "<div class='error'>". $validate['timefrom'] ."</div>";
                }
                if(array_key_exists('timeto', $validate)){
                    echo "<div class='error'>". $validate['timeto'] ."</div>";
                }
                if(array_key_exists('timeFormat', $validate)){
                    echo "<div class='error'>". $validate['timeFormat'] ."</div>";
                }
            } ?>
            <div class="data">
                <label class="input-form">Tên lịch trình</label>
                <input type="text" name="name" <?php echo 'value="' . ($dataInput['2'] ?? '') . '"';?> id="custom-text">
            </div>
            <?php if(isset($validate)) {
                    if(array_key_exists('name', $validate)){
                        echo "<div class='error'>". $validate['name'] ."</div>";
                    }
                    if(array_key_exists('nameLen', $validate)){
                        echo "<div class='error'>". $validate['nameLen'] ."</div>";
                    }
                    if(array_key_exists('nameFormat', $validate)){
                        echo "<div class='error'>". $validate['nameFormat'] ."</div>";
                    }
            } ?>
            <div class="data">
                <label class="input-form">Nội dung</label>
                <textarea form="avatarform" name="detail" id="text-area" cols="60" rows="10" wrap="hard" maxlength="1000"><?php echo ($dataInput['3'] ?? ''); ?></textarea>
            </div>
            <?php if(isset($validate)) {
                    if(array_key_exists('detail', $validate)){
                        echo "<div class='error'>". $validate['detail'] ."</div>";
                    }
                    if(array_key_exists('detailLen', $validate)){
                        echo "<div class='error'>". $validate['detailLen'] ."</div>";
                    }
                    if(array_key_exists('detailFormat', $validate)){
                        echo "<div class='error'>". $validate['detailFormat'] ."</div>";
                    }
            } ?>
            <div class="data">
                <label class="input-form">Người chịu trách nhiệm</label>
                <input type="text" name="PoC" <?php echo 'value="' . ($dataInput['4'] ?? '') . '"'; ?> id="custom-text">
            </div>
            <?php if(isset($validate)) {
                    if(array_key_exists('PoC', $validate)){
                        echo "<div class='error'>". $validate['PoC'] ."</div>";
                    }
                    if(array_key_exists('PoCLen', $validate)){
                        echo "<div class='error'>". $validate['PoCLen'] ."</div>";
                    }
                    if(array_key_exists('PoCFormat', $validate)){
                        echo "<div class='error'>". $validate['PoCFormat'] ."</div>";
                    }
            }?>
            <div>
                <button class="center-block" type="submit" name="submit">Submit</button>
            </div>
        </form>
        
    </div>
    <script src="../../web/js/jquery.js"></script>
    <script src="../../web/js/jquery.datetimepicker.full.js"></script>
    <script>
        jQuery('#timeFrom').datetimepicker({
            datepicker:false,
            format:'H:i'
        }); 
        jQuery('#timeTo').datetimepicker({
            datepicker:false,
            format:'H:i'
        });      
    </script>
</body>
</html>