<!DOCTYPE html>
<html>
    <head>
        <link href="../../web/style.css" rel="stylesheet">
        <meta charset="utf-8">
        <title>Reset</title>
    </head>
    <body>

        <div class="div_home">
            <form action="../controller/Reset.php" method="POST">
                <table>
                    <?php
                    include '../model/Query.php';
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
                            <td>' . $row["name"] . '</td>
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