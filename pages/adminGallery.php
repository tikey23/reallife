<div class='admingallery'>
	<?php
	require_once('../functions/galleryfunctions.php');

	use \Rl\Models\Picture;
	use \Rl\Models\Gallerycategory;

	// Delete Category
	if (isset($_POST['deletecategory'])) {	
		deletecategory($_POST['deletecategory']);

		$gallerycategory = findOne(Gallerycategory::class, $_POST['deletecategory']);
		$gallerycategory->delete();

	}


	// Delete Pic
	if (isset($_POST['deletepic'])) {
		$picture = findOne(Picture::class, $_POST['deletepic']);
		$picture->delete();
	}

	// Show all categorys and pics
	$gallerycategorys = findAll(Gallerycategory::class);
	$pictures = findAll(Picture::class);

	echo $twig->render('gallery/adminGallery.twig', [
		"gallerycategorys" => $gallerycategorys,
		"pictures" => $pictures,
	]);

	echo $twig->render('admin/toAdmin.twig');
	echo $twig->render('global/logout.twig');

	?>
</div>
