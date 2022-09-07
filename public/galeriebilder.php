
<div class="galeriebilder">
<?php
require_once('functions/galleryfunctions.php');



if(isset($_POST['folder'])) {
    $_SESSION['folder'] = $_POST['folder'];
    $folder = $_POST['folder'];
}

$folder = $_SESSION['folder'];
global $con;
// $con = new mysqli("", "root", "", "reallife");

if($folder == "neu") {
    $_SESSION['folder'] = $_POST['titel'];
    $folder = $_SESSION['folder'];
    $con->query("INSERT INTO gallerycategory (folder) VALUES ('$folder')");
    mkdir("img/galerie/" . $folder . "/", 0777);
}

if(isset($_SESSION['password'])) {

    addpic();
    
    if(isset($_POST['picupload'])) {
        
        $target_dir = "img/galerie/" . $folder . "/";
        $uploadfile = $target_dir . basename($_FILES['fileToUpload']['name']);
        if (file_exists($uploadfile)) {
            echo "<br><p class='font-bold'>Fehler! Bild existiert bereits im Dateiordner!</p>";
        } else {

        move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile);
        $file = basename($_FILES['fileToUpload']['name']);
        

        $sql = "INSERT INTO gallery (folder, dateiname) values 
        ('" . $_SESSION['folder'] . "', '$file')";
        $con->query($sql);
        }

        $resul = $con->query("SELECT * FROM gallerycategory WHERE folder = '" . $_SESSION['folder'] . "'");
        $titeldata = $resul->fetch_assoc();

        if ($titeldata['titel'] == "") {
            echo $file . "<br>";
            $con->query("UPDATE gallerycategory SET titel = '$file' WHERE folder = '" . $_SESSION['folder'] . "'");
        }
    }
}

showpics($folder);



?>

</div>


