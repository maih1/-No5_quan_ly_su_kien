<html>
<head>
	<title>Sửa sự kiện</title>
	<meta charset=UTF-8>
    <link rel="stylesheet" href="../web/css/EventAdd.css">
    <script type="text/javascript" async src="../web/js/EventAddRealFileBtn.js"></script>
    
</head>
<body>
    <form method="post" action="EventAddInput.php" enctype="multipart/form-data" >   
        <?php if(getError('name')) {?>
            <span class="error"><?php  echo getError('name'); ?></span><br>
        <?php } ?>
        <label class="input-form" for="name">Tên sự kiện</label>
        <input id="name" type="text" name="name" maxlength="100" value="<?php getValue($name, 'name');?>"><br>        
        
        <?php if(getError('slogan')) {?>
            <span class="error"><?php  echo getError('slogan'); ?></span><br>
        <?php } ?>
        <label class="input-form" for="slogan">Slogan</label>
        <input id="slogan" type="text" name="slogan" maxlength="250" value="<?php getValue($slogan, 'slogan');?>"><br>        
        
        <?php if(getError('leader')) {?>
            <span class="error"><?php  echo getError('leader'); ?></span><br>
        <?php } ?>
        <label class="input-form" for="leader">Leader</label>
        <input id="leader" type="text" name="leader" maxlength="250" value="<?php getValue($leader, 'leader');?>"><br>        
        
        <?php if(getError('description')) {?>
            <span class="error"><?php  echo getError('description'); ?></span><br>
        <?php } ?>
        <label class="input-form" for="description">Mô tả chi tiết</label>
        <textarea id="description" name="description" maxlength="1000"><?php getValue($description, 'description');?></textarea><br>        

        <!-- avatar cu -->
        <label class="input-form" for="avatar">Avatar</label>
        <img id="output" src="<?php echo '../'.$_SESSION['avatar']; ?>"/>
        
        <?php if(getError('avatar')) {?>
            <span class="error"><?php  echo getError('avatar'); ?> <br> 
        <?php } ?>
        <label class="input-form" for="avatar"></label>
        <input type="file" id="real-file" name="upload-file" hidden="hidden" accept="image/*"/>
        <input id="custom-text" type="text" name="avatar" readonly="readonly" value="<?php getValue($avatar, 'nameAvatar');?>">
        <button type="button" id="custom-button">Browse</button><br>
        
        <div class="button-submit">
            <button class="center-block" type="submit" name='submit' formaction="<?php isComfirm(); ?>">Xác Nhận</button>    
        </div>      
  </form>
</body>
</html>