<?php
$termin = [
	"2022-10-10",
	"2022-11-11",
];

$inhalt = serialize($termin);
file_put_contents("admin/termine.dat", $inhalt);
?>