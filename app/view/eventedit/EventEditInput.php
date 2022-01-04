<html>

<head>
	<title>Sửa sự kiện</title>
	<meta charset=UTF-8>
    <link rel="stylesheet" href="../../web/css/EventEdit.css">
    <script type="text/javascript" async src="../../web/js/EventAddRealFileBtn.js"></script>
    
</head>
<body>
    <form method="post" <?php echo 'action="../eventEditInput/' . $event_id . '"' ?> enctype="multipart/form-data" >   
        <?php if(isset($validate)) {
            if(array_key_exists('name', $validate)){
                echo "<div class='error'>". $validate['name'] ."</div>";
            }
        } ?>
        <label class="input-form" for="name">Tên sự kiện</label>
        <input id="name" type="text" name="event_name" maxlength="100" value="<?php echo $event_name;?>"><br>        
        
        <?php if(isset($validate)) {
            if(array_key_exists('slogan', $validate)){
                echo "<div class='error'>". $validate['slogan'] ."</div>";
            }
        } ?>
        <label class="input-form" for="slogan">Slogan</label>
        <input id="slogan" type="text" name="event_slogan" maxlength="250" value="<?php echo $event_slogan;?>"><br>        
        
        <?php if(isset($validate)) {
            if(array_key_exists('leader', $validate)){
                echo "<div class='error'>". $validate['leader'] ."</div>";
            }
        } ?> 
        <label class="input-form" for="leader">Leader</label>
        <input id="leader" type="text" name="event_leader" maxlength="250" value="<?php echo $event_leader;?>"><br>        
           
        <?php if(isset($validate)) {
            if(array_key_exists('description', $validate)){
                echo "<div class='error'>". $validate['description'] ."</div>";
            }
        } ?>
        <label class="input-form" for="description">Mô tả chi tiết</label>
        <textarea id="description" name="event_description" maxlength="1000"><?php echo $event_description;?> </textarea><br>        
        
        
        <!-- avatar cu -->
        <div style = "display: flex">
            <label class="input-form" for="avatar">Avatar</label>
            <img class='avatar' src="<?php echo $event_avatar; ?>"/> <br>
        </div>


        <label class="input-form" for="avatar"></label>
        <input type="file" id="real-file" name="upload-file" hidden="hidden" accept="image/*"/>
        <input id="custom-text" type="text" name="event_avatar" readonly="readonly" value="">
        <button type="button" id="custom-button">Browse</button><br>

        <div class="button-submit">
            <button class="center-block" type="submit" name='submit' value="Xác nhận">Xác nhận</button>    
        </div>      
  </form>
</body>
</html>