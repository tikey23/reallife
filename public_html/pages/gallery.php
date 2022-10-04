<div class="gallery">

<?php

use \Rl\Models\Picture;
use \Rl\Models\Gallerycategory;

        require_once('functions/galleryfunctions.php');

        $gallerycategories = findAll(Gallerycategory::class);
        echo $twig->render('gallery/showGallery.twig',[
            "gallerycategories" => $gallerycategories
        ]);

		if (isset($_SESSION['password'])) {
			echo $twig->render('gallery/addGalleryCategoryIcon.twig');
			echo $twig->render("gallery/adminGalleryIcon.twig");
		}
    ?>

</div>

