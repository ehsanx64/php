<?php	// An alternative solution: passing $temp as an argument
$temp = "The date is ";
echo longdate($temp, time());

function longdate($text, $timestamp) {
	return $text . date("l F jS Y", $timestamp);
}
?>
