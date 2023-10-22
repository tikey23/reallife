<?php
	$events = showActualEvent();
	$firstEvent = array_shift($events);
	if(!empty($firstEvent)) {
		echo $twig->render('home/actualEvents.twig', [
			"firstEvent" => $firstEvent,
			"events" => $events,
		]);
	}

	$specialEvents = showSpecialEvents();
	echo $twig->render('home/specialEvents.twig', ["events" => $specialEvents]);
?>