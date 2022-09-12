<?php
    $con = new mysqli("", "root", "", "reallife");
    $sql ="DROP TABLE specialevents";
    $con->query($sql);
?>

<h2>Tabelle specialevents gelöscht</h2>