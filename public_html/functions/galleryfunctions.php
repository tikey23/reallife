<?php
use \Rl\Models\Picture;
use \Rl\Models\Gallerycategory;

function deletecategory($id) {

    // delete folder on server
    $gallerycategory = findOne(Gallerycategory::class, $id);
    $folderName = $gallerycategory->categoryName;

    $link = "img/gallery/" . $folderName . "/";
    $files = scandir($link);

    for ($i=2; $i<count($files); $i++) {
        unlink($link . $files[$i]);
    }
    
    rmdir($link);

    // delete all pics from table (provisionally codes)
    global $con;
    $con->query("DELETE FROM pictures WHERE categoryId = $id");
    
}


function deletepics($id) {
    $picture = findOne(Picture::class, $id);
    $categoryName = $picture->categoryName;
    $picName = $picture->picName;

    $link = "img/gallery/" . $categoryName . "/" . $picName;
    unlink($link);
}


function uploadpic($categoryName, $categoryId, $uploadedFile, $tempFile) {  
     
        $target_dir = "img/gallery/" . $categoryName . "/";
        $uploadfile = $target_dir . basename($uploadedFile);
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
        move_uploaded_file($tempFile, $uploadfile);
        $picName = basename($uploadedFile);
        
        $newPic = new Picture;
        $newPic->categoryName = $categoryName;
        $newPic->picName = $picName;
        $newPic->categoryId = $categoryId;
        $newPic->save();

        }

        $gallerycategory = findOne(Gallerycategory::class, $categoryId);
        $titlePic = $gallerycategory->titlePic;

        if ($titlePic == "") {
            echo $titlePic . "<br>";
            $gallerycategory->titlePic = $picName;
            $gallerycategory->save();
        }
}


function newCategory($categoryTitle) {
    global $con;
        if(!preg_match("/^[a-z0-9äöü]+$/i", $categoryTitle)) {
            echo "<p>Fehler! Bitte keine Sonderzeichen benutzen.</p>";
            echo "<p><a href='/index.php?page=gallery'>Zurück</a></p>";
            die;
        }

        if(file_exists("img/gallery/" . $categoryTitle)) {
            echo "<p>Kategorie existiert bereits</p>";
        } else {

            $newCategory = new Gallerycategory;
            $newCategory->categoryName = $categoryTitle;
            $newCategory->titlePic = "";
            $newCategory->save();

            mkdir("img/gallery/" . $categoryTitle . "/", 0777);

            return $newCategory->id;
        }  
}

?>