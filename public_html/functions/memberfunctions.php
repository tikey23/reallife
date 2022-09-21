<?php

function getMembers() {
	global $con;
	$sql = "SELECT * FROM members WHERE active = 'yes'";
	$res = $con->query($sql);
	return $res->fetch_all(MYSQLI_ASSOC);
}

function modifyMember(
	$id,
	$memberimg,
	$membername,	
	$memberfunction,	
	$involved_since,	
	$little_akiba,	
	$e_mail,	
	$mobile,	
	$active){

		global $con;
		$sql = "UPDATE members SET
		memberimg = '$memberimg',
		membername = '$membername',	
		memberfunction = '$memberfunction',	
		involved_since = '$involved_since',	
		little_akiba = '$little_akiba',	
		e_mail = '$e_mail',	
		mobile = '$mobile',	
		active = '$active'
		WHERE id='$id'";
		$con->query($sql);
}

/*
function getEventJoinMembers(){
	global $con;
	$sql = "SELECT * FROM event WHERE eventdate >= NOW() INNER JOIN members ON event.leader1 = members.membername";
	$sql = "SELECT * FROM members WHERE active = 'yes'";
	$res = $con->query($sql);
	return $res->fetch_all(MYSQLI_ASSOC);
}

function addLeader(){
	global $con;
	$sql = "SELECT * FROM members WHERE id='1'";
	$res = $con->query($sql);
	$data = $res->fetch_assoc();
	
	$newsql = "UPDATE event SET helper1 = '" . $data['membername'] . "' ";
	$con->query($newsql);
	
}*/

?>

