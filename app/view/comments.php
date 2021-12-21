<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Comment</title>
</head>
<body>
    <div>
        <label>Ten su kien</label>
        <label>
        <?php 
            print_r($data['comments'][0]['event_id_name']);
        ?>
        </label>
    </div>
    
</body>
</html>