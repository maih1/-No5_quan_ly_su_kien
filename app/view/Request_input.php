<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="../../web/style.css" rel="stylesheet">
    <title>Request</title>
</head>

<body>
    <div class="div_home">
        <form action='../controller/RequestController.php' method="POST">

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

            <div id="div_forgotPW">
                <a href="../view/login.php"><i>Về trang Login</i></a>
            </div>


        </form>
    </div>
</body>

</html>