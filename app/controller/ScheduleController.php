<?php

class ScheduleController extends Controller {

	public $schedule; 
	public function __construct() {
		$this->schedule = $this->model('ScheduleModel');
	}

	function show() {
		
		$listschedule = $this->schedule->getSchedule();
		$this->view("schedule",[
			'listschedule' => $listschedule
		]);
	}

	function addSchedule() {

		// get data
		if(isset($_POST['submit'])) {
			$from = $_POST['from'];
			$to = $_POST['to'];
			$name = $_POST['name'];
			$detail = $_POST['detail'];
			$PoC = $_POST['PoC'];

			$event_id = 3;

			// insert databse
			$result = $this->schedule->addSchedule($event_id, $from, $to, $name, $detail, $PoC);
			$listschedule = $this->schedule->getSchedule();

			//show view
			$this->view("schedule",[
				'listschedule' => $listschedule
			]);
		}
	}
}
?>