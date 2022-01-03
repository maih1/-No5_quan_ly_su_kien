<html>
<head>
	<title>Sửa sự kiện</title>
	<meta charset=UTF-8>
    <link rel="stylesheet" href="../../web/css/EventEdit.css">
    <script async src="../web/js/EventEditScript.js"></script>
</head>
<body>
    <form method="post" action="">   

        <label class="input-form" for="name">Tên sự kiện</label>
        <label class="add-comfirm"><?php echo $event_name;?></label><br>        
        
        <label class="input-form" for="slogan">Slogan</label>
        <label class="add-comfirm"><?php echo $event_slogan;?></label><br>                
       
        <label class="input-form" for="slogan">Leader</label>
        <label class="add-comfirm"><?php echo $event_leader;?></label><br>         
       
        <label class="input-form" for="description">Mô tả chi tiết</label>
        <label id="des"><?php echo $event_description;?></label><br>         
        
        <div style = "display: flex">
            <label class="input-form" for="avatar">Avatar</label>
            <img class='avatar' src="../../web/avatar/event/<?php echo $event_id; ?>/<?php echo $event_avatar; ?>"/> <br>
        </div>

        
        <div class="button-submit">
            <button class="center-block" name='back-page'  >Sửa lại</button>    
            <button class="center-block" name="submit-comfirm" >Đăng ký</button>    
        </div>
  </form>
</body>
</html>