<div class='adminevent'>
<?php
    echo "<h2 class='text-2xl font-bold underline'>Termine:</h2>";
	echo "<p class='font-bold'>Eingetragene Termine:</p>";

	if(isset($_POST['modifyEvent'])){
		modifyEvent($con, $_POST['newdate'], $_POST['modifyEvent']);
	}

	if(isset($_POST['deleteEvent'])){
		deleteEvent($con, $_POST['deleteEvent']);
	}

	if(isset($_POST['createEvent'])){
		createEvent($con, $_POST['day'], $_POST['month'], $_POST['year'], );
	}

	showEvent();

?>
</div>