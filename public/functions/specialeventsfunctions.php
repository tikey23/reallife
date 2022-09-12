<?php

function showSpecialEvents() {

	global $con;
	$res = $con->query("SELECT * FROM specialevents WHERE publicdate >= NOW() && specialeventdate >= NOW() ORDER BY specialeventdate");

	while ($data = $res->fetch_assoc()) {
		$showespecialventdate = date_create($data['specialeventdate']);
		echo "<div class=' bg-red-400' id='special'>";
			echo "<h1 class='text-3xl font-bold text-center italic'>Spezial Event:</h1><br>";
			echo "<h1 class='text-3xl font-bold text-center'>" . $data['specialeventtitle'] . "</h1>";
			echo "<h1 class='text-3xl font-bold text-center'>" . date_format($showespecialventdate, "d. F Y") . "</h1><br>";
			echo "<p class='text.left'>" . $data['descripttext'] . "</p>";
		echo "</div>";
	}		

}

?>