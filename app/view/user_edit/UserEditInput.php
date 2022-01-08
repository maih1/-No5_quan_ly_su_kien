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
    <form class="edit-form" method="POST" enctype="multipart/form-data">
        <?php

        if ($errors['name'] != '') {
        ?>
        <p class="invalid-message invalid-name">
            <?php print $errors['name'];
        }
            ?></p>
        <div class="form-group">
            <label for="name">Họ và tên</label>
            <button class="submit-btn back-btn" name="edit-back">Quay lại</button>
            <input class="edit-input form_input" type="text" name="name"
                value=<?php print checkRenderData($name, 'name') ?>>
        </div>
        <p class="invalid-message invalid-type"></p>
        <div class="form-group">
            <label for="type-group">Phân loại</label>
            <div class="input-group form_input">

                <?php
                    foreach ($transfer_type as $key => $value) {
                        $is_checked = $key == ($type != null ? $type : $cur_user_value['type']) ? 'checked' : '';
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
        <?php

            if ($errors['userid'] != '') {
            ?>
        <p class="invalid-message invalid-userid">
            <?php print $errors['userid'];
            }
                ?></p>
        <div class="form-group">
            <label for="userid">Id</label>
            <input class="edit-input form_input" type="text" name="userid"
                value="<?php print checkRenderData($userid, 'user_id') ?>">
        </div>
        <?php

                if ($errors['avatar'] != '') {
                ?>
        <p class="invalid-message invalid-avatar">
            <?php print $errors['avatar'];
                }
                    ?></p>
        <div class="form-group">
            <label for="avatar">Avatar</label>
            <div class="img-group">
                <img src=<?php print checkExistAvatar() ?>>
                <div class="choose-img-group">
                    <input class="edit-input img-dir" readonly type="text" name="avatar"
                        value=<?php print checkRenderData($avatar, 'avatar') ?>>
                    <button class="other-btn btn-browse-file" type="button">Browser</button>
                    <input class="input-browse-file" type="file" accept="image/*" name="upload-file">
                </div>
            </div>
        </div>
        <?php

                    if ($errors['description'] != '') {
                    ?>
        <p class="invalid-message invalid-description">
            <?php print $errors['description'];
                    }
                        ?></p>
        <div class="form-group">
            <label for="description">Mô tả thêm</label>
            <textarea class="edit-input form_input" type="text" name="description" rows="4"
                maxlength="1000"><?php print checkRenderData($description, 'description') ?></textarea>
        </div>
        <div class="btn-group">
            <button class="submit-btn" name="submit">Xác nhận</button>
        </div>
    </form>
    <script type="text/javascript" src="../../web/js/UserEditInput.js"></script>
</body>

</html>