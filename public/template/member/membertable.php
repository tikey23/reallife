<table align='center'>
	<tr>
		<td><b>Little Akiba</b></td>
		<td><b>Name</b></td>
		<td><b>Funktion</b></td>
		<td><b>Dabei seit:</b></td>

		<?php
			if(isset($_SESSION['memberpassword'])){
				echo "<td><b>E-Mail</b></td>";
				echo "<td><b>Mobile</b></td>";
			}
		?>

	</tr>
	<?php
		showmembers();
	?>
</table>