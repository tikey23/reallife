<?php

class Mitglied
{
    function __construct(
        private $name,
        private $funktion,
        private $telnr,
        private $email,
        private $eintrittseit,
        private $avatar,
        private $accountlink,
    ){}

    function anzeigen()
    {
        echo "<tr>";
        echo "<td><img src='" . $this->avatar. "'></img></td>";
        echo "<td>" . $this->name . "</td>";
        echo "<td>" . $this->funktion . "</td>";
        echo "<td>" . $this->telnr . "</td>";
        echo "<td>" . $this->email . "</td>";
        echo "<td>" . $this->eintrittseit . "</td>";
        echo "<td>" . $this->accountlink . "</td>";
        echo "</tr>";
    }
}

?>

<h1 class='text-3xl font-bold text-center'>Wer sind wir?</h1>
<table align='center'>
    <tr>
    <td> </td>
    <td> </td>

<?php
$darki = new Mitglied("Dark Columbia", "Vorsteher", "079 888 88 88", "darki@gmx.ch", "01.01.2005", "avatar.jpg", "unknown");
$frankie = new Mitglied("Frankie", "Vorsteher", "079 888 88 88", "darki@gmx.ch", "01.01.2005", "avatar.jpg", "unknown");


$darki->anzeigen();
$frankie->anzeigen();

?>

</table>

