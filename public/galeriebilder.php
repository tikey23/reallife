<style>


    .galeriebilder img {
        width: 300px;
        margin: 10px;
        border-radius: 10px;
    }

    .galeriebilder button {
        border: 1px solid black;
        padding: 2px;
        margin: 2px;
    }

    .galeriebilder button:hover {
        background-color: #c4b5fd; /* bg-violet-300 */
    }



</style>
<div class="galeriebilder">
<?php
require_once('functions/galleryfunctions.php');



if(isset($_POST['folder'])) {
    $_SESSION['folder'] = $_POST['folder'];
    $folder = $_POST['folder'];
}

$folder = $_SESSION['folder'];
$con = new mysqli("", "root", "", "reallife");

if($folder == "neu") {
    $_SESSION['folder'] = $_POST['titel'];
    $folder = $_SESSION['folder'];
    $con->query("INSERT INTO gallerycategory (folder) VALUES ('$folder')");
}

if(isset($_SESSION['password'])) {

    addpic($con, $folder);
    echo "<p><a target='_blank' href='admin/gallerydelete.php'>Löschen</a></p>";
    
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
    }
}

showpics($con, $folder);



?>

</div>


