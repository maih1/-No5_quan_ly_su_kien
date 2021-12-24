<html>
<head>
	<title>Đăng ký sự kiện</title>
	<meta charset=UTF-8>
    <link rel="stylesheet" href="web/css/EventAdd.css">
    <script type="text/javascript" async src="web/js/EventAddRealFileBtn.js"></script>
</head>
<body>
    
    <form method="post" action="" >   

        <label class="input-form" for="name">Tên sự kiện</label>
        <input id="name" type="text" name="name" maxlength="100" value="<?php echo $name;?>"><br>        
        
        <label class="input-form" for="slogan">Slogan</label>
        <input id="slogan" type="text" name="slogan" maxlength="250" value="<?php echo $slogan;?>"><br>        
       
        <label class="input-form" for="leader">Leader</label>
        <input id="leader" type="text" name="leader" maxlength="250" value="<?php echo $leader;?>"><br>        
       
        <label class="input-form" for="description">Mô tả chi tiết</label>
        <textarea id="description" name="description" maxlength="1000" value="<?php echo $description;?>"></textarea><br>        
       
        <label class="input-form" for="avatar">Avatar</label>
        <input type="file" id="real-file" name="avatar" hidden="hidden" accept="image/*"/>
        <input id="custom-text" type="text" value="<?php echo $avatar;?>">
        <button type="button" id="custom-button">Browse</button>

        <button class="center-block" type="submit" name='submit' formaction="">Xác Nhận</button>    
            
  </form>
</body>
</html>