<div class='admingallery'>
<?php
require_once('functions/galleryfunctions.php');

use \Rl\Models\Gallerycategory;
use \Rl\Models\Gallery;

// Delete Category
if(isset($_POST['deletecategory'])) {
    deletecategory($_POST['deletecategory']);

    $gallerycategory = findOne(Gallerycategory::class, $_POST['deletecategory']);
    $gallerycategory->delete();
}


// Delete Pic
if(isset($_POST['deletepic'])) {
    deletepics($_POST['deletepic']);

    $gallery = findOne(Gallery::class, $_POST['deletepic']);
    $gallery->delete();
}

// Show all categorys and pics
$gallerycategorys = findAll(Gallerycategory::class);
$gallerys = findAll(Gallery::class);

echo $twig->render('gallery/admingallery.twig', [
    "gallerycategorys" => $gallerycategorys,
    "gallerys" => $gallerys,
    ]);

    ?>
</div>
