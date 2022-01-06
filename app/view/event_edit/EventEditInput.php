<html>

<head>
    <title>Sửa sự kiện</title>
    <meta charset=UTF-8>
    <link rel="stylesheet" href="../../web/css/EventEdit.css">
    <script type="text/javascript" async src="../../web/js/RealFileBtn.js"></script>
    <script type="text/javascript" async src="../../web/js/PreviewImg.js"></script>

</head>

<body>
    <form method="post" <?php echo 'action="../eventEditInput/' . $event_id . '"' ?> enctype="multipart/form-data">
        <button id="back-home" name="back-home" >Quay lại</button><br>

        <?php if (isset($validate) ) {
            if (array_key_exists('name', $validate) && $validate['name'] != '') {
                echo "<span class='error'>" . $validate['name'] . "</span>";
            }
            if(array_key_exists('name_length', $validate) && $validate['name_length'] != ''){
                echo '<span class="error">' . $validate['name_length'] .'</span>';
            }
        } ?>
        <label class="input-form" for="name">Tên sự kiện</label>
        <input id="name" type="text" name="event_name" maxlength="" value="<?php echo $event_name; ?>"><br>

        <?php if (isset($validate) ) {
            if (array_key_exists('slogan', $validate) && $validate['slogan'] != '' ) {
                echo "<span class='error'>" . $validate['slogan'] . "</span>";
            }
            if(array_key_exists('slogan_length', $validate) && $validate['slogan_length'] != '' ){
                echo '<span class="error">' . $validate['slogan_length'] .'</span>';
            }
        } ?>
        <label class="input-form" for="slogan">Slogan</label>
        <input id="slogan" type="text" name="event_slogan" maxlength="" value="<?php echo $event_slogan; ?>"><br>

        <?php if (isset($validate)   ) {
            if (array_key_exists('leader', $validate) && $validate['leader'] != '' ) {
                echo "<span class='error'>" . $validate['leader'] . "</span>";
            }
            if(array_key_exists('leader_length', $validate) && $validate['leader_length'] != '' ){
                echo '<span class="error">' . $validate['leader_length'] .'</span>';
            }
        } ?>
        <label class="input-form" for="leader">Leader</label>
        <input id="leader" type="text" name="event_leader" maxlength="" value="<?php echo $event_leader; ?>"><br>

        <?php if (isset($validate)   ) {
            if (array_key_exists('description', $validate) && $validate['description'] != '' ) {
                echo "<span class='error'>" . $validate['description'] . "</span>";
            }
            if(array_key_exists('description_length', $validate) && $validate['description_length'] != '' ){
                echo '<span class="error">' . $validate['description_length'] .'</span>';
            }
        } ?>

        <label class="input-form" for="description">Mô tả chi tiết</label>
        <textarea id="description" name="event_description" maxlength=""><?php echo $event_description; ?> </textarea><br>

        <label class="input-form" for="avatar"></label>
        <input type="file" id="real-file" name="upload-file" hidden="hidden" accept="image/*" onchange="loadFile(event);" /><br>

        <div style="display: flex">
            <label class="input-form" for="avatar">Avatar</label>
            <div>
                <img class='avatar' id='output' src="<?php echo $event_avatar; ?>" /> <br>

                <input id="custom-text" type="text" name="event_avatar" readonly="readonly" value="<?php if (isset($_SESSION['new_name_avatar'])) {
                                                                                                        echo $_SESSION['new_name_avatar'];
                                                                                                    }; ?>">
                <button type="button" id="custom-button">Browse</button><br>
            </div>
        </div>

        <div class="button-submit">
            <button class="center-block" type="submit" name='submit' value="Xác nhận">Xác nhận</button>
        </div>
    </form>
</body>

</html>