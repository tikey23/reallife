<?php

function showSpecialEvents() {
	global $con;
	$res = $con->query("SELECT * FROM specialevents WHERE specialeventdate >= NOW() && publicdate <= NOW() ORDER BY specialeventdate");
	return $res->fetch_all(MYSQLI_ASSOC);
}

?>
