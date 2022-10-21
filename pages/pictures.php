<div class="pictures">
	<?php
	require_once('../functions/galleryfunctions.php');

	use \Rl\Models\Picture;
	use \Rl\Models\Gallerycategory;

	if(isset($_POST['gallerycategoryId'])){
		$_SESSION['gallerycategoryId'] = $_POST['gallerycategoryId'];
	}
	
	@$gallerycategoryId = $_SESSION['gallerycategoryId'];

	/* if (!isset($gallerycategoryId)) {
		die("Not allowed.");
	} */

	if (isset($_SESSION["admin"])) {
		//Create New Category
		if (isset($_POST['newCategory'])) {

			global $con;
			$categoryTitle = $con->real_escape_string($_POST['newCategory']);
			$gallerycategoryId = newCategory($categoryTitle);

		} elseif (isset($_POST['picUpload'])) {
			$gallerycategoryId = $_POST['picUpload'];
		}

		// Upload new pic
		$gallerycategorys = findOne(Gallerycategory::class, $gallerycategoryId);
		if (isset($_POST['picUpload'])) {
			$categoryName = $gallerycategorys->categoryName;
			$uploadedFile = $_FILES['fileToUpload']['name'];
			$tempFile = $_FILES['fileToUpload']['tmp_name'];
			uploadpic($categoryName, $gallerycategoryId, $uploadedFile, $tempFile);
		}
	}
	// Show pics
	$gallerycategorys = findOne(Gallerycategory::class, $gallerycategoryId);
	$pictures = findAllByColumn(Picture::class, "categoryId", $gallerycategoryId);
	echo $twig->render('gallery/showPics.twig', [
		"isAdmin" => isset($_SESSION['admin']),
		"gallerycategorys" => $gallerycategorys,
		"pictures" => $pictures,
	]);
	?>
</div>
