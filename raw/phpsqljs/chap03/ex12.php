<?php	// A simple function declaration
function longdate($timestamp) {
	return date("l F jS Y", $timestamp);
}
echo longdate(time());
?>

