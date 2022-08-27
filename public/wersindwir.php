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
        echo "<td><a href='mailto:" . $this->email . "?subject=Hier steht der Betreff'>" . $this->email . "</a></td>";
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
        <td><b>Name</b></td>
        <td><b>Funktion</b></td>
        <td><b>Mobile</b></td>
        <td><b>E-Mail</b></td>
        <td><b>Dabei seit:</b></td>
        <td><b>Little Akiba</b></td>
    </tr>
<?php
$darki = new Mitglied("dark_columbia", "Leiterin", "07x xxx xx xx", "dark_columbia@littleakiba.ch", "01.01.2005", "https://www.littleakiba.ch/assets/avatars/6229a198a8e55.png", "https://www.littleakiba.ch/portal/profile/201");
$swissfrankie = new Mitglied("Swissfrankie", "Mr. President", "07x xxx xx xx", "swissfrankie@littleakiba.ch", "01.01.2005", "https://www.littleakiba.ch/assets/avatars/SzVdpCcKEx5JSQci.png", "https://www.littleakiba.ch/portal/profile/Swissfrankie");
$mii = new Mitglied("mii-chan", "Leiterin", "07x xxx xx xx", "mii-chan@littleakiba.ch", "01.01.2005", "https://www.littleakiba.ch/assets/avatars/QZn69JpuvfACuml0.png", "https://www.littleakiba.ch/portal/profile/137");
$specularis = new Mitglied("Specularis", "Leiterin", "07x xxx xx xx", "specularis@littleakiba.ch", "01.01.2005", "https://www.littleakiba.ch/assets/avatars/TDTQfPL2tPnSGNkK.png", "https://www.littleakiba.ch/portal/profile/139");
$tikey = new Mitglied("tikey", "Leiter", "07x xxx xx xx", "tikey@littleakiba.ch", "01.01.2005", "https://www.littleakiba.ch/assets/avatars/9AiUc1LMZZHdDzlOKvYZ2QQhR099rXEefdfBPloM.jpg", "https://www.littleakiba.ch/portal/profile/1");

$bluberbla = new Mitglied("Bluberbla", "Helfer", "07x xxx xx xx", "bluberbla@littleakiba.ch", "01.01.2005", "https://www.littleakiba.ch/assets/avatars/z5onmnzTKHqU4HWxfoPnkMpwpsyiWVEcrHIBE9jm.png", "https://www.littleakiba.ch/portal/profile/Bluberbla");
$bonsai = new Mitglied("Bonsai", "Helfer", "07x xxx xx xx", "bonsai@littleakiba.ch", "01.01.2005", "https://www.littleakiba.ch/assets/avatars/61407e1f37cdd.png", "https://www.littleakiba.ch/portal/profile/bonsai");
$chris = new Mitglied("Chris Oramas", "Helfer", "07x xxx xx xx", "chris_oramas@littleakiba.ch", "01.01.2005", "https://www.littleakiba.ch/assets/avatars/zORz82DTyeS0T3xT.png", "https://www.littleakiba.ch/portal/profile/chris_oramas");
$sanuranoir = new Mitglied("SanuraNoir", "Helferin", "07x xxx xx xx", "sanuranoir@littleakiba.ch", "01.01.2005", "https://www.littleakiba.ch/assets/avatars/5jZr8liQ4BKYrFxz.png", "https://www.littleakiba.ch/portal/profile/SanuraNoir");
$zody = new Mitglied("Zody", "Unbekannt", "07x xxx xx xx", "zody@littleakiba.ch", "01.01.2030", "https://www.littleakiba.ch/assets/avatars/ojo83VEvLh8Ik2yM.png", "https://www.littleakiba.ch/portal/profile/zody");

$darki->anzeigen();
$swissfrankie->anzeigen();
$mii->anzeigen();
$specularis->anzeigen();
$tikey->anzeigen();

$bluberbla->anzeigen();
$bonsai->anzeigen();
$chris->anzeigen();
$sanuranoir->anzeigen();
$zody->anzeigen();

?>
</table>

<br>
<p class="text-2xl">
Wir sind ständig auf der Suche nach neuen Helfern!<br>
Hast du Interesse im RL zusammen mit netten Leuten zu arbeiten?<br>
Wir freuen uns auf dich!<br><br>

Für eine Kontaktaufnahme, einfach <a href='helferwerden.php'><b>hier</b></a> klicken.
</p>
<br><br>
<center><a href="https://www.littleakiba.ch"><img src="https://www.littleakiba.ch/assets/files/2019-11-10/1573418425-760679-littleakiba-banner.png"></img></a></center>



