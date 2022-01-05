<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../web/css/comments.css"/>
    <script async src="../../web/js/CommentAddRealFileBtn.js"></script>
    <title>Add Event Comment</title>
</head>
<body>
    <div id="mainform">
        <div>
            <h3><?php echo 'Tên sự kiện: '. $eventName[0]['name']; ?></h3>
        </div>
        <div class="div-right">
            <button class="btn-back" onclick="window.location.href='../../EventSearch/eventSearch'">Quay lại</button>
        </div>
        <br>
        <div>
            <label id="section-name"> &#9650; Comments đã đăng ký</label>
            <table>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Avatar</th>
                        <th>Nội dung comment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $count = 1;
                        foreach($listComments as $row) {
                            echo '<tr>
                                <td>No'.$count.'</td>
                                <td><img src="../../web/avatar/event/' . $event_id . '/' . $row['id'] . '/' .$row['avatar'].'"></td>
                                <td>'.$row['content'].'</td>
                                <td><button class="edit" onclick="window.location.href=\'../editComment/'.$row['event_id'].'/'.$row['id'].'\'">Sửa</button></td>
                                </tr>
                            ';
                            $count++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <br>
        <label id="section-name">&#9650; Thêm mới comment</label>
        <form id="avatarform" enctype="multipart/form-data" <?php echo 'action="../addComment/' . $event_id . '"'; ?> method="POST" >
            <div style="display: flex">
                <label class="input-form" for="avatar">Avatar</label>
                <input type="file" class="hidden" id="file" name="file"/>
                <input id="custom-text" type="text">
                <button type="button" id="uploadTrigger">Browse</button>
            </div>
            <div><img id="avatar-preview" style="margin-left: 175px;"></div>
            <?php if(isset($validate)) {
                if(array_key_exists('avatar', $validate)){
                    echo "<div class='error'>". $validate['avatar'] ."</div>";
                }
            } ?>
            <br>
            <div>
                <label class="input-form">Nội dung</label>
                <textarea form="avatarform" name="comment" id="comment-area" cols="60" rows="10" wrap="hard"></textarea>
            </div>
            <?php if(isset($validate)) {
                if(array_key_exists('content', $validate)){
                    echo '<div class="error">' . $validate['content'] .'</div>';
                }
                if(array_key_exists('contentLength', $validate)){
                    echo '<div class="error">' . $validate['contentLength'] .'</div>';
                }
            } ?>
            <input class="center-block" type="submit" name="submit" value="Thêm mới">
        </form>
        
    </div>
</body>
</html>