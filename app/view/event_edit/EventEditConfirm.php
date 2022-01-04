<html>
<head>
	<title>Sửa sự kiện</title>
	<meta charset=UTF-8>
    <link rel="stylesheet" href="../../web/css/EventEdit.css">
    <script async src="../../web/js/EventEditScript.js"></script>
</head>
<body>
    <form method="post" action="">   

        <label class="input-form" for="name">Tên sự kiện</label>
        <label class="add-comfirm"><?php echo $_SESSION['name'];?></label><br>        
        
        <label class="input-form" for="slogan">Slogan</label>
        <label class="add-comfirm"><?php echo $_SESSION['slogan'];?></label><br>                
       
        <label class="input-form" for="leader">Leader</label>
        <label class="add-comfirm"><?php echo $_SESSION['leader'];?></label><br>         
       
        <label class="input-form" for="description">Mô tả chi tiết</label>
        <label id="des"><?php echo $_SESSION['description'];?></label><br>         

        <div style = "display: flex">
            <label class="input-form" for="avatar">Avatar</label>
            <img class='avatar' src="<?php echo $_SESSION['new_avatar'] ?>"/> <br>
        </div>

        
        <div class="button-submit">
            <button class="center-block" name='back-page'  >Sửa lại</button>    
            <button class="center-block" name="submit-confirm" >Đăng ký</button>    
        </div>
  </form>
</body>
</html>