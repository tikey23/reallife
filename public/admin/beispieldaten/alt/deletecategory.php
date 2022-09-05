<?php
    $con = new mysqli("", "root", "", "reallife");
    $sql ="DELETE FROM gallerycategory WHERE folder = 'Halloween'";
    $con->query($sql);
?>
