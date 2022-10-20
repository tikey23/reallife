<script type="text/javascript" src="js/newMemberForm.js"></script>

<div class='classTable' id='member'>
	<h1 class='text-3xl font-bold text-center'>Wer sind wir?</h1>
	<br>

	<?php

	use \Rl\Models\Member;

if(isset($_SESSION["admin"])){
	if(isset($_POST['newMember'])) {
		$member = new Member();
		$member->membername = $_POST['membername'];
		$member->memberimg = $_POST['memberimg'];
		$member->memberfunction = $_POST['memberfunction'];
		$member->little_akiba = $_POST['little_akiba'];
		$member->e_mail = $_POST['e_mail'];
		$member->mobile = $_POST['mobile'];
		$member->involved_since = $_POST['involved_since'];
		$member->active = 1;
		$member->save();
	} else if(isset($_POST['modifyMember'])){
		$member = findOne(Member::class, $_POST['modifyMember']);
		$member->memberimg = $_POST['memberimg'];
		$member->membername = $_POST['membername'];
		$member->memberfunction = $_POST['memberfunction'];
		$member->involved_since = $_POST['involved_since'];
		$member->little_akiba = $_POST['little_akiba'];
		$member->e_mail = $_POST['e_mail'];
		$member->mobile = $_POST['mobile'];
		$member->active = $_POST['active'];
		$member->save();
	} else if(isset($_POST['deleteMember'])) {
		$member = findOne(Member::class, $_POST['deleteMember']);
		$member->delete();
	}
}

	$members = findAll(Member::class);
	echo $twig->render('member/membertable.twig', [
		"isAdmin" => isset($_SESSION['admin']),
		"isLeader" => isset($_SESSION['leader']),
		"isHelper" => isset($_SESSION['helper']),
		'members' => $members,
		'modifyMemberPick' => @$_POST['modifyMemberPick']
	]);
	
	echo $twig->render('member/newMember.twig', ["isAdmin" => isset($_SESSION['admin'])]);

	echo $twig->render('member/recruitmember.twig');

	if(isset($_SESSION['username'])){
		echo $twig->render('global/logout.twig');
	}

	?>

</div>



