<?php
    $termin = "20. August 2022";
    $weiteretermin1 = "01. September 2022";
    $weiteretermin2 = "15. September 2022";
    $weiteretermin3 = " ";
?>
<style>
    .mainpart1
    {
        display: flex;
        justify-content: center;
    }

    #next
    {
        width: 350px;
        height: 350px;
        display: block;
        background-color: #8b5cf6; /* bg-violet-500 */
        padding: 20px;
        margin: 20px;
        border-radius: 10px;
        border: 1px solid black;
    }


    .special
    {
        width: 350px;
        height: 350px;
        display: block;
        background-color: #f87171; /* bg-red-400 */
        padding: 20px;
        margin: 20px;
        border-radius: 10px;
        border: 1px solid black;
    }

    .mainpart2
    {
        text-align: justify-all;
    }


</style>

<div class="mainpart1">
    <div class="w-80 h-80 block bg-violet-500 p-10 rounded-xl" id="next">
        <?php  

        $inhalt = file_get_contents("admin/termine.dat");
        $termin = unserialize($inhalt);

        $datum[0] = date_create($termin[0]);

        echo "<p class='text-3xl font-bold text-center'>Nächster Termin:<br>" . date_format($datum[0], 'd. F Y') . "</p>";
        echo "<br>";
        echo "<p class='text-2xl font-bold text-center'>18 - 22Uhr</p>";
        echo "<br>";
        echo "<p class='text-2xl text-center font-bold'><u>Weitere Termine:</u></p>";

        for($i=1; $i<count($termin); $i++)
        {
            if(isset($termin[$i]))
            $datum[$i] = date_create($termin[$i]);
            echo "<p class='text-xl text-center'>" . date_format($datum[$i], 'd. F Y') . "</p>";
        }

        ?>
    </div>

    <div class="special">
        <h1 class="text-3xl font-bold text-center">Spezial Event:</h1>
        <p class="text.left">Z.B. Roger's Karaokezebra</p>
    </div>
</div>
<div class="mainpart2">
<p class='text-xl text-center'><u>Adresse:</u></p>
<p class='text-xl text-center'>Bitwäscherei<br>Neue Hard 12<br>8005 Zürich<br>3. Stock</p>
<center><div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Bitw%C3%A4scherei,%20Neue%20Hard%2012,%208005%20Z%C3%BCrich&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://putlocker-is.org">putlocker</a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><a href="https://www.embedgooglemap.net"></a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div></center>
</div>