<!DOCTYPE html>
<html>

    <body>
        <div>
            <form action="request.php" method="POST">
                <label>Người dùng</label>
                <input type="text" name="user_request">
                <button type="submit" name="submit_button">Gửi yêu cầu request password</button>

                <?php
                session_start();

                $host = "localhost";
                $dbname = "giuaki";
                $username = "root";
                $password = "";
                $conn = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $username, $password);

                $query = 'SELECT * FROM users';
                $sql = $conn->prepare($query);
                $sql->setFetchMode(PDO::FETCH_ASSOC);
                $sql->execute();
                $result = $sql->fetchAll();

                if (isset($_POST['submit_button'])) {
                    $res = "";
                    if (isset($_POST['user_request'])) {
                        $request = $_POST['user_request'];
                        if (strlen($request) < 4) {
                            echo "Hãy nhập login id tối thiểu 4 kí tự </br>";
                            echo "Hãy nhập lại!";
                        } else {
                            foreach ($result as $row) {
                                if ($row['user_id'] != $request) {
                                    $res = "false";
                                } else {
                                    $res = "true";
                                    break;
                                }
                            }

                            if ($res == "true") {
                                try {
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $key = $_POST['user_request'];
                                    $query_1 = "UPDATE admins SET admins.reset_password_token = UNIX_TIMESTAMP(now(6)) WHERE admins.login_id = '$key'";
                                    $stmt = $conn->prepare($query_1);
                                    $stmt->execute();
                                    header('Location: login.php');
                                    exit();
                                } catch (Exception $ex) {
                                    echo $query_1 . "<br>" . $ex->getMessage();
                                }
                            } else {
                                echo "Login id không tồn tại trong hệ thống </br>";
                                echo "Hãy nhập lại!";
                            }
                        }
                    }
                }
                ?>
            </form>
        </div>
    </body>

</html>