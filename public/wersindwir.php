<style>
    table,td
    {
        border: 1px solid black;
        padding: 0.5em;
    }

</style>


<?php

class Mitglied
{
    function __construct(
        private $name,
        private $funktion,
        private $mobile,
        private $email,
        private $eintrittseit,
        private $avatar,
        private $accountlink,
    ){}

    function anzeigen()
    {
        echo "<tr>";
        echo "<td><img src='" . $this->avatar. "' style='width:100px; height:100px; border-radius:100%'></img></td>";
        echo "<td><b>" . $this->name . "<b></td>";
        echo "<td>" . $this->funktion . "</td>";
        echo "<td>" . $this->mobile . "</td>";
        echo "<td>" . $this->email . "</td>";
        echo "<td>" . $this->eintrittseit . "</td>";
        echo "<td><a href='" . $this->accountlink . "'>" . $this->accountlink . "</a></td>";
        echo "</tr>";
    }
}

?>

<h1 class='text-3xl font-bold text-center'>Wer sind wir?</h1>
<br>
<table align='center'>
    <tr>
        <td> </td>
        <td style='width:10em'>Name</td>
        <td style='width:10em'>Funktion</td>
        <td style='width:10em'>Mobile</td>
        <td style='width:10em'>E-Mail</td>
        <td style='width:10em'>Dabei seit:</td>
        <td style='width:10em'>Little Akiba</td>
    </tr>
<?php
$darki = new Mitglied("dark_columbia", "Leiterin", "*Streng geheim*", "*geheimnisvoll*", "01.01.2005", "https://www.littleakiba.ch/assets/avatars/6229a198a8e55.png", "https://www.littleakiba.ch/portal/profile/201");
$frankie = new Mitglied("Frankie", "Leitern", "*Streng geheim*", "*geheimnisvoll*", "01.01.2005", "darki.jpg", "unknown");
$person3 = new Mitglied("Person3", "Leiterin", "*Streng geheim*", "*geheimnisvoll*", "01.01.2005", "darki.jpg", "unknown");
$person4 = new Mitglied("Person4", "Leiterin", "*Streng geheim*", "*geheimnisvoll*", "01.01.2005", "darki.jpg", "unknown");



$darki->anzeigen();
$frankie->anzeigen();
$person3->anzeigen();
$person4->anzeigen();

?>
</table>

<br>
<p class="text-2xl">
Wir sind ständig auf der Suche nach neuen Helfern!<br>
Hast du Interesse im RL zusammen mit netten Leuten zu arbeiten?<br>
Wir freuen uns auf dich!<br><br>

Für eine Kontaktaufnahme, einfach <a href='helferwerden.php'><b>hier</b></a> klicken.
</p>




