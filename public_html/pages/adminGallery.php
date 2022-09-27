<div class='admingallery'>
<?php
require_once('functions/galleryfunctions.php');

use \Rl\Models\Pictures;
use \Rl\Models\Gallerycategory;

// Delete Category
if(isset($_POST['deletecategory'])) {
    deletecategory($_POST['deletecategory']);

    $gallerycategory = findOne(Gallerycategory::class, $_POST['deletecategory']);
    $gallerycategory->delete();
}


// Delete Pic
if(isset($_POST['deletepic'])) {
    deletepics($_POST['deletepic']);

    $picture = findOne(Pictures::class, $_POST['deletepic']);
    $picture->delete();
}

// Show all categorys and pics
$gallerycategorys = findAll(Gallerycategory::class);
$pictures = findAll(Pictures::class);

echo $twig->render('gallery/admingallery.twig', [
    "gallerycategorys" => $gallerycategorys,
    "pictures" => $pictures,
    ]);

    ?>
</div>
