<div class='adminevent'>
<?php
    echo "<h2 class='text-2xl font-bold underline'>Termine:</h2>";
	echo "<p class='font-bold'>Eingetragene Termine:</p>";

	if(isset($_POST['modifyEvent'])){
		modifyEvent($_POST['newdate'], $_POST['modifyEvent']);
	}

	if(isset($_POST['deleteEvent'])){
		deleteEvent($_POST['deleteEvent']);
	}

	if(isset($_POST['createEvent'])){
		createEvent($_POST['day0'], $_POST['month0'], $_POST['year0'], );
	}

	showEvent();

?>
</div>