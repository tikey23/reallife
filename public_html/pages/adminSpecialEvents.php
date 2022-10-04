<div class='classTable' id='adminSpecialEvents'>
<?php
    require_once("functions/specialeventsfunctions.php");

    use \Rl\Models\SpecialEvent;

    // create new Special Event
    if(isset($_POST['createSpecialEvent'])) {
        // $specialeventdate = $_POST['year0'] . "-" . $_POST['month0'] . "-" . $_POST['day0'];
        // $publicdate = $_POST['year1'] . "-" . $_POST['month1'] . "-" . $_POST['day1'];
        $flyer = basename($_FILES['flyer']['name']);
        $tempflyer = $_FILES['flyer']['tmp_name'];

        $specialevent = new Specialevent;
        $specialevent->specialeventtitle = $_POST['specialeventtitle'];
        $specialevent->specialeventdate = $_POST['specialeventdate'];
        $specialevent->publicdate = $_POST['publicdate'];
        $specialevent->flyer = $flyer;
        $specialevent->descripttext = $_POST['descripttext'];
        $specialevent->save();

        if($flyer != NULL) {
            $specialevent->uploadFlyer($flyer, $tempflyer);
        }
    }

    // modified Special Event
    if(isset($_POST['modifySpecialEventconfirm'])) {

        $flyer = basename($_FILES['flyer']['name']);
        $tempflyer = $_FILES['flyer']['tmp_name'];
        $specialevent = findOne(Specialevent::class, $_POST['modifySpecialEventconfirm']);
        $specialevent->specialeventtitle = $_POST['specialeventtitle'];
        $specialevent->specialeventdate = $_POST['specialeventdate'];
        $specialevent->publicdate = $_POST['publicdate'];
        $specialevent->flyer = $flyer;
        $specialevent->descripttext = $_POST['descripttext'];
        $specialevent->save();

        if($flyer != NULL) {
            $specialevent->uploadFlyer($flyer, $tempflyer);
        }
    }

    // delete Special Event
    if(isset($_POST['deleteSpecialEvent'])) {
        $specialEvent = findOne(SpecialEvent::class, $_POST['deleteSpecialEvent']);
        $specialEvent->delete();
    }

    // showSpecialEventsAdmin();
    if(isset($_SESSION['password'])){

        if(isset($_POST['showAllSpecialEvents'])){
            $specialEvents = findAll(SpecialEvent::class);
        } else {
            $specialEvents = showSpecialEvents();
        }

        if(isset($_POST['modifySpecialEvent'])){
            $modifySpecialEvent = $_POST['modifySpecialEvent'];
        } else {
            $modifySpecialEvent = 0;
        }

        echo $twig->render('admin/showSpecialEventsAdmin.twig', [
            "isShowAllSpecialEvents" => isset($_POST['showAllSpecialEvents']),
            "specialEvents" => $specialEvents,
            "modifySpecialEvent" => $modifySpecialEvent
        ]);
    
        // $selectDate[0] = selectdate(0);
        // $selectDate[1] = selectdate(1);
        echo $twig->render('admin/createSpecialEvents.twig');
        echo $twig->render('backToAdmin.twig');
    } else {
        echo $twig->render('admin/loginfailed.twig');
    }
?>
</div>