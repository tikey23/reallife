<?php

function showSpecialEvents() {
	global $con;
	$res = $con->query("SELECT * FROM specialevents WHERE specialeventdate >= NOW() && publicdate <= NOW() ORDER BY specialeventdate");
	return $res->fetch_all(MYSQLI_ASSOC);
}

function showSpecialEventsAdmin() {
	global $con;
	$res = $con->query("SELECT * FROM specialevents WHERE specialeventdate >= NOW() ORDER BY specialeventdate");
	echo "<form action='/index.php?page=adminSpecialEvents' method='post' enctype='multipart/form-data'>";

	while ($data = $res->fetch_assoc()) {
		
		if(@$_POST['modifySpecialEvent'] == $data['id']) {

			echo "<table style='border:1px solid black' align='center'>";
			echo "<tr><td>Titel:</td><td><input name='specialeventtitle' value='" . $data['specialeventtitle'] . "'></td></tr>";
			echo "<tr><td>Datum:</td><td><input name='specialeventdate' value='" . $data['specialeventdate'] . "'></td></tr>";
			echo "<tr><td>Publik Datum:</td><td><input name='publicdate' value='" . $data['publicdate'] . "'></td></tr>";
			
			if ($data['flyer'] == NULL) {
				echo "<tr><td>Flyer:</td><td><input type='file' name='flyer'></td></tr>";
			} else {
				echo "<tr><td>Flyer:</td><td><img src='img/specialevents/" . $data['flyer'] . "'width='310'><input type='file' name='flyer'></img></td></tr>";
			}
			
			echo "<tr><td>Text:</td><td><input name='descripttext' rows='4' cols='50' value='" . $data['descripttext'] . "'></td></tr>";
			echo "</table>";
			echo "<p><button name='modifySpecialEventconfirm' value='" . $data['id'] . "'>aktualisieren</button></p>";

		} else {

			$showespecialventdate = date_create($data['specialeventdate']);
			$showpublicdate = date_create($data['publicdate']);

			echo "<div id='adminspecialevents'>";
			echo "<table style='border:1px solid black' align='center'>";
			echo "<tr><td>Titel:</td><td>" . $data['specialeventtitle'] . "</td></tr>";
			echo "<tr><td>Datum:</td><td>" . date_format($showespecialventdate, "d. F Y") . "</td></tr>";
			echo "<tr><td>Publik Datum:</td><td>" . date_format($showpublicdate, "d. F Y") . "</td></tr>";
			
			if ($data['flyer'] == NULL) {
				echo "<tr><td>Flyer:</td><td></td></tr>";
			} else {
				echo "<tr><td>Flyer:</td><td><img src='img/specialevents/" . $data['flyer'] . "' width='310'></img></td></tr>";
			}
			
			echo "<tr><td>Text:</td><td>" . $data['descripttext'] . "</td></tr>";
			echo "</table>";
			echo "<p><button name='modifySpecialEvent' value='" . $data['id'] . "'>ändern</button>";
			echo "<button name='deleteSpecialEvent' value='" . $data['id'] . "' onclick=\"return confirm('Bist du sicher?');\">löschen</button></p>";
		}
		echo "<br>";
	}
	echo "</form>";		
}

function modifySpecialEventconfirm($specialeventtitle, $specialeventdate, $publicdate, $flyer, $descripttext, $id, $tempflyer) {
	global $con;
	$col = array('specialeventtitle', 'specialeventdate', 'publicdate', 'flyer', 'descripttext');
	$var = array($specialeventtitle, $specialeventdate, $publicdate, $flyer, $descripttext);

	for($i=0; $i<4; $i++){
		$sql = "UPDATE specialevents SET " . $col[$i] . " = '" . $var[$i] . "' WHERE id='$id'";
		$con->query($sql);
	}

	echo "Hallo<br>";
	
	if($flyer != NULL) {
		flyerupload($flyer, $tempflyer);
	} 
}

function flyerupload($flyer, $tempflyer) {
    global $con; 
        $target_dir = "img/specialevents/";
        $uploadfile = $target_dir . $flyer;
        $type = strtolower(pathinfo($uploadfile,PATHINFO_EXTENSION));
        $uploadok = 0;

        if (file_exists($uploadfile)) {
            echo "<br><p class='font-bold'>Fehler! Bild existiert bereits im Dateiordner!</p>";
            $uploadok++;
        }

        if ($type != "jpg"
        && $type != "jpeg"
        && $type != "png"
        && $type != "gif") {
            echo "<br><p class='font-bold'>Fehler! Nur \"JPG\",  \"JPEG\", \"PNG\" und \"GIF\" Dateien erlaubt</p>";
            $uploadok++;
        }

        if ($uploadok == 0) {
        move_uploaded_file($tempflyer, $uploadfile);
        }  
}

function deleteSpecialEvent($id) {
	global $con;
	$con->query("DELETE FROM specialevents WHERE id='$id'");
}

function createSpecialEvent($specialeventtitle, $specialeventdate, $publicdate, $flyer, $descripttext, $tempflyer) {
	global $con;

	$con->query("INSERT INTO specialevents (specialeventtitle, specialeventdate, publicdate, flyer, descripttext) 
	VALUES ('$specialeventtitle','$specialeventdate','$publicdate','$flyer','$descripttext')");

	if($flyer != NULL) {
		flyerupload($flyer, $tempflyer);
	}
}
?>
