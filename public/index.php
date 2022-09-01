<?php

session_start();

?>

<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8">
	<title>Real Life Café</title>
	<link rel="stylesheet" href="/css/format.css">
	<link href="/css/output.css" rel="stylesheet">

	<!-- <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet"> -->
</head>
<body>

<div class="head">
	<a href="/" class="headleft">
		<img src="/img/logo.png" width="350"></img>
	</a>

	<div class="headright mt-8">
		<a class="text-5xl font-bold bg-transparent" href="/">Real Life Café</a>
		<h1 class="text-3xl text-gray-700">Herzlich Willkommen!<br/>ようこそ</h1>
	</div>

	<div class="text-2xl" id="navigation">
		<p><a href="/index.php">Home</a></p>
		<p><a href="/index.php?page=galerie">Galerie</a></p>
		<p><a href="/index.php?page=wersindwir">Wer sind wir?</a></p>
		<p><a href="/index.php?page=helferwerden">Helfer werden</a></p>
		<p><a href="/index.php?page=regeln">Regeln</a></p>
		<p><a href="/index.php?page=ueberuns">Über uns</a></p>
	</div>
</div>


<div class="text-center p-2" id="main">


	<?php
	if (isset($_GET['page'])) {
		if ($_GET['page'] == "galerie") {
			include "galerie.php";
		} elseif ($_GET['page'] == "wersindwir") {
			include "wersindwir.php";
		} elseif ($_GET['page'] == "regeln") {
			include "regeln.php";
		} elseif ($_GET['page'] == "helferwerden") {
			include "helferwerden.php";
		} elseif ($_GET['page'] == "ueberuns") {
			include "ueberuns.php";
		} elseif ($_GET['page'] == "galeriebilder") {
			include "galeriebilder.php";
		} elseif ($_GET['page'] == "anmeldung") {
			include "anmeldung.php";
		} elseif ($_GET['page'] == "admin") {
			include "./admin/admin.php";
		} elseif ($_GET['page'] == "logout") {
			include "./admin/logout.php";
		}
	} else {
		include "home.php";
	}

	?>


</div>

<div class="foot">
	<p>Version 0.03</p>
	<?php
	if (isset($_SESSION['password'])) {
		echo "<p><a href='/index.php?page=admin'>Admin Bereich</a></p>";
	} else {
		echo "<p><a href='/index.php?page=anmeldung'>Administrator Anmeldung</a></p>";
	}
	?>

</div>


</body>
</html>

