<?php

function includePage($page = "") {
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