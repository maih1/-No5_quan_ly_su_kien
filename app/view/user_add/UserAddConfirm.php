<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký người dùng</title>
    <link rel="stylesheet" href="../web/css/UserAdd.css">
    <script type="text/javascript" async src="../web/js/UserAddPreviewImg.js"></script>
</head>

<body>

    <form method="post" action="">

        <!-- User name -->
        <label class="input-form" for="name">Họ và tên</label>
        <label class="add-confirm"><?php echo $_SESSION['name'] ?></label><br>

        <!-- User type -->
        <label class="input-form" for="type">Phân loại</label>
        <label class="add-confirm"><?php echo $_SESSION['type']; ?></label><br>

        <!-- User id -->
        <label class="input-form" for="user_id">ID</label>
        <label class="add-confirm"><?php echo $_SESSION['user_id']; ?></label><br>

        <!-- User avatar -->
        <label class="input-form" for="avatar">Avatar</label>
        <img id="output" src="<?php echo '../'.$_SESSION['avatar']; ?>" /><br>
        
        <!-- User description -->
        <label class="input-form" for="description">Mô tả thêm</label>
        <label id="des"><?php echo $_SESSION['description']; ?></label><br>

        <div class="button-submit">
            <button class="center-block" name='back-page'>Sửa lại</button>
            <button class="center-block" name="submit-confirm">Đăng ký</button>
        </div>
       
    </form>
</body>

</html>