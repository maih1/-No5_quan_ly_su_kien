<!DOCTYPE html>

<html>

<head>
    <!--<link href="../../web/style.css" rel="stylesheet">-->
    <meta charset="utf-8">
    <title>Reset</title>
</head>

<body>

    <div>
        <form action="reset.php" method="POST">
            <table>
                <?php
                include '../common/db.php';
                $query = 'SELECT users.name, users.user_id  FROM users INNER JOIN admins ON admins.login_id = users.user_id WHERE admins.login_id = users.user_id AND admins.reset_password_token <> ""';
                $sql = $conn->prepare($query);
                $sql->setFetchMode(PDO::FETCH_ASSOC);
                $sql->execute();
                $result = $sql->fetchAll();

                echo
                '<tr>
                        <td>NO</td>                   
                        <td>Tên người dùng</td>
                        <td>Mật khẩu mới</td> 
                        <td>Action</td>   
                    </tr>';
                $i = 1;
                foreach ($result as $row) {

                    echo
                    '<tr>
                            <td>' . $i . '</td>                   
                            <td>' . $row["name"] . '</td>
                            <td><input type="text" name="input_reset"></td> 
                            <td><button type="submit" class="button" name="button_reset' . $i . '">Reset</button></td>                     
                        </tr>';
                    $i++;
                }

                $k = 1;
                foreach ($result as $row) {
                    if (isset($_POST["button_reset.$k"])) {
                        try {
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $new_password = $_POST["input_reset.$k"];
                            $i = $row["user_id"];
                            $sql_1 = "UPDATE admins SET admins.password='$new_password' WHERE admins.login_id= '$i';
                                         UPDATE admins SET admins.reset_password_token = \'\' WHERE admins.login_id= '$i';";
                            $stmt_1 = $conn->prepare($sql_1);
                            $stmt_1->execute();
                        } catch (Exception $ex) {
                            echo $sql_1 . "<br>" . $ex->getMessage();
                        }
                    }
                    $k++;
                }
                ?>
            </table>
        </form>
    </div>





</body>

</html>