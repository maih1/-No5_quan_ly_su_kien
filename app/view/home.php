<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../web/css/home.css">
</head>
<body>
    Tên login: 
    <?php 
    echo $_SESSION['login_id']; ?> <br><br>
    Thời gian login: <?php date_default_timezone_set('Asia/Ho_Chi_Minh'); echo date('d-m-Y H:i');
    ?> 
    <br><br>
    Click here to <a href = "./logout">Logout</a>
    <div class="home">
        <p style="margin-left: 200px;">
            Người dùng<br>
            <a href="nd_timkiem.php">Tìm kiếm</a><br>
            <a href="../UserAdd/userAddInput">Thêm mới</a><br>
        </p>
        <p style="margin-left: 200px;">
            Sự kiện<br>
            <a href="../EventSearch/eventSearch">Tìm kiếm</a><br>
            <a href="../EventAdd/eventAddInput">Thêm mới</a><br>
        </p>
    </div>
</body>
</html>