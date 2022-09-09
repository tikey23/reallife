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

    $sql = "CREATE TABLE IF NOT EXISTS gallery (
        id INT(10) NOT NULL AUTO_INCREMENT, 
        folder VARCHAR(50) NOT NULL,
        dateiname VARCHAR(50) NOT NULL,
        PRIMARY KEY (id)
        )ENGINE=InnoDB, DEFAULT CHARSET=UTF8";
    $con ->query($sql);

    $sql = "CREATE TABLE IF NOT EXISTS gallerycategory (
        folder VARCHAR(50) NOT NULL
        )ENGINE=InnoDB, DEFAULT CHARSET=UTF8";
    $con ->query($sql);

?>

<h2>Tabellen Termine und Gallery erstellt</h2>