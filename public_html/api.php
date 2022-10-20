<?php


require_once('../load.php');

// TODO: check if user logged in
// TODO: wie funktioniert session handling aktuell??

if($_REQUEST['action'] == "updateMemberStatus") {
	if(!is_numeric($_REQUEST['id'])) die("not allowed");
	$member = findOne(\Rl\Models\Member::class, $_REQUEST['id']);
	if(!$member) die("member not found");

	$newStatus = ($_REQUEST['status'] == "Ja" ? 0 : 1);
	$member->active = $newStatus;
	$member->save();

	echo $newStatus;
}

?>

