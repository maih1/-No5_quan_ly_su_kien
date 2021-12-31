<html>

<head>
	<title>Tìm kiếm sự kiện</title>
	<meta charset=UTF-8>
    <link rel="stylesheet" href="../web/css/EventAdd.css">

</head>
<body>
    <form method="GET" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data" >   
			<?php
			//$term=$_GET["term"];
			//echo $term;
			echo $_GET["url"];
			if (isset($_GET["term"]))
			echo $_GET["term"];	
		?>
        <label class="term" for="term">Từ khóa</label>
        <input id="term" type="text" name="term" maxlength="100" > </input>        
        <div class="button-search">
            <button class="button-search-block" type="submit" name='submit' formaction="">Tìm kiếm</button>    
        </div> 
		<p > số sự kiện tìm thấy: </p>	
		<table >
		<tr><th class="search-no-th">No</th><th class="search-th">Tên sự kiện</th><th class="search-th">Slogan</th><th class="search-th">Leader</th><th class="search-th">Action</th></tr>
		</table>
  </form>

</body>
</html>