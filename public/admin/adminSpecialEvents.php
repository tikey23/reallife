<h2 class='text-2xl font-bold underline'>Spezial Abende:</h2>
<br>
<div id='adminspecialevents'>
<?php
    require_once("functions/specialeventsfunctions.php");

    if(isset($_POST['createSpecialEvent'])) {
        $specialeventdate = $_POST['year0'] . "-" . $_POST['month0'] . "-" . $_POST['day0'];
        $publicdate = $_POST['year1'] . "-" . $_POST['month1'] . "-" . $_POST['day1'];
        $flyer = basename($_FILES['flyer']['name']);
        $tempflyer = $_FILES['flyer']['tmp_name'];
        createSpecialEvent($_POST['specialeventtitle'], $specialeventdate, $publicdate, $flyer, $_POST['descripttext'], $tempflyer);
    }

    if(isset($_POST['modifySpecialEventconfirm'])) {
        $flyer = basename($_FILES['flyer']['name']);
        $tempflyer = $_FILES['flyer']['tmp_name'];
        modifySpecialEventconfirm($_POST['specialeventtitle'], $_POST['specialeventdate'], $_POST['publicdate'], $flyer, $_POST['descripttext'], $_POST['modifySpecialEventconfirm'], $tempflyer); 
    }

    if(isset($_POST['deleteSpecialEvent'])) {
        deleteSpecialEvent($_POST['deleteSpecialEvent']);
    }

    showSpecialEventsAdmin();
    newSpecialEvent();

    echo "<p><a href='index.php?page=admin'>Zurück</a></p>";
?>
</div>