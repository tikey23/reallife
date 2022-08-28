<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Real Life Café</title>
    <link rel="stylesheet" href="/css/format.css">
    <link href="/css/output.css" rel="stylesheet">

  <!--  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet"> -->
</head>
<body>

<div class="head">
    <div class="headleft">
        <img src="/img/logo.jpg"></img>
    </div>

    <div class="headright">
        <h1 class="text-5xl font-bold bg-transparent">Real Life Café</h1>
        <h1 class="text-3xl">Herzlich Willkommen!</h1>
        <h1 class="text-3xl">ようこそ</h1>
    </div>

   <div class= "text-2xl" id="navigation">
        <p><a href="/index.php">Home</a></p>
        <p><a href="/index.php?page=galerie">Galerie</a></p>
        <p><a href="/index.php?page=wersindwir">Wer sind wir?</a></p>
        <p><a href="/index.php?page=helferwerden">Helfer werden</a></p>
        <p><a href="/index.php?page=regeln">Regeln</a></p>
        <p><a href="/index.php?page=ueberuns">Über uns</a></p>
    </div>    
</div>


<div class="text-center p-2" id="main">

    <?php

        if(isset($_GET['page']))
        {
            if($_GET['page'] == "galerie"){include "galerie.php";}
            else if($_GET['page'] == "wersindwir") {include "wersindwir.php";}
            else if($_GET['page'] == "regeln") {include "regeln.php";}
            else if($_GET['page'] == "helferwerden") {include "helferwerden.php";}
            else if($_GET['page'] == "ueberuns") {include "ueberuns.php";}   
            else if($_GET['page'] == "galeriebilder") {include "galeriebilder.php";}  
        }
        else
        {
            include "home.php";
        }

    ?>


</div>

<div class="foot">
<p>Version 0.02</p>
</div>


</body>
</html>

