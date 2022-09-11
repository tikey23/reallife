<?php

function showActualEvent(){

global $con;
$res = $con->query("SELECT * FROM event WHERE eventdate >= NOW() ORDER BY eventdate");
$eventdate = $res->fetch_assoc();
$showeventdate = date_create($eventdate['eventdate']);

echo "<p class='text-3xl font-bold text-center'>
Nächster Termin:<br>" . date_format($showeventdate, "d. F Y") . "</p>";
echo "<br>";
echo "<p class='text-2xl font-bold text-center'>18 - 22Uhr</p>";
echo "<br>";
echo "<p class='text-2xl text-center font-bold'><u>Weitere Termine:</u></p>";
while($eventdate = $res->fetch_assoc())
{
    $showeventdate = date_create($eventdate['eventdate']);
    echo date_format($showeventdate, "d. F Y") . "<br>";
}
}


function showEvent(){
        global $con;
        $res = $con->query("SELECT * FROM event ORDER BY eventdate");
        while($eventdate = $res->fetch_assoc())
        {
            echo "<table align='center'>";
            // when click on button "ändern"
            if(@$_POST['modifypick'] == $eventdate['id']){
                echo "<tr><td><input name='newdate' value='" . $eventdate['eventdate'] . "'></td>
                <td><button name='modifyEvent' value='" . $eventdate['id'] . "']>aktualisieren</button></td></tr>";
            }
            else {
            // List all eventdates
            $showeventdate = date_create($eventdate['eventdate']);
            echo "<tr><td>" . date_format($showeventdate, 'd. M. Y') . "</td>
            <td><button name='modifypick' value='" . $eventdate['id'] . "']>ändern</button></td>
            <td><button name='deleteEvent' value='" . $eventdate['id'] . "'>löschen</button></td></tr>";
            }
        }
            echo "</table>";
            echo "<br>";

            // create new eventdate
            echo "<p class='font-bold'>Neuer Termin erstellen:</p>";
            neweventdate();

}

function modifyEvent($con, $newdate, $id){
    $con->query("UPDATE event SET eventdate = '$newdate' WHERE id='$id'");
}

function deleteEvent($con, $id){
    $con->query("DELETE FROM event WHERE id='$id'");
}

function neweventdate(){
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
    $neweventdate = $year . "-" . $month . "-" . $day;
    $con->query("INSERT INTO event (eventdate) VALUES ('$neweventdate')");
}

?>