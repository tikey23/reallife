<?php
// phpinfo();
use \Rl\Models\Member;
require_once('../load.php');

?>

<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Real Life Café</title>
	<link rel="stylesheet" href="/css/format.css">
	<link rel="stylesheet" href="/css/output.css">
	<link rel="icon" type="image/png" href="/img/faviconRL.png">
	<script type="text/javascript" src="/js/navigation.js"></script>
	<script src="/node_modules/tw-elements/dist/js/index.min.js"></script>
</head>
<body id="idBody" class='text-lg bg-fixed bg-gradient-to-tr from-violet-300 via-violet-300 to-violet-400'>

<?PHP

checkMonth();

if(isset($_SESSION['username'])){
	$loggedInUser = findOneByColumn(Member::class, 0, "membername", $_SESSION['username']);
} else {
	$loggedInUser = NULL;
}

?>

<div class="relative z-20 top-24 md:top-96 w-full pb-12">
	<img src="/img/logo.png" class="w-48 lg:w-96 m-auto mb-24">
	<div id="main" class="text-center bg-violet-200 border border-solid border-black rounded-xl max-w-7xl  mx-4 lg:mx-auto p-2 lg:p-8 ">
		Unser Webseite wird aktuell überarbeitet.<br>
		Bald sind wir wieder für euch da.
	</div>
</div>


</body>
</html>

