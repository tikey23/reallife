<?php
use \Rl\Models\Member;

    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    $errorText = "Anmeldedaten sind nicht korrekt";

    $member = findOneByColumn(Member::class, 0, "membername", $username, $errorText);

    if($member == "error"){
        echo "Anmeldedaten sind nicht korrekt";
    } else {
        $membername = $member->membername;
        $memberpwd = $member->pwd;

        //check user and password

        if (password_verify($pwd, $memberpwd)) {
            echo "Anmeldung erfolgreich";

            if($member->memberfunction == "Leiter"){
                echo "Ein Admin";
            } else {
                echo "Ein Helfer";
            }
        } else {
            echo "Anmeldung fehlgeschlagen";
        }
    }

  /*   $membername = $member->membername;
    $memberpwd = $member->pwd; */
    
    
/* 	 echo $twig->render('test.twig', [
		'members' => $members,
        'username' => $username,
        'pwd' => $pwd
	]); */


    /* if($member->membername = $_POST['membername']){
        if($member->pwd = $_POST['password']){
            echo "Login erfolgreich";
        }
    } else {
        echo "Login fehlgeschlagen";
    } */
?>