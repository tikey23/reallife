<div class="mainpart1">
	<?php
	// echo $twig->render('home/welcomeText.twig');

	$events = showActualEvent();
	$firstEvent = array_shift($events);
	echo $twig->render('home/actualEvents.twig', [
		"firstEvent" => $firstEvent,
		"events" => $events,
	]);

	$specialEvents = showSpecialEvents();
	echo $twig->render('home/specialEvents.twig', ["events" => $specialEvents]);
	?>
</div>