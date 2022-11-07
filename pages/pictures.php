<div class="pictures">
	<?php

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
			$categoryTitle = $con->real_escape_string($_POST['newCategoryTitle']);
			$uploadedFile = $_FILES['fileToUpload']['name'];
			$tempFile = $_FILES['fileToUpload']['tmp_name'];
			
			$newCategory = new Gallerycategory;
			$newCategory->newCategory($categoryTitle, $uploadedFile, $tempFile);
			$gallerycategoryId = $newCategory->id;

		} elseif (isset($_POST['picUpload'])) {
			$gallerycategoryId = $_POST['picUpload'];
		}
		
		if (isset($_POST['deletePicture'])) {
			$picture = findOne(Picture::class, $_POST['deletePicture']);
			echo "Bild: <b>" . $picture->picName . "</b> gelöscht.<br><br>";
			$picture->delete();
		}

		// Upload new pic
		/* $gallerycategorys = findOne(Gallerycategory::class, $gallerycategoryId);
		if (isset($_POST['picUpload'])) {
			$categoryName = $gallerycategorys->categoryName;
			$uploadedFile = $_FILES['fileToUpload']['name'];
			$tempFile = $_FILES['fileToUpload']['tmp_name'];
			$gallerycategorys->uploadpic($uploadedFile, $tempFile);
		} */

		$gallerycategorys = findOne(Gallerycategory::class, $gallerycategoryId);
		if (isset($_POST['picUpload'])) {
			
			$upFiles = $_FILES['fileToUpload'];

			for($i=0; $i<count($upFiles['name']); $i++){
				$uploadedFile = $upFiles['name'][$i];
				$tempFile = $upFiles['tmp_name'][$i];
				$categoryName = $gallerycategorys->categoryName;
				$gallerycategorys->uploadpic($uploadedFile, $tempFile);
			}
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
