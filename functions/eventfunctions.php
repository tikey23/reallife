<?php

function showActualEvent() {
	global $con;
	$res = $con->query("SELECT * FROM event WHERE eventdate > NOW() ORDER BY eventdate");
	return $res->fetch_all(true);
}

?>