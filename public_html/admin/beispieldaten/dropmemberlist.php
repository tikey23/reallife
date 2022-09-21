<?php
require_once('../../../config/config.php');

$con = new mysqli($DB['hostname'], $DB['username'], $DB['password'], $DB['database']);
$con = new mysqli ("", "root", "", "reallife");

    $sql ="DROP TABLE members";
    $con->query($sql);
?>

<h2>Tabelle members gelöscht</h2>