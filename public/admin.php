<?php
    session_start();

    include "data.php";

    if(!isset($_POST['kennwort']))
    {
        echo "<p>Bitte zuerst <a href=/index.php?page=anmeldung><b>anmelden</b></a></p>";
    }
    else
    {
        if($_POST['kennwort'] === $_SESSION['password'])
        {
            echo "<p>Anmeldung erfolgreich</p>";
        }
        else
        {
            echo "<p>Fehlgeschlagen</p>";
        }
    }
    session_destroy();
?>