<?php

function showSpecialEvents() {
	global $con;
	$res = $con->query("SELECT * FROM specialevents WHERE specialeventdate >= NOW() && publicdate <= NOW() ORDER BY specialeventdate");
	return $res->fetch_all(MYSQLI_ASSOC);
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

?>
