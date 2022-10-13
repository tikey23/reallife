<?php

namespace Rl\Models;

use Rl\Models\Model;

class SpecialEvent extends Model {
	protected $table = "specialevents";
	protected $orderBy = "specialeventdate";

	function uploadFlyer($flyer, $tempflyer) {
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
}