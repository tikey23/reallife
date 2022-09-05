<?php

function showActualEvent($con){

$res = $con->query("SELECT * FROM event WHERE termin >= NOW() ORDER BY termin");
$termin = $res->fetch_assoc();
$terminanzeige = date_create($termin['termin']);

echo "<p class='text-3xl font-bold text-center'>
Nächster Termin:<br>" . date_format($terminanzeige, "d. F Y") . "</p>";
echo "<br>";
echo "<p class='text-2xl font-bold text-center'>18 - 22Uhr</p>";
echo "<br>";
echo "<p class='text-2xl text-center font-bold'><u>Weitere Termine:</u></p>";
while($termin = $res->fetch_assoc())
{
    $terminanzeige = date_create($termin['termin']);
    echo date_format($terminanzeige, "d. F Y") . "<br>";
}
}


function showEvent($con){
        //$con = new mysqli("", "root", "", "reallife");
        $res = $con->query("SELECT * FROM event ORDER BY termin");
        while($termin = $res->fetch_assoc())
        {
            echo "<table align='center'>";
            // Wenn button "ändern" betätigt
            if(@$_POST['modifypick'] == $termin['id']){
                echo "<tr><td><input name='newdate' value='" . $termin['termin'] . "'></td>
                <td><button name='modifyEvent' value='" . $termin['id'] . "']>aktualisieren</button></td></tr>";
            }
            else {
            // Alle Termine auflisten
            $terminanzeige = date_create($termin['termin']);
            echo "<tr><td>" . date_format($terminanzeige, 'd. M. Y') . "</td>
            <td><button name='modifypick' value='" . $termin['id'] . "']>ändern</button></td>
            <td><button name='deleteEvent' value='" . $termin['id'] . "'>löschen</button></td></tr>";
            }
        }
            echo "</table>";
            echo "<br>";

            // Neue Termin erstellen
            echo "<p class='font-bold'>Neuer Termin erstellen:</p>";
            newTermin();

}

function modifyEvent($con, $newdate, $id){
    //$con = new mysqli("", "root", "", "reallife");
    $con->query("UPDATE event SET termin = '$newdate' WHERE id='$id'");
}

function deleteEvent($con, $id){
    //$con = new mysqli("", "root", "", "reallife");
    $con->query("DELETE FROM event WHERE id='$id'");
}

function newTermin(){
    echo "<table align='center'>";
    // Tag
    $d = date("d");
    echo "<tr><td><select name='day'>";
    for($i=1; $i<=31; $i++){
        if($i == $d){
            echo "<option value=$i selected='selected'>$i</option>";
        }
        else{
        echo "<option value=$i>$i</option>";
        }
    }
    echo "</select>";

    // Monat

    $m = date("m");
    $month = array("Ungültig", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dez");
    echo "<select name='month'>";
    for($i=1; $i<=12; $i++){
        if($i == $m){
            echo "<option value=$i selected='selected'>" . $month[$i] . "</option>";
        }
        else{
        echo "<option value=$i>" . $month[$i] . "</option>";
        }
    }
    echo "</select>";

    // Jahr
    $y = date("Y");
    echo "<select name='year'>";
    echo "<option value=$y selected='selected'>$y</option>";
    echo "<option value=" . $y+1 . ">" . $y+1 . "</option>";
    echo "</select>";

    echo "<td><td><input type='submit' name='createEvent' value='erstellen'></td></tr>";
    echo "</table>";
}

function createEvent($con, $day, $month, $year){
    $newtermin = $year . "-" . $month . "-" . $day;
    $con->query("INSERT INTO event (termin) VALUES ('$newtermin')");
}

?>