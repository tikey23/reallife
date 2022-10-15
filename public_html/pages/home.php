<div class="text-center">
	<?php
	echo $twig->render('home/welcomeText.twig');
		$events = showActualEvent();
		$firstEvent = array_shift($events);
		echo $twig->render('home/actualEvents.twig', [
			"firstEvent" => $firstEvent,
			"events" => $events,
		]);
	?>
	<div class="sm:flex justify-center">
	<?php
		$specialEvents = showSpecialEvents();
		echo $twig->render('home/specialEvents.twig', ["events" => $specialEvents]);
	?>
	<br><br>
	</div>

	<div class="flex justify-center items-center mt-5">
		<div class='text-left font-bold block mr-5'>
			<u>Adresse:</u><br>
			Bitwäscherei<br>
			Neue Hard 12<br>
			8005 Zürich
		</div>

		<div class="hidden sm:contents">
			<div class="mapouter">
				<div class="gmap_canvas">
					<iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Bitw%C3%A4scherei,%20Neue%20Hard%2012,%208005%20Z%C3%BCrich&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
					<a href="https://123movies-to.org"></a>
					<br>
						<style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style>
						<a href="https://www.embedgooglemap.net">google iframe</a>
						<style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style>
				</div>
			</div>
		</div>
	</div>

</div>