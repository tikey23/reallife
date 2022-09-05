<style>

#galeriebilder {
	width: 100%;
}

    #galeriebilder img {
        width: 300px;
        margin: 10px;
        border-radius: 10px;
    }

</style>
<div id="galeriebilder">
<?php

//$folder = $_POST['folder'];

$folder = "cosplay_abend";

$con = new mysqli("", "root", "", "reallife");
$sql = "SELECT * FROM gallery WHERE folder = '$folder'";
$res = $con->query($sql);

while($data = $res->fetch_assoc()) {
	echo "<a href=''><img src='/img/galerie/" . $data['folder'] . "/" . $data['dateiname'] . "'></img></a>";
}

?>

</div>


