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

function modifyEvent($newdate, $id){
    global $con;
    $con->query("UPDATE event SET eventdate = '$newdate' WHERE id='$id'");
}

function deleteEvent($id){
    global $con;
    $con->query("DELETE FROM event WHERE id='$id'");
}

function neweventdate(){
    echo "<table align='center'>";

    selectdate();
    
    echo "<td><td><input type='submit' name='createEvent' value='erstellen'></td></tr>";
    echo "</table>";
}

function createEvent($day, $month, $year){
    global $con;
    $neweventdate = $year . "-" . $month . "-" . $day;
    $con->query("INSERT INTO event (eventdate) VALUES ('$neweventdate')");
}

?>