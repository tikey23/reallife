<div class='member'>
	<h1 class='text-3xl font-bold text-center'>Wer sind wir?</h1>
	<br>

	<?php
	$members = getMembers();
	echo $twig->render('member/membertable.twig', [
		"isMember" => isset($_SESSION['memberpassword']),
		'members' => $members,
	]);
	echo $twig->render('member/recruitmember.twig');
	?>

</div>



