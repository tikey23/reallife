<?php

function includePage($page = "") {
	global $ADMINPASSWORD;
	$pages = [
		"galerie" => "",
		"wersindwir" => "",
		"regeln" => "",
		"helferwerden" => "",
		"ueberuns" => "",
		"galeriebilder" => "",
		"anmeldung" => "",
		"admin" => "admin",
		"logout" => "admin",
		"adminGallery" => "admin",
		"adminSpecialEvents" => "admin"
	];

	if (isset($pages[$page])) {
		if (!empty($pages[$page])) {
			include $pages[$page] . "/" . $page . ".php";
		} else {
			include $page . ".php";
		}

		return;
	}

	include "home.php";
}