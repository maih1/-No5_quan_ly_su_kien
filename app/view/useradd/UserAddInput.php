<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="web/css/UserAdd.css">
    <script type="text/javascript" async src="web/js/UserAddReadFileBtn.js"></script>
    <title>Đăng ký người dùng</title>
</head>

<body>

    <?php
    // echo $check;
    ?>
    <form method="post" action="UserAddInput.php" enctype="multipart/form-data">

        <!-- User name -->
        <?php if (getError('name')) { ?>
            <span class="error"><?php echo getError('name'); ?></span><br>
        <?php } ?>
        <label class="input-form" for="name">Họ và tên</label>
        <input id="name" type="text" name="name" maxlength="100" value="<?php getValue($name, 'name'); ?>"><br>

        <!-- User type -->
        <?php if (getError('type')) { ?>
            <span class="error"><?php echo getError('type'); ?></span><br>
        <?php } ?>
        <section class="input-form" for="type">
            <p>Phân loại</p>
            <label for="teacher_type"><input id="teacher_type" type="radio" name="user_type" value="<?php getValue($type, 'type'); ?>" checked>Giáo viên</label>
            <label for="student_type"><input id="student_type" type="radio" name="user_type" value="<?php getValue($type, 'type'); ?>">Sinh viên</label>
            <label for="old_student_type"><input id="old_student_type" type="radio" name="user_type" value="<?php getValue($type, 'type'); ?>">Sinh viên cũ</label>
        </section>

        <!-- User id -->
        <?php if (getError('user_id')) { ?>
            <span class="error"><?php echo getError('user_id'); ?></span><br>
        <?php } ?>
        <label class="input-form" for="user_id">ID</label>
        <input id="user_id" type="text" name="user_id" maxlength="250" value="<?php getValue($user_id, 'user_id'); ?>"><br>

        <!-- User avatar -->
        <?php if (getError('avatar')) { ?>
            <span class="error"><?php echo getError('avatar'); ?></span><br>
        <?php } ?>
        <label class="input-form" for="avatar">Avatar</label>
        <input type="file" id="real-file" name="upload-file" hidden="hidden" accept="image/*" />
        <input id="custom-text" type="text" name="avatar" readonly="readonly" value="<?php getValue($avatar, 'nameAvatar'); ?>">
        <button type="button" id="custom-button">Browse</button><br>

        <!-- User description -->
        <?php if (getError('description')) { ?>
            <span class="error"><?php echo getError('description'); ?></span><br>
        <?php } ?>
        <label class="input-form" for="description">Mô tả chi tiết</label>
        <textarea id="description" name="description" maxlength="1000"><?php getValue($description, 'description'); ?></textarea><br>

        <div class="button-submit">
            <button class="center-block" type="submit" name='submit' formaction="<?php isComfirms(); ?>">Xác Nhận</button>
        </div>

    </form>

</body>

</html>