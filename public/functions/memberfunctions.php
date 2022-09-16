	<?php
	function showmembers() {
		global $con;
		$sql = "SELECT * FROM members WHERE active = 'yes'";
		$res = $con->query($sql);
		while($data = $res->fetch_assoc()) {
			echo "<tr>";
			echo "<td><a href='" . $data['little_akiba'] . "' target='_blank'><img src='" . $data['memberimg'] . "' id='memberpic'></img></a></td>";
			echo "<td>" . $data['membername'] . "</td>";
			echo "<td>" . $data['memberfunction'] . "</td>";
			echo "<td>" . $data['involved_since'] . "</td>";
			echo "<td><a href='mailto:" . $data['e_mail'] . "?subject=Hier steht der Betreff'>" . $data['e_mail'] . "</a></td>";
			echo "<td>" . $data['mobile'] . "</td>";
			echo "</tr>";
		}
	}
	?>

