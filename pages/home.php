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

	<div class="mt-5 relative h-[600px]">

		<div class='absolute right-10 z-30 right font-bold block p-5 m-auto mt-5 rounded-xl border border-solid border-black bg-violet-500/30 backdrop-blur'>
			<u>Adresse:</u><br>
			Bitwäscherei<br>
			Neue Hard 12<br>
			8005 Zürich
		</div>


		<div class="absolute z-20 w-full">
			<div class="mapouter">
				<div class="gmap_canvas">
					<iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Bitw%C3%A4scherei,%20Neue%20Hard%2012,%208005%20Z%C3%BCrich&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
					<br>
					<style>
						.mapouter {
                            position: relative;
                            text-align: right;
                        }
						.gmap_canvas {
                            overflow: hidden;
                            background: none !important;
                        }</style>
				</div>
			</div>
		</div>
	</div>

</div>