<?php 

	require_once "./app/model/EventTimelinesModel.php";
	require_once "./app/model/EventsModel.php";

	function displaySchedule($event_id) {
		$dataInput = ['', '', '', '', ''];
		$nameSchedule = getNameEvent($event_id);
		$listEventsSchedule = getListSchedule($event_id);

		require_once "./app/view/AddSchedule.php";
	}

	function addSchedule($event_id) {

		if(isset($_POST['submit'])) {
			$from = $_POST['from'];
			$to = $_POST['to'];
			$name = $_POST['name'];
			$detail = $_POST['detail'];
			$PoC = $_POST['PoC'];

			$validate = [];
			$validate['time'] = (empty($from) || empty($to)) ? 'Hãy nhập thời gian lịch trình' : '';
			$validate['name'] = empty($name) ? 'Hãy nhập tên lịch trình' : '';
			$validate['nameLen'] = strlen($name) > 100 ? 'Độ dài tên lịch trình không quá 100' : '';
			$validate['detail'] = empty($detail) ? 'Hãy nhập nội dung' : '';
			$validate['detailLen'] = strlen($detail) > 1000 ? 'Độ dài nội dung không quá 1000' : '';
			$validate['PoC'] = empty($PoC) ? 'Hãy nhập Người chịu trách nhiệm' : '';
			$validate['PoCLen'] = strlen($PoC) > 100 ? 'Độ dài người chịu trách nhiệm không quá 100' : '';
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
				$result = addEventTimelines($event_id, $from, $to, $name, $detail, $PoC);
			} else {
				$dataInput['0'] = $from; 
				$dataInput['1'] = $to; 
				$dataInput['2'] = $name; 
				$dataInput['3'] = $detail; 
				$dataInput['4'] = $PoC;
			}
			$nameSchedule = getNameEvent($event_id);
			$listEventsSchedule = getListSchedule($event_id);

			require_once "./app/view/AddSchedule.php";
		}
	}
?>