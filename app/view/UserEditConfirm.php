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
            <input class="edit-input form_input" disabled type="text" name="name"
                value="<?php print $_SESSION['name'] ?>">
        </div>
        <p class="invalid-message invalid-type"></p>
        <div class="form-group">
            <label for="type-group">Phân loại</label>
            <div class="input-group form_input">

                <?php
                foreach ($transfer_type as $key => $value) {
                    $is_checked = $key == $_SESSION['type'] ? 'checked' : '';
                    print "
                    <div class='radio-group'>
                        <input disabled type='radio' $is_checked value='$key' name='type'>
                        <label for='$value'>$value</label>
                    </div>
                ";
                }
                ?>
            </div>
        </div>

        <div class="form-group">
            <label for="userid">Id</label>
            <input class="edit-input form_input" type="text" name="userid" disabled
                value="<?php print $_SESSION['userid'] ?>">
        </div>
        <p class="invalid-message invalid-avatar"></p>
        <div class="form-group">
            <label for="avatar">Avatar</label>
            <div class="img-group">
                <img src=<?php print "../../web/avatar/tmp/" . $_SESSION['nameAvatar'] ?> alt="">
                <div class="choose-img-group">
                    <input class="edit-input img-dir" hidden type="text" name="avatar">
                    <button class="other-btn btn-browse-file" hidden type="button">Browser</button>
                    <input class="input-browse-file" disabled type="file" accept="image/*" name="upload-file">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="description">Mô tả thêm</label>
            <textarea class="edit-input form_input" disabled type="text" name="description" rows="4"
                maxlength="1000"><?php print $_SESSION['description'] ?></textarea>
        </div>
        <div class="btn-group">
            <button class="submit-btn" name="back">Sửa lại</button>
            <button class="submit-btn" name="submit">Đăng ký</button>
        </div>
    </form>
</body>

</html>