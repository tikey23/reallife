<style>

    #main img
    {
        width: 300px;
        margin: 10px;
        border-radius: 10px;
    } 

</style>

<?php

$thema = $_POST['thema'];

switch($thema)
{
    case "unterwasser":
        {
            $titel = "Unterwasser";
            $bilderlink = "/img/galerie/unterwasser_abend/";
            $inhalt = array(
                "1.jpg",
                "2.jpg",
                "3.jpg",
                "4.jpg",
                "5.jpg"
            );
            break;
        }
} 


for($i=0; $i<count($inhalt); $i++)
{
    echo "<a href=''><img src='$bilderlink" . $inhalt[$i] . "'></img></a>";
}

    ?>


