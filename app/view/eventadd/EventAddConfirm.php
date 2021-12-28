<?php
    // session_start();
?>
<html>
<head>
	<title>Đăng ký sự kiện</title>
	<meta charset=UTF-8>
    <link rel="stylesheet" href="../web/css/EventAdd.css">
    <script async src="../web/js/EventAddPreviewImg.js"></script>
</head>
<body>
    <form method="post" action="">   

        <label class="input-form" for="name">Tên sự kiện</label>
        <label class="add-comfirm"><?php echo $_SESSION['name']?></label><br>        
        
        <label class="input-form" for="slogan">Slogan</label>
        <label class="add-comfirm"><?php echo $_SESSION['slogan'];?></label><br>                
       
        <label class="input-form" for="slogan">Leader</label>
        <label class="add-comfirm"><?php echo $_SESSION['leader'];?></label><br>         
       
        <label class="input-form" for="description">Mô tả chi tiết</label>
        <label id="des"><?php echo $_SESSION['description'];?></label><br>         
        
        <label class="input-form" for="avatar">Avatar</label>
        <img id="output" src="<?php echo '../'.$_SESSION['avatar']; ?>"/>
        
        <div class="button-submit">
            <button class="center-block" name='back-page'  >Sửa lại</button>    
            <button class="center-block" name="submit-comfirm" >Đăng ký</button>    
        </div>
  </form>
</body>
</html>