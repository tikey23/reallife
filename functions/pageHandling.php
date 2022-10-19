<?php

require_once('../vendor/autoload.php');
require_once('../config/config.php');

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
		include "../pages/" . $page . ".php";

		return;
	}

	include "../pages/home.php";
}

function findAll($objectType, $column = "", $id=0) {
	global $con;

	$o = new $objectType();
	$table = $o->getTable();
	$orderBy = $o->getOrder();
	if(empty($table)) {
		throw new Exception("Property table not set in model");
	}

	$collection = [];

	if($column == ""){
		$rows = $con->query("SELECT * FROM {$table} ORDER BY $orderBy")->fetch_all(MYSQLI_ASSOC);
	} else {
		$rows = $con->query("SELECT * FROM {$table} WHERE $column = $id")->fetch_all(MYSQLI_ASSOC);
	}

	foreach($rows AS $row) {
		$object = new $objectType();
		foreach($row AS $key => $value) {
			$object->$key = $value;
		}

		$collection[] = $object;
	}

	return $collection;
}


function findOne($objectType, $id=0, $column = "", $description = "") {
	global $con;

	$o = new $objectType();
	$table = $o->getTable();
	if(empty($table)) {
		throw new Exception("Property table not set in model");
	}

	$collection = [];
	if($column == ""){
		$row = $con->query("SELECT * FROM {$table} WHERE `id` = {$id} LIMIT 1");
		if($row->num_rows == 0) {
			throw new Exception("ID for $objectType not found");
		}
	} else {
		$row = $con->query("SELECT * FROM {$table} WHERE $column = '$description' LIMIT 1");
		if($row->num_rows == 0) {
			return "error";
		}
	}

	$object = new $objectType();
	foreach($row->fetch_assoc() AS $key => $value) {
		$object->$key = $value;
	}
	return $object;
}

function findAllByColumn($objectType, $column, $id) {

	return findAll($objectType, $column, $id);

}

function findOneByColumn($objectType, $id, $column, $description) {

	return findOne($objectType, $id, $column, $description);

}
