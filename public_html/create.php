<?php
    //$con = new mysqli ("", "root");


    require_once('config/config.php');
    $con = new mysqli($DB['hostname'], $DB['username'], $DB['password']);

    //$sql = "DROP DATABASE reallife";
    //$con ->query($sql);

    $sql = "CREATE DATABASE IF NOT EXISTS " . $DB['database'];
    
    $con ->query($sql);
    $con->select_db($DB['database']);

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


    $sql = "DROP TABLE pictures";
    $con ->query($sql);

    $sql = "CREATE TABLE IF NOT EXISTS pictures (
        id INT(100) NOT NULL AUTO_INCREMENT, 
        categoryName VARCHAR(255) NOT NULL,
        picName VARCHAR(255) NOT NULL,
        categoryId INT(100) NOT NULL,
        PRIMARY KEY (id)
        )ENGINE=InnoDB, DEFAULT CHARSET=UTF8";
    $con ->query($sql);

    $sql = "DROP TABLE gallerycategory";
    $con ->query($sql);

    $sql = "CREATE TABLE IF NOT EXISTS gallerycategory (
        id INT(100) NOT NULL AUTO_INCREMENT,
        categoryName VARCHAR(255) NOT NULL,
        titlePic VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
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
        active INT(1) NOT NULL,
        PRIMARY KEY(id))
        ENGINE=InnoDB DEFAULT CHARSET=UTF8";
    
    $con->query($sql);

    // Beispieldaten
    // Create Events
    $sql = "INSERT INTO event (eventdate, leader1, leader2, helper1, helper2, helper3, helper4) values 
    ('2022-10-21', 1, 2, 3, 3, 3, 3), 
    ('2022-10-28', 0, 0, 0, 0, 0, 0), 
    ('2022-11-11', 0, 0, 0, 0, 0, 0), 
    ('2022-11-18', 0, 0, 0, 0, 0, 0)";
    $con ->query($sql);

    // Create Gallery Category
    $sql = "INSERT INTO gallerycategory (categoryName, titlePic) values 
    ('Unterwasser Abend', '3.jpg'),
    ('Cosplay Abend', 'img-1868.jpg')
    ";
    $con ->query($sql);

    // Greate Gallery
    $sql = "INSERT INTO pictures (categoryName, picName, categoryId) values 
    ('Unterwasser Abend', '1.jpg', 1),
    ('Unterwasser Abend', '2.jpg', 1),
    ('Unterwasser Abend', '3.jpg', 1),
    ('Unterwasser Abend', '4.jpg', 1),
    ('Unterwasser Abend', '5.jpg', 1),
    ('Cosplay Abend', 'img-1868.jpg', 2),
    ('Cosplay Abend', 'img-1869.jpg', 2),
    ('Cosplay Abend', 'img-1871.jpg', 2),
    ('Cosplay Abend', 'img-1872.jpg', 2),
    ('Cosplay Abend', 'img-1873.jpg', 2),
    ('Cosplay Abend', 'img-1876.jpg', 2),
    ('Cosplay Abend', 'img-1878.jpg', 2),
    ('Cosplay Abend', 'img-1879.jpg', 2),
    ('Cosplay Abend', 'img-1882.jpg', 2),
    ('Cosplay Abend', 'img-1885.jpg', 2)
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
            1),

            ('https://www.littleakiba.ch/assets/avatars/SzVdpCcKEx5JSQci.png',
            'Swissfrankie',
            'Leiter',
            '2004-12-18',
            'https://www.littleakiba.ch/portal/profile/Swissfrankie',
            'sample@reallifecafe.ch',
            '078 / 000 00 00',
            1),

            ('https://www.littleakiba.ch/assets/avatars/6322f7890c0c2.png',
            'Evecat',
            'Helfer',
            '2022-08-01',
            'https://www.littleakiba.ch/portal/profile/Evecat',
            'sample@reallifecafe.ch',
            '078 / 000 00 00',
            1)
            ";

     $con->query($sql);
?>

<h2>Tabellen Termine, Gallery und Specialevents mit Beispieldaten erstellt</h2>