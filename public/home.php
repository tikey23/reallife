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
        display: block;
        background-color: #8b5cf6; /* bg-violet-500 */
        padding: 20px;
        margin: 20px;
        border-radius: 10px;
        border: 1px solid black;
    }


    .special
    {
        width: 300px;
        height: 300px;
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
        echo "<p class='text-3xl font-bold text-center'>Nächster Termin: $termin</p>";
        echo "<br>";
        echo "<p class='text-2xl text-center font-bold'><u>Weitere Termine:</u></p>";
        echo "<p class='text-xl text-center'>$weiteretermin1</p>";
        echo "<p class='text-xl text-center'>$weiteretermin2</p>";
        echo "<p class='text-xl text-center'>$weiteretermin3</p>";
        ?>
    </div>

    <div class="special">
        <h1 class="text-3xl font-bold text-center">Spezial Event:</h1>
        <p class="text.left">Z.B. Roger's Karaokezebra</p>
    </div>
</div>
<div class="mainpart2">

<?php
    for($i=1; $i<20; $i++)
    {
        for($j=1; $j<50; $j++)
        {
            echo "text ";
        }
        echo "<br>";
    }
?>
</div>