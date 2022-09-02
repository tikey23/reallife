<?php
function showEvent(){
        $con = new mysqli("", "root", "", "reallife");
        $res = $con->query("SELECT * FROM event ORDER BY termin");
        while($termin = $res->fetch_assoc())
        {
            if(@$_POST['modifypick'] == $termin['id']){
                echo "<input name='newdate' value='" . $termin['termin'] . "'><button name='modifyEvent' value='" . $termin['id'] . "']>aktualisieren</button><br>";
            }
            else {
            echo $termin['termin'] . "<button name='modifypick' value='" . $termin['id'] . "']>ändern</button><button name='deleteEvent' value='" . $termin['id'] . "'>löschen</button><br>";
            }
        }
}

function modifyEvent($newdate, $id){
    $con = new mysqli("", "root", "", "reallife");
    $con->query("UPDATE event SET termin = '$newdate' WHERE id='$id'");
}

function deleteEvent($id){
    $con = new mysqli("", "root", "", "reallife");
    $con->query("DELETE FROM event WHERE id='$id'");
}
?>