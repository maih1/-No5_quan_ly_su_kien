<html>

<head>
	<title>Sửa sự kiện</title>
	<meta charset=UTF-8>
    <link rel="stylesheet" href="../../web/css/EventEdit.css">
    <script type="text/javascript" async src="../../web/js/EventAddRealFileBtn.js"></script>
    <script type="text/javascript" async src="../../web/js/EventAddPreviewImg.js"></script>
    
</head>
<body>
    <form method="post" <?php echo 'action="../eventEditInput/' . $event_id . '"' ?> enctype="multipart/form-data" >   
        <?php if(isset($validate)) {
            if(array_key_exists('name', $validate)){
                echo "<span class='error'>". $validate['name'] ."</span>";
            }
        } ?>
        <label class="input-form" for="name">Tên sự kiện</label>
        <input id="name" type="text" name="event_name" maxlength="100" value="<?php echo $event_name;?>"><br>        
        
        <?php if(isset($validate)) {
            if(array_key_exists('slogan', $validate)){
                echo "<span class='error'>". $validate['slogan'] ."</span>";
            }
        } ?>
        <label class="input-form" for="slogan">Slogan</label>
        <input id="slogan" type="text" name="event_slogan" maxlength="250" value="<?php echo $event_slogan;?>"><br>        
        
        <?php if(isset($validate)) {
            if(array_key_exists('leader', $validate)){
                echo "<span class='error'>". $validate['leader'] ."</span>";
            }
        } ?> 
        <label class="input-form" for="leader">Leader</label>
        <input id="leader" type="text" name="event_leader" maxlength="250" value="<?php echo $event_leader;?>"><br>        
           
        <?php if(isset($validate)) {
            if(array_key_exists('description', $validate)){
                echo "<span class='error'>". $validate['description'] ."</span>";
            }
        } ?>

        <label class="input-form" for="description">Mô tả chi tiết</label>
        <textarea id="description" name="event_description" maxlength="1000"><?php echo $event_description;?> </textarea><br>        
        
        <?php if(isset($validate)) {
            echo "<span class='error'></span>";           
        } ?>

        
        <label class="input-form" for="avatar"></label>
        <input type="file" id="real-file" name="upload-file" hidden="hidden" accept="image/*"  onchange="loadFile(event);" /><br>
        
        <div style = "display: flex">
            <label class="input-form" for="avatar">Avatar</label>
            <img class='avatar' id='output' src="<?php echo $event_avatar; ?>"/> <br>
        </div>

        <div  >
        <!-- <input type="file" id="real-file" name="upload-file" hidden="hidden" accept="image/*"/> -->
        <input id="custom-text" type="text" name="event_avatar" readonly="readonly" value="<?php if(isset($_SESSION['new_name_avatar'])){ echo $_SESSION['new_name_avatar']; } ;?>">
        <button type="button" id="custom-button">Browse</button><br>      
        </div>

        <div class="button-submit">
            <button class="center-block" type="submit" name='submit' value="Xác nhận">Xác nhận</button>    
        </div>      
  </form>
</body>
</html>