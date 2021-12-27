<?php
    include 'include/db.php';
    include 'include/EventCommentModel.php'
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="static/comments.css"/>
    <script async src="static/addRealFileBtn.js"></script>
    <title>Event Comment</title>
</head>
<body>
    <div id="mainform">
        <div>
            <h3><?php echo 'Tên sự kiện: '. $data[0]['event_id_name']; ?></h3>
        </div>
        <br>
        <div>
            <label id="section-name"> &#9650; Comments đã đăng ký</label>
            <table>
                <tr>
                    <th>NO</th>
                    <th>Avatar</th>
                    <th>Nội dung comment</th>
                </tr>
                <?php
                    foreach($data as $row) {
                        echo '<tr>
                            <td>No'.$row['id'].'</td>
                            <td><img src="images/'.$row['avatar'].'"></td>
                            <td>'.$row['content'].'</td>
                            </tr>
                        ';
                    }
                ?>
            </table>
        </div>
        <br>
        <label id="section-name">&#9650; Sửa comment</label>
        <form id="avatarform" method="post" action="editComments.php">
            <div style="display: flex">
                <label class="input-form" for="avatar">Avatar</label>
                <input type="file" id="real-file" hidden="hidden" accept="images/*">
                <input id="custom-text" type="text" value="">
                <button type="button" id="custom-button">Browse</button>
            </div>
            <div><img id="avatar-preview" style="margin-left: 175px;"></div>
            <br>
            <div>
                <label class="input-form">Nội dung</label>
                <textarea form="avatarform" name="comment" id="text-area" cols="60" rows="10" wrap="hard" maxlength="1000"></textarea>
            </div>

            <button class="center-block" type="submit" name="submit">Submit</button>
        </form>
        
    </div>
</body>
</html>