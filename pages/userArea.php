<?php
use \Rl\Models\Member;

if(!isset($_SESSION['username'])){

    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    $member = findOneByColumn(Member::class, 0, "membername", $username);
} else {
    $username = $_SESSION['username'];
    $pwd = $_SESSION['pwd'];
    $member = findOneByColumn(Member::class, 0, "membername", $_SESSION['username']);
}

    if($member == "error"){
        echo "Anmeldedaten sind nicht korrekt";
    } else {

        //check user and password

        if (password_verify($pwd, $member->pwd)) {

            $_SESSION['username'] = $username;
            $_SESSION['pwd'] = $pwd;
            if(!isset($_SESSION['refresh'])){
                header("refresh:0");
                $_SESSION['refresh'] = true;
            }
            

            echo $twig->render('user/userTitle.twig', ["member" => $member]);

            if($member->memberfunction == "Admin"){
                $_SESSION['admin'] = true;
                $_SESSION['leader'] = true;
                $_SESSION['helper'] = true;

                echo $twig->render('admin/toAdmin.twig');

            } else if ($member->memberfunction == "Leiter"){

                $_SESSION['leader'] = true;
                $_SESSION['helper'] = true;

            } else {

                $_SESSION['helper'] = true;
            }

            echo $twig->render('admin/adminEventsbutton.twig');
            echo $twig->render('user/userButtons.twig');
            echo $twig->render('global/logout.twig');



        } else {
            echo "Anmeldung fehlgeschlagen";
        }
    }



?>