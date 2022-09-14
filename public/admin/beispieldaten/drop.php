<?php
require_once('../../../config/config.php');

    $con = new mysqli($DB['hostname'], $DB['username'], $DB['password'], $DB['database']);
    $sql ="DROP DATABASE reallife";
    $con->query($sql);
?>

<h2>Datenbank reallife gelöscht</h2>