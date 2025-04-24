<?php	// Alternate syntax for copying a file
if (!copy('testfile.txt', 'testfile2.txt')) {
	echo "Could not copy file";
} else {
	echo "File successfully copied to 'testfile2.txt'";
}
?>
