<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset=UTF-8>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User search</title>
    <link rel="stylesheet" href="../web/css/user_search_view.css">

</head>
<body>
    <form method="GET">
        <div class="form_search" >
            <label for="phanloai"><?php echo "Phân loại" ?> </label>
            <select id="phanloai" name="phanloai">    
                <?php
                foreach($classify as $row => $q){
                    ?>
                        <option><?php echo $row; ?></option>
                    <?php   
                } 
            ?>
            </select>
            <label class="key" for="key"><?php echo "Từ khóa" ?> </label>
            <input id="key" type="text" name="key" maxlength="100">         
            <br>

            <button id="search" type="submit" name="submit">Tìm kiếm</button>
        </div>

        <div class="resutl">
            <p>Số sinh viên tìm thấy: 
            <?php if(isset($search)) echo ' ',sizeof($search); else echo ' ',0;?>
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
                if(isset($search)){
                    foreach ($search as $key => $row) { ?>
                    <tr>
                            <td id="td1"><?php echo $row['id']; ?></td>
                            <td id="td2"><?php echo $row['name']; ?></td>
                            <td id="td3"><?php
                                foreach ($classify as $k => $v) {
                                    if($row['type'] == $v){
                                        echo "$k", PHP_EOL;  
                                    }
                                }
                                ?></td>
                            <td id="td3"><?php echo $row['description']; ?></td>
                            <td id="td">
                                <button id="butt" type="submit" name="del" onclick="return confirm('Bạn chắc chắn muốn xóa user <?php echo $row['name'];?>');"value ="<?php echo $row[0];?>">Xóa</button>

                                <button id="butt" type="submit" name="edit">Sửa</button>
                            </td>
                    </tr>
                    <?php
                    }
                }
            ?>
        </div>
    </form>
</body>
</html>