<?php	// This attempt to access $temp in function longdate will fail
$temp = "The date is ";
echo longdate(time());

function longdate($timestamp) {
	return $temp . date("l F jS Y", $timestamp);
}
?>
