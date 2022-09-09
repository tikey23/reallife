<?php
    $con = new mysqli("", "root", "", "reallife");
    $sql ="DROP DATABASE reallife";
    $con->query($sql);
?>

<h2>Datenbank reallife gelöscht</h2>