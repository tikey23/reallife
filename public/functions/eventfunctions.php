<?php

function showActualEvent() {
	global $con;
	$res = $con->query("SELECT * FROM event WHERE eventdate >= NOW() ORDER BY eventdate");
	return $res->fetch_all(true);
}


function getEvents() {
	global $con;
	$res = $con->query("SELECT * FROM event ORDER BY eventdate");
	return $res->fetch_all(MYSQLI_ASSOC);
}

function modifyEvent($newdate, $id) {
	global $con;
	$con->query("UPDATE event SET eventdate = '$newdate' WHERE id='$id'");
}

function deleteEvent($id) {
	global $con;
	$con->query("DELETE FROM event WHERE id='$id'");
}

function createEvent($day, $month, $year) {
	global $con;
	$neweventdate = $year . "-" . $month . "-" . $day;
	$con->query("INSERT INTO event (eventdate) VALUES ('$neweventdate')");
}

?>