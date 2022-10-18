<div class="inline">

<?php

use \Rl\Models\Picture;
use \Rl\Models\Gallerycategory;

        require_once('../functions/galleryfunctions.php');

        $gallerycategories = findAll(Gallerycategory::class);
        echo $twig->render('gallery/showGallery.twig',[
            "gallerycategories" => $gallerycategories
        ]);
    ?>
    <div class='sm:flex justify-center'>
    <?php
		if (isset($_SESSION['password'])) {
			echo $twig->render('gallery/addGalleryCategoryIcon.twig');
			echo $twig->render("gallery/adminGalleryIcon.twig");
		}
    ?>
    </div>

</div>

