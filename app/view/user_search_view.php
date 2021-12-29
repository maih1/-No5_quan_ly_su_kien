<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User search</title>
    <link rel="stylesheet" href="../../web/css/user_search_view.css">

</head>
<body>
    <?php
        require '../model/user.php';
    ?>
    <form action="" method="get">
        <div class="form_search" >
            <label for="phanloai"><?php echo "Phân loại" ?> </label>
            <select id="phanloai" name="phanloai">    
                <?php
                //$classify = array(1 => "Sinh viên", 2 => "Giáo viên", 3 => "Sinh viên cũ");
                $classify['1'] = "Sinh viên";
                $classify['2'] = "Giáo viên";
                $classify['3'] = "Sinh viên cũ";
                foreach($classify as $row){
                    ?>
                        <option><?php echo $row; ?></option>
                    <?php   
                } 
            ?>
            </select>
            <label for="key"><?php echo "Từ khóa" ?> </label>
            <input id="key" type="text" name="key">
            <br>

            <button id="search" type="submit" name="search">Tìm kiếm</button>
        </div>

        <div class="resutl">
            <p>Số sinh viên tìm thấy: 
                <?php 
                    echo $count;
                ?>
            </p>
            <table>
            <tr>
                <th id="th1">No</th>
                <th id="th2">Tên thành viên</th>
                <th id="th3">Phân loại</th>
                <th id="th2">Mô tả chi tiết</th>
                <th id="th">Action</th>
            </tr>
            <?php
                require '../controller/user_action.php';
            ?>
        </div>
    </form>
</body>
</html>