<style>

.galeriebilder {
    display: flex;
}

    .galeriebilder a {
        width: 300px;
        margin: 10px;
        border-radius: 10px;
    }

    .galeriebilder a:hover {
        margin: 10px;
        background-color: #c4b5fd; /* bg-violet-300 */
    }

</style>
<div class="galeriebilder">
<?php

$folder = $_POST['folder'];
$con = new mysqli("", "root", "", "reallife");

if($folder == "neu") {
    $titel = $_POST['titel'];
    $con->query("INSERT INTO gallerycategory (folder) VALUES ('$titel')");
}
else {
    $res = $con->query("SELECT * FROM gallery WHERE folder = '$folder'");

    while($data = $res->fetch_assoc()) {
        echo "<a target='_blank' href='/img/galerie/" . $data['folder'] . "/" . $data['dateiname'] . "'>
        <img src='/img/galerie/" . $data['folder'] . "/" . $data['dateiname'] . "'></img></a>";
    }
}

?>

</div>


