<?php

function showGallery($con) {
    $sql ="SELECT * FROM gallerycategory";
        $res = $con->query($sql);
        while($data = $res->fetch_assoc()) {
            echo "<button name='folder' value='" . $data['folder'] . "'>";
            echo "<div class='text-xl' style='width: 220px; height: 300px; padding: 10px; margin: 10px; border-radius: 20px; background-color: #8b5cf6; /* bg-viloet-500 */; border: 1px solid black'>";
            echo "<img src='/img/galerie/". $data['folder'] . "/titel.jpg' style='height: 200px; width: 100%; object-fit: cover; object-position: top center; border-radius: 10px;'></img><br>";
            echo "<p>" . $data['folder'] . "</p></div></button>";
        }
}

function addGallerycategoryicon() {
    if (isset($_SESSION['password'])) {
        echo "<div class='text-xl' style='width: 220px; height: 300px; padding: 10px; margin: 10px; border-radius: 20px; background-color: #8b5cf6; /* bg-viloet-500 */; border: 1px solid black'>";
        echo "<button name='folder' value='neu'><img src='/img/galerie/add_box.png' style='height: 200px; width: 100%; object-fit: cover; object-position: top center; border-radius: 10px;'></img></button><br>";
        echo "<p><input name='titel' value='Neue Kategorie' size='12'></p></div>";
    }
}

function addpic($con, $folder) {
    echo $folder . "<br>";
    echo "<form action='/index.php?page=galeriebilder' method='post' enctype='multipart/form-data'>";
    //Select image to upload:
    echo "<input type='file' name='fileToUpload' id='fileToUpload'><br>";
    echo "<input type='hidden' value='$folder'>";
    echo "<button name='picupload' value='1'>Hochladen</button>";
    echo "</form>";
}

function showpics($con, $folder) {
  $res = $con->query("SELECT * FROM gallery WHERE folder = '$folder'");

   
  while($data = $res->fetch_assoc()) {
      echo "<a target='_blank' href='/img/galerie/" . $data['folder'] . "/" . $data['dateiname'] . "'>
      <img src='/img/galerie/" . $data['folder'] . "/" . $data['dateiname'] . "'></img></a>";
  }
}

?>