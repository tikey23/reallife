<div class='classTable' id='adminSpecialEvents'>
<?php
    require_once("functions/specialeventsfunctions.php");

    use \Rl\Models\SpecialEvent;

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


    // showSpecialEventsAdmin();
    if(isset($_SESSION['password'])){

        $specialEvents = findAll(SpecialEvent::class);
        
        if(isset($_POST['modifySpecialEvent'])){
            $modifySpecialEvent = $_POST['modifySpecialEvent'];
        } else {
            $modifySpecialEvent = 0;
        }

        $specialEvents = findAll(SpecialEvent::class);
        
        echo $twig->render('admin/showSpecialEventsAdmin.twig', [
            "specialEvents" => $specialEvents,
            "modifySpecialEvent" => $modifySpecialEvent
        ]);

        $selectDate[0] = selectdate(0);
        $selectDate[1] = selectdate(1);
        echo $twig->render('admin/specialevents.twig', ["selectDate" => $selectDate]);
        echo $twig->render('backToAdmin.twig');
    } else {
        echo $twig->render('admin/loginfailed.twig');
    }
?>
</div>