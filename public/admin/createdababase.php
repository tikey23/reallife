<?php
    $con = new mysqli ("", "root");
    $sql = "CREATE DATABASE IF NOT EXISTS reallife";
    $con ->query($sql);
    $con->select_db("reallife");

    $sql = "CREATE TABLE IF NOT EXISTS event (
        id INT(10) NOT NULL AUTO_INCREMENT, 
        termin DATE NULL DEFAULT NULL,
        PRIMARY KEY (id)
        )ENGINE=InnoDB, DEFAULT CHARSET=UTF8";
    $con ->query($sql);

    $sql = "INSERT INTO event (termin) values ('2022-12-1'), ('2022-9-1'), ('2022-5-12')";
    $con ->query($sql);
?>

<h2>Datensätze erstellt</h2>