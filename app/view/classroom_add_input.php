<?php
    // include 'control.inc';
?>
<html>
<head>
	<title>Đăng ký tân sinh viên</title>
	<meta charset=UTF-8>
    <link rel="stylesheet" href="../../web/css/add.css">
    <script async src="../../web/js/addRealFileBtn.js"></script>
</head>
<body>
    
    <form method="post" action="regist.php" >   

        <label class="input-form" for="name">Tên sự kiện</label>
        <input id="name" type="text" name="name" value=" "><br>        
        
        <label class="input-form" for="slogan">Slogan</label>
        <input id="slogan" type="text" name="slogan" value=""><br>        
       
        <label class="input-form" for="slogan">Leader</label>
        <input id="leader" type="text" name="leader" value=""><br>        
       
        <label class="input-form" for="mt">Mô tả chi tiết</label>
        <textarea id="mt" name="mt" maxlength="1000"></textarea><br>        
       
        <label class="input-form" for="avater">Avatar</label>
        <input type="file" id="real-file" hidden="hidden" accept="image/*"/>
        <input id="custom-text" type="text" value="">
        <button type="button" id="custom-button">Browse</button>

        <button class="center-block" type="submit" name='submit' formaction="">Xác Nhận</button>    
            
  </form>
</body>
</html>