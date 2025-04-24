<?php	// Adding items to an array and retrieving them
$paper[] = "Copier";
$paper[] = "Inkjet";
$paper[] = "Laser";
$paper[] = "Photo";

for ($j = 0; $j < 4; ++$j)
	echo "$j: $paper[$j]<br>";
?>
