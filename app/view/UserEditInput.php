<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../web/css/UserEditTable.css" type="text/css" />
    <title>Chỉnh Sửa Người Dùng</title>
</head>

<body>
    <form class="edit-form" method="POST" action="">
        <p class="invalid-message invalid-name"></p>
        <div class="form-group">
            <label for="name">Họ và tên</label>
            <input class="edit-input form_input" type="text" name="name" value="<?php print $cur_user_value["name"] ?>">
        </div>
        <p class="invalid-message invalid-type"></p>
        <div class="form-group">
            <label for="type-group">Phân loại</label>
            <div class="input-group form_input">

                <?php
                foreach ($transfer_type as $key => $value) {
                    $is_checked = $key == $cur_user_value["type"] ? 'checked' : '';
                    print "
                    <div class='radio-group'>
                        <input type='radio' $is_checked value='$key' name='type'>
                        <label for='$value'>$value</label>
                    </div>
                ";
                }
                ?>
            </div>
        </div>
        <p class="invalid-message invalid-userid"></p>
        <div class="form-group">
            <label for="userid">Id</label>
            <input class="edit-input form_input" type="text" name="userid"
                value="<?php print $cur_user_value["user_id"] ?>">
        </div>
        <p class="invalid-message invalid-avatar"></p>
        <div class="form-group">
            <label for="avatar">Avatar</label>
            <div class="img-group">
                <img src="" alt="">
                <div class="choose-img-group">
                    <input class="edit-input img-dir" type="text" name="avatar">
                    <button class="other-btn btn-browse-file" type="button">Browser</button>
                    <input class="input-browse-file" type="file" accept="image/*">
                </div>
            </div>
        </div>
        <p class="invalid-message invalid-description"></p>
        <div class="form-group">
            <label for="description">Mô tả thêm</label>
            <textarea class="edit-input form_input" type="text" name="description" rows="4" maxlength="1000"></textarea>
        </div>
        <div class="btn-group">
            <button class="submit-btn">Xác nhận</button>
        </div>
    </form>
    <script type="text/javascript" src="../../web/js/UserEditInput.js"></script>
</body>

</html>