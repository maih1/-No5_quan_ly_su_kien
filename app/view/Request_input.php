<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="../../web/style.css" rel="stylesheet">
        <title>Request</title>
    </head>
    <body>
        <div align="center" class="div_home">
            <form action='../controller/request.php' method="POST">
                <div id="div_label">
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
