<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '' , 'no5');
if (!$conn) {
    die('không thể kết nối' .mysql_errno());
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
    <div class="container">
        <form action = "index.php" method = "post">

            <div>
                <label>username</label>
                <input type = "text" class = "txt" name = "login_id"><br/>
            </div>
            
            <div class="class_pass">
                <label>password</label>
                <input type = "password" class = "txt" name = "password"><br/>
            </div>
            <br>
            <div>
                <a href="requast.php" style="color: black; margin-right: 50px;"><i>Quên password</i></a>
            </div>

            <input type = "submit" class = "submit" name = "login" value = "Đăng nhập">

        </form>
    </div>

<?php
    
    if (isset($_POST['login'])){

        $login_id = $_POST['login_id'];
        $password = $_POST['password'];

        $login_id = mysqli_real_escape_string($conn, $login_id);
        $password = mysqli_real_escape_string($conn, $password);

        $select = mysqli_query($conn," SELECT * FROM admins WHERE login_id = '$login_id' AND password = '$password'");

        $row  = mysqli_fetch_array($select);

        // if ($login_id == $row['']) {
        //     echo '<script type = "text/javascript">';
        //     echo 'alert("hãy nhập login id");';
        //     echo 'window.location.href = "index.php" ';
        //     echo '</script>';
        // }

        // if ($password == $row['']) {
        //     echo '<script type = "text/javascript">';
        //     echo 'alert("hãy nhập password");';
        //     echo 'window.location.href = "index.php" ';
        //     echo '</script>';
        // }

        // $str_login="logi";
        // if (strlen($login_id) < strlen($str_login) ){
        //     if(is_array($row)) {
        //         $_SESSION["login_id"] = $row['login_id'];
        //         $_SESSION["password"] = $row['password'];

        //         echo '<script type = "text/javascript">';
        //         echo 'alert("hãy nhập login id tối thiểu 4 kí tự");';
        //         echo 'window.location.href = "index.php" ';
        //         echo '</script>';
        //     }

        // }

        // $str_password="passwo";
        // if (strlen($password) < strlen($str_password)){
        //     echo '<script type = "text/javascript">';
        //     echo 'alert("hãy nhập password tối thiểu 6 kí tự");';
        //     echo 'window.location.href = "index.php" ';
        //     echo '</script>';
        // }

        if(is_array($row)) {
            $_SESSION["login_id"] = $row['login_id'];
            $_SESSION["password"] = $row['password'];
        }
        else{
            echo '<script type = "text/javascript">';
            echo 'alert("login id và password không đúng");';
            echo 'window.location.href = "index.php" ';
            echo '</script>';
        }
    }

    // $actived_flag = mysqli_query($conn, "SELECT * FROM admins WHERE actived_flag = 'actived_flag'");
    if(isset($_SESSION["login_id"])){
        header("Location:login.php");
    }
?>
</body>
</html>