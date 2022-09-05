<div class='adminevent'>
<?php
    echo "<form action='/index.php?page=admin' method='post'>";
	echo "<p><b>Eingetragene Termine:</b></p>";

	if(isset($_POST['modifyEvent'])){
		modifyEvent($con, $_POST['newdate'], $_POST['modifyEvent']);
	}

	if(isset($_POST['deleteEvent'])){
		deleteEvent($con, $_POST['deleteEvent']);
	}

	if(isset($_POST['createEvent'])){
		createEvent($con, $_POST['day'], $_POST['month'], $_POST['year'], );
	}

	showEvent($con);

	echo "</form>";

?>
</div>