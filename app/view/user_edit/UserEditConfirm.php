<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../web/css/UserEditTable.css" type="text/css" />
    <title>Xác nhận chỉnh sửa người dùng</title>
</head>

<body>
    <form class="edit-form" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="name">Họ và tên</label>
            <label class="confirm-label" name="name"><?php print $_SESSION['name'] ?>
        </div>
        <div class="form-group">
            <label for="type-group">Phân loại</label>
            <label class="confirm-label" name="type"><?php print $transfer_type[$_SESSION['type']] ?>
        </div>

        <div class="form-group">
            <label for="userid">Id</label>
            <label class="confirm-label" name="type"><?php print $_SESSION['userid'] ?>
        </div>
        <div class="form-group">
            <label for="avatar">Avatar</label>
            <div class="img-group">
                <img src=<?php print checkExistAvatar() ?> alt="">
                <div class="choose-img-group">
                    <input class="edit-input img-dir" hidden type="text" name="avatar">
                    <button class="other-btn btn-browse-file" hidden type="button">Browser</button>
                    <input class="input-browse-file" disabled type="file" accept="image/*" name="upload-file">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="description">Mô tả thêm</label>
            <label class="confirm-label description-confirm" name="type"><?php print $_SESSION['description'] ?>

        </div>
        <div class="btn-group">
            <button class="submit-btn" name="back">Sửa lại</button>
            <button class="submit-btn" name="submit">Đăng ký</button>
        </div>
    </form>
</body>

</html>