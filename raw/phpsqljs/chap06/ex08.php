<?php	// Walking through an associative array using each and list
$paper = array(
	'copier' => "Copier & Multipurpose",
	'inkjet' => "Inkjet Printer",
	'laser' => "Laser Printer",
	'photo' => "Photographic Paper"
);

while (list($item, $description) = each($paper))
	echo "$item: $description<br>";
?>
