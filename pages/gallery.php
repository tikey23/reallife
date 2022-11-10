<?php

use \Rl\Models\Picture;
use \Rl\Models\Gallerycategory;

// require_once('../functions/galleryfunctions.php');
if (isset($_POST['modifyGallery'])) {
	$gallery = findOne(Gallerycategory::class, $_POST['modifyGallery']);
	rename("img/gallery/" . $gallery->categoryName, "img/gallery/" . $_POST['categoryName']);
	$gallery->categoryName = $_POST['categoryName'];
	$gallery->galleryDate = $_POST['galleryDate'];
	$gallery->titlePic = $_POST['titlePic'];
	$gallery->save();
}

if (isset($_POST['deleteGallery'])) {
	$gallerycategory = findOne(Gallerycategory::class, $_POST['deleteGallery']);

	echo $twig->render("components/alert.twig", [
		"type" => "success",
		"message" => "Kategorie: <b>" . $gallerycategory->categoryName . "</b> gelöscht.",
	]);

	$gallerycategory->deletecategory();
	$gallerycategory->delete();
}

$gallerycategories = findAll(Gallerycategory::class);
$pictures = findAll(Picture::class);
echo $twig->render('gallery/showGallery.twig', [
	"isAdmin" => isset($_SESSION['admin']),
	"gallerycategories" => $gallerycategories,
	"modifyGalleryPick" => @$_POST['modifyGalleryPick'],
	"pictures" => $pictures,
]);