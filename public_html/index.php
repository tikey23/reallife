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
<body id="idBody" class='text-lg bg-fixed bg-zinc-200'>

<?PHP

checkMonth();

if(isset($_SESSION['username'])){
	$loggedInUser = findOneByColumn(Member::class, 0, "membername", $_SESSION['username']);
} else {
	$loggedInUser = NULL;
}

echo $twig->render('global/head.twig', ['additionalTitle' => $additionalTitle, 'member' => $loggedInUser, 'currentPage' => @$_GET['page']]);

$events = showActualEvent();
$firstEvent = array_shift($events);
echo $twig->render('home/actualEvents.twig', [
	"firstEvent" => $firstEvent,
	"events" => $events,
]);

?>

<div class="relative z-20 top-[50vh] md:top-[50vh] xl:top-[70vh] w-full pb-12">
	<div id="main" class="text-center bg-[#FA5A5A] border border-solid border-black rounded-xl max-w-7xl  mx-auto p-2 lg:p-8 ">
	<?php
		includePage(@$_GET['page']);
	?>
	</div>

	<footer class="block m-12 text-sm text-gray-500 text-center">
		Diese Seite wurde programmiert von <a href='http://www.karingiang.ch' target='_blank' class='underline'>Zody</a>.
	</footer>

</div>


</body>
</html>

