<div class='admingallery'>
<?php
//require_once('functions/galleryfunctions.php');
global $con;
echo "<form action='/index.php?page=adminGallery' method='post'>";

echo "<h1 class='text-3xl font-bold underline'>Galerie bearbeiten:</h1>";
echo "<h2 class='text-2xl font-bold underline'>Kategorien</h2>";

    if(isset($_POST['deletecategory'])) {
    $deletecategory = $_POST['deletecategory'];
    $con->query("DELETE FROM gallerycategory WHERE folder = '$deletecategory'");
}

$res = $con->query("SELECT * FROM gallerycategory");

// Kategorien löschen
echo "<select name='deletecategory'>";
while($data = $res->fetch_assoc()) {
    echo "<option value='" . $data['folder'] . "'>" . $data['folder'] . "</option>";
}
echo "</select>";
echo "<input type='submit' value='Löschen' onclick=\"return confirm('Are your sure?');\">";
echo "<br>";

// Bilder löschen

echo "<h2 class='text-2xl font-bold underline'>Bilder</h2>";
$res = $con->query("SELECT * FROM gallery");
echo "<table align='center'>";
echo "<tr><td>Bild</td><td>Kategorie</td><td>Dateiname</td><td>Löschen?</td></tr>";
while($data = $res->fetch_assoc()) {
    echo "<tr>";
    /*echo "<td><img src='img/galerie/" . $data['folder'] . "/" . $data['dateiname'] . "' style='width:100px'></img></td>
    <td>" . $data['folder'] . "</td>
    <td>" . $data['dateiname'] . "</td>
    <td><input type='submit' name='deletepic' value='" . $data['dateiname'] . "' onclick=\"return confirm('Are your sure?');\"></td>";*/

    echo "<td><img src='img/galerie/" . $data['folder'] . "/" . $data['dateiname'] . "' style='width:100px'></img></td>
    <td>" . $data['folder'] . "</td>
    <td>" . $data['dateiname'] . "</td>
    <td><button name='deletepic' value='" . $data['dateiname'] . "' onclick=\"return confirm('Are your sure?');\">Löschen</button></td>";
    echo "</tr>";
}
echo "</table>";
echo "</form>";
    ?>
</div>
