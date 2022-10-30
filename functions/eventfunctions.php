<?php

use \Rl\Models\Event;
use \Rl\Models\Month;

function showActualEvent() {
	global $con;
	$res = $con->query("SELECT * FROM event WHERE eventdate > NOW() ORDER BY eventdate");
	return $res->fetch_all(true);
}

function checkDay(){
	$month = findOneByColumn(Month::class, 0, "monthBegin", date("Y-m-d"));

	if($month != NULL){
		$today = $month->monthBegin;
		// $today = "2022-11-01";

		for($numberOfMonth = 1; $numberOfMonth <= 2; $numberOfMonth++){
			checkMonth($month, $today, $numberOfMonth);
		}
	}
}

function checkMonth($month, $today, $numberOfMonth){

	$provDateCreate = new DateTime($today . " + " . $numberOfMonth . " months");

	if($provDateCreate->format('l') == 'Friday'){
		$newEventDate = $provDateCreate->format("Y-m-d");
	} else {
		$provDate = new DateTime(($provDateCreate->format("Y-m-d")) . "next Friday");
		$newEventDate = $provDate->format("Y-m-d");
	}

	$acutalMonth = $provDateCreate->format('m');

	if($numberOfMonth == 1){
		deactivateRegister($newEventDate, $acutalMonth);
	} else {
		createEventsForMonth($newEventDate, $acutalMonth);
	}
}

function deactivateRegister($newEventDate, $acutalMonth){

	for($i=0; $i<10; $i++){

		$event = findOne(Event::class, 0, "eventdate", $newEventDate);
		if($event == NULL){
			$i = 10;
		} else {
		$event->activeToRegister = 0;
		$event->save();
		
		$newDate = new DateTime($newEventDate . "next Friday");
		$newEventDate = $newDate->format("Y-m-d");

		if($newDate->format("m") != $acutalMonth){
			$i = 10;
		}
	}		
	}
}


function createEventsForMonth($newEventDate, $acutalMonth){

	$getMonth = new DateTime($newEventDate);
	$newMonthBegin = $getMonth->format("Y-m-01");
	
	$newMonth = new Month;
	$newMonth->monthBegin = $newMonthBegin;
	$newMonth->save();

	for($i=0; $i<10; $i++){

		$checkEvent = findOne(Event::class, 0, "eventdate", $newEventDate);
		if(!isset($checkEvent->eventdate)){
			$event = new Event;
			$event->eventdate = $newEventDate;
			$event->active = 0;
			$event->leader1 = 0;
			$event->leader2 = 0;
			$event->helper1 = 0;
			$event->helper2 = 0;
			$event->helper3 = 0;
			$event->helper4 = 0;
			$event->activeToRegister = 1;
			$event->save();
		}
		
		$newDate = new DateTime($newEventDate . "next Friday");
		$newEventDate = $newDate->format("Y-m-d");

		if($newDate->format("m") != $acutalMonth){
			$i = 10;
		}		
	}
}

?>



