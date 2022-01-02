<?php 
    $id = 2;
    $_SESSION["event_id"] = $id;
    $event = getEventbyId($id);

    $event_name = $event['name'];
    $event_slogan = $event['slogan'];
    $event_leader = $event['leader'];
    $event_description = $event['description'];
    $cur_event_avatar = $event['avatar'];
    
    $event_avatar = '';

    $_SESSION["cur_event_avatar"] = $cur_event_avatar;

    if( isset($_SESSION["event_name"]) ){
        $event_name = $_SESSION["event_name"];
    }

    if( isset($_SESSION["event_slogan"]) ){
        $event_name = $_SESSION["event_solagan"];
    }
    if( isset($_SESSION["leader"]) ){
        $event_name = $_SESSION["event_leader"];
    }

    if( isset($_SESSION["event_avatar"]) ){
        $event_name = $_SESSION["event_avatar"];
    }

    if( isset($_SESSION["event_desciption"]) ){
        $event_name = $_SESSION["event_description"];
    }

    // trả về   ssion_name_error nếu tồn và không null, mặt khác trả về ''
    $event_name_error = $_SESSION["event_name_error"] ?? '';
    $event_slogan_error = $_SESSION["event_slogan_error"] ?? '';
    $event_leader_error = $_SESSION["event_leader_error"] ?? '';
    $event_avatar_error = $_SESSION["event_avatar_error"] ?? '';
    $event_description_error = $_SESSION["event_description_error"] ?? '';
    
?>
<html>

<head>
	<title>Sửa sự kiện</title>
	<meta charset=UTF-8>
    <link rel="stylesheet" href="../web/css/EventEdit.css">
    <script type="text/javascript" async src="../web/js/EventEditScript.js"></script>
    
</head>
<body>
    <form method="post" action="EventEditInput" enctype="multipart/form-data" >   
        <div class="error">
            <?php echo $event_name_error; ?>
        </div>              
        <label class="input-form" for="name">Tên sự kiện</label>
        <input id="event_name" type="text" name="event_name" maxlength="100" value="<?php echo $event_name;?>"><br>        
        
        <div class="error">
            <?php echo $event_slogan_error; ?>
        </div> 
        <label class="input-form" for="slogan">Slogan</label>
        <input id="slogan" type="text" name="event_slogan" maxlength="250" value="<?php echo $event_slogan;?>"><br>        
        
        <div class="error">
            <?php echo $event_leader_error; ?>
        </div> 
        <label class="input-form" for="leader">Leader</label>
        <input id="leader" type="text" name="event_leader" maxlength="250" value="<?php echo $event_leader;?>"><br>        
           
        <div class="error">
            <?php echo $event_description_error; ?>
        </div>  
        <label class="input-form" for="description">Mô tả chi tiết</label>
        <textarea id="description" name="event_escription" maxlength="1000"><?php echo $event_description;?> </textarea><br>        
        
        
        <!-- avatar cu -->
        <div style = "display: flex">
            <label class="input-form" for="avatar">Avatar</label>
            <img class='avatar' src="../web/avatar/event/<?php echo $id; ?>/<?php echo $cur_event_avatar; ?>"/> <br>
        </div>

        <div class="error">
            <?php echo $event_avatar_error; ?>
        </div> 
        <label class="input-form" for="avatar"></label>
        <input type="file" id="real-file" name="upload-file" hidden="hidden" accept="image/*"/>
        <input id="custom-text" type="text" name="event_avatar" readonly="readonly" value="<?php echo $event_avatar;?>">
        <button type="button" id="custom-button">Browse</button><br>

        <div class="button-submit">
            <button class="center-block" type="submit" name='submit' value="Xác nhận">Xác nhận</button>    
        </div>      
  </form>
</body>
</html>