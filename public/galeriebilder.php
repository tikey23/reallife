
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
    $_SESSION['folder'] = $con->real_escape_string($_POST['categoryname']);
    $folder = $_SESSION['folder'];

    if(!preg_match("/^[a-z0-9äöü]+$/i", $folder)) {
        echo "<p>Fehler! Bitte keine Sonderzeichen benutzen.</p>";
        echo "<p><a href='/index.php?page=galerie'>Zurück</a></p>";
        die;
    }

    if(file_exists("img/galerie/" . $folder)) {
        echo "<p>Kategorie existiert bereits</p>";
    } else {
        $con->query("INSERT INTO gallerycategory (folder, categoryname) VALUES ('$folder', '')");
        mkdir("img/galerie/" . $folder . "/", 0777);
    }

}

echo "<h1 class='text-3xl font-bold underline'>$folder</h1>";

if(isset($_SESSION['password'])) {
    addpic();
    uploadpic($folder);
}

showpics($folder);



?>

</div>


