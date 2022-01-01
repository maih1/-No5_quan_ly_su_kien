<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" type="text/css" href="../../web/style.css" />
        <title>Login</title>
        <meta charset="utf-8">
    </head>

    <body>
        <div align="center" class="div_home">
            <form>
                <div id="div_label">
                    <label id="label">Người dùng</label>
                    <input type="text" name="user" id="div_input">
                </div>

                <div id="div_label">
                    <label id="label">Password</label>
                    <input type="password" name="pw" id="div_input">
                </div>

                <div id="div_forgotPW">
                    <a href="../view/request_input.php"><i>Quên mật khẩu</i></a>
                </div>

                <div>
                    <button type="submit" id="div_button">Đăng nhập</button>
                </div>

            </form>
        </div>
    </body>
</html>