<?php

function getMembers() {
	global $con;
	$sql = "SELECT * FROM members WHERE active = 'yes'";
	$res = $con->query($sql);
	return $res->fetch_all(MYSQLI_ASSOC);
}
?>

