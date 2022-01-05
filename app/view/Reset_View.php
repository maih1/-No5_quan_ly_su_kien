<!DOCTYPE html>
<html>

<head>
    <link href="../web/style.css" rel="stylesheet">
    <meta charset="utf-8">
    <title>Reset</title>
</head>

<body>

    <div class="div_home">
        <form action="../controller/Reset.php" method="POST">
            <table>
                <?php
                require_once './app/model/Query.php';
                $result = take_Name_ID();

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
                            <td>' . $row["login_id"] . '</td>
                            <td><input type="text" name="input_reset' . $i . '" id="div_input" ></td>';
                    if (isset($validate)) {
                        if (array_key_exists('pw_empty', $validate)) {
                            echo "<div class='error' style='color:red; margin-left: 100px'>" . $validate['pw_empty'] . "</div>";
                        }
                        if(array_key_exists('pw_length', $validate)){
                            echo "<div class='error' style='color:red; margin-left: 100px'>" . $validate['pw_length'] . "</div>";
                        }
                    }
                    echo '
                            <td><button type="submit" id="div_button" name="button_reset' . $i . '">Reset</button></td>                     
                        </tr>';
                    $i++;
                }
                ?>
            </table>
        </form>
    </div>

</body>

</html>