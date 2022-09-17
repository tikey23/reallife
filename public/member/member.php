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
            include 'template/member/membershift.php';
            include 'template/logout.html';
                        
        } else {
        // Login failed
            include 'template/member/memberloginfailed.php';
        }
    }
                
    if(!isset($_SESSION['memberpassword'])){
        include 'template/member/memberloginform.html';
    }
    

            
        
?>
