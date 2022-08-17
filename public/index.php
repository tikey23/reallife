<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Real Life Café</title>
    <!-- <link rel="stylesheet" href="/zody/reallife/css/format.css"> -->
<link rel="stylesheet" href="format.css">

</head>
<body>

<div class='head'>
    <div class='headleft'>
        <img src='img/logo.jpg'></img>
    </div>

    <div class='headright'>
        <h1>Real Life Café</h1>
        <h1>Herzlich Willkommen!</h1>
        <h1>ようこそ</h1>
    </div>


<div class='navigation'>
    <a href="">Home</a><br>
    <a href="">Galerie</a><br>
    <a href="">Wer sind wir?</a><br>
    <a href="">Regel</a><br>
    <a href="">Helfer werden</a><br>
    <a href="">Über uns</a><br>
</div>

</div>




<div class='main'>

<?php
    $text = "";
    for ($i=1; $i < 30; $i++)
    {
        $text .= "text<br>";
    }
    echo "<p>$text</p>";
?>

</div>

<div class='foot'>
<p>Version 0.01</p>
</div>


</body>
</html>

