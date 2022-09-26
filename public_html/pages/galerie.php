<div class="galerie">

    <?php
        require_once('functions/galleryfunctions.php');

        showGallery();

		if (isset($_SESSION['password'])) {
			echo $twig->render('gallery/addGalleryCategoryIcon.twig');
			echo $twig->render("gallery/adminGalleryIcon.twig");
		}
    ?>

</div>

