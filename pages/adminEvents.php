<div class="classTable" id="adminEvent">

<?php

use \Rl\Models\Event;
use \Rl\Models\Member;



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
	$event->leader1 = 0;
	$event->leader2 = 0;
	$event->helper1 = 0;
	$event->helper2 = 0;
	$event->helper3 = 0;
	$event->helper4 = 0;
	$event->save();
}

else if (isset($_POST['modifyEvent'])) {
	$event = findOne(Event::class, $_POST['modifyEvent']);
	$event->id = $_POST['modifyEvent'];
	$event->eventdate = $_POST['newdate'];
	$event->leader1 = $_POST['newleader1'];
	$event->leader2 = $_POST['newleader2'];
	$event->helper1 = $_POST['newhelper1'];
	$event->helper2 = $_POST['newhelper2'];
	$event->helper3 = $_POST['newhelper3'];
	$event->helper4 = $_POST['newhelper4'];
	$event->save();
}

else if (isset($_POST['deleteEvent'])) {
	$event = findOne(Event::class, $_POST['deleteEvent']);
	$event->delete();
}

if(isset($_POST['showAllEvent'])){
	$events = findAll(Event::class);
} else {
	$events = showActualEvent();
	
}
$members = findAll(Member::class);

echo $twig->render('admin/adminEventList.twig', [
	"isShowAllEvent" => isset($_POST['showAllEvent']),
	"events" => $events,
	"members" => $members,
	"modifyEventPick" => @$_POST['modifyEventPick'],
	"isAdmin" => isset($_SESSION['admin'])
]);

if(isset($_SESSION['admin'])){
	echo $twig->render('admin/toAdmin.twig');
}

echo $twig->render('global/logout.twig');

?>
</div>