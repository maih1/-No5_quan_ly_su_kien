<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../web/css/comments.css"/>
    <!-- <link rel="stylesheet" type="text/css" href="../web/css/util.css"/> -->
    <title>Event Comment</title>
</head>
<body>
    <form>
        <div>
            <h3><?php echo 'Tên sự kiện: '. $data['comments'][0]['event_id_name']; ?></h3>
        </div>
        <br>
        <div>
            <label>Comments đã đăng ký</label>
            <table>
                <tr>
                    <th>NO</th>
                    <th>Avatar</th>
                    <th>Nội dung comment</th>
                </tr>
                <?php
                    foreach($data['comments'] as $row) {
                        echo '<tr>
                            <td>No'.$row['id'].'</td>
                            <td><img src="../web/image/'.$row['avatar'].'"></td>
                            <td>'.$row['content'].'</td>
                            </tr>
                        ';
                    }
                ?>
            </table>
        </div>
        <br>
        <div>
            <label>Sửa comment</label>
            <form>
                <div>
                    <label>Avatar</label>
                    <input type="file" name="avatar" id="avatar">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </form>
</body>
</html>