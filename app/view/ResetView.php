<!DOCTYPE html>
<html>

<head>
    <link href="../web/css/Reset.css" rel="stylesheet">
    <meta charset="utf-8">
    <title>Reset</title>
</head>

<body>

    <div class="div_home">
        <form action="../Reset/resets" method="POST">
            <table>
                <?php
                require_once './app/model/ResetModel.php';
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

                    if (isset($validate)) {
                        $pos_top = 40 + ($i-1)*60;
                        if (array_key_exists('pw_empty', $validate) && $validate['pw_empty'] == $i) {
                            
                            echo "<tr><div style='color:red; position: relative;right: 15px; top: $pos_top'>" . "Hãy nhập mật khẩu" . "</div></tr>";
                        }
                        if(array_key_exists('pw_length', $validate) && $validate['pw_length'] == $i){
                            echo "<div class='error' style='color:red; position: relative;right: 15px; top: $pos_top'>" . "Hãy nhập username tối thiểu 6 kí tự" . "</div>";
                            
                        }
                    }

                    echo
                    '<tr>
                            <td>' . $i . '</td>                   
                            <td>' . $row["login_id"] . '</td>
                            <td><input type="text" name="input_reset' . $i . '" id="div_input" ></td>
                
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