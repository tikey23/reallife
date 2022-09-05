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

    // Create Events
    $sql = "INSERT INTO event (termin) values ('2022-9-5'), ('2022-9-25'), ('2022-10-12'), ('2022-10-27')";
    $con ->query($sql);

    // Create Gallery Category
    $sql = "INSERT INTO gallerycategory (folder) values 
    ('Unterwasser Abend'),
    ('Cosplay Abend')
    ";
    $con ->query($sql);

    // Greate Gallery
    $sql = "INSERT INTO gallery (folder, dateiname) values 
    ('Unterwasser Abend', '1.jpg'),
    ('Unterwasser Abend', '2.jpg'),
    ('Unterwasser Abend', 'titel.jpg'),
    ('Unterwasser Abend', '4.jpg'),
    ('Unterwasser Abend', '5.jpg'),
    ('Cosplay Abend', 'titel.jpg'),
    ('Cosplay Abend', 'img-1869.jpg'),
    ('Cosplay Abend', 'img-1871.jpg'),
    ('Cosplay Abend', 'img-1872.jpg'),
    ('Cosplay Abend', 'img-1873.jpg'),
    ('Cosplay Abend', 'img-1876.jpg'),
    ('Cosplay Abend', 'img-1878.jpg'),
    ('Cosplay Abend', 'img-1879.jpg'),
    ('Cosplay Abend', 'img-1882.jpg'),
    ('Cosplay Abend', 'img-1885.jpg')
    ";
    $con ->query($sql);

?>

<h2>Tabellen Termine und Gallery erstellt</h2>