<?php
// phpinfo();
use \Rl\Models\Member;
require_once('../load.php');

if(!isset($_SESSION['demo'])){
	header("location:/demo.php");
}

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

?>

<?php
	/* if(@$_GET['page'] == 'becomeMember'){
		echo $twig->render('member/becomeMemberForm.twig');
	} */
?>

<div class='lg:flex justify-center ml-5 mr-5'>

	<div class='lg:hidden'>
		<?php
			include('../pages/events.php');
		?>
	</div>

	<div class="relative z-20 top-24 md:top-24 xl:top-24 mx-auto lg:ml-5 lg:mr-5 pb-12">
		<div id="main" class="text-center bg-[#FA5A5A] border border-solid border-black rounded-xl max-w-7xl p-2 lg:p-8">
		<?php
			includePage(@$_GET['page']);
		?>
		</div>
	</div>

	<div class='hidden lg:block'>
		<?php
			include('../pages/events.php');
		?>
	</div>
</div>
<div class='relativ mx-auto pt-12 pb-12'>
	<footer class="block m-12 text-sm text-gray-500 text-center">
		Diese Seite wurde programmiert von <a href='http://www.karingiang.ch' target='_blank' class='underline'>Zody</a>.
	</footer>
</div>

</body>
</html>

