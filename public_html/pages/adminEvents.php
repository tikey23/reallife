<div class="classTable" id="adminEvent">

<?php

use \Rl\Models\Event;
use \Rl\Models\Member;

if (isset($_POST['createEvent'])) {
	$neweventdate = $_POST['year0'] . "-" . $_POST['month0'] . "-" . $_POST['day0'];
	$event = new Event;
	$event->eventdate = $neweventdate;
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
$selectDate = selectdate(0);
if(isset($_SESSION['password'])){
	echo $twig->render('admin/adminEventList.twig', [
		"isShowAllEvent" => isset(($_POST['showAllEvent'])),
		"events" => $events,
		"members" => $members,
		"modifyEventPick" => @$_POST['modifyEventPick'],
		"selectDate" => $selectDate,
	]);
	echo $twig->render('backToAdmin.twig');
} else {
	echo $twig->render('admin/loginfailed.twig');
}


/* OLD CODES
			if (isset($_POST['modifyEvent'])) {
				modifyEvent(
					$_POST['newdate'],
					$_POST['newleader1'],
					$_POST['newleader2'],
					$_POST['newhelper1'],
					$_POST['newhelper2'],
					$_POST['newhelper3'],
					$_POST['newhelper4'],
					$_POST['modifyEvent']);
			}

			if (isset($_POST['deleteEvent'])) {
				deleteEvent($_POST['deleteEvent']);
			}

			if (isset($_POST['createEvent'])) {
				createEvent($_POST['day0'], $_POST['month0'], $_POST['year0'],);
			}

			if(isset($_POST['showAllEvents'])){
				$events =  getEvents();
			} else {
				$events =  showActualEvent();
			}
            $members = findAll(Member::class);
			$selectDate = selectdate(0);
			if(isset($_SESSION['password'])){
				echo $twig->render('admin/adminEventList.twig', [
					"events" => $events,
					"members" => $members,
					"modifyEventPick" => @$_POST['modifyEventPick'],
					"selectDate" => $selectDate,

				]);
				echo $twig->render('backToAdmin.twig');
			} else {
				echo $twig->render('admin/loginfailed.twig');
			}
*/


?>
</div>