<?php

function showSpecialEvents() {
	global $con;
	$res = $con->query("SELECT * FROM specialevents WHERE specialeventdate >= NOW() && publicdate <= NOW() ORDER BY specialeventdate");
	return $res->fetch_all(MYSQLI_ASSOC);
}

//TO DO
function modifySpecialEventconfirm($specialeventtitle, $specialeventdate, $publicdate, $flyer, $descripttext, $id, $tempflyer) {
	global $con;
	$col = array('specialeventtitle', 'specialeventdate', 'publicdate', 'flyer', 'descripttext');
	$var = array($specialeventtitle, $specialeventdate, $publicdate, $flyer, $descripttext);

	for($i=0; $i<4; $i++){
		$sql = "UPDATE specialevents SET " . $col[$i] . " = '" . $var[$i] . "' WHERE id='$id'";
		$con->query($sql);
	}
	
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

//TO DO
function deleteSpecialEvent($id) {
	global $con;
	$con->query("DELETE FROM specialevents WHERE id='$id'");
}

//TO DO
function createSpecialEvent($specialeventtitle, $specialeventdate, $publicdate, $flyer, $descripttext, $tempflyer) {
	global $con;

	$con->query("INSERT INTO specialevents (specialeventtitle, specialeventdate, publicdate, flyer, descripttext) 
	VALUES ('$specialeventtitle','$specialeventdate','$publicdate','$flyer','$descripttext')");

	if($flyer != NULL) {
		flyerupload($flyer, $tempflyer);
	}
}
?>
