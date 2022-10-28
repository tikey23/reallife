<?php

function showActualEvent() {
	global $con;
	$res = $con->query("SELECT * FROM event WHERE eventdate > NOW() ORDER BY eventdate");
	return $res->fetch_all(true);
}

/* Notizen
$today = date("Y-m-d", strtotime("1 month"));
$today = date("Y-m-d");
$next = date("Y-m-t", strtotime("-2 day"));
$todayday = date("m");
$nextday = "10";
echo $today . "<br>";
echo $next . "<br>";
echo $todayday . "<br>";
echo $nextday . "<br>";
if($todayday == $nextday){
	echo "Hallo<br>";
} */

function checkMonth($month){
	/* if($month == NULL){
		echo "Nichts";
	} else {
		echo $month->firstday . "<br>";
		echo $month->lastday. "<br>";
	} */

	for($i=1; $i<=12; $i++){
	$today = "2022-$i-01";

	$showToday = new DateTime($today);
	
	$date = new DateTime($today . " + 8 weeks next friday");
	$prov = $date->format("Y-m-d");
	$res = new DateTime($prov . "next Friday");
	echo $showToday->format("l.d/m/Y") . " --> ";
	echo $date->format("l.d/m/Y");
	echo "<br>";
	}
	/* $nowWeek = date("W");
	$newMonth = date("l. Y-m-d", strtotime("+ 7 week next Friday"));


	echo "Week Now: $nowWeek<br>";
	echo "Week New: $newMonth<br>"; */

	/* $newEvent = new Event;
	$newEvent->eventdate = 0; */



}
?>

