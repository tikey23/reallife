<?php

require_once 'vendor/autoload.php';
require_once('config/config.php');

function bootstrap() {
	global $DB;

	$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');
	$twig = new \Twig\Environment($loader, [
		'cache' => FALSE,
		'debug' => TRUE,
		'strict_variables' => TRUE,
	]);
	$twig->addExtension(new \Twig\Extension\DebugExtension());
	$twig->addFilter(new \Twig\TwigFilter('date_format', 'twig_date_format'));

	$con = new mysqli($DB['hostname'], $DB['username'], $DB['password'], $DB['database']);
	return [$con, $twig];
}

function twig_date_format($value, $format) {
    return date_format(date_create($value), $format);
}


function includePage($page = "") {
	global $ADMINPASSWORD, $twig;
	$pages = [
		"galerie" => "",
		"wersindwir" => "",
		"regeln" => "",
		"helferwerden" => "",
		"ueberuns" => "",
		"galeriebilder" => "",
		"logoutconfirm" => "",
		"member" => "member",
		"admin" => "admin",
		"adminEvents" => "admin",
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