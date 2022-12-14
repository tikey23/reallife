<?php

namespace Rl\Models;

use Rl\Models\Model;

class Gallerycategory extends Model {
	protected $table = "gallerycategory";
	protected $orderBy = "galleryDate DESC";

	function newCategory($categoryTitle, $uploadedFile, $tempFile) {
		global $con, $twig;
		if (!preg_match("/^[a-z0-9äöü ]+$/i", $categoryTitle)) {
			echo $twig->render("components/alert.twig", [
				"type" => "error",
				"message" => "<p>Fehler! Bitte keine Sonderzeichen benutzen.</p><p><a href='/index.php?page=gallery'>Zurück</a></p>",
			]);
			die;
		}

		if (file_exists("img/gallery/" . $categoryTitle)) {
			echo $twig->render("components/alert.twig", [
				"type" => "error",
				"message" => "<p>Kategorie existiert bereits.</p><p><a href='/index.php?page=gallery'>Zurück</a></p>",
			]);
			die;
		} else {

			$titlePic = basename($uploadedFile);

			$this->categoryName = $categoryTitle;
			$this->galleryDate = $_POST['galleryDate'];
			$this->titlePic = $titlePic;
			$this->save();

			mkdir("img/gallery/" . $categoryTitle . "/", 0777);

			$this->uploadpic($uploadedFile, $tempFile);
		}
	}


	function uploadpic($uploadedFile, $tempFile) {
		global $twig;
		$target_dir = "img/gallery/" . $this->categoryName . "/";
		$uploadfile = $target_dir . basename($uploadedFile);
		$type = strtolower(pathinfo($uploadfile, PATHINFO_EXTENSION));
		$uploadok = 0;

		if (file_exists($uploadfile)) {
			echo $twig->render("components/alert.twig", [
				"type" => "error",
				"message" => "Fehler! Bild existiert bereits im Dateiordner!",
			]);
			$uploadok++;
		}

		if ($type != "jpg" && $type != "jpeg") {
			echo $twig->render("components/alert.twig", [
				"type" => "error",
				"message" => "Fehler! Nur \"JPG\" und \"JPEG\" Dateien erlaubt",
			]);
			$uploadok++;
		}

		if ($uploadok == 0) {
			move_uploaded_file($tempFile, $uploadfile);
			$picName = basename($uploadedFile);
			$image = imagecreatefromjpeg($uploadfile);

			if(filesize($uploadfile) > 1024000) {
				$imgWidth = imagesx($image);
				$imgHeight = imagesy($image);
				$ratio_orig = $imgWidth/$imgHeight;
				$newWidth = 1500;
				$newHeight = 1500;
				if ($newWidth/$newHeight > $ratio_orig) {
					$newWidth = $newHeight*$ratio_orig;
				} else {
					$newHeight = $newWidth/$ratio_orig;
				}

				$newimg = imagescale($image, $newWidth, $newHeight);
				imagejpeg($newimg, $uploadfile);
			}

			$newPic = new Picture;
			$newPic->categoryName = $this->categoryName;
			$newPic->picName = $picName;
			$newPic->categoryId = $this->id;
			$newPic->save();
		}
	}

	function deletecategory() {
		// delete folder on server
		$gallerycategory = findOne(Gallerycategory::class, $this->id);
		$folderName = $gallerycategory->categoryName;

		$link = "img/gallery/" . $folderName . "/";

		$pictures = findAll(Picture::class, "categoryId", $this->id);
		foreach ($pictures as $picture) {
			$picture->delete();
		}

		chmod($link, 0777);
		rmdir($link);
	}
}