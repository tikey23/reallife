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
</head>
<body id="idBody" class='text-lg bg-fixed bg-gradient-to-tr from-violet-300 via-violet-300 to-violet-400'>

<?PHP

checkDay();

if(isset($_SESSION['username'])){
	$loggedInUser = findOneByColumn(Member::class, 0, "membername", $_SESSION['username']);
} else {
	$loggedInUser = NULL;
}
echo $twig->render('global/head.twig', ['additionalTitle' => $additionalTitle, 'member' => $loggedInUser]);
?>

<div id="main" class="text-center bg-violet-200 border border-solid border-black rounded-xl max-w-7xl m-auto p-2 lg:p-8">
	<?php
		includePage(@$_GET['page']);
	?>
</div>

</body>
</html>

