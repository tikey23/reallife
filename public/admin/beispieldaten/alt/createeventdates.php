<?php
    $con = new mysqli("", "root", "", "reallife");

    $sql = "INSERT INTO event (termin) values ('2022-9-5'), ('2022-9-25'), ('2022-10-12'), ('2022-10-27')";
    $con ->query($sql);
?>