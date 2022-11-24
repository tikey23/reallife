<div class="text-center block lg:flex justify-center">
	<?php
	echo $twig->render('home/home.twig');
	$specialEvents = showSpecialEvents();
	echo $twig->render('home/specialEvents.twig', ["events" => $specialEvents]);
	?>
</div>