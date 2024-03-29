<?php
    require_once('../config/config.php');
    $con = new mysqli($DB['hostname'], $DB['username'], $DB['password'], $DB['database']);

	if(!$adminPwd || !$leaderPwd || !$helperPwd) die("passwords need to be set in config.php for login");

    $sql = "DROP TABLE event";
    $con ->query($sql);

    $sql = "CREATE TABLE IF NOT EXISTS event (
        id INT(255) NOT NULL AUTO_INCREMENT, 
        eventdate DATE NULL DEFAULT NULL,
        active INT(10) NOT NULL,
        leader1 INT(255) NOT NULL,
        leader2 INT(255) NOT NULL,
        helper1 INT(255) NOT NULL,
        helper2 INT(255) NOT NULL,
        helper3 INT(255) NOT NULL,
        helper4 INT(255) NOT NULL,
        additive1 INT(255) NOT NULL,
        additive2 INT(255) NOT NULL,
        availableMembers VARCHAR(255),
        activeToRegister INT(10) NOT NULL,
        PRIMARY KEY (id)
        )ENGINE=InnoDB, DEFAULT CHARSET=UTF8";
    $con ->query($sql);


    // Beispieldaten

    // Create Events
    $sql = "INSERT INTO event (eventdate, active, leader1, leader2, helper1, helper2, helper3, helper4, additive1, additive2, availableMembers, activeToRegister) values 
    ('2023-12-30', 1, 1, 2, 3, 1, 2, 4, 2, 3, '1:2:3:4', 0)
    ";
    $con ->query($sql);

?>

<h2>BeispielEvents erstellt</h2>