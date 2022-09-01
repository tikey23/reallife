<!doctype html>
<html lang="de">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="/css/output.css" rel="stylesheet">
</head>
<body>
<?php

$hdate = getdate();

$date = date_create('2022-12-20');
echo "Date:";
echo date_format($date, 'd. F Y');

echo "<br>";

echo "Heute: ";
$today = $hdate['year'] . "-" . $hdate['mon'] . "-" . $hdate['mday'];
$heute = date_create($today);
echo date_format($heute, 'd. F Y');

echo "<br>";

if ($date < $heute) {
	echo "Abgelaufen";
} else {
	echo "Noch frisch";
}

?>


</body>
</html>