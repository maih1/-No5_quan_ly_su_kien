<?php 
require_once 'app/model/EventEditModel.php';
session_start();

$id = isset($_SESSION["event_id"]) ? $_SESSION["event_id"] : '';
$event = getEventbyId($id);
$event_name = isset($_SESSION["event_name"]) ? $_SESSION["event_name"] : '';
$event_slogan = isset($_SESSION["event_slogan"]) ? $_SESSION["event_slogan"] : '';
$event_leader = isset($_SESSION["event_leader"]) ? $_SESSION["event_leader"] : '';
$event_description = isset($_SESSION["event_description"]) ? $_SESSION["event_description"] : '';

$event_avatar = '';
if(isset($_SESSION['event_avatar'])){
    $event_avatar = $_SESSION['event_avatar'];
    $target_avatar_file = '../web/avatar/avatar_tmp/' .$_SESSION['event_avatar'];
} else {
    $target_avatar_file = '../web/avatar/event' .$id.'/'. $event['avatar'];
}
?>
<html>
<head>
	<title>Sửa sự kiện</title>
	<meta charset=UTF-8>
    <link rel="stylesheet" href="../web/css/EventEdit.css">
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
        
        <label class="input-form" for="avatar">Avatar</label>
        <img id="output" src="<?php echo  $target_avatar_file; ?>"/>
        
        <div class="button-submit">
            <button class="center-block" name='back-page'  >Sửa lại</button>    
            <button class="center-block" name="submit-comfirm" >Đăng ký</button>    
        </div>
  </form>
</body>
</html>