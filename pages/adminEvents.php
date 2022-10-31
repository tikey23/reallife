<div class="classTable" id="adminEvent">

<?php

use \Rl\Models\Event;
use \Rl\Models\Member;
use \Rl\Models\Month;



if (isset($_SESSION['admin']) ||
	isset($_SESSION['leader']) ||
	isset($_SESSION['helper'])) {
	
} else {
	session_destroy();
	echo $twig->render('global/loginfailed.twig');
}

if (isset($_POST['createEvent'])) {
	$event = new Event;
	$event->eventdate = $_POST['neweventdate'];
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

else if (isset($_POST['modifyEvent'])) {

	$event = findOne(Event::class, $_POST['modifyEvent']);
	$event->active = $_POST['active'];
	$event->leader1 = $_POST['leader1'];
	$event->leader2 = $_POST['leader2'];
	$event->helper1 = $_POST['helper1'];
	$event->helper2 = $_POST['helper2'];
	$event->helper3 = $_POST['helper3'];
	$event->helper4 = $_POST['helper4'];
	$event->activeToRegister = $_POST['activeToRegister'];
	$event->save();
}

else if (isset($_POST['deleteEvent'])) {
	$event = findOne(Event::class, $_POST['deleteEvent']);
	$event->delete();
}

if(isset($_POST['showAllEvent'])){
	$events = findAll(Event::class);
} else {
	$events = listActualEvent();
}

$members = findAll(Member::class);

echo $twig->render('admin/adminEventList.twig', [
	"isShowAllEvent" => isset($_POST['showAllEvent']),
	// "showAllEvent" => $_SESSION['showAllEvent'],
	"events" => $events,
	"members" => $members,
	"modifyEventPick" => @$_POST['modifyEventPick'],
	"isAdmin" => isset($_SESSION['admin'])
]);

?>
</div>