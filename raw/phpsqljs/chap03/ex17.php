<?php	// A function using a static variable
function test() {
	static $count = 0;
	echo $count;
	$count++;
}
test();
test();
?>
