<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="../web/css/Reset.css" rel="stylesheet">
    <title>Yêu cầu đặt lại mật khẩu</title>
</head>

<body>
    <div class="div_home">
        <form action='../Request/request' method="POST">

            <div id="div_label">
                <?php if (isset($validate)) {
                    if (array_key_exists('login_id_empty', $validate)) {
                        echo "<div class='error' style='color:red; margin-left: 100px'>" . $validate['login_id_empty'] . "</div>";
                    }
                    if (array_key_exists('login_id_length', $validate)) {
                        echo "<div class='error' style='color:red; margin-left: 50px'>" . $validate['login_id_length'] . "</div>";
                    }
                    if(array_key_exists('login_id', $validate)) {
                        echo "<div class='error' style='color:red; margin-left: 100px'>" . $validate['login_id'] . "</div>";
                    }
                }
                ?>
                <label id="label">Người dùng</label>
                <input type="text" name="user_request" id="div_input">
            </div>

            <div>
                <button type="submit" name="submit_button" id="div_button">Gửi yêu cầu request password</button>
            </div>


        </form>
    </div>
</body>

</html>