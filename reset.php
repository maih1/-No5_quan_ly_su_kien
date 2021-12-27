<!DOCTYPE html>

<html>

    <head>
        <link href="style.css" rel="stylesheet">
        <meta charset="utf-8">
    </head>

    <body>
        <div>
            <form action="reset.php" method="POST">
                <table>
                    <?php
                    $host = "localhost";
                    $dbname = "giuaki";
                    $username = "root";
                    $password = "";
                    $conn = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $username, $password);

                    $query = 'SELECT users.name FROM users INNER JOIN admins ON admins.login_id = users.user_id WHERE admins.login_id = users.user_id AND admins.reset_password_token <> ""';
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
                            <td><input type="pasaword" name="input_reset"></td> 
                            <td><button type="submit">Reset</button></td>                     
                        </tr>';
                        $i++;
                    }

                    if (isset($_POST["submit"])) {

                        try {
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $new_password = $_POST["input_reset"];
                            $a = $_POST["user_request"];
                            $sql_1 = "UPDATE admins SET admins.reset_password_token ='' AND admins.password=MD5('$new_password') WHERE admins.login_id='$a'";
                            $stmt_1 = $conn->prepare($sql_1);
                            $stmt_1->execute();
                        } catch (Exception $ex) {
                            echo $query_1 . "<br>" . $ex->getMessage();
                        }
                    }
                    ?>
                </table>  
            </form>          
        </div>
    </body>
</html>