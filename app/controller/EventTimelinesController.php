<?php
	require_once "./app/model/EventTimelinesModel.php";
	require_once "./app/model/EventsModel.php";

	function addSchedule($event_id) {

		if(isset($_POST['submit']) && $_POST['randCheck'] == $_SESSION['checkInsert']) {
			
			//get data
			$from = $_POST['from'];
			$to = $_POST['to'];
			$name = $_POST['name'];
			$detail = $_POST['detail'];
			$PoC = $_POST['PoC'];

			// validate data
			$validate = [];
			$validate['timefrom'] = empty($from) ? 'Hãy nhập thời gian bắt đầu' : '';
			$validate['timeto'] = empty($to) ? 'Hãy nhập thời gian kết thúc' : '';
			$validate['name'] = empty($name) ? 'Hãy nhập tên lịch trình' : '';
			$validate['nameLen'] = strlen($name) > 100 ? 'Độ dài tên lịch trình không quá 100' : '';
			$validate['detail'] = empty($detail) ? 'Hãy nhập nội dung lịch trình' : '';
			$validate['detailLen'] = strlen($detail) > 1000 ? 'Độ dài nội dung không quá 1000' : '';
			$validate['PoC'] = empty($PoC) ? 'Hãy nhập người chịu trách nhiệm' : '';
			$validate['PoCLen'] = strlen($PoC) > 100 ? 'Độ dài người chịu trách nhiệm không quá 100' : '';

			// echo "</br>". preg_match("/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/", $from);
			$validate['timeFormat'] = ((!preg_match("/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/", $from) || !preg_match("/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/", $to)) && $validate['timefrom'] == '' && $validate['timeto'] == '') ? 'Không đúng định dạng thời gian' : '';
			foreach ($_POST as $key => $value) {
				$validate[$key.'Format'] = preg_match("/[<,']/", $value) ? 'Không chứa < hoặc \'' : '';
			}
			// print_r($validate);

			$checkValidate = 1;
			foreach ($validate as $key => $value) {
				if($value != '') {
					$checkValidate = 0;
					break;
				}
			}
			
			$dataInput = ['', '', '', '', ''];
			if($checkValidate) {
				// insert database
				$result = addEventTimelines($event_id, $from, $to, $name, $detail, $PoC);
			} else {
				$dataInput['0'] = $from;
				$dataInput['1'] = $to;
				$dataInput['2'] = $name;
				$dataInput['3'] = $detail;
				$dataInput['4'] = $PoC;
			}
			
		}
		$nameSchedule = getNameEvent($event_id);
		$listEventsSchedule = getListSchedule($event_id);

		// show view
		require_once "./app/view/AddSchedule.php";
	}
?>