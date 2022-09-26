<?php

// TO DO
function showGallery() {
    global $con;
    $sql ="SELECT * FROM gallerycategory";
    $res = $con->query($sql);
    echo "<form action='/index.php?page=galeriebilder' method='post'>";
        while($data = $res->fetch_assoc()) {
            echo "<button name='folder' value='" . $data['id'] . "'>";
            echo "<div class='text-xl' style='width: 220px; height: 300px; padding: 10px; margin: 10px; border-radius: 20px; background-color: #8b5cf6; border: 1px solid black'>";
            echo "<img src='/img/galerie/". $data['categoryName'] . "/" . $data['titlePic'] . "' style='height: 200px; width: 100%; object-fit: cover; object-position: top center; border-radius: 10px;'></img><br>";
            echo "<p>" . $data['categoryName'] . "</p></div></button>";
        }
    echo "</form>";
}

// TO DO
function showpics($folder) {
    global $con;
  $res = $con->query("SELECT * FROM gallery WHERE categoryId = '$folder'");

   
  while($data = $res->fetch_assoc()) {
      echo "<a target='_blank' href='/img/galerie/" . $data['categoryName'] . "/" . $data['picName'] . "'>
      <img src='/img/galerie/" . $data['categoryName'] . "/" . $data['picName'] . "'></img></a>";
  }
}
// DONE
function deletecategory($id) {

    // get categoryName
    global $con;
    $res = $con->query("SELECT * FROM gallerycategory WHERE id = '$id'");
    $data = $res->fetch_assoc();
    $folderName = $data['categoryName'];
   
    // delete folder on server
    $link = "img/galerie/" . $folderName . "/";
    $files = scandir($link);

    for ($i=2; $i<count($files); $i++) {
        unlink($link . $files[$i]);
    }
    rmdir($link);

    // delete all pics from table
    $con->query("DELETE FROM gallery WHERE categoryId = '$id'");

}

// DONE
function deletepics($id) {
    global $con;

    // get link to pic to delete it
    $res = $con->query("SELECT * FROM gallery WHERE id = '$id'");
    $data = $res->fetch_assoc();
    $categoryName = $data['categoryName'];
    $picName = $data['picName'];
    $link = "img/galerie/" . $categoryName . "/" . $picName;
    unlink($link);

    
/*
    $res = $con->query("SELECT * FROM gallery ORDER BY folder");
    echo "<table align='center'>";
    echo "<tr style='border: 1px solid black'><td>Bild</td><td>Kategorie</td><td>Dateiname</td><td>Löschen?</td></tr>";
    while($data = $res->fetch_assoc()) {
        echo "<tr style='border: 1px solid black'>";
        echo "<td><img src='img/galerie/" . $data['folder'] . "/" . $data['picname'] . "' style='width:100px'></img></td>
        <td>" . $data['folder'] . "</td>
        <td>" . $data['picname'] . "</td>
        <td><button name='deletepic' value='" . $data['id'] . "' class='classButton' onclick=\"return confirm('Bist du sicher?');\">Löschen</button></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</form>";*/
}

// TO DO
function uploadpic($folder) {  
    global $con;
    if(isset($_POST['picupload'])) {  
        $target_dir = "img/galerie/" . $folder . "/";
        $uploadfile = $target_dir . basename($_FILES['fileToUpload']['name']);
        $type = strtolower(pathinfo($uploadfile,PATHINFO_EXTENSION));
        $uploadok = 0;

        if (file_exists($uploadfile)) {
            echo "<br><p class='font-bold'>Fehler! Bild existiert bereits im Dateiordner!</p>";
            $uploadok++;
        }

        if ($type != "jpg"
        && $type != "jpeg"
        && $type != "png"
        && $type != "gif") {
            echo "<br><p class='font-bold'>Fehler! Nur \"JPG\",  \"JPEG\", \"PNG\" und \"GIF\" Dateien erlaubt</p>";
            $uploadok++;
        }

        
        if ($uploadok == 0) {
        move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile);
        $file = basename($_FILES['fileToUpload']['name']);
        
        $sql = "INSERT INTO gallery (folder, picname) values 
        ('" . $_SESSION['folder'] . "', '$file')";
        $con->query($sql);
        }

        $resul = $con->query("SELECT * FROM gallerycategory WHERE folder = '" . $_SESSION['folder'] . "'");
        $titledata = $resul->fetch_assoc();

        if ($titledata['categoryname'] == "") {
            echo $file . "<br>";
            $con->query("UPDATE gallerycategory SET categoryname = '$file' WHERE folder = '" . $_SESSION['folder'] . "'");
        }
    }
}

// TO DO
function newcategory($folder) {
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
}
?>