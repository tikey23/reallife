<?php

function showActualEvent() {
	global $con;
	$res = $con->query("SELECT * FROM event WHERE eventdate >= NOW() ORDER BY eventdate");
	return $res->fetch_all(true);
}

/*
function getEvents() {
	global $con;
	$res = $con->query("SELECT * FROM event ORDER BY eventdate");
	return $res->fetch_all(MYSQLI_ASSOC);
}
/*
function modifyEvent($newdate, $newleader1, $newleader2, $newhelper1, $newhelper2, $newhelper3, $newhelper4, $id) {
	global $con;
	$con->query("UPDATE event SET 
	eventdate = '$newdate',
	leader1 = '$newleader1',
	leader2 = '$newleader2',
	helper1 = '$newhelper1',
	helper2 = '$newhelper2',
	helper3 = '$newhelper3',
	helper4 = '$newhelper4'
	 WHERE id='$id'");
} 

function deleteEvent($id) {
	global $con;
	$con->query("DELETE FROM event WHERE id='$id'");
}

function createEvent($day, $month, $year) {
	global $con;
	$neweventdate = $year . "-" . $month . "-" . $day;
	$con->query("INSERT INTO event (eventdate) VALUES ('$neweventdate')");
}*/

?>