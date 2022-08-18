<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Real Life Café</title>
    <link rel="stylesheet" href="format.css">
    <link href="/zody/reallife/css/output.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
</head>
<body>

<div class="head">
    <div class="headleft">
        <img src="img/logo.jpg"></img>
    </div>

    <div class="headright">
        <h1 class="text-5xl font-bold bg-transparent">Real Life Café</h1>
        <h1 class="text-3xl">Herzlich Willkommen!</h1>
        <h1 class="text-3xl">ようこそ</h1>
    </div>

   <div class= "text-2xl" id="navigation">
        <p><a href="">Home</a></p>
        <p><a href="">Galerie</a></p>
        <p><a href="">Wer sind wir?</a></p>
        <p><a href="">Regel</a></p>
        <p><a href="">Helfer werden</a></p>
        <p><a href="">Über uns</a></p>
    </div>    
</div>





<div class="main">

<?php
    $text = "";
    for ($i=1; $i < 30; $i++)
    {
        $text .= "text<br>";
    }
    echo "<p>$text</p>";
?>

</div>

<div class="foot">
<p>Version 0.01</p>
</div>


</body>
</html>

