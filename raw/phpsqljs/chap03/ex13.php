<?php	// An expanded version of the longdate function
function longdate($timestamp) {
	$temp = date("l F jS Y", $timestamp);
	return "The date is $temp";
}
echo longdate(time());
?>
