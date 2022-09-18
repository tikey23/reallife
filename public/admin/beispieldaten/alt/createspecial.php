<?php

require_once('../../../config/config.php');

$con = new mysqli($DB['hostname'], $DB['username'], $DB['password'], $DB['database']);
//$con = new mysqli ("", "root", "", "reallife");

    $sql = "CREATE TABLE IF NOT EXISTS specialevents (
        id INT(100) NOT NULL AUTO_INCREMENT,
        specialeventtitle VARCHAR(255) NOT NULL,
        specialeventdate DATE NULL DEFAULT NULL,
        publicdate DATE NULL DEFAULT NULL,
        flyer VARCHAR(255) NOT NULL,
        descripttext VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
        ) ENGINE=InnoDB, DEFAULT CHARSET=UTF8";
    $con->query($sql);

    $sql = "INSERT INTO specialevents (specialeventtitle, specialeventdate, publicdate, flyer, descripttext) VALUES 
    ('Rogers Karaoke', '2022-11-20', '2022-9-10', 'karaoke.jpg', 'Lass krachen!'),
    ('Cosplay Treff', '2022-11-24', '2022-9-11', '', 'Wir machen ein Gruppenfoto!')";

    $con->query($sql);  
    
?>

<h2>Tabellen Specialevents erstellt</h2>

