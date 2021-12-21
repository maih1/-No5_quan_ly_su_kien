<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../web/css/schedule.css">
	<title>addSchedule</title>
</head>
<body>
<div>
	<h1>Đây là ví dụ</h1>
	<label>Tên sự kiện</label>
	<label>Chào đón sinh viên</label>
	<div>Lịch trình</div>
	<table>
		<?php 
		$count = 1;
			foreach($data['listschedule'] as $row){
				echo '<tr>
					<td>No'.$count.'</td>
					<td>'.$row['from'].' - '.$row['to'].'</td>
					<td>'.$row['name'].'</td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>'.$row['detail'].'</td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>Chịu trách nhiệm: '.$row['PoC'].'</td>
					<td><button class="edit">sửa</button></td>
				</tr>';
				$count++;
			}
		?>
	</table>
</div>
<div>Thêm mới</div>
<div>
	<form method="POST" action="./addSchedule">
		<div class="data">
			<label class="content">Thời gian</label>
			<input type="" name="from">
			<label>đến</label>
			<input type="" name="to">
		</div>
		<div class="data">
			<label class="content">Tên lịch trình</label>
			<input type="text" name="name">
		</div>
		<div class="data">
			<label class="content">Nội dung</label>
			<textarea name="detail"></textarea>
		</div>
		<div class="data">
			<label class="content">Người chịu trách nhiệm</label>
			<input type="text" name="PoC">
		</div>
		<div >
			<button class="button" type="submit" name="submit">Thêm mới</button>
		</div>
	</form>
</div>
</body>
</html>