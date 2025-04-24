<?php	// Trapping division-by-zero errors using continue
$j = 10;
while ($j > -10) {
	$j--;
	if ($j == 0) continue;
	echo (10 / $j) . "<br />";
}

?>
