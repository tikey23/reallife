<div class='classTable' id='member'>
	<h1 class='text-3xl font-bold text-center'>Wer sind wir?</h1>
	<br>

	<?php

	if(isset($_POST['modifyMember'])){
		modifyMember(
			$_POST['modifyMember'],
			$_POST['memberimg'],
			$_POST['membername'],	
			$_POST['memberfunction'],	
			$_POST['involved_since'],	
			$_POST['little_akiba'],	
			$_POST['e_mail'],	
			$_POST['mobile'],	
			$_POST['active']);
	}

	$members = getMembers();
	echo $twig->render('member/membertable.twig', [
		"isMember" => isset($_SESSION['memberpassword']),
		"isAdmin" => isset($_SESSION['password']),
		'members' => $members,
		'modifyMemberPick' => @$_POST['modifyMemberPick']
	]);
	echo $twig->render('member/recruitmember.twig');
	?>

</div>



