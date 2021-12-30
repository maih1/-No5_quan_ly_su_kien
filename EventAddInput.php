<?php
	include 'C:/xampp/htdocs/web/no05/app/common/DB.php';
	if (isset($_GET['term'])){
		$term = "%".$_GET['term']."%";
		$stmt = $conn -> prepare("SELECT id,name,slogan,leader FROM events WHERE name LIKE :term OR description LIKE :term OR leader LIKE :term OR slogan LIKE :term");
		$stmt->bindParam(':term', $term);
		$stmt->execute();
		$result = $stmt->fetchAll();
		//echo $_GET['term'];
	}
	if (isset($_GET['delete'])){
		if (confirm("Press a button!") == true) {
		echo 'yes';
		} 
		else {
		echo 'no';
		}
	}
?>
<html>

<head>
	<title>Tìm kiếm sự kiện</title>
	<meta charset=UTF-8>
    <link rel="stylesheet" href="../../../web/css/EventAdd.css">    
</head>
<body>
    <form method="GET" action="EventAddInput.php">   

        <label class="term" for="term">Từ khóa</label>
        <input id="term" type="text" name="term" maxlength="100" > </input>        
        <div class="button-search">
            <button class="button-search-block" type="submit" name='submit' formaction="">Tìm kiếm</button>    
        </div> 
		<p > số sự kiện tìm thấy:<?php if(isset($result)) echo ' ',sizeof($result); else echo ' ',0;?> </p>	
		<table >
		<tr><th class="search-no-th">No</th><th class="search-th">Tên sự kiện</th><th class="search-th">Slogan</th><th class="search-th">Leader</th><th class="search-th">Action</th></tr>
		<?php

		if (isset($result)) {
			foreach ($result as $key => $value) {
				?>
				<tr>
				<th class="search-no-th"><?php echo $value[0];?></th>
				<th class="search-th"><?php echo $value[1];?></th>
				<th class="search-th"><?php echo $value[2];?></th>
				<th class="search-th"><?php echo $value[3];?></th>
				<th class=search-th>
				<button class="delete-button" type="submit" name='delete' formaction="">Xóa</button>
				<button class="delete-button" type="submit" name='edit' formaction="">Sửa</button>
				<button class="action-button" type="submit" name='schedule' formaction="">Lịch trình</button>
				<button class="action-button" type="submit" name='comment' formaction="">Comment</button>
				</th>
				</tr>
				<?php
			}
		}
		?>
		</table>

  </form>
	
</body>
</html>
