<h2 class='text-2xl font-bold underline'>Spezial Abende:</h2>
<br>
<?php
    require_once("functions/specialeventsfunctions.php");
    if(isset($_POST['modifySpecialEventconfirm'])) {
        modifySpecialEventconfirm($_POST['specialeventtitle'], $_POST['specialeventdate'], $_POST['publicdate'], $_POST['descripttext'], $_POST['modifySpecialEventconfirm']); 
    }


    showSpecialEventsAdmin();
    echo "<p><a href='index.php?page=admin'>Zurück</a></p>";
?>