<div class="classTable" id="adminEvent">

<?php
if (isset($_POST['modifyEvent'])) {
				modifyEvent(
					$_POST['newdate'],
					$_POST['newleader1'],
					$_POST['newleader2'],
					$_POST['newhelper1'],
					$_POST['newhelper2'],
					$_POST['newhelper3'],
					$_POST['newhelper4'],
					$_POST['modifyEvent']);
			}

			if (isset($_POST['deleteEvent'])) {
				deleteEvent($_POST['deleteEvent']);
			}

			if (isset($_POST['createEvent'])) {
				createEvent($_POST['day0'], $_POST['month0'], $_POST['year0'],);
			}

			if(isset($_POST['showAllEvents'])){
				$events =  getEvents();
			} else {
				$events =  showActualEvent();
			}
            $members = getMembers();
			$selectDate = selectdate(0);

			echo $twig->render('admin/adminEventList.twig', [
				"events" => $events,
				"members" => $members,
                "modifyEventPick" => @$_POST['modifyEventPick'],
				"selectDate" => $selectDate,

			]);
			echo $twig->render('backToAdmin.twig');
?>
</div>