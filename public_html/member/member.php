<div class="classTable" id="membershift">
<?php

global $ADMINPASSWORD;
global $MEMBERPASSWORD;
        
    if ($MEMBERPASSWORD == "") {
        die('Passwort nicht gesetzt');
        }
        
    if (isset($_POST['memberpassword'])) {
        $_SESSION["memberpassword"] = $_POST['memberpassword'];
           
        if($_POST['memberpassword'] == $ADMINPASSWORD) {
        // If input Adminpassword
            $_SESSION['password'] = $_POST['memberpassword'];
        }
    }

    if(isset($_SESSION['memberpassword'])){    
        if ($_SESSION['memberpassword'] === "$MEMBERPASSWORD" || $_SESSION['memberpassword'] === "$ADMINPASSWORD") {
        // Member Login
            $events = showActualEvent(); // Sources for shiftlist
            $members = getMembers();
            echo $twig->render('member/membershift.twig', ['events' => $events, 'members' => $members]);
            //echo $twig->render('member/membershift.twig'); //Original Line from Tikey
            echo $twig->render('logout.twig');
        } else {
        // Login failed
            session_destroy();
            echo $twig->render('member/memberloginfailed.twig');
        }
    }
                
    if(!isset($_SESSION['memberpassword'])){
        echo $twig->render('member/memberloginform.twig');
    }
    
            
        
?>
</div>
