<?php
    //$con = new mysqli ("", "root");


    require_once('../../../config/config.php');
    $con = new mysqli($DB['hostname'], $DB['username'], $DB['password'], $DB['database']);

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
            'Leiterin',
            '2005-01-01',
            'https://www.littleakiba.ch/portal/profile/201',
            'sample@reallifecafe.ch',
            '078 / 000 00 00',
            'yes'),

            ('https://www.littleakiba.ch/assets/avatars/SzVdpCcKEx5JSQci.png',
            'Swissfrankie',
            'Mr. President',
            '2004-12-18',
            'https://www.littleakiba.ch/portal/profile/Swissfrankie',
            'sample@reallifecafe.ch',
            '078 / 000 00 00',
            'yes')
            ";

     $con->query($sql);

?>

<h1>Beispieldaten erstellt</h1>