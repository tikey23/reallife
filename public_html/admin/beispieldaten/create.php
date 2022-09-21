<?php
    //$con = new mysqli ("", "root");


    require_once('../../../config/config.php');
    $con = new mysqli($DB['hostname'], $DB['username']);

    $sql = "CREATE DATABASE IF NOT EXISTS reallife";
    $con ->query($sql);
    $con->select_db("reallife");

    $sql = "DROP TABLE event";
    $con ->query($sql);

    $sql = "CREATE TABLE IF NOT EXISTS event (
        id INT(100) NOT NULL AUTO_INCREMENT, 
        eventdate DATE NULL DEFAULT NULL,
        leader1 INT(255) NOT NULL,
        leader2 INT(255) NOT NULL,
        helper1 INT(255) NOT NULL,
        helper2 INT(255) NOT NULL,
        helper3 INT(255) NOT NULL,
        helper4 INT(255) NOT NULL,
        PRIMARY KEY (id)
        )ENGINE=InnoDB, DEFAULT CHARSET=UTF8";
    $con ->query($sql);

    $sql = "DROP TABLE gallery";
    $con ->query($sql);

    $sql = "CREATE TABLE IF NOT EXISTS gallery (
        id INT(100) NOT NULL AUTO_INCREMENT, 
        folder VARCHAR(255) NOT NULL,
        picname VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
        )ENGINE=InnoDB, DEFAULT CHARSET=UTF8";
    $con ->query($sql);

    $sql = "DROP TABLE gallerycategory";
    $con ->query($sql);

    $sql = "CREATE TABLE IF NOT EXISTS gallerycategory (
        folder VARCHAR(255) NOT NULL,
        categoryname VARCHAR(255) NOT NULL
        )ENGINE=InnoDB, DEFAULT CHARSET=UTF8";
    $con ->query($sql);

    $sql = "DROP TABLE specialevents";
    $con ->query($sql);

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


    $sql = "DROP TABLE members";
    $con ->query($sql);

    $sql ="CREATE TABLE IF NOT EXISTS members (
        id INT(100) NOT NULL AUTO_INCREMENT,
        memberimg VARCHAR(255) NOT NULL,
        membername VARCHAR(255) NOT NULL,
        memberfunction VARCHAR(255) NOT NULL,
        involved_since DATE NULL DEFAULT NULL,
        little_akiba VARCHAR(255) NOT NULL,
        e_mail VARCHAR(255) NOT NULL,
        mobile VARCHAR(255) NOT NULL,
        active VARCHAR(10) NOT NULL,
        PRIMARY KEY(id))
        ENGINE=InnoDB DEFAULT CHARSET=UTF8";
    
    $con->query($sql);

    // Beispieldaten
    // Create Events
    $sql = "INSERT INTO event (eventdate, leader1, leader2, helper1, helper2, helper3, helper4) values 
    ('2022-10-21', 1, 2, 3, 3, 3, 3), 
    ('2022-10-28', '', '', '', '', '', ''), 
    ('2022-11-11', '', '', '', '', '', ''), 
    ('2022-11-18', '', '', '', '', '', '')";
    $con ->query($sql);

    // Create Gallery Category
    $sql = "INSERT INTO gallerycategory (folder, categoryname) values 
    ('Unterwasser Abend', '3.jpg'),
    ('Cosplay Abend', 'img-1868.jpg')
    ";
    $con ->query($sql);

    // Greate Gallery
    $sql = "INSERT INTO gallery (folder, picname) values 
    ('Unterwasser Abend', '1.jpg'),
    ('Unterwasser Abend', '2.jpg'),
    ('Unterwasser Abend', '3.jpg'),
    ('Unterwasser Abend', '4.jpg'),
    ('Unterwasser Abend', '5.jpg'),
    ('Cosplay Abend', 'img-1868.jpg'),
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

    //Create Specialevents
   
    $sql = "INSERT INTO specialevents (specialeventtitle, specialeventdate, publicdate, flyer, descripttext) VALUES 
    ('Rogers Karaoke', '2022-11-20', '2022-9-10', 'karaoke.jpg', 'Lass krachen!'),
    ('Cosplay Treff', '2022-11-24', '2022-9-11', '', 'Wir machen ein Gruppenfoto!')";

    $con->query($sql);  
    
    // Create Members
    $sql = "INSERT INTO members (
        memberimg,
        membername,
        memberfunction,
        involved_since,
        little_akiba,
        e_mail,
        mobile,
        active) VALUES

            ('https://www.littleakiba.ch/assets/avatars/6229a198a8e55.png',
            'dark_columbia',
            'Leiter',
            '2005-01-01',
            'https://www.littleakiba.ch/portal/profile/201',
            'sample@reallifecafe.ch',
            '078 / 000 00 00',
            'yes'),

            ('https://www.littleakiba.ch/assets/avatars/SzVdpCcKEx5JSQci.png',
            'Swissfrankie',
            'Leiter',
            '2004-12-18',
            'https://www.littleakiba.ch/portal/profile/Swissfrankie',
            'sample@reallifecafe.ch',
            '078 / 000 00 00',
            'yes'),

            ('https://www.littleakiba.ch/assets/avatars/6322f7890c0c2.png',
            'Evecat',
            'Helfer',
            '2022-08-01',
            'https://www.littleakiba.ch/portal/profile/Evecat',
            'sample@reallifecafe.ch',
            '078 / 000 00 00',
            'yes')
            ";

     $con->query($sql);
?>

<h2>Tabellen Termine, Gallery und Specialevents mit Beispieldaten erstellt</h2>