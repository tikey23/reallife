<div class="text-center">
	<div class="block py-8 lg:flex rounded-xl bg-cover bg-[url('/img/home_bg.jpg');]">
	<?= $twig->render('home/welcomeText.twig'); ?>

	<?PHP
	$events = showActualEvent();
	$firstEvent = array_shift($events);
	echo $twig->render('home/actualEvents.twig', [
		"firstEvent" => $firstEvent,
		"events" => $events,
	]);
	?>
	</div>


	<div class="block lg:flex justify-center">
		<?php
		$specialEvents = showSpecialEvents();
		echo $twig->render('home/specialEvents.twig', ["events" => $specialEvents]);
		?>
		<br><br>
	</div>
</div>