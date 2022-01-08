<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset=UTF-8>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm người dùng</title>
    <link rel="stylesheet" href="../web/css/UserSearchView.css">

</head>

<body>
    <form method="GET">
        <div class="form_search">
            <button id="back" type="button" name="schedule" onclick="window.location.href='../Login/home'"
                formaction="">Quay lại</button>
            <br>
            <label for="phanloai"><?php echo "Phân loại" ?> </label>
            <select id="phanloai" name="phanloai">
                <option value=""></option>
                <?php
                foreach ($classify as $row => $q) {
                ?>

                <option value="<?php echo $row ?>"><?php echo $q; ?></option>
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
                <?php if (isset($search)) echo ' ', sizeof($search);
                else echo ' ', 0; ?>
            </p>
            <table>
                <tr>
                    <th id="th1">No</th>
                    <th id="th2" class="col-name">Tên thành viên</th>
                    <th id="th3" class="col-type">Phân loại</th>
                    <th id="th2" class="col-description">Mô tả chi tiết</th>
                    <th id="th" class="col-action">Action</th>
                </tr>
                <?php
                if (isset($search)) {
                    foreach ($search as $key => $row) { ?>
                <tr>
                    <td id="td1"><?php echo $row['id']; ?></td>
                    <td id="td2" class="col-name"><?php echo $row['name']; ?></td>
                    <td id="td3" class="col-type"><?php
                                                            foreach ($classify as $k => $v) {
                                                                if ($row['type'] == $k) {
                                                                    echo "$v", PHP_EOL;
                                                                }
                                                            }
                                                            ?></td>
                    <td id="td3" class="col-description"><?php echo $row['description']; ?></td>
                    <td id="td" class="col-action">
                        <button id="butt" type="submit" name="del"
                            onclick="return confirm('Bạn chắc chắn muốn xóa user <?php echo $row['name']; ?>');"
                            value="<?php echo $row[0]; ?>">Xóa</button>

                        <button type="button"
                            onclick="window.location.href='../UserEdit/UserEditInput/<?php echo $row[0]; ?>'" id="butt"
                            name="edit">Sửa</button>
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