<html>

<head>
	<title>Tìm kiếm sự kiện</title>
	<meta charset=UTF-8>
    <link rel="stylesheet" href="../web/css/EventSearch.css">
</head>
<body>
    <form method="GET" enctype="multipart/form-data" >   
		<div ><button id="back" type="button" name="schedule" onclick="window.location.href='../Login/home'" formaction="">Quay lại</button> </div>
        <label class="keyword" for="keyword">Từ khóa</label>
        <input id="keyword" type="text" name="keyword" maxlength="100" value="<?php echo $keyword;?>"> </input>        
        <div class="button-search">
            <button class="button-search-block" type="submit" name='submit' formaction="">Tìm kiếm</button>    
        </div> 
		<p > Số sự kiện tìm thấy:<?php if(isset($event_search_result)) echo ' ',sizeof($event_search_result); else echo ' ',0;?> </p>
		<table class="search-table">
		<tr ><th class="search-no-th">No</th><th class="search-th">Tên sự kiện</th><th class="search-th">Slogan</th><th class="search-th">Leader</th><th class="action-th">Action</th></tr>
		<?php
		if (isset($event_search_result)) {
			$count=1;
			foreach ($event_search_result as $key => $value) {
				?>
				<tr>
				<th class="search-no-th"><?php echo $count++;?></th>
				<th class="search-th"><?php echo $value[1];?></th>
				<th class="search-th"><?php echo $value[2];?></th>
				<th class="search-th"><?php echo $value[3];?></th>
				<th class="action-th"> 
				<button class="delete-button" type="submit" name="delete" onclick="return confirm('Bạn chắc chắn muốn xóa sự kiện <?php echo $value[1];?>');"value ="<?php echo $value[0];?>">Xóa</button>
				<button class="delete-button" type="button" name="edit" onclick="window.location.href='../EventEdit/eventEditInput/<?php echo $value[0];?>'" formaction="">Sửa</button>
				<button class="action-button" type="button" name="schedule" onclick="window.location.href='../EventTimelines/addSchedule/<?php echo $value[0];?>/<?php echo $keyword;?>'" formaction="">Lịch trình</button>
				<button class="action-button" type="button" name="comment" onclick="window.location.href='../EventComment/addComment/<?php echo $value[0]; ?>'" formaction="">Comment</button>
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
