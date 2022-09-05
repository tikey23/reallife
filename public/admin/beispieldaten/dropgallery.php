<?php
    $con = new mysqli("", "root", "", "reallife");
    $sql ="DROP TABLE gallery";
    $con->query($sql);
?>

<h2>Tabelle gallery gelöscht</h2>