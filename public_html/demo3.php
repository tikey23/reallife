<?php
require('../config/config.php');
if(password_verify($_POST['pwddemo'], $demoPwd)){

    session_start();
    $_SESSION['demo'] = 1;
    header("location:/index.php");
}
