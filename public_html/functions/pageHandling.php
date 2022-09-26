<?php

require_once('vendor/autoload.php');
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

	if (isset($page)) {
		include "pages/" . $page . ".php";

		return;
	}

	include "pages/home.php";
}
/* OLD CODES
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
		"shifttable" => "admin",
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
*/

function findAll($objectType) {
	global $con;

	$o = new $objectType();
	$table = $o->getTable();
	if(empty($table)) {
		throw new Exception("Property table not set in model");
	}

	$collection = [];
	$rows = $con->query("SELECT * FROM {$table}")->fetch_all(MYSQLI_ASSOC);
	foreach($rows AS $row) {
		$object = new $objectType();
		foreach($row AS $key => $value) {
			$object->$key = $value;
		}

		$collection[] = $object;
	}

	return $collection;
}


function findOne($objectType, $id) {
	global $con;

	$o = new $objectType();
	$table = $o->getTable();
	if(empty($table)) {
		throw new Exception("Property table not set in model");
	}

	$collection = [];
	$row = $con->query("SELECT * FROM {$table} WHERE `id` = {$id} LIMIT 1");
	if($row->num_rows == 0) {
		throw new Exception("ID for $objectType not found");
	}

	$object = new $objectType();
	foreach($row->fetch_assoc() AS $key => $value) {
		$object->$key = $value;
	}
	return $object;
}