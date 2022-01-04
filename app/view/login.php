<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../web/css/login.css">
    <title>Welcome</title>
</head>
<body>
    <div class="container">
        <form action = "welcome" method = "post">

            <div>
                <label>Người dùng</label>
                <input type = "text" class = "txt" name = "login_id"><br/>
                <?php if(isset($validate)) {
                    if(array_key_exists('login_id_empty', $validate)){
                        echo "<div class='error'>". $validate['login_id_empty'] ."</div>";
                    }
                    if(array_key_exists('login_id_len', $validate)){
                        echo "<div class='error'>". $validate['login_id_len'] ."</div>";
                    }
                }
                ?>
            </div>
            
            <div class="class_pass">
                <label>Password</label>
                <input type = "password" class = "txt" name = "password"><br/>
                <?php if(isset($validate)) {
                    if(array_key_exists('pw_empty', $validate)){
                        echo "<div class='error'>". $validate['pw_empty'] ."</div>";
                    }
                    if(array_key_exists('pw_len', $validate)){
                        echo "<div class='error'>". $validate['pw_len'] ."</div>";
                    }
                    if(isset($bad_credentials)) {
                        echo "<div class='error'>". $bad_credentials ."</div>";
                    }
                }
                ?>
            </div>
            <br>
            <div>
                <a href="request.php" style="color: black; margin-right: 50px;"><i>Quên password</i></a>
            </div>
            <input type = "submit" class = "submit" name = "login" value = "Đăng nhập">
        </form>
    </div>
</body>
</html>