<?php	// Updating a file with file locking
$fh = fopen("testfile.txt", 'r+') or die("Failed to open file");
$text = fgets($fh);
fseek($fh, 0, SEEK_END);
if (flock($fh, LOCK_EX)) {
	fwrite($fh, "$text") or die("Could not write to file");
	flock($fh, LOCK_UN);
}
fclose($fh);
echo "File 'testfile.txt' successfully updated";
?>
