<?php

function showSpecialEvents() {

	global $con;
	$res = $con->query("SELECT * FROM specialevents WHERE specialeventdate >= NOW() && publicdate >= NOW() ORDER BY specialeventdate");

	while ($data = $res->fetch_assoc()) {
		$showespecialventdate = date_create($data['specialeventdate']);
		echo "<div class=' bg-red-400' id='special'>";
			echo "<h1 class='text-3xl font-bold text-center italic'>Spezial Abend:</h1><br>";
			echo "<h1 class='text-3xl font-bold text-center'>" . $data['specialeventtitle'] . "</h1>";
			echo "<h1 class='text-3xl font-bold text-center'>" . date_format($showespecialventdate, "d. F Y") . "</h1><br>";
			echo "<p class='text.left'>" . $data['descripttext'] . "</p>";
		echo "</div>";
	}		

}

function showSpecialEventsAdmin() {
	global $con;
	$res = $con->query("SELECT * FROM specialevents WHERE specialeventdate >= NOW() ORDER BY specialeventdate");
	echo "<form action='/index.php?page=adminSpecialEvents' method='post' enctype='multipart/form-data'>";

	while ($data = $res->fetch_assoc()) {
		
		if(@$_POST['modifySpecialEvent'] == $data['id']) {

			echo "<div id='adminspecialevents'>";
			echo "<table style='border:1px solid black' align='center'>";
			echo "<tr><td>Titel:</td><td><input name='specialeventtitle' value='" . $data['specialeventtitle'] . "'></td></tr>";
			echo "<tr><td>Datum:</td><td><input name='specialeventdate' value='" . $data['specialeventdate'] . "'></td></tr>";
			echo "<tr><td>Publik Datum:</td><td><input name='publicdate' value='" . $data['publicdate'] . "'></td></tr>";
			
			if ($data['flyer'] == NULL) {
				echo "<tr><td>Flyer:</td><td><input type='file' name='flyer' id='flyer'></td></tr>";
			} else {
				echo "<tr><td>Flyer:</td><td><img src='img/flyer/" . $data['flyer'] . "'><input type='file' name='flyer' id='flyer'></img></td></tr>";
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
				echo "<tr><td>Flyer:</td><td><img src='img/flyer/" . $data['flyer'] . "'></img></td></tr>";
			}
			
			echo "<tr><td>Text:</td><td>" . $data['descripttext'] . "</td></tr>";
			echo "</table>";
			echo "<p><button name='modifySpecialEvent' value='" . $data['id'] . "'>ändern</button>";
			echo "<button name='deleteSpecialEvent' value='" . $data['id'] . "'>löschen</button></p>";
		}
		echo "<br>";
		echo "</div>";
	}
	echo "</form>";		
}

function modifySpecialEventconfirm($specialeventtitle, $specialeventdate, $publicdate, $descripttext, $id) {
	global $con;
	$col = array('specialeventtitle', 'specialeventdate', 'publicdate', 'descripttext');
	$var = array($specialeventtitle, $specialeventdate, $publicdate, $descripttext);

	for($i=0; $i<4; $i++){
		$sql = "UPDATE specialevents SET " . $col[$i] . " = '" . $var[$i] . "' WHERE id='$id'";
		$con->query($sql);
	}
}

/*function flyerupload() {  // Not done yet
    global $con;
    if(isset($_POST['flyer'])) {  
        $target_dir = "img/specialevents/";
        $uploadfile = $target_dir . basename($_FILES['flyer']['name']);
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
        move_uploaded_file($_FILES['flyer']['tmp_name'], $uploadfile);
        $file = basename($_FILES['flyer']['name']);
        
        $sql = "INSERT INTO specialevents (flyer) values 
        ('$file')";
        $con->query($sql);
        }

    }
}*/
?>
