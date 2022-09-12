<?php
    $con = new mysqli("", "root", "", "reallife");
    $sql = "CREATE TABLE IF NOT EXISTS specialevents (
        id INT(100) NOT NULL AUTO_INCREMENT,
        publicdate DATE NULL DEFAULT NULL,
        specialeventdate DATE NULL DEFAULT NULL,
        specialeventtitle VARCHAR(255) NOT NULL,
        flyer VARCHAR(255) NOT NULL,
        descripttext VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
        ) ENGINE=InnoDB, DEFAULT CHARSET=UTF8";
    $con->query($sql);

    $sql = "INSERT INTO specialevents (publicdate, specialeventdate, specialeventtitle, flyer, descripttext) VALUES 
    ('2022-10-10', '2022-11-20', 'Rogers Karaoke', '', 'Lass krachen!'),
    ('2022-10-11', '2022-11-24', 'Cosplay Treff', '', 'Wir machen ein Gruppenfoto!')";

    $con->query($sql);  



?>

<h2>Tabellen Specialevents erstellt</h2>

