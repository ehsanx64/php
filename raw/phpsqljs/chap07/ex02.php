<?php	// String padding
echo "<pre>";	// Enables viewing of the spaces

$h = 'House';

printf("[%s]\n",	$h);	// Standard string output
printf("[%10s]\n",	$h);	// Right justify with spaces
printf("[%-10s]\n",	$h);	// Left justify with spaces
printf("[%010s]\n",	$h);	// Zero padding
printf("[%'#10s]\n\n",	$h);	// Use the custom padding character '#'

$d = 'Doctor House';

printf("[%s]\n",	$d);	// !!! Added by me
printf("[%10.8s]\n",	$d);	// Right justifty, cutoff of 8 characters
printf("[%-10.6s]\n",	$d);	// Left justify, cutoff of 6 characters
printf("[%-'@10.6s]\n",	$d);	// Left justify, pad '@', cutoff 6 chars
?>
