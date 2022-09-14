<?php

function selectdate($no) {
// Tag
$d = date("d");
echo "<td><select name='day$no'>";
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
echo "<select name='month$no'>";
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
echo "<select name='year$no'>";
echo "<option value=$y selected='selected'>$y</option>";
echo "<option value=" . $y+1 . ">" . $y+1 . "</option>";
echo "</select></td>";

}
?>