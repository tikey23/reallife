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
        width: 300px;
        height: 300px;
        padding: 20px;
        border-radius: 10px;
        margin: 20px;
        background-color: green;
        
    }

    .special
    {
        width: 300px;
        height: 300px;
        display: block;
        background-color: red;
        padding: 20px;
        margin: 20px;
        border-radius: 10px;
    }

    .mainpart2
    {
        background-color: green;
    }
</style>
<div class="mainpart1">
    <div class="w-11" id="next">
        <?php  
        echo "<p class='text-3xl font-bold text-center bg-sky-900'>Nächster Termin: $termin</p>";
        echo "<br>";
        echo "<p class='text-2xl text-center font-bold'><u>Weitere Termine:</u></p>";
        echo "<p class='text-1xl text-center'>$weiteretermin1</p>";
        echo "<p class='text-1xl text-center'>$weiteretermin2</p>";
        echo "<p class='text-1xl text-center'>$weiteretermin3</p>";
        ?>
    </div>

    <div class="special">
        <h1 class="text-3xl font-bold text-center">Spezial Event:</h1>
        <p class="text.left">Roger's Karaokezebra</p>
    </div>
</div>
<div class="mainpart2">
    <p>Text</p>
</div>