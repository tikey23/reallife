
<div class="galeriebilder">
<?php
require_once('functions/galleryfunctions.php');



if(isset($_POST['folder'])) {
    $_SESSION['folder'] = $_POST['folder'];
    $folder = $_POST['folder'];
}

$folder = $_SESSION['folder'];
global $con;

if($folder == "neu") {
    $_SESSION['folder'] = $_POST['titel'];
    $folder = $_SESSION['folder'];
    $con->query("INSERT INTO gallerycategory (folder) VALUES ('$folder')");
    mkdir("img/galerie/" . $folder . "/", 0777);
}

if(isset($_SESSION['password'])) {
    addpic();
    uploadpic($folder);
}

showpics($folder);



?>

</div>


